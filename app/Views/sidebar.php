<div class="sidebar" data-color="orange" data-image="<?php echo base_url(); ?>/assets/img/sidebar-2.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?php echo base_url(); ?>/dashboard" class="simple-text logo-mini">
                <i class="mdi mdi-android mdi-36px"></i>
            </a>
            <a href="<?php echo base_url(); ?>/dashboard" class="simple-text logo-normal">
                APK SIGNER
            </a>
        </div>

        <ul class="nav">
            <?php if ($_SESSION['permission'] == 'admin') { ?>
                <li class="nav-item <?= uri_string() == 'apk' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo site_url('apk'); ?>">
                        <i class="mdi mdi-file-cog-outline mdi-24px"></i>
                        <p>
                            Sign APK File
                        </p>
                    </a>
                </li>
                <hr style="border: 0.50px solid #fff; opacity: 40%; width:90%;">
            <?php } ?>

            <?php if ($_SESSION['permission'] != 'admin') { ?>
                <li class="nav-item <?= uri_string() == 'downloads' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo site_url('downloads'); ?>">
                        <i class="mdi mdi-cellphone-arrow-down-variant mdi-24px"></i>
                        <p>Download APK</p>
                    </a>
                </li>
                <!--<li class="nav-item <?= uri_string() == 'subscription' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo site_url('subscription'); ?>">
                        <i class="mdi mdi-package-variant-closed mdi-24px"></i>
                        <p>My Subscriptions</p>
                    </a>
                </li>-->
                <hr style="border: 0.50px solid #fff; opacity: 40%; width:90%;">
            <?php } ?>
            <?php if ($_SESSION['permission'] == 'admin') { ?>
                <li class="nav-item <?= uri_string() == 'settings' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo site_url('settings'); ?>">
                        <i class="mdi mdi-cog-outline mdi-24px"></i>
                        <p>System Settings</p>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo site_url('login'); ?>/logout">
                    <i class="mdi mdi-location-exit mdi-24px"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>