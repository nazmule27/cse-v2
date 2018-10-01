<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Programming Contest:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                The students of department of CSE have excellent record of performance in different national & international programming contests such as: NCPC (National Computer Programming Contest) & contests organized by other universities of Bangladesh. Our students also rank highly in contests held at websites, such as: <a href="https://topcoder.com">Topcoder</a>, <a href="acm.uva.es">Valladolid Online Contest</a>.
            </p>

            <h4>Recent Performances:</h4>
            <?php  for ($i = 0; $i < count($student_achv); ++$i) {?>
                <p><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $student_achv[$i]->std_achv_date;?>: <a href="<?=base_url();?>activities/progcontest_detail/<?php echo $student_achv[$i]->std_achv_id;?>"><?php echo $student_achv[$i]->std_achv_heading;?></a> </p>
                <p>
                    <?php echo strip_tags(substr($student_achv[$i]->std_achv_desc, 0, 350));
                    if (strlen($student_achv[$i]->std_achv_desc) > 350) {
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
