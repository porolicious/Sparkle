<?php

$error = [];

foreach ($_POST as $key => $value) {
  if (empty($value)) {
    $error[$key] = ucfirst($key)." is required<br>";
  }
}

if ($_POST["password"] != $_POST["password-repeat"]) {
  $error["repeat"] = "Password must be the same";
}

?>

<html>
<head>
</head>
<body>
<?php
foreach ($error as $key => $value) {
  echo $value;
}
?>
</body>
</html>
