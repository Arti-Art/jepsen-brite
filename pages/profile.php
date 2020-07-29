<?php require_once('../assets/php/initialize.php') ?>
<?php $page_title = 'Your Profile' ?>
<?php require('../assets/php/header.php') ?>
<?php require('../assets/php/nav.php')?>
<?php
if (isset($_SESSION['id']) and $_SESSION['id'] > 0) {
    $getid = intval($_SESSION['id']);
    $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>

<?php // GRAVATAR
    $email = $userinfo['mail'];
    $size = 150;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;
?>

<div align="center">
    <img class="gravatar" src="<?php echo $grav_url; ?>" alt="" />
    <h2>Profil de <?php echo $userinfo['username']; ?></h2>
    <br /><br />
    <p>username = <?php echo $userinfo['username']; ?></p>
    <br />
    <p>E-mail = <?php echo $userinfo['mail']; ?></p>
    <br />
    <?php if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) { ?>
    <br />
    <a href="editprofile.php">Edit profile</a>
    <a href="logout.php">LOG OUT</a>
    <?php }; ?>
</div>

<?php } ?>

<?php require('../assets/php/footer.php');?>