<?php
require_once("animal.php");
require_once("frog.php");
require_once("ape.php");

$sheep = new Animal("shaun");
echo "Name: $sheep->nama <br>";
echo "legs: $sheep->legs <br>";
echo "cold blooded: $sheep->cold_blooded <br><br>";

$kodok = new Frog("buduk");
echo "Name: $kodok->nama <br>";
echo "legs: $kodok->legs <br>";
echo "cold blooded: $kodok->cold_blooded <br>";
echo $kodok->jump() . "<br><br>";

$sungokong = new Ape("kera sakti");
echo "Name: $sungokong->nama <br>";
echo "legs: $sungokong->legs <br>";
echo "cold blooded: $sungokong->cold_blooded <br>";
echo $sungokong->yell() . "<br>";
