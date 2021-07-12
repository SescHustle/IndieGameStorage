<div class="container align-content-center col-4">
    <h1>Account recovery</h1>
    <form method="post" action="/recovery">
        <div class="form-group">
            <label for="EmailInput">Email address</label>
            <input type="email" name="email" class="form-control" id="EmailInput" aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary" name="Recovery">Send me instructions</button>
    </form>
    <?php
    if (isset($_SESSION['message'])): ?>
        <h1 class="text-danger"><?php
            echo $_SESSION['message'];
            unset($_SESSION['message']) ?></h1>
    <?php
    endif; ?>
</div>
