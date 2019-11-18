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

//$faker = Faker\Factory::create('fr_FR');

// for ($i = 0; $i < 5; $i++) {
//     $query = $db->prepare('INSERT INTO Articles (title, author, content, date) VALUES (?, ?, ?, ?)' );
//     $result = $query->execute([
//             $faker->realText($maxNbChars = 30, $indexSize = 2),
//             $faker->name,
//             $faker->realText($maxNbChars = 400, $indexSize = 2),
//             $faker->date($format = 'Y-m-d', $max = 'now')
//         ]
//     );
//     if($result){ //result est le résultat de ‘execute’. True si succès, sinon false
//         echo 'Catégorie ajoutée avec succès !';
//     }
//     else{
//         echo 'Impossible d’enregistrer la catégorie...';
//     }
// }

// IF POST NEW ARTICLE


$query = $db->query('SELECT * FROM Articles');

$articles = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
        <?php include("header.php") ?>
        <ul>
            <?php foreach ($articles as $key => $value ) : ?> 
            <?php 
                $origin = $value->date;
                $year = substr($origin, 0, 4);
                $month = substr($origin, 6, 7); 
                $day = substr($origin, 9, 10);
                $ilya = Carbon::createFromDate(intval($year), intval($month), intval($day))->locale('fr_FR');
            ?>
            <li>
                <h3><?php echo $value->title; ?></h3>
                <p><?php echo $value->content; ?></p>
                <p>écrit par <?php echo $value->author; ?> le <?php echo $ilya; ?></p>
                <form method="GET" action="deleteArticle.php?id=<?= $value->id ;?>">
                    <input type="button" value="delete">
                </form>
                <form method="GET" action="editArticle.php?id=<?= $value->id ;?>">
                    <input type="button" value="edit">
                </form>
            </li>
    
            <?php endforeach; ?> 
        </ul>
    </section>
</body>
</html>