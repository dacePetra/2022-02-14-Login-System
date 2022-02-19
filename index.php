<?php
session_start();
?>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
    <div class="wrapper">
        <ul>
            <?php if(isset($_SESSION["userid"])){ ?>
            <br>
            <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
            <li><a href="includes/logout.inc.php" class="nav">LOGOUT</a></li>
            <?php } else { ?>
            <br>
            <li><a href="#" class="nav">LOGIN</a></li>
            <?php } ?>
        </ul>
    </div>
</header>
<section>
    <div class="wrapper">
        <div>
            <br>
            <h2>SIGN UP</h2>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
                <input type="text" name="email" placeholder="E-mail"><br>
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
        <br>
        <div>
            <h2>LOGIN</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>