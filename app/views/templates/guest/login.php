<main class="container align-content-center col-auto m-auto">
    <h1 class="text-center">Log in</h1>
    <div class="welcome-text mt-3 mb-3">
        <form method="post" action="/login">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Password">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-auto w-100">
                    <button type="submit" class="btn btn-danger w-100" name="LoginValidate">Log in</button>
                </div>
            </div>
        </form>
        <a href="/recovery">Forgot password?</a>
    </div>

    <?php
    if (isset($_SESSION['message'])): ?>
        <h6 class="text-danger"><?php
            echo $_SESSION['message'];
            unset($_SESSION['message']) ?></h6>
    <?php
    endif; ?>
</main>
