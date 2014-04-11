<?php

include 'class/Autoloader.php';
Autoloader::register();

//Insert
//$user = new User();
//
//$user->nome = "Hugro";
//$user->endereco = "Rua A";
//$user->sexo = "Masculino";
//
//
//$persistenceUserMongoDB = new PersistenceUserMongoDB();
//$persistenceUserMongoDB->insertUser($user->jsonSerialize());
//Find
//$persistenceUserMongoDB = new PersistenceUserMongoDB();
//$listUser = $persistenceUserMongoDB->findUser();
//
//foreach ($listUser as $user){
//    echo $user['_id'].' -> ';
//    echo $user['nome'].'<br/>';
//}
//
//var_dump($persistenceUserMongoDB->countUser());
//Update
//$persistenceUserMongoDB = new PersistenceUserMongoDB();
//$user = $persistenceUserMongoDB->findUser();
//var_dump($user);
//$persistenceUserMongoDB->updateUser();
//Delete
//$persistenceUserMongoDB = new PersistenceUserMongoDB();
//$persistenceUserMongoDB->deleteUser('532c9bcb1168ecb010000005');

$persistenceUserMongoDB = new PersistenceUserMongoDB();
$persistenceCarMongoDB = new PersistenceCarMongoDB;

$car = new Car();
$car->modelo = "corsa classic";
$car->marca = "chevrolet";
$car->ano = "2008";
$persistenceCarMongoDB->insertCar($car->jsonSerialize());

$user = new User();
$user->nome = "teste ";
$user->endereco = "Rua A";
$user->sexo = "Masculino";
$user->car = $car->jsonSerialize()['_id'];
$persistenceUserMongoDB->insertUser($user->jsonSerialize());

var_dump($persistenceUserMongoDB->countUser());
echo "fim";

$listUser = $persistenceUserMongoDB->findUser();

foreach ($listUser as $user){
    var_dump($user);
}
