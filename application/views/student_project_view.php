<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Student Innovative Projects:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($student_proj); ++$i) {?>
                <p><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $student_proj[$i]->std_achv_date;?>: <a href="<?=base_url();?>activities/progcontest_detail/<?php echo $student_proj[$i]->std_achv_id;?>"><?php echo $student_proj[$i]->std_achv_heading;?></a> </p>
                <p>
                    <?php echo strip_tags(substr($student_proj[$i]->std_achv_desc, 0, 350));
                    if (strlen($student_proj[$i]->std_achv_desc) > 350) {
                        echo "...";
                    }
                    ?>
                </p>
                <br>
             <?php } ?>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
