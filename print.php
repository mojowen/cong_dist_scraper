<?php

include_once('get_sheet.php');

$selected = is_null($_GET['locs']) ? $argv[1] : $_GET['locs'];
$debug = is_null($_GET['debug']) || is_null($argv[3]);
$title = urldecode(is_null($_GET['title']) ? $argv[2] : $_GET['title']);
$title = str_replace('dollarsign', '$', $title);


if( is_null($selected) ) exit('Need selected points');

$map_url = "https://maps.googleapis.com/maps/api/staticmap?size=1000x450&maptype=roadmap&key=AIzaSyCJZxNkunyGOUL3c9QMG4HIKe0OQ_H3_dY&markers=";
$markers = Array("size:large", "color:red");

$sheet = "https://spreadsheets.google.com/feeds/list/17KEaIm_O-ybIbW-cr1fNGRYfhkicqI5SjwMg1DpEwlo/1/public/values?alt=json";
if( $debug ) $sheet = 'sheet.json';

$locations = filter_sheet($sheet, explode(",", $selected));
$markers = urlencode(
  implode(
    "|",
    array_merge(
      $markers,
      array_map('to_markers', $locations)
    )
  )
);

$fields = Array('title', 'city', 'state', 'employees', 'salary', 'impact');

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700|Quattrocento:400,700" rel="stylesheet">
  <link href="//www.aviationacrossamerica.org/wp-content/themes/alliance/style.css?1487022055" rel="stylesheet" type="text/css">
  <link href="//www.aviationacrossamerica.org/wp-content/themes/alliance/bootstrap.css?1487022055" rel="stylesheet" type="text/css">
  <style type="text/css">
    body {
      font-family: sans-serif;
    }
    #main {
      padding: 20px 40px;
    }
    #main * {
      margin: 10px 0;
    }
    #main img {
      margin: 0 auto!important;
      display: block!important;
    }
    h1 {
      font-family: 'Oswald',sans-serif;
    }
    table {
      width: 100%;
    }
    table td,
    table th {
      text-align: left;
      padding: 4px 8px;
    }
    header,
    footer {
      padding: 10px 40px;
      width: 100%;
      margin: 0;
    }
    header img,
    footer img { max-width: 420px; margin: 0 auto; }
    header { background: white; text-align: left; }
    footer { background: #a44a3f; text-align: center; }
  </style>
</head>
<body>
  <header>
    <img src="https://www.aviationacrossamerica.org/wp-content/uploads/logo.png" width="300px" height="104px">
  </header>
  <div id="main">
    <h1><?php echo $title; ?></h1>
    <img src="<?php echo $map_url.$markers; ?>">
    <table>
      <thead>
        <tr>
          <th>Airport Name</th>
          <th>City</th>
          <th>State</th>
          <th>Employees</th>
          <th>Payroll</th>
          <th>Total Economic Impact</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $locations as $entry ): ?>
          <?php if( $entry["impact"] == "" ) continue; ?>
          <tr>
            <?php foreach( $fields as $field ): ?>
              <td><?php echo $entry[$field]; ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <footer>
    <img src="//www.aviationacrossamerica.org/wp-content/themes/alliance/images/logo.png" id="logo2">
  </footer>
</body>
</html>
