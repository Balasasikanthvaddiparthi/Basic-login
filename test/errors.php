<style>
.myclass{
    color: whitesmoke;
    text-align: center;
        
}

</style>


<?php
if(isset($_POST["error"])){
    if($_POST["error"]=="emptyinput"){
        echo "<p class='myclass'>fill all the fields</p>";
    }
    else if($_POST["error"]=="invalidUid"){
        echo "<p class='myclass'>use a proper username</p>";
    }
    else if($_POST["error"]=="giveanotherusername"){
        echo "<p class='myclass'>giveanotherusername</p>";
    }
    else if($_POST["error"]=="none"){
        echo "<p class='myclass'>you have signed up</p>";
    }
    else if($_POST["error"]=="wronglogin"){
        echo "<p class='myclass'>incorrect username or password</p>";
        
    }
    else if($_POST["error"]=="loginsuccess"){
        echo"<script>location.href='indexing.php';</script>";
        exit();
    }
}
