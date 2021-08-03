<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoingId = $_SESSION['unique_id'];
        $incomingId = mysqli_real_escape_string($conn, $_POST['incomingId']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_id 
        WHERE (outgoing_id = {$outgoingId} AND incoming_id = {$incomingId}) 
        OR (outgoing_id = {$incomingId} AND incoming_id = {$outgoingId}) ORDER BY msg_id ASC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_id'] === $outgoingId){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'.$row['message'].'</p>
                                    <span class="time">'.date('H:i', strtotime($row["jam"])).'</span>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'. $row['message'] .'</p>
                                    <span class="time">'.date('H:i', strtotime($row["jam"])).'</span>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available.
                        Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }   
?>