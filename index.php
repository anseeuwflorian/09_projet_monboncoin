<?php

use App\Db;
use Models\Users;
use Models\Products;
use Models\Categories;




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
$users = Users::findAll('DESC');

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

$data = ['bagnolet', 2];

// Users::update($data);
?>

<h2>Utilisation de la méthode updateBoucle() sur users</h2>

<?php
$pass = password_hash('12345678', PASSWORD_DEFAULT);

$data = ['city' => 'Montreuil'];

// Users::updateBoucle($data,2);
?>

<h2>Utilisation de la méthode delete() sur users</h2>

<?php
// Users::delete(3);
?>

<hr>

<h2>Utilisation de la méthode findAll() sur categories</h2>

<?php
var_dump(Categories::findAll());
?>

<h2>Utilisation de la méthode findById() sur categories</h2>

<?php
var_dump(Categories::findById(2));
?>

<!-- <h2>Utilisation de la méthode findByCategory() sur categories</h2> -->

<?php
// var_dump(Categories::findByCategory('Maison'));
?>

<h2>Utilisation de la méthode create() sur categories</h2>

<?php
$data = ['Bricolage'];

// Categories::create($data);
?>

<h2>Utilisation de la méthode update() sur categories</h2>

<?php
// $data = ['Vêtements', 3];

// Categories::update($data);
?>

<h2>Utilisation de la méthode delete() sur categories</h2>

<?php
// Categories::delete(3);
?>

<!-- Correction -->
<h2>Test de la méthode create sur catégories</h2>
<?php
// $categories = Categories::create("non classé");   
?>
<h2>Test de la méthode update sur catégories</h2>
<?php
// $categories = Categories::update("non classée",1);   
?>
<h2>Test de la méthode delete sur catégories</h2>
<?php
// $categories = Categories::delete(1);   
?>

<h2>Utilisation de la méthode findAll() sur products</h2>

<?php
$products = Products::findAll('DESC');

var_dump($products);
?>

<h2>Utilisation de la méthode findById() sur products</h2>

<?php
$products = Products::findById(1);

var_dump($products);
?>

<h2>Utilisation de la méthode findByUser() sur products</h2>

<?php
$products = Products::findByUser(2);

var_dump($products);
?>

<h2>Utilisation de la méthode findByCat() sur products</h2>

<?php
$products = Products::findByCat(2);

var_dump($products);
?>

<h2>Utilisation de la méthode create() sur products</h2>

<?php
$data = [1, 1, 'Chaise de table', 'Chais en bois sculptée', 30, 'chaise.jpg'];
// Products::create($data);
?>

<h2>Utilisation de la méthode update() sur products</h2>

<?php
$data = [2, 2, 'Chaise de table', 'Chais en bois sculptée', 30, 'chaise.jpg', 8];

// Products::update($data);
?>

<h2>Utilisation de la méthode delete() sur products</h2>

<?php
// Products::delete(8);
?>