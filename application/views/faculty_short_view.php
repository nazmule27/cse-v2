<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Head of the Department</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="row padding-bottom-10">
                <div class="col-md-4">
                    <div class="faculty-small-block">
                        <img class="faculty-image" src="<?=base_url();?>assets/img/faculty/<?php echo $head[0]->fac_pic_url;?>" alt="faculty image">
                        <div class="faculty-info">
                            <p><b><a href="<?=base_url();?>faculty_list/detail/<?php echo $head[0]->fac_login?>"><?php echo $head[0]->fac_name;?></a></b></p>
                            <p><?php echo $head[0]->fac_desig;?></p>
                            <p><b>Email:</b> <?php echo $head[0]->fac_email;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="faculty-small-block">
                        <p><b>Education:</b></p>
                        <p>
                            <?php echo $head[0]->fac_education;?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="faculty-small-block">
                        <p><b>Research Interest:</b></p>
                        <p>
                            <?php echo $head[0]->fac_research_int;?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--row end-->
    <h3 class="header-bg">Professors:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($faculty_list_professor); ++$i) {?>
            <div class="row">
                <div class="col-md-4">
                    <div class="faculty-small-block">
                        <img class="faculty-image" src="<?=base_url();?>assets/img/faculty/<?php echo $faculty_list_professor[$i]->fac_pic_url;?>" alt="faculty image">
                        <div class="faculty-info">
                            <p><b><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_professor[$i]->fac_login?>"><?php echo $faculty_list_professor[$i]->fac_name;?></a></b></p>
                            <p><?php echo $faculty_list_professor[$i]->fac_desig;?></p>
                            <p><b>Email:</b> <?php echo $faculty_list_professor[$i]->fac_email;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="faculty-small-block">
                        <p><b>Education:</b></p>
                        <p>
                            <?php echo $faculty_list_professor[$i]->fac_education;?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="faculty-small-block">
                        <p><b>Research Interest:</b></p>
                        <p>
                            <?php echo $faculty_list_professor[$i]->fac_research_int;?>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <?php } ?>
        </div>
    </div> <!--row end-->
    <h3 class="header-bg">Associate Professor:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($faculty_list_ac_professor); ++$i) {?>
                <div class="row padding-bottom-10">
                    <div class="col-md-4">
                        <div class="faculty-small-block">
                            <img class="faculty-image" src="<?=base_url();?>assets/img/faculty/<?php echo $faculty_list_ac_professor[$i]->fac_pic_url;?>" alt="faculty image">
                            <div class="faculty-info">
                                <p><b><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_ac_professor[$i]->fac_login?>"><?php echo $faculty_list_ac_professor[$i]->fac_name;?></a></b></p>
                                <p><?php echo $faculty_list_ac_professor[$i]->fac_desig;?></p>
                                <p><b>Email:</b> <?php echo $faculty_list_ac_professor[$i]->fac_email;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="faculty-small-block">
                            <p><b>Education:</b></p>
                            <p>
                                <?php echo $faculty_list_ac_professor[$i]->fac_education;?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="faculty-small-block">
                            <p><b>Research Interest:</b></p>
                            <p>
                                <?php echo $faculty_list_ac_professor[$i]->fac_research_int;?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <?php } ?>
        </div>
    </div> <!--row end-->
    <h3 class="header-bg">Assistant Professors:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($faculty_list_as_professor); ++$i) {?>
                <div class="row padding-bottom-10">
                    <div class="col-md-4">
                        <div class="faculty-small-block">
                            <img class="faculty-image" src="<?=base_url();?>assets/img/faculty/<?php echo $faculty_list_as_professor[$i]->fac_pic_url;?>" alt="faculty image">
                            <div class="faculty-info">
                                <p><b><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_as_professor[$i]->fac_login?>"><?php echo $faculty_list_as_professor[$i]->fac_name;?></a></b></p>
                                <p><?php echo $faculty_list_as_professor[$i]->fac_desig;?></p>
                                <p><b>Email:</b> <?php echo $faculty_list_as_professor[$i]->fac_email;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="faculty-small-block">
                            <p><b>Education:</b></p>
                            <p>
                                <?php echo $faculty_list_as_professor[$i]->fac_education;?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="faculty-small-block">
                            <p><b>Research Interest:</b></p>
                            <p>
                                <?php echo $faculty_list_as_professor[$i]->fac_research_int;?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <?php } ?>
        </div>
    </div> <!--row end-->
    <h3 class="header-bg">Lecturer:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($faculty_list_lecturer); ++$i) {?>
                <div class="row padding-bottom-10">
                    <div class="col-md-4">
                        <div class="faculty-small-block">
                            <img class="faculty-image" src="<?=base_url();?>assets/img/faculty/<?php echo $faculty_list_lecturer[$i]->fac_pic_url;?>" alt="faculty image">
                            <div class="faculty-info">
                                <p><b><a href="<?=base_url();?>faculty_list/detail/<?php echo $faculty_list_lecturer[$i]->fac_login?>"><?php echo $faculty_list_lecturer[$i]->fac_name;?></a></b></p>
                                <p><?php echo $faculty_list_lecturer[$i]->fac_desig;?></p>
                                <p><b>Email:</b> <?php echo $faculty_list_lecturer[$i]->fac_email;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="faculty-small-block">
                            <p><b>Education:</b></p>
                            <p>
                                <?php echo $faculty_list_lecturer[$i]->fac_education;?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="faculty-small-block">
                            <p><b>Research Interest:</b></p>
                            <p>
                                <?php echo $faculty_list_lecturer[$i]->fac_research_int;?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <?php } ?>
        </div>
    </div> <!--row end-->
    <?php
    $this->load->view('common/footer');
    ?>
