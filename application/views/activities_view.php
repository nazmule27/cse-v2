<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> Activities:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>Students and Faculties of CSE BUET are constantly accomplishing prospective and technical activities all through the year. Extra-curricular (Sports, Cultural, Humanitarian) and co-curricular activities (Programming Contests, Student Projects) are regular news event of CSE BUET. Students of CSE BUET showed enough success in organizing and performing in these actions.</p>
            <p>To learn more about the activities, navigate through the following links.</p>

            <a href="<?=base_url();?>activities/buetacm"> &raquo; BUET &commat; ACM ICPC</a><br>
            <a href="<?=base_url();?>activities/progcontest"> &raquo; Programming Contest</a><br>
            <a href="http://cse.buet.ac.bd/bsadd/"> &raquo; BUET System Analysis, Design and Development community</a><br>
            <a href="<?=base_url();?>activities/student_proj"> &raquo; Student Projects</a><br>
            <a href="<?=base_url();?>activities/student_research"> &raquo; Student Research</a><br>
            <a href="<?=base_url();?>activities/extracurricular"> &raquo; Extracurricular</a><br>
            <a href="<?=base_url();?>activities/seminar"> &raquo; Seminar</a><br>

            <h4>Recent Activities:</h4>
            <?php for ($i = 0; $i < count($activities); ++$i) {?>
                <p><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $activities[$i]->news_add_date;?>: <a href="<?=base_url();?>home/news_detail/<?php echo $activities[$i]->news_id;?>"><?php echo $activities[$i]->news_heading;?></a> </p>
                <p>
                    <?php echo strip_tags(substr($activities[$i]->news_detail, 0, 350));
                    if (strlen($activities[$i]->news_detail) > 350) {
                        echo "....";
                    }
                    ?>
                </p><br>
             <?php } ?>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
