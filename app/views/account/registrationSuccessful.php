<?php if(!isset($_SESSION['unverified'])){
    header('Location: /profile');
}?>
<h1>Registration successful! Please, verify your email address!</h1>