<hr>
<!-- <a href="index.php">Home</a> | -->

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
?>
<div class="row d-flex">
    <div class="col-3">
    <button class="btn btn-outline-warning"><a style="text-decoration: none;" href="logout.php">Log Out</a></button>
    </div>
    <div class="col-6">
    <h1 class="m-1 text-center">User Management</h1>
    </div>
</div>
<?php
} else {
?>
    <button class="btn btn-outline-warning"><a style="text-decoration: none;" href="registration.php">Registration</a></button>
    <button class="btn btn-outline-info"><a style="text-decoration: none;" href="login.php">Sign In</a></button>
<?php
}
?>
<hr>