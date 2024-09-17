<?php require_once('header.php'); ?>

<body>
    <div class="wrapper">
        <?php require_once('sidebar.php'); ?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand"> Dashboard </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="text-warning mdi mdi-file-download-outline mdi-48px"></i>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="numbers">
                                                    <p class="card-category">Download Count</p>
                                                    <h4 class="card-title">24</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-info"></i> This total download count
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="text-success mdi mdi-file-upload-outline mdi-48px"></i>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="numbers">
                                                    <p class="card-category">Uploaded APK File</p>
                                                    <h4 class="card-title">19</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-info"></i> Total uploaded APK files
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="text-primary mdi mdi-file-refresh-outline mdi-48px"></i>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="numbers">
                                                    <p class="card-category">Total Signed APK File</p>
                                                    <h4 class="card-title">23</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-refresh"></i> How many APK file was converted
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="text-dark mdi mdi-account-group-outline mdi-48px"></i>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="numbers">
                                                    <p class="card-category">Users</p>
                                                    <h4 class="card-title">4</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-user"></i> Total Clients in Database
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User informations -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card table-with-links">
                                    <div class="card-header ">
                                        <h4 class="card-title">Latest Registered Users</h4>
                                        <p class="card-category">Newly registered members are listed here</p>
                                    </div>
                                    <div class="card-body table-full-width">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#No</th>
                                                    <th>Name</th>
                                                    <th>E-Mail</th>
                                                    <th>Register Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- TODO: content -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card table-with-links">
                                    <div class="card-header ">
                                        <h4 class="card-title">Latest Downloaded APK</h4>
                                        <p class="card-category">Users who last downloaded the file</p>
                                    </div>
                                    <div class="card-body table-full-width">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#No</th>
                                                    <th>Name</th>
                                                    <th>E-Mail</th>
                                                    <th>Download Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- TODO: content -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <?php require_once('footer.php'); ?>