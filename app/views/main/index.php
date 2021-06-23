<h1>Main page</h1>
<?php foreach ($games as $val):
    echo "<h3><a href='/game/".$val['id']."'>".$val['name']."</a> </h3>" ?>
    <p><?php echo $val['description']?></p>
    <hr>
<?php endforeach;?>