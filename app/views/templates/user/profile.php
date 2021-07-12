<h1>Welcome to your profile!</h1>
<?php
if (isset($_SESSION['unconfirmed'])) {
    echo 'Your email is not confirmed';
}?>
<form method="post" action="/profile">
    <button type="submit" class="btn btn-outline-dark" name="logout">Logout</button>
</form>