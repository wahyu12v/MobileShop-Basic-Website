<?php include 'db.php'; ?>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png">
<header>
        <div class="container">
            <h1><a href="index.php">MobileShop</a></h1>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#" onclick="myFunction()" id="dropbtn">Brand</a></li>
                <div class="dropdown-content" id="myDropdown">
                    <?php

                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC ");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($k = mysqli_fetch_array($kategori)) {

                            ?>
                            <a href="produk.php?kat=<?php echo $k['category_id']  ?>">
                                <?php echo $k['category_name'] ?>
                            </a>
                        <?php }
                    } else { ?>
                        <p>Kategori Tidak Ada</p>
                <?php } ?>
                </div>
                <li><a href="produk.php">All-Produk</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>

        </div>
        
    </header>
    <script>
        // toggle dropdown between show and hidden
        function myFunction() {
            document.getElementById('myDropdown').classList.toggle("show");
        }
        // close dropdown when clicked outside
        window.onclick = function(e){
            if(!e.target.matches('#dropbtn')){
                var myDropdown = document.getElementById('myDropdown');
                if(myDropdown.classList.contains('show')){
                     myDropdown.classList.remove('show');
                }
            }
        }
    </script>