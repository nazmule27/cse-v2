<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> News Detail:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h4><?php echo $student_achv_detail[0]->std_achv_heading;?>:</h4>
            <p style="text-align: justify;">
                <?php
                if($student_achv_detail[0]->std_achv_pic) {
                    echo '<img style="float:left; width: 250px; padding: 4px 15px 10px 0;" src="'.base_url().'assets/img/news/student_achv/'.$student_achv_detail[0]->std_achv_pic.'" alt="image not available">';
                }
                echo $student_achv_detail[0]->std_achv_desc;
                ?>
            </p>
            <br><br><br>
            <p class="pull-right">Posted on: [<?php echo $student_achv_detail[0]->std_achv_date;?>]</p>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
