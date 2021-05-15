<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body{
            font-family: sans-serif;
            background: #f3d5e9;
        }

        h1{
            text-align: center;
            font-weight: 300;
        }

        .judul_login{
            text-align: center;
            text-transform: uppercase;
            color: white;
        }

        .kotak_login{
            width: 350px;
            background: rgb(133, 81, 130);
            margin: 80px auto;
            padding: 30px 20px;
        }

        label{
            font-size: 11pt;
            color: white;
        }

        .form_login{
            box-sizing : border-box;
            width: 100%;
            padding: 10px;
            font-size: 11pt;
            margin-bottom: 20px;
        }

        .tombol_login{
            background: #740074;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
        }

    </style>
</head>
<body>
    <div class="kotak_login">
        <p class="judul_login">LOGIN</p>
        <form method="post">
            <label>Username :</label>
            <input type="text" name="username" class="form_login"><br>
            <label>Password :</label>
            <input type="text" name="password" class="form_login"><br>
            <button type="submit" name="masuk" class="tombol_login">Login</button>
        </form>
    <?php
        if (isset($_POST['masuk'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username;
            $qry = mysqli_query($conn, "SELECT * FROM tab_login WHERE username = '$username' AND password = '$password'");
            $cek = mysqli_num_rows($qry);
            if ($cek>0){
                $row = mysqli_fetch_assoc($qry);
                var_dump($row);
                $_SESSION['userweb']=$username;
                header ("location:admin.php");
                exit;
            }
        else {
            echo "Maaf username dan password yang anda masukkan salah";
        }
    }
    ?>
</body>
</html>