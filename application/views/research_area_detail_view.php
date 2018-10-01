<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
$CI =& get_instance();
?>
<div class="container padding-top-120">
    <h3 class="header-bg">Research Detail:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h4><?php echo urldecode(strip_tags(end($this->uri->segments)));?></h4>
            <p>
                <?php if (isset($research_detail[0]->research_detail)) {
                    echo $research_detail[0]->research_detail;
                }
                else echo 'Detail not available.';
                 ?>
            </p>
            <p>
                <b>&raquo; Research Fields:</b> <br>
                    <?php for ($i = 0; $i < count($research_field); ++$i) {?>
                    &emsp;<a href="<?=base_url();?>researches/string/<?php echo $research_field[$i]->research_area;?>"><?php echo $research_field[$i]->research_area;?></a> <br>
                    <?php } ?>
            </p>
            <p>
                <b>&raquo; Research Groups:</b>
                <?php for ($i = 0; $i < count($research_detail); ++$i) {
                    if (isset($research_detail[$i]->research_group)) {
                        echo '<p style="padding-left: 14px;">'.$research_detail[$i]->research_group.'</p>';
                    }
                } ?>
            </p>
            <p>
                <b>&raquo; Related Faculties:</b> <br>
                <?php for ($i = 0; $i < count($research_faculty); ++$i) {?>
                    &emsp;<a href="<?=base_url();?>faculty_list/detail/<?php echo $research_faculty[$i]->fac_login;?>"><?php echo $research_faculty[$i]->fac_name;?></a> <br>
                <?php } ?>
            </p>
            <p>
                <b>&raquo; Related Links:</b> <br>
                    <?php if (isset($research_detail[0]->research_ext_link1)) {
                        echo '&emsp;<a href="'.$research_detail[0]->research_ext_link1.'">'.$research_detail[0]->research_ext_link1.'</a><br>';
                    }
                    ?>
                    <?php if (isset($research_detail[0]->research_ext_link2)) {
                        echo '&emsp;<a href="'.$research_detail[0]->research_ext_link2.'">'.$research_detail[0]->research_ext_link2.'</a><br>';
                    }
                    ?>
                    <?php if (isset($research_detail[0]->research_ext_link3)) {
                        echo '&emsp;<a href="'.$research_detail[0]->research_ext_link3.'">'.$research_detail[0]->research_ext_link3.'</a>';
                    }
                    ?>
            </p>
            <p>
                <b>&raquo; Recent Publications:</b> <br>
                <table class="table publication">
                    <tbody>
                    <?php $k=1; for ($i = 0; $i < count($research_pub); ++$i) {?>
                        <tr>
                            <th scope="row"><?php echo $k.'.';?></th>
                            <td> <?php echo $CI->authors($research_pub[$i]->pid). '<b>'.$research_pub[$i]->title.'</b>, <i>'.$research_pub[$i]->c_j_name.'</i>, '.$research_pub[$i]->vol.', '.$research_pub[$i]->page.', '.$research_pub[$i]->year;?>. <?php if ($research_pub[$i]->doi) echo '<a href="https://doi.org/'.$research_pub[$i]->doi.'"> [paper link]</a>';?></td>
                        </tr>
                        <?php $k++;} ?>
                    </tbody>
                </table>
            </p>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
