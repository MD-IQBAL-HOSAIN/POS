<hr>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
?>
<div class="row d-flex">
    <div class="col-10">
    <h1 class="text-center font-monospace" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">User Management</h1>
    </div>
    <div class="col-2">
    <button class="btn btn-outline-warning"><a style="text-decoration: none;" href="logout.php">Log Out</a></button>
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