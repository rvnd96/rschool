<?php
    include "database.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart R School</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="back">

    <?php include "navbar.php"; ?> <!--including navigation-->

    <img src="img/b1.jpg" alt="banner image" width="800">

    <div class="login">
        <h1 class="heading">Admin Login</h1>
        <div class="log">

        <?php
            if(isset($_POST["login"])) #inside post, type button name
            {
                $sql = "select * from admin where ANAME='{$_POST["aname"]}' and 
                    APASS='{$_POST["apass"]}'";
                $res = $db->query($sql);
                if($res->num_rows>0)
                {
                    $ro=$res->fetch_assoc();
                    $_SESSION["AID"] = $ro["AID"];
                    $_SESSION["ANAME"] = $ro["ANAME"];
                    echo "<script>window.open('admin_home.php','_self');</script>";
                }
                else
                {
                    echo "<div class='error'>Invalid User Name or Password</div>";
                }
            }
        ?>

            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="user name">User Name</label><br>
                <input type="text" name="aname" required class="input"><br><br>

                <label for="password">Password</label>
                <input type="password" name="apass" required class="input"><br>

                <button type="submit" class="btn" name="login">Login</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <footer>
            <p>Copyright &copy; RvNd Softwares</p>
        </footer>
    </div>

</body>
</html>