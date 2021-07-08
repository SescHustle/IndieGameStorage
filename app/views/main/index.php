<div class="container-fluid">
    <div class="container">
        <a name="games">
            <h1>Games</h1>
        </a>
        <div class="input-group flex-nowrap">
            <form method="post">
                <button type="submit" class="btn btn-outline-dark" name="sort" value="rating">Sort by rating</button>
                <button type="submit" class="btn btn-outline-dark" name="sort" value="downloads">
                    Sort by downloads
                </button>
                <select class="form-select input-focus-width" name="order">
                    <option value="DESC" <?php
                    if (isset($_POST['order']) && $_POST['order'] === "DESC") {
                        echo "selected";
                    } ?>>DESC
                    </option>
                    <option value="ASC" <?php
                    if (isset($_POST['order']) && $_POST['order'] === "ASC") {
                        echo "selected";
                    } ?>>ASC
                    </option>
                </select>
                <input type="checkbox" name="categories[]" value="Action" <?php
                if (isset($_POST['categories']) && in_array('Action', $_POST['categories'])) {
                    echo 'checked';
                } ?>>Action
                <input type="checkbox" name="categories[]" value="AAA" <?php
                if (isset($_POST['categories']) && in_array('AAA', $_POST['categories'])) {
                    echo 'checked';
                } ?>>AAA
                <input type="checkbox" name="categories[]" value="RPG" <?php
                if (isset($_POST['categories']) && in_array('RPG', $_POST['categories'])) {
                    echo 'checked';
                } ?>>RPG
                <input type="checkbox" name="categories[]" value="Indie" <?php
                if (isset($_POST['categories']) && in_array('Indie', $_POST['categories'])) {
                    echo 'checked';
                } ?>>Indie
                <input type="checkbox" name="categories[]" value="Roguelike"
                    <?php
                    if (isset($_POST['categories']) && in_array('Roguelike', $_POST['categories'])) {
                        echo 'checked';
                    } ?>>Roguelike
                <input type="checkbox" name="categories[]" value="Shooter" <?php
                if (isset($_POST['categories']) && in_array('Shooter', $_POST['categories'])) {
                    echo 'checked';
                } ?>>Shooter
                <!--todo: default label must be last selected-->
                <input type="search" name="search" value="<?php
                if (isset($_POST['search'])) {
                    echo $_POST['search'];
                } ?>" placeholder="search...">
                <button type="submit" class="btn btn-outline-light">SEARCH</button>
            </form>
        </div>
    </div>
    <div class="container">
        <?php
        foreach ($games as $game):?>
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
        <?php
        endforeach; ?>
    </div>
</div>
