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
<header class="p-3 text-bg-dark">


    <div class="container">
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

<body>
    <div class="content">
        <main class="container mt-5">
            <div class="bg-light px-5 pt-4 pb-4 rounded">
                <?php
                if ($_SESSION['loggedin'] == true) {
                ?>
                    <form method="POST" class="d-flex justify-content-end">
                        <div class="btn-group">
                            <button name="btnEditItem" class="btn btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                </svg>
                                <span class="visually-hidden">Button</span>
                            </button>
                            <button name="btnDeleteItem" class="btn btn-outline-secondary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                                </svg>
                                <span class="visually-hidden">Button</span>
                            </button>

                        </div>
                    </form>
                <?php
                }
                ?>
                <?php
                if ($_SESSION['editItem'] == true) {
                    foreach ($item as $row) {

                ?>
                        <form method="POST">
                            <?php
                            $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($row->Images);
                            ?>
                            <img class="rounded w-50 mx-auto d-block" src="<?php echo $dataUri; ?>" alt="Image of item">
                            <div class="input-group mb-3 mt-5">
                                <span class="input-group-text">Name of the item: </span>
                                <input value="<?php echo $row->Name ?>" name="itemName" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Minimum Price: </span>
                                <span class="input-group-text">€</span>
                                <input name="itemPrice" value="<?php echo $row->Price ?>" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Description</span>
                                <textarea name="itemDescription" class="form-control"><?php echo $row->Description ?></textarea>
                            </div>

                            <button name="btnSaveItem" class="btn btn-outline-secondary btn-lg">Save Item</button>
                        </form>
                    <?php
                    }
                } else {

                    foreach ($item as $row) {
                    ?>
                        <?php
                        $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($row->Images);
                        ?>
                        <img class="rounded w-50 mx-auto d-block" style=" width=150" src="<?php echo $dataUri; ?>" alt="Image of item">
                        <h1 class="mt-3"><?php echo $row->Name ?></h1>
                        <h4>Minimum Price: € <?php
                                            $priceFormat = number_format((float)$row->Price, 2, '.', '');
                                            echo $priceFormat;
                                            ?>,-</h4>
                        <p class="lead"><?php echo $row->Description ?></p>
                        <h5><span class="badge bg-info text-bg-warning"><?php echo $row->Features; ?></span></h5>
                    <?php
                    }
                }
                if ($_SESSION["editItem"] == false) {
                    ?>
                    <form method="POST">
                        <div class="input-group mb-0">
                            <span class="input-group-text">€</span>
                            <input name="txtBidPrice" placeholder="e.g. € 0.00,-" type="text" class="form-control">
                            <button id="btnBidId" name="btnBid" class="btn btn-outline-secondary btn-lg" <?php if ($_SESSION['loggedin'] == false) {
                                                                                                            ?> disabled <?php } ?>>Place bid </button>
                        </div>
                        <?php
                        if ($_SESSION["validInput"] == true) {
                        ?>
                            <div class="errorMessage pt-3 ps-5">
                                Please, fill in a valid number.
                            </div>
                        <?php
                        }
                        ?>
                    </form>
                <?php
                }
                ?>
            </div>
            <!-- Show table of all the biddings -->
            <div id="refreshBids" class="bids">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date&Time</th>
                            <th style="text-align: center" scope="col">Sell Item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($itemBiddings as $row) {
                        ?>
                            <tr>
                                <th scope="row"></th>
                                <td><?php echo $row->FirstName ?></td>
                                <td id="price"><?php
                                                $priceFormat = number_format((float)$row->Price, 2, '.', '');

                                                echo "€ $priceFormat,-"
                                                ?>
                                </td>
                                <!-- https://stackoverflow.com/questions/136782/convert-from-mysql-datetime-to-another-format-with-php -->
                                <td><?php
                                    $time = strtotime($row->Date);
                                    $datetimeFormat = date("j M o - H:i", $time);

                                    echo $datetimeFormat ?></td>
                                <form method="POST">
                                    <td><button onclick="itemSold()" name="btnSellItem" value="<?php echo $row->Item_Id; ?>" style="width:100%">Sell</button></td>
                                </form>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

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
    <script src="javascript/SellItem.js"></script>
</body>

</html>