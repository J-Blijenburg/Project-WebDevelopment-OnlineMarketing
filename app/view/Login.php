<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-Marketing</title>
    <link href="StyleSheets/StyleLogin.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="text-center">
    <h1 class="loginText">Online-Marketing</h1>
    <div class="btnGuest ">
        <form method='POST'>
            <input name="email" class="form-control " id="floatingInput" placeholder="Email">
            <input type="password" name="password" class="form-control mt-3" id="ds" placeholder="Password">
            <input type="hidden" name="action" value="submit" />
            <?php
            if ($_SESSION['wrongLogin'] == true) {
            ?>
                <h6 class="wrongLoginMessage mt-3"> The input is not valid. Please, try again.</h6>
            <?php
            }
            ?>
            <button name="BtnLoginUser" class="w-100 btn btn-lg btn-primary mt-3">Login</button>
        </form>
        <form method="POST">
            <button name="ContinueAsGuestBtn" class="w-100 btn btn-lg btn-primary mt-3">Continue as Guest</button>
        </form>
        <form method="POST">
            <button name="NewUserBtn" class="w-100 btn btn-lg btn-primary mt-3">New User</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>