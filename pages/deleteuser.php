<?php require_once('../assets/php/initialize.php') ?>
<?php
$deleteUser = $bdd->prepare("UPDATE users SET deleted = 1 WHERE id = ?");
        $deleteUser->execute(array($_SESSION['id']));
        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
?>

<?php $page_title = 'Your Profile' ?>
<?php require('../assets/php/header.php') ?>
<?php require('../assets/php/nav.php')?>



<?php require('../assets/php/footer.php');?>
