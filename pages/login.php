<?php if (isset($_SESSION['username'])) {
    header('location: /');
} ?>

<div class="form__wrapper">
    <form action="*" method="post" class="login_form">
        <div class="form__group">
            <label for="username">Login</label>
            <input name="username" type="text">
        </div>
        <div class="form__group">
            <label for="password">Password</label>
            <input name="password" type="password">
        </div>
        <button class="submit__wrapper" name="login">Submit</button>
    </form>
</div>