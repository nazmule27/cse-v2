<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Seminar:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                CSE BUET organizes seminars on different technical and social issues.
            </p>
            <h4>Seminar News:</h4>
            <?php for ($i = 0; $i < count($seminar); ++$i) {?>
                <p><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $seminar[$i]->std_achv_date;?>: <a href="<?=base_url();?>activities/progcontest_detail/<?php echo $seminar[$i]->std_achv_id;?>"><?php echo $seminar[$i]->std_achv_heading;?></a> </p>
                <p>
                    <?php echo strip_tags(substr($seminar[$i]->std_achv_desc, 0, 350));
                    if (strlen($seminar[$i]->std_achv_desc) > 350) {
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
