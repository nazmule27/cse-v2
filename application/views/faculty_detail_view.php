<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">

    <div class="row">
        <div class="col-md-4 col-sm-4 faculty-detail-left">
            <p class="full-width"><img class="faculty-image-large" src="<?=base_url();?>assets/img/faculty/<?php echo $faculty_detail[0]->fac_pic_url;?>" alt="faculty image"></p><br>
            <p>
                <b>Contact: </b><br>
                <?php echo $faculty_detail[0]->fac_home_addr;?>
            </p>
            <p>
                <b>Email: </b><br>
                <?php echo $faculty_detail[0]->fac_email;?>
            </p>
            <p>
                <b>Telephone: </b><br>
                <?php echo 'Office: '.$faculty_detail[0]->fac_tele_off;?><br>
                <?php echo 'Cell: '.$faculty_detail[0]->fac_tele_cell;?><br>
                <?php echo 'Residence: '.$faculty_detail[0]->fac_tele_res;?>
            </p>
            <p>
                <b>Web page: </b><br>
                <a href="<?php echo $faculty_detail[0]->fac_web;?>"><?php echo $faculty_detail[0]->fac_web;?></a>
            </p>
        </div>
        <div class="col-md-8 col-sm-8">
            <h4 class="margin-0"><b><?php echo $faculty_detail[0]->fac_name.' ('.$faculty_detail[0]->fac_bangla_name.')';?> </b><br></h4>
            <?php echo $faculty_detail[0]->fac_desig;?><br>

            <h5 class="margin-top-10"><b>Research Area: </b><br></h5>
            <?php if($faculty_research_area) echo '<a href="'.base_url().'researches/string/'.$faculty_research_area[0]->research_area.'">'.$faculty_research_area[0]->research_area.'</a>';?><br>

            <h5 class="margin-top-10"><b>Research Interest: </b><br></h5>
            <?php echo $faculty_detail[0]->fac_research_int;?><br>

            <h5 class="margin-top-10"><b>Academic Background: </b><br></h5>
            <?php echo $faculty_detail[0]->fac_education;?><br>

            <h5 class="margin-top-10"><b>Journal Papers: </b></h5><br>
            <table class="table publication">
                <tbody>
                <?php $k=1; for ($i = 0; $i < count($faculty_journal_pub); ++$i) {?>
                <tr>
                    <th scope="row"><?php echo $k.'.';?></th>
                    <td> <?php echo $faculty_journal_pub[$i]->authors.', <b>'.$faculty_journal_pub[$i]->title.'</b>, <i>'.$faculty_journal_pub[$i]->c_j_name.'</i>, '.$faculty_journal_pub[$i]->vol.', '.$faculty_journal_pub[$i]->page.', '.$faculty_journal_pub[$i]->year;?>. <?php if ($faculty_journal_pub[$i]->doi) echo '<a href="https://doi.org/'.$faculty_journal_pub[$i]->doi.'"> [paper link]</a>';?></td>
                </tr>
                    <?php $k++;} ?>
                </tbody>
            </table>
            <h5 class="margin-top-10"><b>Conference Papers: </b></h5><br>
            <table class="table publication">
                <tbody>
                <?php $k=1; for ($i = 0; $i < count($faculty_conference_pub); ++$i) {?>
                    <tr>
                        <th scope="row"><?php echo $k.'.';?></th>
                        <td> <?php echo $faculty_conference_pub[$i]->authors.', <b>'.$faculty_conference_pub[$i]->title.'</b>, <i>'.$faculty_conference_pub[$i]->c_j_name.'</i>, '.$faculty_conference_pub[$i]->vol.', '.$faculty_conference_pub[$i]->page.', '.$faculty_conference_pub[$i]->year;?>. <?php if ($faculty_conference_pub[$i]->doi) echo '<a href="https://doi.org/'.$faculty_conference_pub[$i]->doi.'"> [paper link]</a>';?></td>
                    </tr>
                    <?php $k++;} ?>
                </tbody>
            </table>

            <h5 class="margin-top-10"><b>Selected Publications: </b></h5><br>
            <?php echo $faculty_detail[0]->fac_publications;?><br>

        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
