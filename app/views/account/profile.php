<h1>Welcome to your profile!</h1>
<?php
if (isset($_SESSION['unverified'])) {
    echo 'Your email is not verified';
}?>
<form method="post" action="/profile">
    <button type="submit" class="btn btn-outline-dark" name="logout" value="downloads">Logout</button>
</form>

