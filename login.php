<?php

try {
  $conn = new PDO('mysql:host=localhost;dbname=unicorndb', 'root', 'root');
} catch (PDOException $e) {
  echo("Connection to DB failed");
  return;
}

$sql = "SELECT * FROM user WHERE email = ? AND password = ?";

$statement = $conn->prepare($sql);
$statement->execute([$_POST["email"],  hash("sha512",$_POST["password"])]);

$data = $statement->fetch();

if (empty($data)) {
  echo "Username or password incorrect";
} else {
  echo "Login successful";
  session_start();
  $_SESSION['username'] = $data["username"];
  $_SESSION['email'] = $data["email"];
}
