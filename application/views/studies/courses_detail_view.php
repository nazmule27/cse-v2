<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Course Detail:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h4><?php echo $course_detail[0]->course_id;?></h4>
            <hr>
            <h4><?php echo $course_detail[0]->course_title;?></h4>
            <p><b><?php echo $course_detail[0]->credit;?></b> Credit Hour Course</p>
            <?php
            $cls="";
            if($course_detail[0]->course_level=='0'){
                $cls="display-none";
            }
            ?>
            <p class="<?php echo $cls;?>">Intended For Level <b><?php echo $course_detail[0]->course_level;?></b> Term  <b><?php echo $course_detail[0]->course_term;?></b> Students</p>
            <p><b>Prerequisite: </b><?php echo $course_detail[0]->pre_req;?></p>
            <p><?php echo $course_detail[0]->course_desc;?></p>
        </div>
    </div> <!--row end-->
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <?php
    $this->load->view('common/footer');
    ?>
