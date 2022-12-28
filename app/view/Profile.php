<?php
$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Online-Marketing
    </title>
    <meta name="theme-color" content="#712cf9">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header>
        




    
        <form method="POST">

            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong>Online-Marketing</strong>
                    </a>

                    <button class="btn btn-light" name="profileBtn">
                        <?php
                        echo $user->firstName;
                        ?>
                    </button>
                    <button class="btn btn-light" name="LogOutBtn">Log Out</button>
                </div>
            </div>
        </form>
    </header>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">
                        <?php
                        echo "$user->firstName $user->lastName";
                        ?>
                    </h1>
                    <p class="lead text-muted">Hier kan wat informatie komen te staan</p>
                </div>
            </div>
        </section>

    </main>
    <footer class="text-muted py-5">

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>