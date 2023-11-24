<?php
error_reporting(0);
include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id  ");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['ip'] . "' ");
$p = mysqli_fetch_object($produk);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobileShop| detail produk </title>
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
                <input type="text" name="search" placeholder="Cari Produk" class="text1"
                    value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk" class="btn1">
            </form>
        </div>
    </div>

    <!-- produk detail -->
    <div class="section">
        <div class="container">
            <h3><form style="display: inline-block;"><input type="button" class="btn" value="<" onclick="history.back()"></form> Detail Produk</h3>
            <div class="box">

                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="100%">
                </div>
                <div class="col-2">

                    <h3>
                        <?php echo $p->product_name ?>
                    </h3>
                    <h4>Rp.
                        <?php echo number_format($p->product_price) ?>
                    </h4>
                    <p>
                        Deskripsi : <br>
                        <?php echo $p->product_description ?>
                    
                    </p>
                    <a href="checkout.php?ip=<?php echo $_GET['ip'] ?>" class="btn">beli</a>
                </div>

            </div>
        </div>
    </div>

    <!--footer-->
<?php include('footer.php'); ?>

</body>

</html>