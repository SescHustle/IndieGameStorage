<?php

use app\views\BlockView;
use app\views\FormView;

?>
<div class="container">
    <a name="games">
        <h1>Games</h1>
    </a>
    <?php
    FormView::renderMainSearch();
    foreach ($games as $game) {
        BlockView::renderGameTeaser($game);
    } ?>
</div>
