<?php

session_start();

if (!isset($_SESSION['username'])) {
   header("Location: home.php");
}

?>



<!-------------------------- header start -------------------->
<?php include 'includes/header.php'; ?>
<!-------------------------- header end -------------------->





<!-- home section starts  -->
<section class="home">
   <div class="content">
      <h1>WEBSITE DATA SMK KOTA PALU</h1>
      <p>Menyajikan Data-Data Sekolah Kejuruan Di Kota Palu</p>
      <a href="data.php" class="btn">Lihat Data</a>
   </div>
</section>
<!-- home section ends -->








<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>