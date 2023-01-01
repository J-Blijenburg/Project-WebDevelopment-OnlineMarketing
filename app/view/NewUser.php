<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Online-Marketing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="StyleSheets/StyleLogin.css" rel="stylesheet" />
</head>

<body class="text-center">
    <h1 class="h3 mb-3 fw-normal">Online-Marketing</h1>

    <div class="btnGuest ">

        <form method='POST'>
            <input name="firstname" class="form-control" id="floatingInput" placeholder="Firstname">
            <input name="lastname" class="form-control mt-3" id="floatingInput" placeholder="Lastname">
            <input name="email" class="form-control mt-3" id="ds" placeholder="Email">
            <input name="password" class="form-control mt-3" id="ds" placeholder="Password">       
            <input type="hidden" name="action" value="submit" />
            <button name="NewUserBtn" class="w-100 btn btn-lg btn-primary mt-3">Create New User</button>
            <button name="BackBtn" class="w-100 btn btn-lg btn-primary mt-3">Back</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>