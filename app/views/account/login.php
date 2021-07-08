<div class="container align-content-center col-4">
    <h1>Log in</h1>
    <form method="post" action="/login">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Enter Login">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                   placeholder="Password">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary" name="LoginValidate">Log in</button>
    </form>
    <a href="/recovery">Forgot password?</a>
    <?php
    if (isset($_SESSION['message'])): ?>
        <h1 class="text-danger"><?php
            echo $_SESSION['message'];
            unset($_SESSION['message']) ?></h1>
    <?php
    endif; ?>
</div>
