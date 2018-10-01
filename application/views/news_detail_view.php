<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> News Detail:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h4><?php echo $news_detail[0]->news_heading;?>:</h4>
            <p style="text-align: justify;">
                <?php
                if($news_detail[0]->news_photo_url1) {
                    echo '<img style="float:left; width: 250px; padding: 4px 15px 10px 0;" src="'.base_url().'assets/img/news/'.$news_detail[0]->news_photo_url1.'" alt="image not available">';
                }
                echo $news_detail[0]->news_detail;
                ?>
            </p>
            <br><br><br>
            <p class="pull-right">Posted on: [<?php echo $news_detail[0]->news_add_date;?>]</p>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
