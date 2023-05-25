<?php

$values = array(10, 9, 8, 7.5);
var_dump($values);

$names = ["Rizki", "Fauziah", "Arief"];
var_dump($names[0]);

$names[0] = "Budi";
var_dump($names);

unset($names[1]);
var_dump($names);

$names[] = "rizki";
var_dump($names);
var_dump(count($names));

$rizki = array(
	"id" => "rizki",
	"name" => "Rizki Fauziah",
	"age" => 20,
	"address" => array(
		"city" => "cisitu",
		"country" => "sumedang"
	)
);
var_dump($rizki);

var_dump($rizki["name"]);

$budi = [
	"id" => "budi",
	"name" => "Budi Nugraha",
	"age" => 25
];
var_dump($budi);