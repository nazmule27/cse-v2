<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">CSE Public Notices:</h3>
    <div class="row">

        <div class="col-md-12 col-sm-12">
            <div class="form-inline form-group filter-block">
                <label for="notice_cat">Select Notice Category:</label> <br>
                <?php
                $options=$notice_cat;
                $options = array('all' => 'All') + $options;
                echo form_dropdown('notice_cat', $options, '', 'class="form-control filter-block" onchange="showCat(this.value)"');
                ?>
            </div>
            <div id="txt_Notice">
            <?php for ($i = 0; $i < count($notice); ++$i) {?>
                <p><a target="_blank" href="<?=base_url();?>common/files/<?php echo $notice[$i]->notice_file?>"> <i class="glyphicon glyphicon-pushpin"></i> <?php echo $notice[$i]->notice_head;?></a><?php echo '<i class="news-date"> ('.date("d-m-Y", strtotime($notice[$i]->notice_time)).') </i>'?></p>
                <?php } ?>
            </div>
        </div>

        <script>
            function showCat(str) {
                str = str.replace('/', '-');
                str = str.replace('/', '-');
                if (str == "") {
                    document.getElementById("txt_Notice").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txt_Notice").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","<?=base_url();?>home/notice_ajax/"+str,true);
                    console.log(str);
                    xmlhttp.send();
                }
            }
        </script>
    </div> <!--row end-->
    <?php
    $this->load->view('common/footer');
    ?>
