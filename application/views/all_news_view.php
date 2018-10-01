<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">CSE News:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php for ($i = 0; $i < count($news); ++$i) {?>
                <p><a target="_blank" href="<?=base_url();?>home/news_detail/<?php echo $news[$i]->news_id?>"> <i class="glyphicon glyphicon-pushpin"></i> <?php echo $news[$i]->news_heading;?></a><?php echo '<i class="news-date"> ('.$news[$i]->news_add_date.') </i>'?></p>
                <?php } ?>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
