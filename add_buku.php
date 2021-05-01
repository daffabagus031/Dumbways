<?php
include_once("koneksi.php");

$penulis = mysqli_query($mysqli, "SELECT * FROM writer_tb");
$kategori = mysqli_query($mysqli, "SELECT * FROM category_tb");
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
                            <a class="nav-link" href="index.php">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kat.php">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="pen.php">Penulis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="add_buku.php" method="post" enctype="multipart/form-data" name="form1" class="mt-3">
        <a href="index.php" class="btn btn-danger mt-1 mb-1">Kembali</a>
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Penulis</label>
                <select name="penulis" id="" class="form-control">
                    <option value="" selected disabled>-Pilih Nama Penulis-</option>
                    <?php while($data = mysqli_fetch_array($penulis)) { ?>
                    <option value="<?php echo $data['id']; ?>"><?php echo $data['name_writer']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Buku</label>
                <select name="kategori" id="" class="form-control">
                    <option value="" selected disabled>-Pilih Kategori Buku-</option>
                    <?php while($data = mysqli_fetch_array($kategori)) { ?>
                    <option value="<?php echo $data['id']; ?>"><?php echo $data['name_category']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Rilis</label>
                <input type="number" class="form-control" name="tahun">
            </div>
            <input type="file" name="gambar" class="form-control">
            <button type="submit" name="Submit" class="btn btn-primary mt-2">Submit</button>
        </form>

        <?php
            if(isset($_POST['Submit'])) {
                $name = $_POST['name'];
                $penulis = $_POST['penulis'];
                $kategori = $_POST['kategori'];
                $tahun = $_POST['tahun'];

                $ekstensi_diperbolehkan	= array('png','jpg');
                $img = $_FILES["gambar"]["name"];
                $x = explode('.', $img);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['gambar']['size'];
                $file_tmp = $_FILES['gambar']['tmp_name'];
                
                include_once("koneksi.php");

                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){			
                        move_uploaded_file($file_tmp, 'image/'.$img);
                        $result = mysqli_query($mysqli, "INSERT INTO book_tb(name, category_id, writer_id, publication_year, img) VALUES('$name', '$kategori', '$penulis', '$tahun', '$img')");
                        if($result){
                            echo "Buku berhasil ditambahkan. <a href='index.php'>Lihat Buku</a>";
                        }else{
                            echo 'GAGAL MENGUPLOAD GAMBAR';
                        }
                    }else{
                        echo 'UKURAN FILE TERLALU BESAR';
                    }
                }else{
                    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                }
                // echo "Buku berhasil ditambahkan. <a href='index.php'>Lihat Buku</a>";
            }
        ?>
    </div>
</body>

</html>