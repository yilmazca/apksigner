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

                        <!-- User informations -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <form id="fileForm">
                                        <div class="card-header ">
                                            <h4 class="card-title"> Select Unsigned APK file</h4>
                                            <p class="card-category">Please select unsigned APK file</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group has-label">
                                                <label>
                                                    File Name
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="filename" id="filename" type="text" required="true" required>
                                            </div>
                                            <input type="file" id="apkUploadInput" name="apkUploadInput" data-allowed-file-extensions="apk" required>
                                        </div>

                                        <div class="uploadPreLoader d-none align-items-center justify-content-center">
                                            <div class="mr-4">
                                                <svg width="48" height="48" style="fill: #87cb16;" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                                    <style>
                                                        .spinner_9y7u {
                                                            animation: spinner_fUkk 2.4s linear infinite;
                                                            animation-delay: -2.4s
                                                        }

                                                        .spinner_DF2s {
                                                            animation-delay: -1.6s
                                                        }

                                                        .spinner_q27e {
                                                            animation-delay: -.8s
                                                        }

                                                        @keyframes spinner_fUkk {
                                                            8.33% {
                                                                x: 26px;
                                                                y: 1px
                                                            }

                                                            25% {
                                                                x: 26px;
                                                                y: 1px
                                                            }

                                                            33.3% {
                                                                x: 26px;
                                                                y: 26px
                                                            }

                                                            50% {
                                                                x: 26px;
                                                                y: 26px
                                                            }

                                                            58.33% {
                                                                x: 1px;
                                                                y: 26px
                                                            }

                                                            75% {
                                                                x: 1px;
                                                                y: 26px
                                                            }

                                                            83.33% {
                                                                x: 1px;
                                                                y: 1px
                                                            }
                                                        }
                                                    </style>
                                                    <rect class="spinner_9y7u" x="1" y="1" rx="1" width="20" height="20" />
                                                    <rect class="spinner_9y7u spinner_DF2s" x="1" y="1" rx="1" width="20" height="20" />
                                                    <rect class="spinner_9y7u spinner_q27e" x="1" y="1" rx="1" width="20" height="20" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="m-1">Please Wait!</h4>
                                                <p>Apk file processing..</p>
                                            </div>
                                        </div>

                                        <div class="d-flex card-body d-flex justify-content-center">
                                            <div class="form-group">
                                                <p class="text-muted" style="line-height:50px;">
                                                    Select the file to be processed, then start the signing process.
                                                </p>
                                            </div>
                                            <hr>
                                            <div class="form-group float-right">
                                                <button class="btn btn-success btn-wd imzala " type="submit" style="line-height: 30px;">
                                                    <span class="btn-label">
                                                        <i class="mdi mdi-cog-play-outline mdi-24px"></i>
                                                    </span>Upload APK
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card table-with-links">
                                    <div class="card-header ">
                                        <h4 class="card-title">Unsigned APKs</h4>
                                        <p class="card-category">Unsigned APK Records</p>
                                    </div>
                                    <div class="card-body table-full-width">
                                        <table id="unsignedAPKTable" class="table table-striped table-no-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#No</th>
                                                    <th class="text-center">File Name</th>
                                                    <th class="text-center">Uploade Date</th>
                                                    <th class="text-center">Download date</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card table-with-links">
                                    <div class="card-header ">
                                        <h4 class="card-title">Latest Signed APKs</h4>
                                        <p class="card-category">Last Signed APK list from Database</p>
                                    </div>
                                    <div class="card-body table-full-width">
                                        <table id="signedAPKTable" class="table table-striped table-no-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#No</th>
                                                    <th class="text-center">File Name</th>
                                                    <th class="text-center">Signed Date</th>
                                                    <th class="text-center">Last Download</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var user_id = '<?php echo $user_id; ?>';
            </script>
            <?php require_once('footer.php'); ?>