<?php

$error = [];

foreach ($_POST as $key => $value) {
  if (empty($value)) {
    $error[$key] = ucfirst($key)." is required\n";
  }
}

if ($_POST["password"] != $_POST["password-repeat"]) {
  $error["repeat"] = "Password must be the same";
}

foreach ($error as $key => $value) {
  echo $value;
}
