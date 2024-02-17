<hr>
<!-- <a href="index.php">Home</a> | -->

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
?>
    <a href="logout.php">Logout</a> |
<?php
} else {
?>
    <button class="btn btn-outline-warning"><a style="text-decoration: none;" href="registration.php">Registration</a></button> 
    <button class="btn btn-outline-info"><a style="text-decoration: none;" href="login.php">Sign In</a></button> 
<?php
}
?>

<hr>