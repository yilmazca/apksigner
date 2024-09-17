<?php echo view('header'); ?>

<body>
    <div class="wrapper wrapper-full-page">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
            <div class="container">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">APK Signer System</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="full-page  section-image" data-color="black" data-image="<?php echo base_url(); ?>/assets/img/full-screen-image-4.jpg" ;>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <form name="registerForm" id="registerForm" action="<?php echo site_url('signup/register'); ?>" method="post">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Register Form</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group has-label">
                                        <label>
                                            Email Address
                                            <star class="star">*</star>
                                        </label>
                                        <input class="form-control" name="email" type="email" required="true" required>
                                    </div>
                                    <div class="form-group has-label">
                                        <label>
                                            Password
                                            <star class="star">*</star>
                                        </label>
                                        <input class="form-control" name="password" id="registerPassword" type="password" required="true">
                                    </div>
                                    <div class="form-group has-label">
                                        <label>
                                            Confirm Password
                                            <star class="star">*</star>
                                        </label>
                                        <input class="form-control" name="password_confirmation" id="registerPasswordConfirmation" type="password" required="true" equalto="#registerPassword">
                                    </div>
                                    <div class="form-text confirm-message"></div>
                                    <div>
                                        <?php if (session()->getFlashdata('errorMessage') !== NULL) : ?>
                                            <div class="alert alert-danger">
                                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                                <span><?php echo session()->getFlashdata('errorMessage'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <hr>
                                    <div class="g-recaptcha" data-sitekey="6LfoRcomAAAAAB0QFDoMUTDwS0vvNfRUtK8VeYMw"></div>
                                </div>
                                <div class="card-footer d-flex">
                                    <div class="card-footer ml-auto mr-auto">
                                        <a href="<?php echo site_url('/login'); ?>">Back to Login</a>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-success btn-wd">Register</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <ul class="footer-menu">
                        <li>
                            <a href="https://yilmazca.com/" target="_blank">
                                Author Blog
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-center">
                        © Copyright 2023 All Rights Reserverd
                    </p>
                </nav>
            </div>
        </footer>
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
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>
<script>
    var submit = false;

    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

    //Check passwords
    $('#registerPassword, #registerPasswordConfirmation').on('keyup', function() {

        $('.confirm-message').removeClass('success-message').removeClass('error-message');

        let password = $('#registerPassword').val();
        let confirm_password = $('#registerPasswordConfirmation').val();

        if (password === "") {
            $('.confirm-message').text("Password Field cannot be empty").addClass('error-message');
            submit = false;
        } else if (confirm_password === "") {
            $('.confirm-message').text("Confirm Password Field cannot be empty").addClass('error-message');
            submit = false;
        } else if (confirm_password === password) {
            $('.confirm-message').text('Password Match!').addClass('success-message');
            submit = true;
        } else {
            $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
            submit = false;
        }

    });

    $('body').on("submit", "#registerForm", function(e) {

        if (submit === false) {
            e.preventDefault();
        }

    });
</script>

</html>