<?php

function filter_sheet($sheet, $selected) {
  $markers = Array();

  $sheet_data = json_decode(file_get_contents($sheet));
  $all = $sheet_data->feed->entry;

  foreach ($all as $index => $entry) {
    if( in_array((string)$index, $selected) ) array_push($markers, $entry);
  }

  function fix_json($entry) {
    $obj = Array();
    $t = '$t';

    foreach ($entry as $key => $value) {
      $key = explode('$', $key);
      $key = $key[1];

      if( is_null($key) ) continue;
      $obj[$key] = $value->$t;
    }

    return $obj;
  }

  return array_map('fix_json', $markers);
}

function to_markers($entry) {
  return $entry['lat'].",".$entry['lng'];
}
