<?php
include_once("koneksi.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	
	$result = mysqli_query($mysqli, "UPDATE book_tb SET name_category='$name' WHERE id=$id");
	
	header("Location: index.php");
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM `book_tb` WHERE id=$id");

while($data = mysqli_fetch_array($result))
{
	$name = $data['name'];
	// $katid = $data['category_id'];
	// $katnama = $data['name_category'];
	// $penulisid = $user_data['writer_id'];
	// $penulisnama = $data['name_writer'];
	// $tahun = $data['publication_year'];
	// $gambar = $data['img'];
}
?>
<?php
include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM `book_tb`WHERE id=$id");
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
                            <a class="nav-link active" href="kat.php">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pen.php">Penulis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="edit_buku.php" method="post" enctype="multipart/form-data" name="form" class="mt-3">
        <a href="index.php" class="btn btn-danger mt-1 mb-1">Kembali</a>
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
            
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <button type="submit" name="update" class="btn btn-primary">Edit</button>
        </form>
    </div>
</body>

</html>