<?php session_start(); ?>

<?php
// Effectuer ici la requête qui insère le message

try {
    $bdd = new PDO('mysql:host=us-cdbr-east-02.cleardb.com;dbname=heroku_cc256803d465131', 'bd60e8ee909b42', '2db04edd', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};

$require = $bdd->prepare('INSERT INTO events(title, username, date, time, image , description, adresse, codepostal, ville, category) VALUES(:title, :username, :date, :time, :image , :description, :adresse, :codepostal, :ville, :category)');
$require->execute(array(
    'title' => $_POST['title'],
    'username' => $_SESSION['id'],
    'date' => $_POST['date'],
    'time' => $_POST['time'],
    'image' => $_POST['image'],
    'description' => $_POST['description'],
    'adresse' => $_POST['adresse'],
    'codepostal' => $_POST['codepostal'],
    'ville' => $_POST['ville'],
    'category' =>  $_POST['category']
));


// Puis rediriger vers l'index.php comme ceci :
header('Location: ../index.php');
?>