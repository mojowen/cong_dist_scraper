<div id="sidebar" class="red-gradient" style="flex: inherit!important; float: left!important;">

  <h4>Search Your Local Impact</h4>
<form action="<?php bloginfo('wpurl'); ?>/economic-impact/your-local-activity" method="GET">
  <h3>Search by Zip Code</h3>
  <input type="text" id="addressInput_1" value="" mid="1" class="addressInput" placeholder="Zip Code..." autocomplete="off" name="zip">

  <select class="wpgmza_sl_radius_select" id="radiusSelect_1" name="radius">
    <option class="wpgmza_sl_select_option" value="25">25mi</option>
    <option class="wpgmza_sl_select_option" value="50">50mi</option>
    <option class="wpgmza_sl_select_option" value="100" selected="">100mi</option>
  </select>

  <!--<input type="hidden" value="1" name="wpgmza_distance_type" id="wpgmza_distance_type_1" style="display:none;">-->
  <select id="locationSelect" style="width:100%;visibility:hidden"></select>
  <input class="wpgmza_sl_search_button_1" mid="1" type="submit" value="Search">
</form>
  <h3>Search by State</h3>
    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
      <option value="">&#xf041; &nbsp; &nbsp; State...</option>
      <option <?php echo strpos(get_permalink(), 'alabama') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/alabama/">Alabama</option>
      <option <?php echo strpos(get_permalink(), 'alaska') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/alaska/">Alaska</option>
      <option <?php echo strpos(get_permalink(), 'arizona') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/arizona/">Arizona</option>
      <option <?php echo strpos(get_permalink(), 'arkansas') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/arkansas/">Arkansas</option>
      <option <?php echo strpos(get_permalink(), 'california') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/california/">California</option>
      <option <?php echo strpos(get_permalink(), 'colorado') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/colorado/">Colorado</option>
      <option <?php echo strpos(get_permalink(), 'connecticut') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/connecticut/">Connecticut</option>
      <option <?php echo strpos(get_permalink(), 'delaware') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/delaware/">Delaware</option>
      <option <?php echo strpos(get_permalink(), 'florida') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/florida/">Florida</option>
      <option <?php echo strpos(get_permalink(), 'georgia') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/georgia/">Georgia</option>
      <option <?php echo strpos(get_permalink(), 'hawaii') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/hawaii/">Hawaii</option>
      <option <?php echo strpos(get_permalink(), 'idaho') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/idaho/">Idaho</option>
      <option <?php echo strpos(get_permalink(), 'illinois') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/illinois/">Illinois</option>
      <option <?php echo strpos(get_permalink(), 'indiana') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/indiana/">Indiana</option>
      <option <?php echo strpos(get_permalink(), 'iowa') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/iowa/">Iowa</option>
      <option <?php echo strpos(get_permalink(), 'kansas') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/kansas/">Kansas</option>
      <option <?php echo strpos(get_permalink(), 'kentucky') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/kentucky/">Kentucky</option>
      <option <?php echo strpos(get_permalink(), 'louisiana') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/louisiana/">Louisiana</option>
      <option <?php echo strpos(get_permalink(), 'maine') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/maine/">Maine</option>
      <option <?php echo strpos(get_permalink(), 'maryland') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/maryland/">Maryland</option>
      <option <?php echo strpos(get_permalink(), 'massachusetts') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/massachusetts/">Massachusetts</option>
      <option <?php echo strpos(get_permalink(), 'michigan') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/michigan/">Michigan</option>
      <option <?php echo strpos(get_permalink(), 'minnesota') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/minnesota/">Minnesota</option>
      <option <?php echo strpos(get_permalink(), 'mississippi') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/mississippi/">Mississippi</option>
      <option <?php echo strpos(get_permalink(), 'missouri') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/missouri/">Missouri</option>
      <option <?php echo strpos(get_permalink(), 'montana') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/montana/">Montana</option>
      <option <?php echo strpos(get_permalink(), 'nebraska') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/nebraska/">Nebraska</option>
      <option <?php echo strpos(get_permalink(), 'nevada') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/nevada/">Nevada</option>
      <option <?php echo strpos(get_permalink(), 'new-hampshire') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-hampshire/">New Hampshire</option>
      <option <?php echo strpos(get_permalink(), 'new-jersey') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-jersey/">New Jersey</option>
      <option <?php echo strpos(get_permalink(), 'new-mexico') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-mexico/">New Mexico</option>
      <option <?php echo strpos(get_permalink(), 'new-york') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-york/">New York</option>
      <option <?php echo strpos(get_permalink(), 'north-carolina') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/north-carolina/">North Carolina</option>
      <option <?php echo strpos(get_permalink(), 'north-dakota') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/north-dakota/">North Dakota</option>
      <option <?php echo strpos(get_permalink(), 'ohio') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/ohio/">Ohio</option>
      <option <?php echo strpos(get_permalink(), 'oklahoma') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/oklahoma/">Oklahoma</option>
      <option <?php echo strpos(get_permalink(), 'oregon') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/oregon/">Oregon</option>
      <option <?php echo strpos(get_permalink(), 'pennsylvania') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/pennsylvania/">Pennsylvania</option>
      <option <?php echo strpos(get_permalink(), 'rhode-island') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/rhode-island/">Rhode Island</option>
      <option <?php echo strpos(get_permalink(), 'south-carolina') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/south-carolina/">South Carolina</option>
      <option <?php echo strpos(get_permalink(), 'south-dakota') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/south-dakota/">South Dakota</option>
      <option <?php echo strpos(get_permalink(), 'tennessee') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/tennessee/">Tennessee</option>
      <option <?php echo strpos(get_permalink(), 'texas') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/texas/">Texas</option>
      <option <?php echo strpos(get_permalink(), 'utah') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/utah/">Utah</option>
      <option <?php echo strpos(get_permalink(), 'vermont') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/vermont/">Vermont</option>
      <option <?php echo strpos(get_permalink(), 'virginia') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/virginia/">Virginia</option>
      <option <?php echo strpos(get_permalink(), 'washington') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/washington/">Washington</option>
      <option <?php echo strpos(get_permalink(), 'west-virginia') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/west-virginia/">West Virginia</option>
      <option <?php echo strpos(get_permalink(), 'wisconsin') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/wisconsin/">Wisconsin</option>
      <option <?php echo strpos(get_permalink(), 'wyoming') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/wyoming/">Wyoming</option>
    </select>

  <h3>Search by District</h3>
    <select id="searchstate" onchange="setCongressionalDistricts()">
      <option value="">&#xf041; &nbsp; &nbsp; State...</option>
      <option <?php echo strpos(get_permalink(), 'alabama') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/alabama/">Alabama</option>
      <option <?php echo strpos(get_permalink(), 'alaska') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/alaska/">Alaska</option>
      <option <?php echo strpos(get_permalink(), 'arizona') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/arizona/">Arizona</option>
      <option <?php echo strpos(get_permalink(), 'arkansa') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/arkansas/">Arkansas</option>
      <option <?php echo strpos(get_permalink(), 'california') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/california/">California</option>
      <option <?php echo strpos(get_permalink(), 'colorado') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/colorado/">Colorado</option>
      <option <?php echo strpos(get_permalink(), 'connecticut') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/connecticut/">Connecticut</option>
      <option <?php echo strpos(get_permalink(), 'delaware') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/delaware/">Delaware</option>
      <option <?php echo strpos(get_permalink(), 'florida') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/florida/">Florida</option>
      <option <?php echo strpos(get_permalink(), 'georgia') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/georgia/">Georgia</option>
      <option <?php echo strpos(get_permalink(), 'hawaii') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/hawaii/">Hawaii</option>
      <option <?php echo strpos(get_permalink(), 'idaho') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/idaho/">Idaho</option>
      <option <?php echo strpos(get_permalink(), 'illinois') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/illinois/">Illinois</option>
      <option <?php echo strpos(get_permalink(), 'indiana') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/indiana/">Indiana</option>
      <option <?php echo strpos(get_permalink(), 'iowa') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/iowa/">Iowa</option>
      <option <?php echo strpos(get_permalink(), 'kansas') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/kansas/">Kansas</option>
      <option <?php echo strpos(get_permalink(), 'kentucky') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/kentucky/">Kentucky</option>
      <option <?php echo strpos(get_permalink(), 'louisiana') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/louisiana/">Louisiana</option>
      <option <?php echo strpos(get_permalink(), 'maine') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/maine/">Maine</option>
      <option <?php echo strpos(get_permalink(), 'maryland') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/maryland/">Maryland</option>
      <option <?php echo strpos(get_permalink(), 'massachusetts') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/massachusetts/">Massachusetts</option>
      <option <?php echo strpos(get_permalink(), 'michigan') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/michigan/">Michigan</option>
      <option <?php echo strpos(get_permalink(), 'minnesota') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/minnesota/">Minnesota</option>
      <option <?php echo strpos(get_permalink(), 'mississippi') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/mississippi/">Mississippi</option>
      <option <?php echo strpos(get_permalink(), 'missouri') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/missouri/">Missouri</option>
      <option <?php echo strpos(get_permalink(), 'montana') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/montana/">Montana</option>
      <option <?php echo strpos(get_permalink(), 'nebraska') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/nebraska/">Nebraska</option>
      <option <?php echo strpos(get_permalink(), 'nevada') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/nevada/">Nevada</option>
      <option <?php echo strpos(get_permalink(), 'new-hampshire') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-hampshire/">New Hampshire</option>
      <option <?php echo strpos(get_permalink(), 'new-jersey') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-jersey/">New Jersey</option>
      <option <?php echo strpos(get_permalink(), 'new-mexico') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-mexico/">New Mexico</option>
      <option <?php echo strpos(get_permalink(), 'new-york') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/new-york/">New York</option>
      <option <?php echo strpos(get_permalink(), 'north-carolina') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/north-carolina/">North Carolina</option>
      <option <?php echo strpos(get_permalink(), 'north-dakota') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/north-dakota/">North Dakota</option>
      <option <?php echo strpos(get_permalink(), 'ohio') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/ohio/">Ohio</option>
      <option <?php echo strpos(get_permalink(), 'oklahoma') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/oklahoma/">Oklahoma</option>
      <option <?php echo strpos(get_permalink(), 'oregon') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/oregon/">Oregon</option>
      <option <?php echo strpos(get_permalink(), 'pennsylvania') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/pennsylvania/">Pennsylvania</option>
      <option <?php echo strpos(get_permalink(), 'rhode-island') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/rhode-island/">Rhode Island</option>
      <option <?php echo strpos(get_permalink(), 'south-carolina') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/south-carolina/">South Carolina</option>
      <option <?php echo strpos(get_permalink(), 'south-dakota') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/south-dakota/">South Dakota</option>
      <option <?php echo strpos(get_permalink(), 'tennessee') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/tennessee/">Tennessee</option>
      <option <?php echo strpos(get_permalink(), 'texas') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/texas/">Texas</option>
      <option <?php echo strpos(get_permalink(), 'utah') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/utah/">Utah</option>
      <option <?php echo strpos(get_permalink(), 'vermont') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/vermont/">Vermont</option>
      <option <?php echo strpos(get_permalink(), 'virginia') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/virginia/">Virginia</option>
      <option <?php echo strpos(get_permalink(), 'washington') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/washington/">Washington</option>
      <option <?php echo strpos(get_permalink(), 'west-virginia') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/west-virginia/">West Virginia</option>
      <option <?php echo strpos(get_permalink(), 'wisconsin') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/wisconsin/">Wisconsin</option>
      <option <?php echo strpos(get_permalink(), 'wyoming') == 54 ? 'selected' : ''; ?> value="<?php bloginfo('wpurl'); ?>/economic-impact/wyoming/">Wyoming</option>
    </select>
    <select id="searchdistrict" onChange="goToDistrict()">
      <option value="">Select State</option>
    </select>

  <div class="clearfix"></div>

  <span id="note">Congressional district data is<br />not yet available for all states.</span>
</div>

<style>
::-webkit-input-placeholder {color: #333!important;}
:-ms-input-placeholder {color: #333!important;}
::-moz-placeholder {color: #333!important;}
:-moz-placeholder {color: #333!important;}
</style>

<script>
  function goToDistrict() {
    var url = '<?php bloginfo('wpurl'); ?>/economic-impact/your-local-activity',
        params = ['state='+searchstate.value.split('/').reverse()[1],
                  'district='+searchdistrict.value].join('&')
    window.location = url + '?' + params
  }

  function setCongressionalDistricts() {
    var entries = window.States,
        elem = document.getElementById('searchdistrict'),
        state = searchstate.value,
        option = document.createElement('option')

      while( elem.hasChildNodes() ) {
        elem.removeChild(elem.lastChild)
      }

      option.textContent = 'District...'
      elem.appendChild(option)

      if( state.length === 0 ) return

      state = SheetMap.prototype.shortState(
        state.split('/').reverse()[1].replace('-', ' ')
      )

      for (var i = 0; i < States[state].length; i++) {
        var option = document.createElement('option'),
            district_id = parseInt(in_state[i])

        option.value = district_id
        if( district_id === 0 ) {
          option.textContent = 'At Large District'
        } else {
          option.textContent = 'District '+district_id
        }

        elem.appendChild(option)
      }
  }
  function filterEmptyStates() {
    var visible = window.States,
        options = searchstate.querySelectorAll('option')

    for(var i = 0; i < options.length; i++) {
      var el = options[i]
      if( el.value !== '' && !visible[SheetMap.prototype.shortState(el.textContent)] ) el.style.display = 'none'
    }
  }

  $(document).ready(function() {
    jQuery.getJSON(
      '/wp-content/plugins/sheet_map/data/states.json',
      function(data) {
        window.States = data
        filterEmptyStates()
        setCongressionalDistricts()
      }
    )
  })
</script>
