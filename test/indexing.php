<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/indexingcss.css">
    <title>Document</title>
</head>
<body>
    <div class="indexing">
        <p>
            <?php
            session_start();
            if (isset($_SESSION["useruid"])){
                echo "<h1 >Hi, ".$_SESSION["useruid"]."</h1>";
                echo "<h1 >welcome to home page</h1>";
            }
            
            ?>
        </p>
    </div>
</body>
</html>