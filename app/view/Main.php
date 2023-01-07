<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-Marketing</title>
    <meta name="theme-color" content="#712cf9">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="StyleSheets/StyleSheet.css" rel="stylesheet" />


</head>

<body>

    <header class="p-3 text-bg-dark">



        <div class="container">
            <div class="d-flex justify-content-between ">
                <div class="d-flex">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                    </a>
                    <a class="nav-link px-2 text-white ms-2 fs-5 d-flex align-items-center">Online-Marketing</a>
                    <?php
                    if (isset($_SESSION['loggedin']) == true) {
                    ?>
                        <div class="d-flex justify-content-center ms-4">
                            <form method="POST">
                                <button name="NewItemBtn" class="btn btn-success">New Item</button>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="d-flex">

                    <form method="POST">
                        <div class="text-end">
                            <?php
                            if ($_SESSION['loggedin'] == true) {
                            ?>
                                <button class="btn btn-outline-light me-2" name="profileBtn">
                                    <?php
                                    $user = unserialize($_SESSION['user']);
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
        </div>
    </header>
    <main>
        <div class="headerInfo" style="width: 100%">
            <section class="text-center container ">
                <form method="POST">
                    <div class="row py-lg-5 w-65 position-absolute top-50 start-50 translate-middle">
                        <h1 class="fw-light">Online-Marketing</h1>
                        <p class="badge rounded-pill text-bg-primary">User the searchbar and category function to optimize your search result</p>
                        <div class="input-group">
                            <input class="form-control form-control-dark w-50" id="myInput" type="search" placeholder="Search" aria-label="Search" oninput="searchThroughItems()">
                            <select oninput="searchThroughItemsCategory()" class="form-select" name="inputCategory" id="inputCategory" aria-label="Example select with button addon">
                                <option selected>Choose...</option>
                                <?php
                                foreach ($allCategorys as $row) {
                                ?>
                                    <option value="<?php echo $row->Name ?>"><?php echo $row->Name ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button name="RefreshBtn" class="btn btn-warning">Refresh</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <img class=imageHeader src=Img/Background.jpeg style="width: 100%">

        <!-- https://stackoverflow.com/questions/71210541/how-do-i-implement-search-function-on-bootstrap-cards -->
        <div class="album  bg-light pb-5">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($items as $row) {
                    ?>
                        <div class="card mx-auto p-0 mt-5" style="height:420px; width: 30%">
                            <?php
                            $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($row->Images);
                            ?>
                            <img src="<?php echo $dataUri; ?>" class="img-fluid" style="height:300px">
                            <div class="card-body position-absolute bottom-0 start-0">
                                <h5 class="card-title">
                                    <?php
                                    echo $row->Name;
                                    ?>
                                </h5>
                                <div class="card-category mb-2" style="font-size: 75%">
                                    <?php
                                    echo $row->CategoryName;
                                    ?>
                                </div>
                                <form method="POST">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button name="btnMoreInfo" value="<?php echo $row->Item_Id; ?>" class="btn btn-sm btn-outline-secondary">More Info</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
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
    <script src="javascript/SearchFunction.js"></script>
</body>

</html>