<?php
    session_start();
    include_once "php/config.php";
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<?php
    include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                    $userId = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT *FROM users WHERE unique_id = {$userId} AND NOT unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $user = mysqli_fetch_assoc($sql);
                    }else{
                        header("location: index.php");
                    }
                ?>
                <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $user['img']; ?>" alt="avatar">
                <div class="details">
                    <span><?php echo $user['fname'].' '.$user['lname']; ?></span>
                    <p><?php echo $user['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $userId; ?>" readonly hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="js/chat.js"></script>

</body>
</html>