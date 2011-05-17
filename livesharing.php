<?php

// Getting new data to Save
if ($_REQUEST['up_pos']) {
  // update position
  
  $upPos = $_REQUEST['up_pos'];
  $data = json_decode($upPos);

  $file = "livesharing/{$data->channel}.json";
  
  $f = fopen ($file, 'w');
  if (!$f) {
    //header?
    echo "could not open file: $file!\n";
	exit;
  }
  fwrite($f, $upPos);
  fclose($f);
  header('HTTP/1.0 204 No Content', true, 204);
  exit;
}

//refresh requested
if ($_REQUEST['refresh']) {
  $refresh = $_REQUEST['refresh'];
  $file = "livesharing/{$refresh}.json";
  $data = file($file);
  
  if (!$data) {
    exit;
  }
  
  header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Content-type: application/json');

  echo($data[0]);
}

?>