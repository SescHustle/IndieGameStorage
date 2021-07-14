<main class="container align-content-center col-auto m-auto">
    <h1 class="text-center">Sign up</h1>
    <div class="welcome-text mt-3 mb-3">
        <form method="post" action="/register">
            <div class="form-group">
                <label for="EmailInput">Email address</label>
                <input type="email" name="email" class="form-control" id="EmailInput" aria-describedby="emailHelp"
                       placeholder="Enter email">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
                <label for="ConfirmPassword">Confirm Password</label>
                <input type="password" name="confirm" class="form-control" id="ConfirmPassword"
                       placeholder="Confirm Password">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Privacy policy</label>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-auto w-100">
                    <button type="submit" class="btn btn-danger w-100" name="RegisterValidate">Sign up</button>
                </div>
            </div>
        </form>
        <a href="/login">Already have an account? Log in!</a>
    </div>
    <?php
    if (isset($_SESSION['registerMessages'])) {
        foreach ($_SESSION['registerMessages'] as $key => $msg):
            ?>
            <h6 class="text-danger"><?php
                echo $msg ?></h6><br>
        <?php
        endforeach;
    }
    unset($_SESSION['registerMessages']) ?>
</main>