<?php

$name = "rizki";
$name = null;

$age = null;

echo "Name : ";
echo $name;
echo "\n";

echo "Age : ";
echo $age;
echo "\n";

echo "Is Name Null? : ";
var_dump(is_null($name));

$contoh = "rizki";
unset($contoh);

$contoh = "fauziah";
$contoh = null;

var_dump(isset($contoh));