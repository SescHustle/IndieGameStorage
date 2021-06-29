<div class="container-fluid bg-dark">
    <div class="container" align="center" justify-content="space-around">
        <a name="games">
            <h1 style="color: white">Games</h1>
        </a>
        <form method="post">
            <button type="submit" name="sort" value="rating">Sort by rating</button>
            <button type="submit" name="sort" value="downloads">Sort by downloads</button>
        </form>
    </div>
    <div class="container">
        <?php
        foreach ($games as $game):?>
            <a href="/showgame/<?php
            echo $game['id'] ?>" class="nav-link text-dark">
                <div class="row g-0 bg-light position-relative rounded mt-3">
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
        <?php
        endforeach; ?>
    </div>
</div>
