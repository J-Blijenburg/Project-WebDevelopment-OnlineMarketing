<!DOCTYPE html>
<html lang="en">

<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-Marketing</title>
    <meta name="theme-color" content="#712cf9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header>

        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">

                    <strong>Online-Marketing</strong>
                </a>
                <form method="POST">        
                    <button name="loginButton" onclick="ChangeUrl('Page1', 'LoginPage.php');" type="submit" class="btn btn-light">Login</button>
                </form>
            </div>
        </div>
    </header>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Online-Marketing</h1>
                    <p class="lead text-muted">Hier kan wat informatie komen te staan</p>

                </div>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    foreach ($items as $row) {
                    ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                
                                <?php
                                $dataUri = "data:image/jpeg;base64," . base64_encode($row->Images);
                                ?>
                                <img src="<?php echo $dataUri; ?>">
                                <div class="card-body">
                                    <h5>
                                        <?php
                                        echo $row->Name;
                                        ?>

                                    </h5>
                                    <h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">More Info</button>

                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-muted py-5">

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>