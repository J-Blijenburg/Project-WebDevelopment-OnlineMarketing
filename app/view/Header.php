<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
                    if ($_SESSION['loggedin'] == true) {
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
</html>