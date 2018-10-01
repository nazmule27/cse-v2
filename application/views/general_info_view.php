<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">General Information:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                <img class="history-img" src="<?=base_url();?>assets/img/ece_building2.jpg" alt="">
                The Department of <b>Computer Science and Engineering</b> (CSE) of <a href="http://www.buet.ac.bd/">Bangladesh University of Engineering and Technology</a> (BUET) is the first department of its kind in Bangladesh. BUET offers <b>Bachelors</b>, <b>Masters</b>, and <b>Ph.D.</b> Degree in Computer Science and Engineering. The Education of CSE BUET is world class in both the Curricula and Research activity.
            </p>
            <p>The best students from all over Bangladesh join this prestigious department. The highly competitive environment, world-class facilities and the hard-working faculties nourish every student to be a prime of the field. Currently there are about 700 students studying in Undergraduate Program and about 40 students in Graduate Program.</p>
            <p>To know more on CSE BUET, please navigate through the links.</p>

            <a href="<?=base_url();?>general_info/mission"> &raquo; Mission and Vision</a><br>
            <a href="<?=base_url();?>general_info/history"> &raquo; History</a><br>
            <a href="<?=base_url();?>general_info/location"> &raquo; Location</a><br>
            <a href="<?=base_url();?>general_info/msghead"> &raquo; Message From Head</a><br>
            <a href="<?=base_url();?>general_info/whycse"> &raquo; Why CSE@BUET?</a><br>
            <a href="<?=base_url();?>researches/facilities_detail"> &raquo; Facilities</a><br>
            <br><br>
            <br><br>
            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
