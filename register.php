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
        <section class="form register">
        <header>
            <div class="title">
                DeChat App
            </div>
            <p>Create an Account</p>
        </header>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input"> 
                    <input type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="field input"> 
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="field input">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="field input">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye toggle"></i>
            </div>
            <div class="field image">
                <label>Select Image</label>
                <input id="file" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
        <div class="link">Already have an account? <a href="login.php">Login</a></div>
        </section>
    </div>

    <script src="js/passShowHide.js"></script>
    <script src="js/register.js"></script>
</body>
</html>