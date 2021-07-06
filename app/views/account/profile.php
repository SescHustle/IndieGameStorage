<?php

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}
if (!isset($_SESSION['user'])) {
    header('Location: /login');
} else echo $_SESSION['user'] ?>
<h1>Welcome to your profile!</h1>
<form method="post">
    <button type="submit" class="btn btn-outline-dark" name="logout" value="downloads">Logout</button>
</form>

