<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Welcome Prospective Student:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>Welcome prospective student. We are happy to know that you are considering CSE as a possible department for your undergraduate/graduate education. Here we have provided links to some basic information that may interest you or guide you in making the correct decision regarding your choice of major.</p>
            <p>
                <img class="history-img" src="<?=base_url();?>assets/img/classphoto1.jpg" alt="">

                <a href="<?=base_url();?>general_info/whycse"> &raquo; Why CSE@BUET?</a><br>
                <a href="<?=base_url();?>researches/facilities_detail"> &raquo; Laboratories & Facilities</a><br>
                <br>
                <a href="<?=base_url();?>admission/undergraduate"> &raquo; Undergraduate Admission</a><br>
                <a href="<?=base_url();?>studies/ug_studies"> &raquo; Undergraduate Studies</a><br>
                <br>
                <a href="<?=base_url();?>admission/graduate"> &raquo; Graduate Admission</a><br>
                <a href="<?=base_url();?>studies/pg_studies"> &raquo; Graduate Studies</a><br>
            </p>

            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
