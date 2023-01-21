<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online-Marketing</title>
    <link href="StyleSheets/StyleMain.css" rel="stylesheet" />
    <meta name="theme-color" content="#712cf9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-light">
    <main>
        <div class=mainComponents>
            <div class="headerInfo" style="width: 100%">
                <form class="mainSearchItems" method="POST">
                    <?php
                    if ($_SESSION['controller'] == "Profile") {
                    ?>
                        <h1 class="mainHeaderText"><?php echo "$user->firstName's advertisements" ?> </h1>
                    <?php
                    } else {
                    ?>
                        <h1 class="mainHeaderText">Online-Marketing</h1>
                    <?php
                    }
                    ?>

                    <div class="input-group">
                        <input class="form-control form-control-dark w-50" id="myInput" type="search" placeholder="Search" aria-label="Search" oninput="searchThroughItemsTextfield()">
                        <select oninput="searchThroughItemsCategory()" class="form-select" name="inputCategory" id="inputCategory">
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
                </form>
            </div>
            <img class="imageHeader" src=Img/Background.jpeg style="width: 100%">
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="javascript/SearchFunction.js"></script>
</body>

</html>