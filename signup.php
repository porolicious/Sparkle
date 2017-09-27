<?php

$userErr = $emailErr = $passwordErr = $password2Err = $genderErr = $birthdateErr = "";
$user = $email = $password = $password2 = $gender = $birthdate = "";

if (empty($_POST["user"])) {
  $userErr = "Username is required";
} else {
  $user = $_POST["user"];
}

if (empty($_POST["email"])) {
  $emailErr = "E-Mail is required";
} else {
  $email = $_POST["email"];
}

if (empty($_POST["password"])) {
  $passwordErr = "Password is required";
} else {
  $password = $_POST["password"];
}

if (empty($_POST["password2"])) {
  $passwordErr = "Password repeat is required";
} else {
  $password2 = $_POST["password2"];
}

if ($_POST["password"] != $_POST["password2"]) {
  $passwordErr = "Password must be the same";
}

if (empty($_POST["gender"])) {
  $genderErr = "Gender is required";
} else {
  $gender = $_POST["gender"];
}

if (empty($_POST["birthdate"])) {
  $birthdateErr = "Birthdate is required";
} else {
  $birthday = $_POST["birthdate"];
}

 ?>

 <html>
<head>
</head>
<body>
<?php
echo $userErr;
echo $emailErr;
echo $passwordErr;
echo $password2Err;
echo $genderErr;
echo $birthdateErr;
?>
</body>
 </html>
