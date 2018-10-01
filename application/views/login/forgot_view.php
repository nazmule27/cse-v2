<?php
$this->load->view('common/header');
?>

<div class="container padding-top-120">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">Forgot password</h2>
            <br>
            <div class="account-wall">
                <div class="col-md-12 login_error"><?php echo $this->session->flashdata('flash_data'); ?></div>
                <form method="post" action="<?=base_url();?>login/forgot">
                    <div class="form-group col-md-12">
                        <input type="text" name="username" class="form-control" maxlength="20" placeholder="Your username *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-default col-md-12 custom-text" value="Submit Request">
                    </div>
                </form>
            </div>
        </div>
    </div>


