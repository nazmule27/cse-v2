<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Admissions:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>The admission process for prospective undergraduate and graduate students are not directly managed by the department authority. Hence we <b>strongly recommend</b> that you consult the <a href="http://buet.ac.bd">Official BUET Website</a> for information regarding admission procedures and related announcements.</p>
            <p>However, we do provide a <b>brief summary</b> of the admission process on this website for the benefit of our valued visitors. Select your <b>desired level of education</b> from the menu for more details.</p>
            <p>
                &emsp;&raquo; <a href="<?=base_url();?>admission/undergraduate">Undergraduate Admission</a><br>
                &emsp;&raquo; <a href="<?=base_url();?>admission/graduate">Graduate Admission</a><br>
            </p>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
