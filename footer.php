<?php
    include'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email FROM tb_admin WHERE admin_id ");
    $a = mysqli_fetch_object($kontak);
?>
<div class="footer">
        <div class="container">
            <h4>Email</h4>
            <p>
                <?php echo $a->admin_email ?>
            </p>

            <h4>Telepon</h4>
            <p>
                <?php echo $a->admin_telp ?>
            </p>

            <small>Copyright &copy; 2023 - M Hafizd Fadhilah</small>
        </div>
    </div>