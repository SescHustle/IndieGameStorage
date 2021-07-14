<?php

use app\views\BlockView;
use app\views\FormView;

?>
<main class="container">
    <section class="intro">
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <div class="welcome-text">
                    <h2>Welcome to Play Indie!</h2>
                    <p>This site is in development, but we anyway glad to see you here. You can already <a
                                href="/profile">visit your profile</a> or <a href="/about">read about this site</a></p>
                    <p>Instead of this section here will be "Watched recently" block.</p>
                </div><!--welcome-text-->
            </div><!--col-12-->
        </div><!--row mt-3 mb-3-->
    </section>
    <section class="games-section">
        <section class="leaders">
            <h1 class="text-center">Best Games</h1>
            <div class="row justify-content-around mt-3 mb-3">
                <?php
                foreach ($games as $game) {
                    BlockView::renderGameCard($game);
                } ?>
            </div>
        </section>
        <section class="main-search">
            <form method="post" class="row mb-3 mt-3">
                <?php
                FormView::renderMainSearch(); ?>
            </form>
        </section>
        <section class="all-games">
            <?php
            foreach ($games as $game) {
                BlockView::renderGameTeaser($game);
            } ?>
        </section>
    </section>
</main>
