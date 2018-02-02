function SheetMap() {
  this.state = false
  this.zip_code = false
  this.radius = false
  this.district = false
  this.center = false


  this.render = function() {
    this.checkParams()

    var entries = this.filteredEntries()

    this.renderMap(entries)
    this.fillTable(entries)
  }

  this.constructor.onMapReady(function(entries) {
    this.map = window.MYMAP.filter(function(el) { return !!el })[0].map
    this.geocoder = new google.maps.Geocoder()

    this.entries = entries
    this.render()
  }, this)
}

SheetMap.prototype.filteredEntries = function() {
  return this.entries.filter(function(el) {
    if( this.zip && this.center ) return this.withinDistance(el)
    else if( this.zip && !this.center ) return false

    if( this.state ) var matched = this.shortState() === el.state
    if( this.district ) matched = matched && this.district === el.district
    return matched
  }, this)
}


SheetMap.prototype.checkParams = function() {
  var state_search = /\/economic-impact\/\w*/
      path = document.location.pathname,
      search = document.location.search.replace(/\?/, '').split('&')

  if( path.match(state_search) ) {
    if( path.split('').reverse()[0] === '/' ) path = path.slice(0,-1)
    this.state = unescape(path.split('/').reverse()[0]).replace(/\-/g, ' ')
  }

  if( search.length > 0 ) {
    for (var i = search.length - 1; i >= 0; i--) {
      var key = search[i].split('=')[0],
          value = search[i].split('=')[1]

      if( key.match(/zip|radius|district|state/i) ) {
        this[key.toLowerCase()] = unescape(value).replace(/\-/g, ' ')
      }
    }
    if( this.zip ) this.geocode()
  }
}

SheetMap.prototype.renderMap = function(entries) {
  if( entries.length > 0 ) {
    var latlngbounds = new google.maps.LatLngBounds()

    for (var i = entries.length - 1; i >= 0; i--) {
      entries[i].marker.setMap(this.map)
      latlngbounds.extend(entries[i].latlng)
    }

    this.map.setCenter(
      latlngbounds.getCenter(),
      this.map.fitBounds(latlngbounds)
    )
    this.map.setZoom(this.map.getZoom())
  }
}

SheetMap.prototype.fillTable = function(entries) {
  var table = document.getElementById('sheet_map_table'),
      title_elem = document.getElementById('sheet_map_total') || document.createElement('h2')

  if( !!! table ) return

  title_elem.id = 'sheet_map_total'
  this.map.getDiv().parentNode.insertBefore(title_elem, this.map.getDiv())

  if( entries.length < 1 ) title_elem.textContent = 'We do not have data for this local area.'

  var tbody = table.querySelector('tbody')

  if( !!!tbody ) {
    tbody = document.createElement('tbody')
    table.appendChild(tbody)
  } else {
    while( tbody.hasChildNodes() ) {
      tbody.removeChild(tbody.lastChild)
    }
  }

  for (var i = 0; i < entries.length; i++) {
    if( (entries[i].impact || '').length > 0 ) {
      var tr = document.createElement('tr'),
          columns = ['title', 'city', 'state', 'employees', 'salary', 'impact']

      for (var col = 0; col < columns.length; col++) {
        var td = document.createElement('td')
        td.textContent = entries[i][columns[col]]
        tr.appendChild(td)
      }
      tbody.appendChild(tr)
    }
  }

  var total = '$'+entries.map(function(el) { return parseInt(el.impact.replace(/\$|\,/g, '')) })
                         .filter(function(imp) { return !isNaN(imp) })
                         .reduce( function(sum, imp) { return sum + imp }, 0)
                         .toString()
                         .replace(/\B(?=(\d{3})+(?!\d))/g, ",")

  function capitalize(the_string) {
    var the_parts = the_string.split(' ')
    for (var i = the_parts.length - 1; i >= 0; i--) {
      var current = the_parts[i]
      the_parts[i] = current.slice(0, 1).toUpperCase()
      the_parts[i] += current.slice(1, current.length)
    }
    return the_parts.join(' ')
  }

  function custom_escape(the_string) {
    return the_string.replace(/\&/g, '%26')
                     .replace(/\=/g, '%3D')
                     .replace(/\s/g, '%20')
                     .replace(/\$/g, 'dollarsign')
  }

  if( this.radius && this.zip ) {
    var with_data = entries.filter(function(el) { return el.impact !== '' })
    if( with_data.length > 0 ) {
      title = ["Total Economic Impact:",
               total,
               "within your local area"].join(' ')
    } else {
      title = ["No data within",
               this.radius,
               "miles of zip code",
               this.zip +"."].join(' ')
    }
  }
  if( this.state && this.district ) {
    var district_name ="District " + this.district
    if( this.district == '0' ) {
      district_name = 'At Large District'
    }
    title = ["Total Economic Impact:",
             total,
             "within",
             capitalize(this.state),
             district_name].join(' ')
  }
  if( this.shortState() && !this.district ) {
    title = ["Total Economic Impact:",
              total,
              "within",
              this.state].join(' ')
  }

  title_elem.textContent = title

  var print_url = sheet_map.print_url + '?'
      to_pdf_elem = document.getElementById('print_to_pdf') || document.createElement('a')

  print_url += ['title='+title,
                'locs='+entries.map(function(el) { return el.index }).join(',')].join('&')

  to_pdf_elem.id = 'print_to_pdf'
  to_pdf_elem.textContent = 'Print PDF'
  to_pdf_elem.href = ['http://pdfmyurl.com/?',
                      '--print-media-type=hi&',
                      '--filename=report&',
                      '--layout=portrait',
                      '&url=',
                      custom_escape(print_url)].join('')

  table.parentNode.appendChild(to_pdf_elem)
}

// Helper Methods

SheetMap.prototype.geocode = function() {
  var self = this

  this.geocoder.geocode(
      { 'address': this.zip },
      function(results, status) {
        if( status == google.maps.GeocoderStatus.OK ) {
          self.center = results[0].geometry.location
          self.render()
        }
      }
  )
}

SheetMap.prototype.withinDistance = function(entry) {
  var latlon1 = this.center,
      latlon2 = entry.latlng,
      p = 0.017453292519943295,
      c = Math.cos,
      a = 0.5 - c((latlon2.lat() - latlon1.lat()) * p)/2 +
          c(latlon1.lat() * p) * c(latlon2.lat() * p) *
          (1 - c((latlon2.lng() - latlon1.lng()) * p))/2

  return 12742 * Math.asin(Math.sqrt(a)) * 0.6231 <= parseInt(this.radius)
}

SheetMap.prototype.longState = function(shortState) {
  return {"AL": "alabama", "AK": "alaska", "AZ": "arizona", "AR": "arkansas",
    "CA": "california", "CO": "colorado", "CT": "connecticut",
    "DC": "washington dc", "DE": "delaware", "FL": "florida", "GA": "georgia",
    "HI": "hawaii", "ID": "idaho", "IL": "illinois", "IN": "indiana",
    "IA": "iowa", "KS": "kansas", "KY": "kentucky", "LA": "louisiana",
    "ME": "maine", "MD": "maryland", "MA": "massachusetts", "MI": "michigan",
    "MN": "minnesota", "MS": "mississippi", "MO": "missouri", "MT": "montana",
    "NE": "nebraska", "NV": "nevada", "NH": "new hampshire", "NJ": "new jersey",
    "NM": "new mexico", "NY": "new york", "NC": "north carolina",
    "ND": "north dakota", "OH": "ohio", "OK": "oklahoma", "OR": "oregon",
    "PA": "pennsylvania", "RI": "rhode island", "SC": "south carolina",
    "SD": "south dakota", "TN": "tennessee", "TX": "texas", "UT": "utah",
    "VT": "vermont", "VA": "virginia", "WA": "washington",
    "WV": "west virginia", "WI": "wisconsin", "WY": "wyoming"
  }[(shortState || '').toUpperCase()]
}

SheetMap.prototype.shortState = function(state) {
  return { "alabama": "AL", "alaska": "AK", "arizona": "AZ", "arkansas": "AR",
    "california": "CA", "colorado": "CO", "connecticut": "CT",
    "washington dc": "DC", "delaware": "DE", "florida": "FL",
    "georgia": "GA", "hawaii": "HI", "idaho": "ID", "illinois": "IL",
    "indiana": "IN", "iowa": "IA", "kansas": "KS", "kentucky": "KY",
    "louisiana": "LA", "maine": "ME", "maryland": "MD",
    "massachusetts": "MA", "michigan": "MI", "minnesota": "MN",
    "mississippi": "MS", "missouri": "MO", "montana": "MT","nebraska": "NE",
    "nevada": "NV","new hampshire": "NH","new jersey": "NJ","new mexico": "NM",
    "new york": "NY","north carolina": "NC","north dakota": "ND","ohio": "OH",
    "oklahoma": "OK","oregon": "OR","pennsylvania": "PA","rhode island": "RI",
    "south carolina": "SC","south dakota": "SD","tennessee": "TN",
    "texas": "TX","utah": "UT","vermont": "VT","virginia": "VA",
    "washington": "WA","west virginia": "WV","wisconsin": "WI",
    "wyoming": "WY" }[(state || this.state || '').toLowerCase()]
}


// Class Methods

SheetMap.stateMapID = function(state) {
  return {
    "AL": 1,"AK": 2,"AZ": 3,"AR": 4,"CA": 5,"CO": 6,"CT": 7,"DE": 8,"FL": 9,
    "GA": 10,"HI": 11,"ID": 12,"IL": 13,"IN": 14,"IA": 15,"KS": 16,"KY": 17,
    "LA": 18,"ME": 19,"MD": 20,"MA": 21,"MI": 22,"MN": 23,"MS": 24,"MO": 25,
    "MT": 26,"NE": 27,"NV": 28,"NH": 29,"NJ": 30,"NM": 31,"NY": 32,"NC": 33,
    "ND": 34,"OH": 35,"OK": 36,"OR": 37,"PA": 38,"RI": 39,"SC": 40,"SD": 41,
    "TN": 42,"TX": 43,"UT": 44,"VT": 45,"VA": 46,"WA": 47,"WV": 48,"WI": 49,
    "WY": 50
  }[SheetMap.prototype.shortState(state)]

}

SheetMap.ready = function() {
  this.callbacks = this.callbacks || []
  for (var i = this.callbacks.length - 1; i >= 0; i--) {
    this.callbacks[i][0].call(this.callbacks[i][1] || this, this.entries)
  }
  this.callbacks = []

  if( typeof window.google === 'undefined' &&
      typeof window.MYMAP === 'undefined' ) return this.googlePause()

  this.mapifyData()

  this.map_callbacks = this.map_callbacks || []
  for (var i = this.map_callbacks.length - 1; i >= 0; i--) {
    this.map_callbacks[i][0].call(this.map_callbacks[i][1] || this, this.entries)
  }
  this.map_callbacks = []
}

SheetMap.googlePause = function() {
  setTimeout(function() { SheetMap.ready() }, 250)
}

SheetMap.onMapReady = function(callback, context) {
  this.map_callbacks = this.map_callbacks || []
  if( !! this.entries && typeof window.google !== 'undefined' ) callback.call(context, this.entries)
  else this.map_callbacks.push([callback, context])
}

SheetMap.onReady = function(callback, context) {
  this.callbacks = this.callbacks || []
  if( !! this.entries ) callback.call(context, this.entries)
  else this.callbacks.push([callback, context])
}

SheetMap.mapifyData = function() {
  this.entries = this.entries.map(function(entry) {
    entry.latlng = new google.maps.LatLng(entry.lat, entry.lng)

    entry.marker = new google.maps.Marker({
      position: entry.latlng,
      title: entry.address,
    })

    var info_content = ["<div>", "<h2>"+entry.title+"</h2>"]
    if( entry.employees !== '' ) info_content.push("<p><strong>Total Employees:</strong> "+entry.employees+"</p>")
    if( entry.salary !== '' ) info_content.push("<p><strong>Combined Salaries:</strong> "+entry.salary+"</p>")
    if( entry.impact !== '' ) info_content.push("<p><strong>Economic Impact:</strong> "+entry.impact+"</p>")
    info_content.push("</div>")

    entry.infowindow = new google.maps.InfoWindow({
      content: info_content.join(''),
      maxWidth: 240
    })

    entry.marker.addListener('mouseover', function() {
      entry.infowindow.open(entry.marker.map, entry.marker)
    })

    entry.marker.addListener('mouseout', function() {
      entry.infowindow.close()
    })

    return entry
  })
}

SheetMap.addData = function(data) {
  this.entries = data
  this.ready()
}
