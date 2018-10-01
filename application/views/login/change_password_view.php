<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container padding-top-120">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">Change password</h2>
            <br>
            <div class="account-wall">
                <div class="col-md-12 login_error"><?php echo $this->session->flashdata('flash_data'); ?></div>
                <form method="post" action="<?=base_url();?>login/change_password">
                    <div class="form-group col-md-12">
                        <input type="password" name="old_password" id="old_password" class="form-control" maxlength="20" placeholder="Type old password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" name="password" id="password" class="form-control" maxlength="20" placeholder="Type new password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" name="confirm_password" id="confirm_password"  class="form-control" maxlength="20" placeholder="Confirm new password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-default col-md-12 custom-text" value="Change Password">
                    </div>
                    <fieldset class="password-policy">
                        <legend class="password-legend">Password Policy:</legend>
                        Password length must be at least 8<br>
                        Password must include at least one number.<br>
                        Password must include at least one letter.<br>
                        Password must include at least one CAPS.<br>
                        Password must include at least one symbol.<br>
                    </fieldset>
                </form>
            </div>
        </div>
        <script>
            var password = document.getElementById("password")
                , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>
    </div>
    <?php
    $this->load->view('common/footer');
    ?>

