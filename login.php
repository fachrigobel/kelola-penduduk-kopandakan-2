<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require_once "functions.php";

// ketika tombol login ditekan
if (isset($_POST['login'])) {
    $login = login($_POST);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        main {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;

        }

        .container {
            width: 80vh;
            height: 50vh;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 0 3px 5px black;
            display: flex;
            padding: 0;
            overflow: hidden;
            position: relative;
        }

        .logo-dukcapil {
            width: 100px;
        }

        .container-dukcapil {
            text-align: center;
            padding: 15px;
            background-color: lightskyblue;
            /* margin-right: 15px; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .container-dukcapil p {
            font-weight: bold;
            font-size: 1.3em;

        }

        .container form {
            padding: 20px;
        }

        .form-group {
            padding: 10px 0;
        }

        a {
            text-decoration: none;
            font-size: 30px;
            color: gray;
        }

        .cancel {
            display: inline-block;
            position: absolute;
            top: -5px;
            right: 10px;

        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-grow: 1;
        }

        @media screen and (max-width: 1023px) {
            .container {
                font-size: .7em;
            }
        }

        @media screen and (max-width: 767px) {
            .container {
                width: 90%;
            }

            ::-webkit-input-placeholder {
                font-size: .8em;
            }

        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="container-dukcapil">
                <img src="res/img/85-dukcapil-kemendagri.png" class="logo-dukcapil">
                <p>Dukcapil<br>Kopandakan 2</p>
            </div>
            <form method="POST" action="">
                <div class="cancel">
                    <a href="index.php">&times;</a>
                </div>
                <h2 style="font-size: 1.8em; font-weight: 600;">Masuk</h2>
                <div class="form-group">
                    <input type="let" class="form-control" minlength="16" maxlength="16" name="username" placeholder="Masukkan Username" required autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required autocomplete="off">
                </div>
                <?php if (isset($login['error'])) { ?>
                    <div class="form-group" style="padding: 0; margin :0;">
                        <p style="font-style: italic; color: red; font-size: 13px;">username / password salah!</p>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                </div>
            </form>
        </div>

    </main>
</body>

</html>