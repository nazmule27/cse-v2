<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120 faculty-text">
    <h3 class="header-bg">Active faculty list</h3>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h4>Professor:</h4>
            <?php $k=1; for ($i = 0; $i < count($faculty_list_professor); ++$i) {?>
                <p><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_professor[$i]->fac_login?>"><?php echo $k.'. '.$faculty_list_professor[$i]->fac_name.' ('.$faculty_list_professor[$i]->fac_bangla_name.')';?></a></p>
            <?php $k++;} ?>
        </div>
        <div class="col-md-6 col-sm-6">
            <h4>Associate Professor:</h4>
            <?php $k=1; for ($i = 0; $i < count($faculty_list_ac_professor); ++$i) {?>
                <p><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_ac_professor[$i]->fac_login?>"><?php echo $k.'. '.$faculty_list_ac_professor[$i]->fac_name.' ('.$faculty_list_ac_professor[$i]->fac_bangla_name.')';?></a></p>
                <?php $k++;} ?>
        </div>
    </div> <!--row end-->

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h4>Assistant Professor:</h4>
            <?php $k=1; for ($i = 0; $i < count($faculty_list_as_professor); ++$i) {?>
                <p><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_as_professor[$i]->fac_login?>"><?php echo $k.'. '.$faculty_list_as_professor[$i]->fac_name.' ('.$faculty_list_as_professor[$i]->fac_bangla_name.')';?></a></p>
            <?php $k++;} ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <h4>Lecturer:</h4>
            <?php $k=1; for ($i = 0; $i < count($faculty_list_lecturer); ++$i) {?>
                <p><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_lecturer[$i]->fac_login?>"><?php echo $k.'. '.$faculty_list_lecturer[$i]->fac_name.' ('.$faculty_list_lecturer[$i]->fac_bangla_name.')';?></a></p>
                <?php $k++;} ?>
        </div>
    </div> <!--row end-->
    <?php
    $this->load->view('common/footer');
    ?>
