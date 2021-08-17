<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="layout.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <header>Đăng nhập</header>
            <div class="input-layout">
                <label>UserName</label>
                <input type="text" name="User_Name" placeholder="nhập"><br>
            </div>
            <div class="input-layout" <label>PassWord</label>
                <input type="password" name="Pass_Word" placeholder="nhập"><br>
            </div>
            <div class="submitt">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["User_Name"];
        $password = $_POST["Pass_Word"];
        if ($name == 'admin' && $password == '123') {
            header('location: disPlay.php');
        } else {
            echo "<h2><span style='color:red'>Login Error</span></h2>";
            
            // header('location: login.php');
            
        }
    }
    ?>
</body>

</html>