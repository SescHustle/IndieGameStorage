<h1>Main page</h1>
<?php foreach ($games as $val):?>
    <h3><?php echo $val['name']?></h3>
    <p><?php echo $val['description']?></p>
    <hr>
<?php endforeach;?>