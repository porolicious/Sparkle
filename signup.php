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

if (empty($error)) {
  try {
    $conn = new PDO('mysql:host=localhost;dbname=unicorndb', 'root', 'root');
  } catch (PDOException $e) {
    echo("Connection to DB failed");
    return;
  }

  $sql = "INSERT INTO user (username, email, password, gender, birthday) VALUES (?,?,?,?,?)";
  $statement = $conn->prepare($sql);
  $result = $statement->execute(
    [
      $_POST["user"],
      $_POST["email"],
      hash("sha512",
      $_POST["password"]),
      $_POST["gender"],
      $_POST["birthdate"]
    ]
  );

  if ($result === TRUE) {
    echo "User created";
  } else {
    echo "Error creating user";
  }
}
