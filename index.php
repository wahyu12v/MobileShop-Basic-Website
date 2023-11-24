<?php
    include'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email FROM tb_admin WHERE admin_id ");
    $a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobileShop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png">
</head>

<body>

    <!--header-->
<?php include('header.php'); ?>

    <!--search-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" class="text1">
                <input type="submit" name="cari" value="Cari Produk" class="btn1">
            </form>
        </div>
    </div>
    <!-- new product -->
<div class="section">
    <div class="container">
        <h3>Produk Terbaru</h3>
        <div class="box">
            <?php
            
            $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8 ");
            if(mysqli_num_rows($produk) > 0 ){
                while($p = mysqli_fetch_array($produk)){
            
            ?>
            <a href="detail-produk.php?ip=<?php echo $p['product_id'] ?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?>" width="100%" >
                        <p class="nama"  ><?php echo substr($p['product_name'], 0, 20) ?></p>
                        <p class="harga" >Rp.<?php echo number_format($p['product_price']) ?></p>
                    </div>
                    </a>
            <?php }}else{ ?>
                <p>Produk Tidak Ada</p>
            <?php } ?>
        </div>
    </div>
</div>

<!--footer-->
<?php include('footer.php'); ?>
<!-- tampilan keberhasilan transaksi -->
<?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "<script> alert('terima kasih telah berbelanja di TokoKami!')</script>";
            } else {
                echo "<script> alert('Terdapat Kesalahan pada sistem, Mohon maaf atas gangguannya!')</script>";
            }
        ?>
    </p>
    <?php endif; ?>
</body>

</html>