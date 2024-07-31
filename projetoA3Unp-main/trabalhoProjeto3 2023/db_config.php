<?php

$sName = "localhost";
$nome = "root";
$senha = "root";

$db_name = "dbscoreingame";

$connection = new PDO("mysql:host=$sName;dbname=$db_name", $nome, $senha);

$mysqlRecive = $connection->prepare("select * from registeruser order by recordPersonalUser DESC");
$mysqlRecive->execute();
$dataResult = $mysqlRecive->fetchAll(PDO::FETCH_ASSOC);

$empty = "rapaz";

$searchUser = $connection->prepare("select * from registeruser where addNickName= :nickUser");
$searchUser->bindParam(":nickUser", $empty);
$searchUser->execute();
$dataSearchResult = $searchUser->fetch(PDO::FETCH_ASSOC);
