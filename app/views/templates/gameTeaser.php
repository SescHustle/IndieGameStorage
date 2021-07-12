<a href="/showgame/<?php
echo $game['id'] ?>" class="nav-link text-dark">
    <div class="row g-0 bg-light position-relative rounded mt-3 border border-1 border-dark">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="/assets/games/<?php
            echo $game['id'] ?>/header.jpg" class="w-50" alt="...">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h2 class="mt-0 "><?php
                echo $game['name'] ?></h2>
            <h5><?php
                echo $game['description'] ?></h5>
            <p>Rating:<?php
                echo $game['rating'] . "/5" ?></p>
            <p>Downloads:<?php
                echo $game['downloads'] ?></p>
        </div>
    </div>
</a>
