<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Welcome Student!</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                The department website provides special facilities for students. Please contact website administrator to learn about gaining access to private student area.<br>
                Also, navigate through the following links to find desired informations<br>
            </p>
            <p><a href="<?=base_url();?>assets/docs/studies/newcourseoutline.doc">All Students Should Take Note of These Changes In Undergraduate Courses</a> </p>
            <p>
                &emsp;&raquo; <a href="<?=base_url();?>general_info/registration">Registration Information</a><br>
                &emsp;&raquo; <a href="<?=base_url();?>studies/ug_courses">Undergraduate Courses</a><br>
                &emsp;&raquo; <a href="<?=base_url();?>studies/pg_courses">Graduate Courses</a><br>
            </p>
            <p>
                &emsp;&raquo; <a href="http://buet.ac.bd/Home/DsW">Directorate of Student Welfare</a><br>
                &emsp;&raquo; <a href="http://buet.ac.bd/Home/StudentActDsw">Student Clubs &amp; Unions of BUET</a><br>
            </p>
            <p>
                &emsp;&raquo; <a href="<?=base_url();?>home/all_news">CSE BUET News</a><br>
                &emsp;&raquo; <a href="<?=base_url();?>activities/feature">Latest Features</a><br>
            </p>
            <p>
                &emsp;&raquo; <a href="<?=base_url();?>activities/progcontest">Programming Contest News</a><br>
                &emsp;&raquo; <a href="<?=base_url();?>home/all_event">Calendar Events</a><br>
            </p>

            <br><br>
            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
