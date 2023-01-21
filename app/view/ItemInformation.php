<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-Marketing</title>
    <link href="StyleSheets/StyleItemInformation.css" rel="stylesheet" />
    <meta name="theme-color" content="#712cf9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-light" onload="javascript:getAllBid()">
    <div class="content ">
        <main class=" bg-white container mt-5 border">
            <div class="bg-white pt-4 pb-4 rounded">
                <?php
                if ($_SESSION['loggedin'] == true && ($item[0]->User_Id == $user->user_Id)) {
                ?>
                    <form method="POST" class="d-flex justify-content-between pb-3">

                    <button onclick="itemSold()" class="btn btn-success" name="btnSellItem" value="<?php echo $_SESSION['selectedItem'] ?>" style="width:20%">Sell Item</button>
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
                            <div id="carouselExample " class="carousel slide">
                                <div class="carousel-inner">
                                    <?php
                                    $i = 0;
                                    foreach ($itemImages as $rowImages) {
                                        $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($rowImages->Image);
                                        if ($i == 0) {
                                    ?>
                                            <div class="carousel-item active">
                                                <img class="w-50 mx-auto d-block" width="500" height="500" src="<?php echo $dataUri; ?>" alt="Image of item">
                                            </div>
                                        <?php
                                            $i++;
                                        } else {
                                        ?>
                                            <div class="carousel-item">
                                                <img class="w-50 mx-auto d-block" width="500" height="500" src="<?php echo $dataUri; ?>" alt="Image of item">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
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
                    ?>
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            foreach ($itemImages as $rowImages) {
                                $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($rowImages->Image);
                                if ($i == 0) {
                            ?>
                                    <div class="carousel-item active">
                                        <img class="w-50 mx-auto d-block" width="500" height="500" src="<?php echo $dataUri; ?>" alt="Image of item">
                                    </div>
                                <?php
                                    $i++;
                                } else {
                                ?>
                                    <div class="carousel-item">
                                        <img class="w-50 mx-auto d-block" width="500" height="500" src="<?php echo $dataUri; ?>" alt="Image of item">
                                    </div>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <h1 class="mt-3"><?php echo $item[0]->Name ?></h1>
                    <h4>Minimum Price: € <?php
                                            $priceFormat = number_format((float)$item[0]->Price, 2, '.', '');
                                            echo $priceFormat;
                                            ?>,-</h4>
                    <p class="lead"><?php echo $item[0]->Description ?></p>
                    <h5 class="pb-2"><span class="badge bg-info text-bg-warning"><?php echo $item[0]->Features; ?></span></h5>
                    <div class="userInfo">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Seller info
                        </button>
                        <div class="collapse pb-2 w-50" id="collapseExample">
                            <div class="card card-body">
                                <?php
                                echo $item[0]->FirstName;
                                echo " ";
                                echo $item[0]->LastName;
                                echo "<br> ------------ <br>";
                                echo $item[0]->Email;
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                if ($_SESSION["editItem"] == false) {
                ?>
                    <form method="POST">
                        <div class="input-group mt-4">
                            <span class="input-group-text">€</span>
                            <input name="txtBidPrice" placeholder="e.g. € 0.00,-" type="text" class="form-control">
                            <button id="btnBidId" name="btnBid" class="btn btn-outline-secondary btn-lg" <?php if ($_SESSION['loggedin'] == false || ($item[0]->User_Id == $user->user_Id)) { ?> disabled <?php } ?>>Place bid </button>
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

                        </tr>
                    </thead>
                    <tbody id=bidBodyId>
                        <!-- with javascript API end point all the bids will be imported -->
                    </tbody>
                </table>

            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="javascript/SellItem.js"></script>


</body>

<script>
    function getAllBid() {
        fetch("https://onlinemarketingcreatedbyjens.000webhostapp.com/api/bid")
            .then(res => res.json())
            .then((bids) => {
                console.log('output:', bids);
                bids.forEach(bid => {

                    //create a card for all the information
                    const bodytable = document.getElementById("bidBodyId");

                    //create a table row
                    const tableRow = document.createElement("tr");

                    //set the first collumn
                    const firstCol = document.createElement("td");


                    //set the name of the bid in the created row
                    const name = document.createElement("td");
                    name.innerHTML = bid.FirstName;

                    //set the price of the bid in the created row
                    const price = document.createElement("td");
                    $number = bid.Price;

                    price.innerHTML = "€ " + new Intl.NumberFormat('es-ES', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    }).format($number);

                    //set the date of the bid
                    const date = document.createElement("td");


                    const dateformatter = new Date(bid.Date);
                    const year = dateformatter.getFullYear();
                    const month = months[dateformatter.getMonth()];
                    const day = dateformatter.getDate();
                    const hour = dateformatter.getHours();
                    const minutes = dateformatter.getMinutes();


                    date.innerHTML = day + ' ' + month + ' ' + year + ' - ' + hour + ':' + minutes;

                    tableRow.appendChild(firstCol);
                    tableRow.appendChild(name);
                    tableRow.appendChild(price);
                    tableRow.appendChild(date);
                    bodytable.appendChild(tableRow);
                });

            }).catch(err => console.error(err));
    }
</script>

<script>
    const months = {
        0: 'January',
        1: 'February',
        2: 'March',
        3: 'April',
        4: 'May',
        5: 'June',
        6: 'July',
        7: 'August',
        8: 'September',
        9: 'October',
        10: 'November',
        11: 'December'
    }
</script>

</html>