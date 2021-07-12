<div class="container align-content-center col-4">
    <h1>Sign up</h1>
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
        <button type="submit" class="btn btn-primary" name="RegisterValidate">Sign up</button>
    </form>
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
</div>

