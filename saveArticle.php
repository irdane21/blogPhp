<?php 
require_once 'vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Carbon\Carbon;
$now = Carbon::now();

try {
    $db = new PDO('mysql:host=localhost:8889;dbname=MyBlog', 'root', 'root');
} catch(PDOException $e) {
    die('Error : ' . $e->getMessage());
}

if($_POST) {
    $now = Carbon::now();
    $query = $db->prepare('INSERT INTO Articles (title, author, content, date) VALUES (?, ?, ?, ?)' );
    $result = $query->execute([
            $_POST['title'],
            $_POST['author'],
            $_POST['content'],
            $now
        ]
    );
    // if($result){ //result est le résultat de ‘execute’. True si succès, sinon false
    //     echo 'Catégorie ajoutée avec succès !';
    // }
    // else{
    //     echo 'Impossible d’enregistrer la catégorie...';
    // }
}
header('Location: index.php');
