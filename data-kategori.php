<?php
session_start();
include'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobileShop| data kategori </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png">
</head>

<body>

    <!--header-->
<?php include('headeradmin.php'); ?>

    <!--content-->

    <div class="section">
        <div class="container">
            <h3>Data Kategori</h3>
            <div class="box">
            <p><a href="tambah-kategroi.php" class="btn">Tambah Data</a></p><br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori) > 0 ) {
                    while($row = mysqli_fetch_array($kategori)){
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || 
                                <a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } }else{ ?>
                            <tr>
                                <td colspan="3">Tdak Ada Data</td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--footer-->
<?php include('footer.php'); ?>

</body>

</html>