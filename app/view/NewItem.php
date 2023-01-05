<?php
$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-Marketing</title>
    <meta name="theme-color" content="#712cf9">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="StyleSheets/Style.css" rel="stylesheet" />
</head>
<header class="p-3 text-bg-dark">


    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                </svg>
            </a>
            <a href="#" class="nav-link px-2 text-white ms-2 fs-5">Online-Marketing</a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link text-white ms-4">FAQs</a></li>
                <li><a href="#" class="nav-link text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>
            <form method="POST">
                <div class="text-end">
                    <?php
                    if ($_SESSION['loggedin'] == true) {
                    ?>
                        <button class="btn btn-outline-light me-2" name="profileBtn">
                            <?php
                            echo $user->firstName;
                            ?>
                        </button>
                        <button class="btn btn-warning" name="LogOutBtn">Log Out</button>
                    <?php
                    } else {
                    ?>
                        <button name="LoginBtn" class="btn btn-outline-light me-2">Login</button>
                        <?php
                        ?>
                        <button name="SignUpBtn" class="btn btn-warning">Sign-up</button>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</header>

<body>


    <main>
        <form method="POST">
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Create a new item</h1>
                    </div>
                </div>

            </section>
        </form>
        <div class="d-flex justify-content-center ">
            <form method="POST" enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name of the product</span>
                    <input name="ItemName" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea name="ItemDescription" class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Price</span>
                    <span class="input-group-text">€</span>
                    <input name="ItemPrice" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                </div>
                <div class="input-group  mb-3">
                    <select class="form-select" name="inputCategory" id="inputCategory" aria-label="Example select with button addon">
                        <option selected>Choose...</option>
                        <?php
                        foreach ($allCategorys as $row) {
                        ?>
                            <option value="<?php echo $row->Category_Id ?>"><?php echo $row->Name ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>


                <div class="input-group mb-3">
                    <label class="input-group-text" for="ItemUpload">Upload</label>
                    <input name="ItemUpload" type="file" class="form-control">
                </div>


        </div>

        <div class="d-flex justify-content-center flex-grow-3">

            <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">

                <button name="ItemCancel" class="btn btn-outline-dark">Cancel</button>
                <button name="ItemCreate" class="btn btn-outline-dark">Create Item</button>
            </div>
            </form>
        </div>
    </main>
    <div class="container">
        <footer class="py-3 my-4 ">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Company, Inc</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>