<?php

  require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model/User.php');

  User::verifyLogin();

  require_once "header.php";
  
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #fff">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FestouPP
        <small>festas e eventos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" >

    <div class="site-branding-area" id="div-logotipo" >
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="" id="img-logotipo">
                        <center><img src="/res/site/img/festou11.png" width="60%" style="margin: 15rem 0; "/></center>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  require_once "footer.php";
?>

</body>
</html>