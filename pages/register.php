<?php if (isset($_SESSION['username'])) {
    header('location: /');
} ?>

<div class="form__wrapper">
    <form action="#" method="post" class="register_form">
        <div class="form__group">
            <label for="email">Email</label>
            <input name="email" type="email">
        </div>
        <div class="form__group">
            <label for="username">Login</label>
            <input name="username" type="text">
        </div>
        <div class="form__group">
            <label for="password">Password</label>
            <input name="password" type="password">
        </div>
        <div class="form__group">
            <label for="repeat_password">Password(2x)</label>
            <input name="repeat_password" type="password">
        </div>
        <button name="register" class="submit__wrapper">Submit</button>
    </form>
</div>