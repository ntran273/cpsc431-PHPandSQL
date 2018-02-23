<?php

// create short variable names
$firstName  = preg_replace("/\t|\R/",' ',$_POST['firstName']);
$lastName   = preg_replace("/\t|\R/",' ',$_POST['lastName']);
$street     = (string)$_POST['street'];
$city       = (string) $_POST['city'];
$state     = (string) $_POST['state'];
$zip       = (int) $_POST['zipCode'];

require('Address.php');
$name = "$firstName".', '."$lastName";

$newPlayer = new Address($name, $street, $city, $state, $zip);

if( ! empty($name) )
{
  file_put_contents('../data/teamroaster.txt', $newPlayer->toTSV()."\n", FILE_APPEND | LOCK_EX);
}

require('home_page.php');
?>
