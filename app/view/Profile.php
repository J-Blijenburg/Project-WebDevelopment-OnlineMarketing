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
    <link href="StyleSheets/StyleSheet.css" rel="stylesheet" />
</head>
<body>
    <main>
        <div>
            <div class="headerInfo" style="width: 100%">
                <section class="text-center container ">
                    <form method="POST">
                        <div class="row py-lg-5 w-65 position-absolute top-50 start-50 translate-middle">
                            <h1 class="fw-light mb-5 "><?php echo "$user->firstName $user->lastName"; ?></h1>


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
                            <div class="card mx-auto p-0 mt-5" style="height:400px; width: 30%">
                                <?php

                                $image =  $imageRepository->getSingleImageByItemId($row->Item_Id);
                                foreach ($image as $imageRow) {
                                    $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($imageRow->Image);
                                }

                                ?>
                                <img src="<?php echo $dataUri; ?>" class="img-fluid" style="height:300px">
                                <div class="card-body position-absolute bottom-0 start-0">
                                    <h5 class="card-title">
                                        <?php
                                        echo $row->Name;
                                        ?>
                                    </h5>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="javascript/SearchFunction.js"></script>
</body>
</html>