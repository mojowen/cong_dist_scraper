<?php

require_once __DIR__ . '/google/vendor/autoload.php';
require_once __DIR__ . '/get_rep.php';

ini_set('display_errors', '1');
date_default_timezone_set('utc');

function parseRow($row, $headers, $results) {
  $states = $results['states'];
  $maps = $results['maps'];
  $data = Array();

  foreach ($headers as $int => $key) {
    $data[$key] = $row[$int];
  }
  $map_id = $data['map_id'];
  $state = $data['state'];

  $district = getDistrict($data);
  if( $district ) $data['district'] = $district;

  if ( isset($states[$state]) ) array_push($states[$state], $data['district']);
  else $states[$state] = Array($data['district']);

  if ( isset($maps[$map_id]) ) array_push($maps[$map_id], $data);
  else $maps[$map_id] = Array($data);

  return Array('states' => $states, 'maps' => $maps);
}

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);
$service = new Google_Service_Sheets($client);

$values = $service->spreadsheets_values->get(
  '17KEaIm_O-ybIbW-cr1fNGRYfhkicqI5SjwMg1DpEwlo',
  'Alliance Map Data - FINAL.csv!A:K'
)->getValues();

$results = Array('states' => Array(), 'maps' => Array());

foreach ($values as $i => $row) {
  if( $i == 0 ) {
    $headers = $row;
    continue;
  }
  try {
    $results = parseRow($row, $headers, $results);
  } catch (Exception $exception) {
    echo "Exception storing {$row[4]}:\n{$exception}";
  }
}

$dir = getenv('CONG_DIST_SCRAPER_PATH');
if( !$dir ) $dir = './output';

foreach ($results['states'] as $map_id => $districts) {
  $districts = array_unique($districts);
  sort($districts);
  $results['states'][$map_id] = $districts;
}

file_put_contents(
  "{$dir}/states.json",
  json_encode($results['states'])
);

foreach ($results['maps'] as $map_id => $data) {
  file_put_contents("{$dir}/{$map_id}.json", json_encode($data));
}

if (php_sapi_name() != 'cli') {
  throw new Exception('This application must be run on the command line.');
}

