<?php
//create short variable names
$name_first = (string)trim(preg_replace("/\t|\R/",' ',$_POST['firstName']));
$name_last = (string) trim(preg_replace("/\t|\R/",' ',$_POST['lastName']));
$street = (string) trim(preg_replace("/\t|\R/",' ',$_POST['street']));
$city = (string) trim(preg_replace("/\t|\R/",' ',$_POST['city']));
$state = (string) trim(preg_replace("/\t|\R/",' ',$_POST['state']));
$zipCode = (string) trim(preg_replace("/\t|\R/",' ',$_POST['zipCode']));
$country = (string) trim(preg_replace("/\t|\R/",' ',$_POST['country']));

require_once('Address.php');


if(empty($name_first)) $name_first = null;
if(empty($name_last)) $name_last = null;
if(empty($street)) $street = null;
if(empty($city)) $city = null;
if(empty($state)) $state = null;
if(empty($zipCode)) $zipCode = null;
if(empty($country)) $country = null;

@$db = new mysqli('localhost', 'nguyentran', 'nguyen', 'CPSC_431_HW3');

if (mysqli_connect_errno()) {
  echo "<p>Error: Cannot connect to the database.<br/>
        Please try again later.</p>";
  exit;
}

$query = "INSERT INTO TeamRoster (Name_First, Name_Last, Street, City, State, Country, ZipCode) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($query);
//$stmt->bind_param('sssssss', $name_first, $name_last, $street, $city, $state, $country, $zipCode);
$stmt->bind_param('sssssss', $name_first, $name_last, $street, $city, $state, $country, $zipCode);
$stmt->execute();

$db->close();

require_once('home_page.php');

 ?>
