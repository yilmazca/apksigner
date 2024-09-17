<footer class="footer">
    <div class="container">
        <nav>
            <ul class="footer-menu">
                <li>
                    <a href="#">
                        APK Signer Page
                    </a>
                </li>
                <li>
                    <a href="#">
                        Signed APKs
                    </a>
                </li>
                <li>
                    <a href="#">
                        Clients
                    </a>
                </li>
            </ul>
            <p class="copyright text-center">
                © Copyright 2023 All Rights Reserved - <a href="https://yilmazca.com" target="_blank">Author Blog</a> -
                <a href="<?php echo site_url('login/logout'); ?>" class="text-secondary">Logout</a>
            </p>
        </nav>
    </div>
</footer>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector Map  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url(); ?>/assets/js/plugins/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--  DatetimePicker   -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet Alert  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrap Table Plugin -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<script src="<?php echo base_url(); ?>/assets/js/plugins/fullcalendar.min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/plugins/dropify.js"></script>

<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>

<script>
    var baseURL = '<?php echo base_url(); ?>';
</script>

<?php if (isset($js)) { ?>
    <script src="<?php echo base_url(); ?>/assets/js/<?php echo $js; ?>"></script>
<?php } ?>
<?php if (isset($hatalar)) { ?>
    <script>
        $().ready(function() {
            ibo.showSwal('hatalar');
        });
    </script>
<?php } ?>
<?php if (isset($islembasarili)) { ?>
    <script>
        $().ready(function() {
            ibo.showSwal('islembasarili');
        });
    </script>
<?php } ?>

</html>