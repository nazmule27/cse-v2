<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container padding-top-120">
    <!--<div class="alert alert-success text-center hot-news">
        <div class="row">
            <div class="col-md-11"><marquee behavior="scroll" direction="left"><a href="<?/*=base_url();*/?>home/news_detail/123">PG Admission October 2018</a></marquee></div>
            <div class="col-md-1"><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>
        </div>
    </div>-->
    <div class="row">
        <div class="col-md-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?=base_url();?>assets/img/lab_class.jpg" alt="lab_class">
                    </div>
                    <div class="item">
                        <img src="<?=base_url();?>assets/img/ece_building2.jpg" alt="ece_building">
                    </div>
                    <div class="item">
                        <img src="<?=base_url();?>assets/img/welcom.jpg" alt="welcom">
                    </div>
                    <div class="item">
                        <img src="<?=base_url();?>assets/img/session.jpg" alt="session">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="slide-left-icon">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="slide-left-icon">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--<h2>About</h2>-->
            <p>&nbsp;</p>
            <p>
                The Department of Computer Science and Engineering (CSE) of <a href="http://buet.ac.bd" target="_blank">Bangladesh University of Engineering and Technology</a> (BUET) is the first department of its kind in Bangladesh. BUET offers Bachelors, Masters, and Ph.D. Degree in Computer Science and Engineering. The Education of CSE BUET is world class in both the Curricula and Research activity.<br>
                The best students from all over Bangladesh join this prestigious department. The highly competitive environment, world-class facilities, and the hard-working faculties nourish every student to be a prime of the field. Currently there are about 700 students studying in Undergraduate Program and about 40 students in Graduate Program.<br>
                To know more on CSE BUET, please navigate the <a class="" href="<?=base_url();?>general_info" role="button"> details &raquo;</a>.
            </p>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default news-panel">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#notice"><strong>CSE Notice</strong></a></li>
                    <li class=""><a href="#news"><strong>CSE News</strong></a></li>
                    <li class=""><a href="#event"><strong>CSE Events</strong></a></li>
                </ul>
                <div class="tab-content">
                    <div id="notice" class="tab-pane fade in active">
                        <div class="panel-body">
                            <?php for ($i = 0; $i < count($notice); ++$i) {?>
                                <p><a target="_blank" href="<?=base_url();?>common/files/<?php echo $notice[$i]->notice_file?>"> <i class="glyphicon glyphicon-pushpin"></i> <?php echo $notice[$i]->notice_head;?></a><?php echo '<i class="news-date"> ('.date("d-m-Y", strtotime($notice[$i]->notice_time)).') </i>'?></p>
                            <?php } ?>

                            <p>&nbsp;</p>
                            <p><a class="moodle-site-news" target="_blank" href="http://cse.buet.ac.bd/moodle/mod/forum/view.php?id=114">Moodle Site News</a></p>
                            <p><a class="all-news" target="_blank" href="<?=base_url();?>home/all_notice">All Notice</a></p>
                        </div>
                    </div>
                    <div id="news" class="tab-pane fade">
                        <div class="panel-body">
                            <?php for ($i = 0; $i < count($news); ++$i) {?>
                                <p><a target="_blank" href="<?=base_url();?>home/news_detail/<?php echo $news[$i]->news_id?>"> <i class="glyphicon glyphicon-pushpin"></i> <?php echo $news[$i]->news_heading;?></a><?php echo '<i class="news-date"> ('.$news[$i]->news_add_date.') </i>'?></p>
                                <?php } ?>

                            <p>&nbsp;</p>
                            <p><a class="moodle-site-news" target="_blank" href="http://cse.buet.ac.bd/moodle/mod/forum/view.php?id=114">Moodle Site News</a></p>
                            <p><a class="all-news" target="_blank" href="<?=base_url();?>home/all_news">All News</a></p>
                        </div>
                    </div>
                    <div id="event" class="tab-pane fade">
                        <div class="panel-body">
                            <?php  for ($i = 0; $i < count($events); ++$i) {?>
                                <p><a target="_blank" href="<?=base_url();?>home/news_detail/<?php echo $events[$i]->news_id?>"> <i class="glyphicon glyphicon-pushpin"></i> <?php echo $events[$i]->news_heading;?></a> <?php echo '<i class="news-date"> ('.$events[$i]->news_add_date.') </i>'?></p>
                             <?php } ?>
                            <p>&nbsp;</p>
                            <p><a class="all-news" target="_blank" href="<?=base_url();?>home/all_event">All Events</a></p>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function(){
                        $(".nav-tabs a").click(function(){
                            $(this).tab('show');
                        });
                    });

                </script>
            </div>
        </div>
    </div> <!--row end-->
<!-- /home -->
<?php
$this->load->view('common/footer');
?>
