<?php
error_reporting(0);
include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id  ");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['ip'] . "' ");
$p = mysqli_fetch_object($produk);

// mengambil data dari form pada checkout.php
    if(isset($_POST['submit'])){
        $warna = $_POST['warna'];
        $alamat = $_POST['alamat'];
        $jumlah = $_POST['jumlah'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $nama_penerima = $_POST['nama_penerima'];
        $total_p = $p->product_price * $jumlah;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi </title>
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
             <h3><form style="display: inline-block;"><input type="button" class="btn" value="<" onclick="history.back()"></form>Detail Produk</h3>
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
                        <?php echo $p->product_description ?></p>
                    <p>
                        <table border="0px">
                            <tr>
                                <td>warna </td><td>: <?php echo $warna ?></td>
                            </tr>
                            <tr>
                                <td>alamat </td><td>: <?php echo $alamat ?></td>
                            </tr>
                            <tr>
                                <td>jumlah </td><td>: <?php echo $jumlah ?></td>
                            </tr>
                            <tr>
                                <td>metode pembayaran </td><td>: <?php echo $metode_pembayaran ?></td>
                            </tr>
                            <tr>
                                <td>nama penerima </td><td>: <?php echo $nama_penerima ?></td>
                            </tr>
                            <tr>
                                <td>Total pembayaran</td><td>: Rp. <?php echo number_format($total_p) ?></td>
                            </tr>
                        </table>

                    </p>
                    <!-- form tersembunyi yang akan melempar data ke proses-checkout.php -->
                        <form method="POST" action="">
                            <fieldset style="display: none;">
                                <input type="text" name="product_id" value="<?php echo $p->product_id; ?>" >
                            <input type="text" name="warna" value="<?php echo $warna; ?>" >
                            <input type="text" name="alamat" value="<?php echo $alamat;?>" >
                            <input type="number" name="jumlah" value="<?php echo $jumlah;?>" >
                            <input type="text" name="metode_pembayaran" value="<?php echo $metode_pembayaran; ?>" >
                            <input type="text" name="nama_penerima" value="<?php echo $nama_penerima; ?>" >
                            <input type="number" name="total_p" value="<?php echo $total_p;?>" >
                            
                            </fieldset>
                            <input type="submit" value="konfirmasi" name="confirm" class="btn">
                        </form>

                </div>

            </div>
        </div>
    </div>

    <!--footer-->
<?php include('footer.php'); ?>
<?php
// mengambil data dari konfirmasi.php
if(isset($_POST['confirm'])){
    $product_id = $_POST['product_id'];
    $warna = $_POST['warna'];
    $alamat = $_POST['alamat'];
    $jumlah = $_POST['jumlah'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $nama_penerima = $_POST['nama_penerima'];
    $total_p = $_POST['total_p'];
// memasukkan data ke tb_transaction
$sql = "INSERT INTO tb_transaction (product_id, warna , alamat, jumlah, metode_pembayaran, nama_penerima, total_price) VALUE ('$product_id', '$warna', '$alamat', '$jumlah', '$metode_pembayaran','nama_penerima', '$total_p')";
$query = mysqli_query($conn, $sql);
if($query) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    echo '<script>window.location="index.php?status=sukses"</script>';
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    echo '<script>window.location="index.php?status=gagal"</script>';
}
}
?>
</body>

</html>