<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: index.php");
    }
?>

<?php
    include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
        <header>
            <div class="title">
                DeChat App
            </div>
            <p>Login to continue the chats room</p>
        </header>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="error-text">This is error message</div>
            <div class="field input"> 
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="field input">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye toggle"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        <div class="link">Don't have a account? <a href="register.php">Sign Up</a></div>
        </section>
    </div>

    <script src="js/passShowHide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>