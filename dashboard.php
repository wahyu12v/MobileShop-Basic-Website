<?php
session_start();
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
    <title>MobileShop </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png">
</head>

<body>

    <!--header-->
<?php include('headeradmin.php'); ?>

    <!--content-->

    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang
                    <?php echo $_SESSION['a_global']->admin_name ?> di MobileShop
                </h4>
            </div>
        </div>
    </div>

    <!--footer-->
<?php include('footer.php'); ?>

</body>

</html>