<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> List of Officers who Served this Department</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($officer); ++$i) {?>
            <div class="row">
                <div class="col-md-8">
                    <div class="faculty-small-block">
                        <img class="faculty-image" src="<?=base_url();?>assets/img/officer_staff/<?php echo $officer[$i]->per_pic_url;?>" alt="faculty image">
                        <div class="officer-info">
                            <p><b><?php echo $officer[$i]->per_name.' ('.$officer[$i]->per_bangla_name.')';?></b></p>
                            <p><?php echo $officer[$i]->per_desig;?></p>
                            <br>
                            <p><b>Email:</b> <?php echo $officer[$i]->per_email;?></p>
                            <p><b>Office Phone:</b> <?php echo $officer[$i]->per_tele_off;?></p>
                            <p><b>Mobile:</b> <?php echo $officer[$i]->per_tele_cell;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="faculty-small-block">
                        <p><b>Education:</b></p>
                        <p>
                            <?php echo $officer[$i]->per_education;?>
                        </p>
                    </div>
                </div>
            </div>
                <hr>
            <?php } ?>
        </div>
    </div> <!--row end-->
    <br><br>

    <?php
    $this->load->view('common/footer');
    ?>
