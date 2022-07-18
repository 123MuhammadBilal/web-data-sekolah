<!-------------------------- header start -------------------->
<?php include 'includes/header.php'; ?>
<!-- Bosstrap 4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css?<?= time(); ?>">
<!-------------------------- header end -------------------->







<!-- about section starts  -->

<section class="about">
    <div class="container text-center my-3 py-5">
        <!--my is for margin-top and margin-bottom  my-3 py-5-->
        <div class="row">
            <div class="col">
                <h1 class="heading-title">OUR TEAM</h1>
            </div>
        </div>

        <div class="row ">

            <div class="col-lg-6 col-md-6">
                <div class="card my-5">
                    <div class="card-body">
                        <img src="images/bilal.jpeg" alt="imag" class="img-fluid rounded-circle mb-3 w-50">
                        <!--This ensures that the image scales to the parent element.-->
                        <h1>Muhammad BIlal</h1>
                        <h3 class="mb-3">Junior developer</h4>

                            <div class="d-flex flex-row justify-content-center">
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="https://api.whatsapp.com/send?phone=6282197472237" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                    </div>

                </div>
            </div>


            <div class="col-lg-6 col-md-6">
                <div class="card my-5">
                    <div class="card-body">
                        <img src="images/ade.jpeg" alt="imag" class="img-fluid rounded-circle mb-3 w-50 ">
                        <!--This ensures that the image scales to the parent element.-->
                        <h1>Ade Gaffur</h1>
                        <h3 class="mb-3">Senior Developer</h3>

                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-4">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="https://api.whatsapp.com/send?phone=6285242947320" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</section>

<!-- reviews section ends -->










<!-------------------------- footer start -------------------->
<?php include 'includes/footer.php'; ?>
<!-------------------------- footer end -------------------->