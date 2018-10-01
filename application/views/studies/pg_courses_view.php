<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Graduate Courses:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Title</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($courses); ++$i) {?>
                    <tr>
                        <td><?php echo $courses[$i]->course_id;?></td>
                        <td><a href="<?=base_url();?>studies/course_detail/<?php echo $courses[$i]->course_id;?>"><?php echo $courses[$i]->course_title;?></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
