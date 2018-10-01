<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Extra-curricular Activities:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                CSE BUET is always involved in some diverse extra-curricular activities.<br>
                &raquo; CSE Day: CSE BUET arranges a two or three days long festival that includes software fair, Job fair, Talk shows, musical nights, gaming contests etc.<br>
                &raquo; Sports: CSE is one of the mightiest team in different sports competition of BUET. CSE became champion in the inter-department twenty-twenty cricket tournament last year.<br>
                &raquo; Humanitarian: CSE arranges flood relief collection program, Blood Donation Program, medical fund raising programs. Students of CSE are whole-heartedly beside the people of Bangladesh.<br>
            </p>

            <h4>What Is Going On:</h4>
            <?php for ($i = 0; $i < count($extracurricular); ++$i) {?>
                <p><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $extracurricular[$i]->std_achv_date;?>: <a href="<?=base_url();?>activities/progcontest_detail/<?php echo $extracurricular[$i]->std_achv_id;?>"><?php echo $extracurricular[$i]->std_achv_heading;?></a> </p>
                <p>
                    <?php echo strip_tags(substr($extracurricular[$i]->std_achv_desc, 0, 350));
                    if (strlen($extracurricular[$i]->std_achv_desc) > 350) {
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
