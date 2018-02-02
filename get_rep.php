<?php

function getDistrict($row) {
  $data = callAPI("{$row['lat']},{$row['lng']}");

  if( !isset($data['divisions']) ) {
    $data = callAPI("{$row['address']} {$row['city']} {$row['state']} {$row['zipcode']}");
  }

  if( !isset($data['divisions']) ) {
    return false;
  }

  return (int)array_slice(
    explode(":", array_keys($data['divisions'])[0]),
    -1
  )[0];
}


function callAPI($address) {
  $url = "https://www.googleapis.com/civicinfo/v2/representatives?address={$address}&key=AIzaSyCvZs4qoE9R0s0iGpb4MlR2Rr9w1SLAai0&includeOffices=false&levels=country&roles=legislatorLowerBody";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $data = json_decode(curl_exec($ch), true);

  curl_close($ch);
  sleep(15);
  return $data;
}

