<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="StyleSheets/StyleItemList.css" rel="stylesheet" />

<body>
     <!-- https://stackoverflow.com/questions/71210541/how-do-i-implement-search-function-on-bootstrap-cards -->
     <div class="album  bg-light pb-5">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($items as $row) {
                     
                    ?>
                        <div class="card mx-auto p-0 mt-5" style="height:420px; ">
                    
                            <?php
                          
                            $image =  $imageRepository->getSingleImageByItemId($row->Item_Id);
                            foreach ($image as $imageRow) {
                                $dataUri = "data:image/jpg;charset=utf;base64," . base64_encode($imageRow->Image);
                            }

                            ?>
                            <img src="<?php
                                        echo $dataUri;
                                        ?>" class="img-fluid" style="height:300px">
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
</body>
</html>