<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Dumbways</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="kat.php">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pen.php">Penulis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="add_kat.php" method="post" name="form1" class="mt-3">
        <a href="kat.php" class="btn btn-danger mt-1 mb-1">Kembali</a>
            <div class="mb-3">
                <label class="form-label">Kategori Buku</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
            if(isset($_POST['Submit'])) {
                $name = $_POST['name'];
                
                include_once("koneksi.php");
                
                $result = mysqli_query($mysqli, "INSERT INTO category_tb(name_category) VALUES('$name')");
                
                echo "Kategori berhasil ditambahkan. <a href='kat.php'>Lihat Kategori</a>";
            }
        ?>
    </div>
</body>

</html>