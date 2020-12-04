<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo BASE_ASSETS."css/login.css"?>>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" id="sign-in-form">
                    <h2 class="title">Login</h2>

                    <div class="input-field">
                        <ion-icon name="person"></ion-icon>
                        <input type="text" placeholder="Seu nome">
                    </div>
                    <div class="input-field">
                        <ion-icon name="lock-closed"></ion-icon>
                        <input type="password" placeholder="Sua senha">
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                    <img src=<?php echo BASE_PATH_IMAGES.'load.gif'?> class="gif-load"/>
                </form>
            </div>
        </div>
        <div class="painels-container">
            <div class="painel left-painel">
                <div class="content">
                    <h3>Admin</h3>
                    <p>Area so com permissao do administrador</p>
                </div>
                <img class="image" src=<?php echo BASE_PATH_IMAGES."login.svg"?> alt="iconLogin">
            </div>
        </div>
    </div>
    <script src=<?php echo BASE_ASSETS."js/login.js"?>></script>
</body>
</html>