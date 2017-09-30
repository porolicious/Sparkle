<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "unicorndb";

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

if (empty($error)) {
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    echo("Connection to DB failed");
  } else {
    $sql = "INSERT INTO user (username, email, password, gender, birthday) VALUES (?,?,?,?,?)";

    $statement = $conn->prepare($sql);
    $statement->bind_param("sssss", $_POST["user"], $_POST["email"], hash("sha512",$_POST["password"]), $_POST["gender"], $_POST["birthdate"]);
    $result = $statement->execute();

    if ($result === TRUE) {
      echo "User created";
    } else {
      echo "Error creating user". $statement->error;
    }
  }
}
