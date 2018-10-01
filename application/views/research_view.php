<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">CSE Research:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <img class="research-img" src="<?=base_url();?>assets/img/research.jpg" alt="">
            <p>CSE BUET provides the highest quality of research at the international level from Bangladesh. Faculties and Students of CSE BUET have strong research involvement. Government and private sectors prefer faculties of CSE BUET for the solutions to their technical and innovative operations.</p>
            <p>There are a large variety of research areas with active groups, industrial prospects and attractive facilities. A number of highly cited publications came from the areas like Graph Drawing, Artificial Intelligence, Network Management and many more. Details about the areas can be found at the Research Area page.</p>
            <p>The Department has already achieved reputation through its research activities. The research work undertaken by the teachers and students of this department in the last few years is diversified in nature. Undergraduate students of the department have already achieved extraordinary success in their research works through the publication of a number of papers in journals of international repute.</p>
        </div>

        <div class="col-md-12">
            <h4>Research Links:</h4>
            <p>To learn more about the research activities, navigate through the following links.</p>
            &emsp;&raquo; <a href="<?=base_url();?>researches/area">Research Areas</a> <br>
            &emsp;&raquo; <a href="<?=base_url();?>researches/facilities">Research Facilities</a><br>
            &emsp;&raquo; <a href="<?=base_url();?>researches/publication">Publications</a><br>
        </div>404
        <div class="col-md-12">
            <h2>CSE Research Update</h2>
            <?php for ($i = 0; $i < count($research_update); ++$i) {?>
            <p>&raquo; <a href="<?php echo $research_update[$i]->url;?>"><?php echo $research_update[$i]->updatetext;?></a> </p>
                <?php } ?>
        </div>
        <div class="col-md-12">
            <h4>Recent Research News:</h4>
            <?php $k=1; for ($i = 0; $i < count($research_news); ++$i) {?>
                <p><i class="glyphicon glyphicon-chevron-right"></i> <?php echo $research_news[$i]->news_add_date;?>: <a href="<?=base_url();?>home/news_detail/<?php echo $research_news[$i]->news_id;?>"><?php echo $research_news[$i]->news_heading;?></a> </p>
                <p>
                    <?php echo strip_tags(substr($research_news[$i]->news_detail, 0, 350));
                    if (strlen($research_news[$i]->news_detail) > 350) {
                        echo "....";
                    }
                    ?>
                </p><br>
                <?php $k++;} ?>
        </div>

    </div> <!--row end-->
    <?php
    $this->load->view('common/footer');
    ?>

 
