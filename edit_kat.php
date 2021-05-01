<?php
include_once("koneksi.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];

	$result = mysqli_query($mysqli, "UPDATE category_tb SET name_category='$name' WHERE id=$id");
	
	header("Location: kat.php");
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM category_tb WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name_category'];
}
?>
<?php
include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM category_tb");
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

        <form action="edit_kat.php" method="post" name="form1" class="mt-3">
        <a href="kat.php" class="btn btn-danger mt-1 mb-1">Kembali</a>
            <div class="mb-3">
                <label class="form-label">Kategori Buku</label>
                <input type="text" class="form-control" name="name" value=<?php echo $name;?>>
            </div>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <button type="submit" name="update" class="btn btn-primary">Edit</button>
        </form>
    </div>
</body>

</html>