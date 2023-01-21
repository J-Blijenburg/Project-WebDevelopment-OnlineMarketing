<?php
$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-Marketing</title>
    <link href="StyleSheets/StyleNewItem.css" rel="stylesheet" />
    <meta name="theme-color" content="#712cf9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main>
        <form method="POST">
            <section class="text-center container">
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
                    <span class="input-group-text" id="basic-addon1">Name of product</span>
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
                    <span class="input-group-text" id="basic-addon1">Category</span>
                    <select class="form-select" name="inputCategory" id="inputCategory" aria-label="Example select with button addon">

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
                    <span class="input-group-text">Features</span>
                    <textarea name="ItemFeatures" class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div>
                    <a> *requires a minimum of 2 images  </a>
                </div>
                <!-- This div is part of the Drag and Drop API -->
                <div class="input-group mb-3" style="display: flex">
                    <label class="input-group-text" for="ItemUpload">Upload</label>
                    <!-- https://www.youtube.com/watch?v=OHTudicK7nY -->
                    <div class="drop-zone" style="border-color: black; flex-grow: 1;">
                        <input style="position: absolute; font-size: 70%;" name="ItemUpload[]" type="file" multiple id="myFileInput">
                    </div>
                    <div id="dragImage" draggable="true"></div>
                </div>
        </div>
        <?php
        if ($_SESSION['wrongInput'] == true) {
        ?>
            <h6 style="display: flex; justify-content:center;" class="invalidInput mt-2"> The input is not valid. Please, try again.</h6>
        <?php
        }
        ?>
        <div class="d-flex justify-content-center flex-grow-3 mt-3">
            <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
                <button name="ItemCancel" class="btn btn-outline-dark">Cancel</button>
                <button name="ItemCreate" class="btn btn-outline-dark">Create Item</button>
            </div>
            </form>
        </div>
    </main>
    <script src="javascript/DragDropAPI.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>