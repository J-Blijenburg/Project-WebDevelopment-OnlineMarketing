
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link href="StyleSheet.css" rel="stylesheet" />
    <title>Login Guestbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="post" data-bitwarden-watching="1">
            <h1 class="h3 mb-3 fw-normal">Guestbook</h1>
            <div class="form-floating">
                <input name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>           
        </form>
    </main>
    
    <div class="btnGuest">
        <form method='post'>
        <button type="submit" name="MainPageMember" class="w-100 btn btn-lg btn-primary">Continue as Guest</button>
        </form>
    </div>
    <div class="btnGuest">
        <form method="POST">
             <button type="submit" name="MainPageGuest" class="w-100 btn btn-lg btn-primary">Continue as Guest</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>