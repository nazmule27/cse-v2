<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Faculty </h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            The faculty is diverse in educational background, professional experience, and interests. Professors are fully committed to teaching, research and public service. A number of faculty also hold doctoral degrees in a variety of related fields, including Artificial Intelligence, Graph Theory, Systems, Database Management Systems, Multimedia etc. The faculty is enriched each year by new regular faculty appointees at both junior and senior levels. This infusion of new teaching and scholarly talents adds freshness and vitality to the CSE BUET.
            <br><br>
            To learn more about the faculty, navigate through the following links.<br>
            <a href="<?=base_url();?>faculty_list/detail/mostofa"> &raquo; Head of the department</a><br>
            <a href="<?=base_url();?>faculty_list/short_list">&raquo; Active faculty short detail</a><br>
            <a href="<?=base_url();?>faculty_list"> &raquo; Active faculty list</a><br>
            <a href="<?=base_url();?>faculty_list/faculty_on_leave">&raquo; Faculty on leave</a><br>
            <a href="<?=base_url();?>faculty_list/faculty_served">&raquo; Faculty who served CSE, BUET</a><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
