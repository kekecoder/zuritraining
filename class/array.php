<?php
# There are three types of Array in PHP
/* 1. Indexed Array
2. Associative Array
3. Multidimensional Array
 */

#indexed Array
$color = ["red", "blue", "green"];

echo "<pre>";
var_dump($color);
echo "</pre>" . "<br>";

# Associative Array

$ages = array("Peter" => 19, "Samuel" => 22, "Elijah" => 33);

echo "<pre>";
var_dump($ages['Peter']);
echo "</pre>" . "<br>";

// Multi dimensional array

$contacts = array(array("name" => "Peter Parker", "email" => "peterparker@gmail.com"), array("name" => "Abimbola", 'email' => "abimbola@gmail.com"));

echo "<pre>";
var_dump($contacts);
echo "</pre>" . "<br>";

echo "Abimbola's email address is " . $contacts[1]['email'];
