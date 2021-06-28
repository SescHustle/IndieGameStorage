<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
<h1>Main page <a href="/about">About</a> <a href="/register">Register</a> <a href="/login">Log in</a></h1>
<form name="Table Properties" method="post" action="<?php
echo $_SERVER['PHP_SELF']; ?>">
    <button type="submit" name="sort" value="rating">Sort by rating</button>
    <button type="submit" name="sort" value="downloads">Sort by downloads</button>
</form>
<?php
foreach ($games as $val):
    echo "<h3><a href='/showgame/" . $val['id'] . "'>" . $val['name'] . ", " . $val['rating'] . "</a> </h3>" ?>
    <p><?php
        echo $val['description'] ?></p>
    <hr>
<?php
endforeach; ?>