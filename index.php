<?php
include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM `book_tb`, `writer_tb`, `category_tb` WHERE book_tb.category_id=category_tb.id AND book_tb.writer_id=writer_tb.id");
?>

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
                            <a class="nav-link active" href="index.php">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kat.php">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pen.php">Penulis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <table class="table">
        <a href="add_buku.php" class="btn btn-primary mt-1">Tambah</a>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Tahun Rilis</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    while($data = mysqli_fetch_array($result)) { 
                ?>
                <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['name_category']; ?></td>
                    <td><?php echo $data['name_writer']; ?></td>
                    <td><?php echo $data['publication_year']; ?></td>
                    <td><img src="image/<?php echo $data['img']; ?>" alt="" srcset="" width="100" height="200"></td>
                    <td>
                        <a class="edit" href="edit_buku.php?id=<?php echo $data['id']; ?>">Edit</a> |
                        <a class="hapus" href="hapus_buku.php?id=<?php echo $data['id']; ?>">Hapus</a>					
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>