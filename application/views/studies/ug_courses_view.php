<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Undergraduate Courses:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table text-center">
                <thead>
                <tr>
                    <th class="text-center">Select Level-Term</th>
                    <th class="text-center">Select Level-Term</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/1/1">Level-1 Term-1</a></td>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/1/2">Level-1 Term-2</a></td>
                </tr>
                <tr>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/2/1">Level-2 Term-1</a></td>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/2/2">Level-2 Term-2</a></td>
                </tr>
                <tr>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/3/1">Level-3 Term-1</a></td>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/3/2">Level-3 Term-2</a></td>
                </tr>
                <tr>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/4/1">Level-4 Term-1</a></td>
                    <td><a href="<?=base_url();?>studies/ug_courses_level_term/4/2">Level-4 Term-2</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!--row end-->
    <hr>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Title</th>
                    <th>Level</th>
                    <th>Term</th>
                </tr>
                </thead>
                <tbody>
                <?php $k=1; for ($i = 0; $i < count($courses); ++$i) {?>
                    <tr>
                        <td><?php echo $courses[$i]->course_id;?></td>
                        <td><a href="<?=base_url();?>studies/course_detail/<?php echo $courses[$i]->course_id;?>"><?php echo $courses[$i]->course_title;?></a></td>
                        <td><?php echo $courses[$i]->course_level;?></td>
                        <td><?php echo $courses[$i]->course_term;?></td>
                    </tr>
                    <?php $k++;} ?>
                </tbody>
            </table>
        </div>

    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
