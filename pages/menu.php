 <nav class="menu">
        <ul class="menu__list">
            <li><a href="/">Main Page</a></li>
            <?php if(!isset($_SESSION["username"])): ?>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            <?php else: ?>
                <li><a href="/edit">Edit</a></li>
                <li><span>Hello, <?php echo $_SESSION['username']; ?></span></li>
                <li><form action="/" method="post"><button name="logout">Logout</button></form></li>
            <?php endif; ?>
        </ul>
 </nav>