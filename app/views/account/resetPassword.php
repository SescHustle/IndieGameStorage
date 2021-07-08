<div class="container align-content-center col-4">
    <h1>Reset password</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
            <label for="ConfirmPassword">Confirm Password</label>
            <input type="password" name="confirm" class="form-control" id="ConfirmPassword"
                   placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary" name="resetPassword">Reset password</button>
    </form>
    <?php
    if (isset($_SESSION['message'])): ?>
        <h1 class="text-danger"><?php
            echo $_SESSION['message'];
            unset($_SESSION['message']) ?></h1>
    <?php
    endif; ?>
</div>