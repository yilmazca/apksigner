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
                        <!--System Settings -->
                        <div class="row">
                            <div class="col-xl-8">

                                <div class="card ">
                                    <div>
                                        <?php if (session()->getFlashdata('systemMessage') !== NULL) : ?>
                                            <div class="alert alert-info">
                                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                                <span><?php echo session()->getFlashdata('systemMessage'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-header ">
                                        <h4 class="card-title">System Settings</h4>
                                    </div>
                                    <div class="card-body ">
                                        <form method="post" action="<?php echo site_url('settings/save'); ?>" class="form-horizontal">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Maintenance mode</label>
                                                        <div class="col-sm-10 d-flex  align-items-baseline" style="line-height:35px;">
                                                            <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" name="system_under_construction" <?=($settings->system_under_construction > 0) ? 'checked' : ''; ?>>
                                                            <span class="toggle"></span>
                                                            <small class="ml-3 form-text text-muted">Be careful maintenance mode suspends the system.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Email address</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" value="<?= $settings->system_email; ?>" name="system_email" placeholder="System email address" class="form-control" required>
                                                            <small class="form-text text-muted">All email notifications will be sent to this address.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">APK PREFIX NAME</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" value="<?= $settings->pre_name; ?>" name="pre_name" class="form-control" required>
                                                            <small class="form-text text-muted">When signing apk files, enter a prefix to be added to their name.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">USDT Address</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?= $settings->payment_usdt_address; ?>" name="payment_usdt_address" type="text" class="form-control">
                                                            <small class="form-text text-muted">Please enter the USDT wallet address for payments.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <fieldset>
                                                <div class="form-group float-right">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <button class="btn btn-success btn-wd">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once('footer.php'); ?>