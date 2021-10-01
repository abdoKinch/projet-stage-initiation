<?php
session_start();
if(isset($_SESSION['email']) AND isset($_SESSION['password'])){
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['company']?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <script src="../script/jquery-3.6.0.min.js" ></script>
    <script src="../script/script.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
            <img src="assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                 </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION['nom'] ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['email'] ?></p>
                </div>
                <a class="dropdown-item" href="../deconnexion/deconnexion.php">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['nom'] ?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a id="a1" class="nav-link" href="./produit.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Produits</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a1" class="nav-link" href="./budget.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Budgets</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a1" class="nav-link" href="./commentaire.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Commentaires</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Les produits</h4>
                      <div class="form-group">
                        <label for="exampleInputName1">Le nom du produit</label>
                        <input name="pe" required type="text" class="form-control" id="np" placeholder="Le nom du produit">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">l'unité du produit</label>
                        <input name="pa" required type="text" class="form-control" id="up" placeholder="l'unité du produit">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">La qualité du produit</label>
                        <input  name="ph" required type="text" class="form-control" id="qp" placeholder="La qualité du produit">
                      </div>
                      <button id="bp" name="submit" type="submit" class="btn btn-success mr-2">Ajouter</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Les produits</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th> Le nom du produit </th>
                          <th> L'unité du produit </th>
                          <th> La qualité du produit </th>
                          <th> Modifier </th>
                          <th> Supprimer </th>
                        </tr>
                      </thead>
                      <tbody id="tbp" >
                        <?php
                        include("../php/produit.php");
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
  </body>
</html>
<?php 
}else{
  header("Location:../login.php");
}
?>