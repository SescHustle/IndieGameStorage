<div class="card col-lg-3 col-xs-10 col-md-2 m-2 bg-danger text-dark p-2" style="width: 18rem;">
    <img src="/assets/games/<?php
    echo $game['id'] ?>/header.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title"><?php
            echo $game['name'] ?></h5>
        <p class="card-text"><?php
            echo $game['description'] ?></p>
        <a href="/showgame/<?php
        echo $game['id'] ?>" class="btn btn-warning">Watch more</a>
    </div>
</div>
