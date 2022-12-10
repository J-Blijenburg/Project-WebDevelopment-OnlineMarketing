<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">

<head>
    <link href="style.css" rel="stylesheet">
    <title>Guestbook</title>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Guestbook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <form action="/login.php">
                    <button name="loginButton" type="submit" class="btn btn-light">Login</button>
                </form>
            </div>
        </div>
    </nav>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <form class="messageControlInput" method="POST">
        <div class="userNameInput">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input name="name" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="messageInput">
            <span class="input-group-text">Message: </span>
            <textarea name="message" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div action="/guestbook.php" class="btnMessage">
            <label>&nbsp;</label>
            <input type="submit" value="send" />
        </div>
    </form>

    <div class="post">
        <table class="table" allign='left' cellpadding="10">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Posted at</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($items as $row) {
                ?>
                    <tr>
                        <th scope="row">
                            <?php
                            echo $row->id;
                            ?>
                        </th>
                        <th scope="row">
                            <?php
                            echo $row->Name;
                            ?>
                        </th>
                        <th scope="row">
                            <?php
                            echo $row->Description;
                            ?>
                        </th>
                        <th scope="row">
                            <?php
                            echo $row->Price;
                            ?>
                        </th>
                        <th scope="row">
                            <?php
                            echo $row->Posted_At;
                            ?>
                        </th>
                        <th scope="row">
                            <?php
                            echo $row->Status;
                            ?>
                        </th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
    </div>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>