jQuery(document).ready(function() {
  function initSheetMap() {
    if( typeof window.SheetMap === 'undefined' ) return setTimeout(initSheetMap, 10)

    var map_id = jQuery('.wpgmza_map').first().attr('id')
                  .split('_').reverse()[0]

    jQuery.getJSON('/wp-content/plugins/sheet_map/data/'+map_id+'.json',
                   SheetMap.addData)

    new SheetMap()
  }

  if( jQuery('.wpgmza_map').length > 0 ) initSheetMap()
})
