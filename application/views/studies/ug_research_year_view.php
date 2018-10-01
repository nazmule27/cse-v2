<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Undergraduate Theses:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>By Year:</p>
            <?php for ($i = 0; $i < count($thesis); ++$i) {?>
                <p>&emsp;&raquo; <a href="<?=base_url();?>studies/ug_research_year_detail/<?php echo $thesis[$i]->thesis_year;?>"><?php echo $thesis[$i]->thesis_year;?></a><br></p>
                <?php } ?>
            <h4 class="header-bg">Thesis Year: <?php echo end($this->uri->segments);?></h4>
            <?php for ($i = 0; $i < count($thesis_detail); ++$i) {?>
            <p>
                <b><?php echo $thesis_detail[$i]->thesis_title;?></b> <a class="pull-right" href="<?=base_url();?>student/thesis_confirm_report/<?php echo $thesis_detail[$i]->thesis_id;?>">Confirmation Report</a> <br>
                Performed By: <?php echo $thesis_detail[$i]->thesis_students;?> <br>
                Advisor: <?php echo $thesis_detail[$i]->thesis_advisor;?>
            </p>
                <?php } ?>
            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
