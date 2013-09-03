<?php
$stash = $_SESSION['paramStash'];
$output = '';

// Get user specified parameters or get them all
if (empty($params)) {
  $paramList = array_keys($stash);
} else {
  $paramList = explode(',', str_replace(' ', '', $params));
}

foreach ($paramList as $param) {
  if ($valueOnly) {
    $output .= $stash[$param]['value'];
  } else {
    $output .= $param . '=' . $stash[$param]['value'];
  }
}

return $output;