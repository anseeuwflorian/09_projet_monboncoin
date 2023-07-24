<?php

use App\Db;
use Models\Users;


require_once('autoloader.php');
// test autoloader
// $test = new Db;
// $test::getDb();
?>

<h1>Index: fichier de test</h1>
<p>C'est ici que nous allons tester tous nos CRUD </p>
<!-- Pour utiliser les méthodes des CRUD il faut faire un require des class dont nous aurons besoin
Comme nous ne voulons pas faire des require() toutes les 2 minutes, nous allons utiliser un autoloader -->

<h2>Utilisation de la méthode findAll() sur users</h2>

<?php
$users = Users::findAll();

var_dump($users);
?>


<h2>Utilisation de la méthode findById() sur users</h2>

<?php
$idUser = Users::findById(2);

var_dump($idUser);
?>

<h2>Utilisation de la méthode findByLogin() sur users</h2>

<?php
$login = Users::findByLogin('admin@gmail.com');

var_dump($login);
?>

<h2>Utilisation de la méthode create() sur users</h2>

<?php
$pass = password_hash('12345678', PASSWORD_DEFAULT);

$data = ['florian@gmail.com', $pass, 'Florian', 'Anseeuw', '3 rue Jean Coquelin', '93100', 'Montreuil'];

// Users::create($data);
?>

<h2>Utilisation de la méthode update() sur users</h2>

<?php
$pass = password_hash('12345678', PASSWORD_DEFAULT);

$data = ['florian@gmail.com', $pass, 'Florian', 'Anseeuw', '1 Impasse des églantines', '93100', 'Montreuil', 3];

// Users::update($data);
?>

<h2>Utilisation de la méthode delete() sur users</h2>

<?php
// Users::delete(3);
?>
