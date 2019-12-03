<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/wideworldexporters/controller/adminpanel/add-product.php'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WWI- Producten</title>

    <!-- Custom fonts for this template -->
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/fontawesome-free/css/all.min.css"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/style/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/datatables/dataTables.bootstrap4.min.css"
          rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-truck"></i>
            </div>
            <div class="sidebar-brand-text mx-3">WideWorld Importers</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-box"></i>
                <span>Producten</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Producten:</h6>
                    <a class="collapse-item" href="add-product.php">Toevoegen</a>
                    <a class="collapse-item" href="stock-content.php">Alle producten</a>
                    <a class="collapse-item" href="stock-content.php">Categorieën</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-users"></i>
                <span>Gebruikers</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gebruikers:</h6>
                    <a class="collapse-item" href="#">Toevoegen</a>
                    <a class="collapse-item" href="user-content.php">Alle gebruikers</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="#">Login</a>
                    <a class="collapse-item" href="#">Register</a>
                    <a class="collapse-item" href="#">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="#">404 Page</a>
                    <a class="collapse-item" href="#">Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                         alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.
                                    </div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                         alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how would
                                        you like them sent to you?
                                    </div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                         alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with the
                                        progress so far, keep up the good work!
                                    </div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                         alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told
                                        me that people say this to all dogs, even if they aren't good...
                                    </div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname'] ?></span>
                            <i class="fas fa-user-tie"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Product aanpassen</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 id="card-header-title" class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="../../controller/adminpanel/add-product.php">
                            <div style="float:left;margin-right:20px;">
                                <label for="productname">Productnaam:</label>
                                <input name="stockitemname" id="productname" type="text" required><br>

                                <label for="supplier">Leverancier:</label>
                                <select name="supplier" id="supplier" required>
                                    <option value="0">-- Kies leverancier --</option>
                                    <?php foreach ($suppliers as $supplier) { ?>
                                        <option value="<?php echo $supplier['SupplierID'] ?>"><?php echo $supplier['SupplierName']; ?></option>
                                    <?php } ?>
                                </select><br>

                                <label for="color">Kleur:</label>
                                <select name="color" id="color" required>
                                    <option value="0">Onbekend</option>
                                    <?php foreach ($colors as $color) { ?>
                                        <option value="<?php echo $color['ColorID'] ?>"><?php echo $color['ColorName']; ?></option>
                                    <?php } ?>
                                </select><br>

                                <label for="package">Verpakking binnenkant:</label>
                                <select name="unitpackage" id="package" required>
                                    <option value="0">Onbekend</option>
                                    <?php foreach ($packages as $package) { ?>
                                        <option value="<?php echo $package['PackageTypeID'] ?>"><?php echo $package['PackageTypeName']; ?></option>
                                    <?php } ?>
                                </select><br>

                                <label for="package">Verpakking buitenkant:</label>
                                <select name="outerpackage" id="package" required>
                                    <option value="0">Onbekend</option>
                                    <?php foreach ($packages as $package) { ?>
                                        <option value="<?php echo $package['PackageTypeID'] ?>"><?php echo $package['PackageTypeName']; ?></option>
                                    <?php } ?>
                                </select><br>
                            </div>

                            <div style="float:left; margin-right: 20px;">
                                <label for="brand">Merk:</label>
                                <input name="brand" id="brand" type="text" required><br>

                                <label for="size">Maat:</label>
                                <input name="size" id="size" type="text" required><br>

                                <label for="size">Doorlooptijd:</label>
                                <input value="1" name="leadtime" min="0" style="width: 40px;" id="size" type="number" required>dagen<br>

                                <label for="size">Aantal per bestelling:</label>
                                <input value="1" name="quantity" min="1" style="width: 40px;" id="size" type="number" required><br>


                                <label for="chilled">Moet gekoeld worden:</label>
                                <select name="chillerstock" id="chilled" required>
                                    <option value="0" selected>Nee</option>
                                    <option value="1">Ja</option>
                                </select><br>
                            </div>
                            <div style="float:left;margin-right: 20px;">
                                <label for="barcode">Barcode:</label>
                                <input name="barcode" id="barcode" type="text" required><br>

                                <label for="unitprice">Prijs per stuk:</label>
                                <input name="unitprice" id="unitprice" type="text" required><br>

                                <label for="recommendedprice">Aanbevelingsprijs:</label>
                                <input name="retail" id="recommendedprice" type="text" required><br>

                                <label for="typicalweightperunit">Gewicht per stuk:</label>
                                <input name="weight" id="typicalweightperunit" type="text" required><br>

                                <label for="taxrate">Belasting:</label>
                                <input name="taxrate" id="taxrate" type="text" required><br>
                            </div>
                            <div style="float:left">
                                <label for="description">Beschrijving:</label><br>
                                <textarea name="description" id="description" cols="30"
                                          rows="7" required></textarea>
                            </div>
                            <div style="float:left;margin-right: 20px;">
                                <input type="file" name="photos[]" multiple><br>

                                <label for="category">Categorie:</label>
                                <select name="stockgroup" id="category" required>
                                    <option value="0">-- Selecteer categorie --</option>
                                    <?php foreach ($stockgroups as $stockgroup) { ?>
                                        <option value="<?php echo $stockgroup['StockGroupID'] ?>"><?php echo $stockgroup['StockGroupName']; ?></option>
                                    <?php } ?>
                                </select><br>

                                <label for="quantityonhand">Voorraad:</label>
                                <input id="quantityonhand" type="text" name="quantityonhand" required><br>

                                <label for="lastcostprice">Inkoopprijs:</label>
                                <input id="lastcostprice" type="text" name="lastcostprice" required><br>
                            </div>
                            <div style="width:100%;text-align:center;float:left;">
                                <input class="btn btn-primary" type="submit" name="submit" value="Update product">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Wide World Importers</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/jquery/jquery.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/js/demo/datatables-demo.js"></script>

<script>
    $('#productname').on('input', function () {
        $('#card-header-title').html(this.value)
    });
</script>
</body>

</html>
