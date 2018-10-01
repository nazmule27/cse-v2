<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container padding-top-120">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">Security Question</h2>
            <br>
            <p>Please set your security question here. The answer of your question will be asked, if you forget your password.</p>
            <div class="account-wall">
                <?php echo $this->session->flashdata('flash_data'); ?>
                <form method="post" action="<?=base_url();?>login/security_question">
                    <div class="form-group">
                        <?php
                        $options=$questions;
                        $my_question='';
                        if(isset($question[0]->answer)) {
                            $my_question = $question[0]->question;
                        }
                        echo form_dropdown('question', $options, $selected=$my_question, 'class="form-control" required');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="answer" class="form-control" maxlength="255" value="<?php if(isset($question[0]->answer)) echo $question[0]->answer; ?>" placeholder="Answer *" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default col-md-12 custom-text" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <?php
    $this->load->view('common/footer');
    ?>

