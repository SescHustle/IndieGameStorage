<!--<div class="input-group">
    <form method="post">
        <button type="submit" class="btn btn-outline-dark" name="sort" value="rating">Sort by rating</button>
        <button type="submit" class="btn btn-outline-dark" name="sort" value="downloads">
            Sort by downloads
        </button>
        <select class="form-select input-focus-width" name="order">
            <option value="DESC" <?php
/*            if (isset($_POST['order']) && $_POST['order'] === "DESC") {
                echo "selected";
            } */ ?>>DESC
            </option>
            <option value="ASC" <?php
/*            if (isset($_POST['order']) && $_POST['order'] === "ASC") {
                echo "selected";
            } */ ?>>ASC
            </option>
        </select>
        <input type="checkbox" name="categories[]" value="Action" <?php
/*        if (isset($_POST['categories']) && in_array('Action', $_POST['categories'])) {
            echo 'checked';
        } */ ?>>Action
        <input type="checkbox" name="categories[]" value="AAA" <?php
/*        if (isset($_POST['categories']) && in_array('AAA', $_POST['categories'])) {
            echo 'checked';
        } */ ?>>AAA
        <input type="checkbox" name="categories[]" value="RPG" <?php
/*        if (isset($_POST['categories']) && in_array('RPG', $_POST['categories'])) {
            echo 'checked';
        } */ ?>>RPG
        <input type="checkbox" name="categories[]" value="Indie" <?php
/*        if (isset($_POST['categories']) && in_array('Indie', $_POST['categories'])) {
            echo 'checked';
        } */ ?>>Indie
        <input type="checkbox" name="categories[]" value="Roguelike"
            <?php
/*            if (isset($_POST['categories']) && in_array('Roguelike', $_POST['categories'])) {
                echo 'checked';
            } */ ?>>Roguelike
        <input type="checkbox" name="categories[]" value="Shooter" <?php
/*        if (isset($_POST['categories']) && in_array('Shooter', $_POST['categories'])) {
            echo 'checked';
        } */ ?>>Shooter
        <input type="search" name="search" value="<?php
/*        if (isset($_POST['search'])) {
            echo $_POST['search'];
        } */ ?>" placeholder="search...">
        <button type="submit" class="btn btn-outline-light">SEARCH</button>
    </form>
</div>-->
<!--<div class="col-12">
<form method="post" class="d-flex">
    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
            Categories
        </button>
        <ul class="dropdown-menu">
            <li><input type="checkbox" name="categories[]" value="AAA" <?php
/*                if (isset($_POST['categories']) && in_array('AAA', $_POST['categories'])) {
                    echo 'checked';
                } */ ?>>AAA
            </li>
            <li><input type="checkbox" name="categories[]" value="Indie" <?php
/*                if (isset($_POST['categories']) && in_array('Indie', $_POST['categories'])) {
                    echo 'checked';
                } */ ?>>Indie
            </li>
            <li><input type="checkbox" name="categories[]" value="RPG" <?php
/*                if (isset($_POST['categories']) && in_array('RPG', $_POST['categories'])) {
                    echo 'checked';
                } */ ?>>RPG
            </li>
            <li><input type="checkbox" name="categories[]" value="Action" <?php
/*                if (isset($_POST['categories']) && in_array('Action', $_POST['categories'])) {
                    echo 'checked';
                } */ ?>>Action
            </li>
            <li><input type="checkbox" name="categories[]" value="Roguelike"
                    <?php
/*                    if (isset($_POST['categories']) && in_array('Roguelike', $_POST['categories'])) {
                        echo 'checked';
                    } */ ?>>Roguelike
            </li>
            <li><input type="checkbox" name="categories[]" value="Shooter" <?php
/*                if (isset($_POST['categories']) && in_array('Shooter', $_POST['categories'])) {
                    echo 'checked';
                } */ ?>>Shooter
            </li>
        </ul>
    </div>
    <div class="input-group">
        <div class="form-outline">
            <input type="search" name="search" class="form-control" value="<?php
/*            if (isset($_POST['search'])) {
                echo $_POST['search'];
            } */ ?>" placeholder="search...">
        </div>
        <button type="submit" class="btn btn-outline-danger">SEARCH</button>
    </div>
    <div class="input-group">
        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Sort by
            </button>
        </div>
    </div>
</form>
</div>-->
<div class="col-auto input-group d-flex justify-content-center">
    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
            Categories
        </button>
        <ul class="dropdown-menu">
            <li><input type="checkbox" name="categories[]" value="AAA" <?php
                if (isset($_POST['categories']) && in_array('AAA', $_POST['categories'])) {
                    echo 'checked';
                } ?>>AAA
            </li>
            <li><input type="checkbox" name="categories[]" value="Indie" <?php
                if (isset($_POST['categories']) && in_array('Indie', $_POST['categories'])) {
                    echo 'checked';
                } ?>>Indie
            </li>
            <li><input type="checkbox" name="categories[]" value="RPG" <?php
                if (isset($_POST['categories']) && in_array('RPG', $_POST['categories'])) {
                    echo 'checked';
                } ?>>RPG
            </li>
            <li><input type="checkbox" name="categories[]" value="Action" <?php
                if (isset($_POST['categories']) && in_array('Action', $_POST['categories'])) {
                    echo 'checked';
                } ?>>Action
            </li>
            <li><input type="checkbox" name="categories[]" value="Roguelike"
                    <?php
                    if (isset($_POST['categories']) && in_array('Roguelike', $_POST['categories'])) {
                        echo 'checked';
                    } ?>>Roguelike
            </li>
            <li><input type="checkbox" name="categories[]" value="Shooter" <?php
                if (isset($_POST['categories']) && in_array('Shooter', $_POST['categories'])) {
                    echo 'checked';
                } ?>>Shooter
            </li>
        </ul>
    </div>
    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
            Sort by
        </button>
        <ul class="dropdown-menu">
            <li><input class="form-check-input bg-danger" type="radio" name="sort" id="sortRadio1" value="rating" <?php
                if (isset($_POST['sort']) && $_POST['sort'] === 'rating') {
                    echo 'checked';
                } ?>>
                <label class="form-check-label" for="sortRadio1">
                    Rating
                </label></li>
            <li><input class="form-check-input bg-danger" type="radio" name="sort" id="sortRadio2" value="downloads" <?php
                if (isset($_POST['sort']) && $_POST['sort'] === 'downloads') {
                    echo 'checked';
                } ?>>
                <label class="form-check-label" for="sortRadio2">
                    Downloads
                </label></li>
        </ul>
    </div>
    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
            Order
        </button>
        <ul class="dropdown-menu">
            <li><input class="form-check-input bg-danger" type="radio" name="order" id="orderRadio1" value="DESC" <?php
                if (isset($_POST['order']) && $_POST['order'] === 'DESC') {
                    echo 'checked';
                } ?>>
                <label class="form-check-label" for="orderRadio1">
                    Best first
                </label></li>
            <li><input class="form-check-input bg-danger" type="radio" name="order" id="orderRadio2" value="ASC" <?php
                if (isset($_POST['order']) && $_POST['order'] === 'ASC') {
                    echo 'checked';
                } ?>>
                <label class="form-check-label" for="orderRadio2">
                    Best last
                </label></li>
        </ul>
    </div>
    <div class="form-outline width-auto">
        <input type="search" name="search" class="form-control" value="<?php
        if (isset($_POST['search'])) {
            echo $_POST['search'];
        } ?>" placeholder="Search...">
    </div>
</div>
<div class="col-auto input-group d-flex justify-content-center">
<button type="submit" class="btn btn-outline-danger w-50">SEARCH</button>
</div>

    <!--<div class="col-4 main-search-item m-auto">
    <div class="input-group">
        <div class="form-outline ">
            <input type="search" name="search" class="form-control" value="<?php
    /*                        if (isset($_POST['search'])) {
                                echo $_POST['search'];
                            } */ ?>" placeholder="search...">
        </div>
        <button type="submit" class="btn btn-outline-danger">SEARCH</button>
    </div>
</div>
<div class="col -4 main-search-item m-auto">
    <div class="input-group">
        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Sort by
            </button>
        </div>
    </div>
</div>
-->