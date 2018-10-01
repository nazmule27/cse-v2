<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">My Committee/ Responsibility:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Starting Date</th>
                    <th>Members</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($my_list); ++$i) {?>
                <tr>
                    <td><a href="<?=base_url();?>committee/committee_detail/<?php echo $my_list[$i]->cid;?>"><?php echo $my_list[$i]->title;?></a> </td>
                    <td><?php echo $my_list[$i]->ctype;?></td>
                    <td><?php echo $my_list[$i]->sdate;?></td>
                    <td><?php
                        $members=explode(",", $my_list[$i]->members);
                        $k=1;
                        for ($j = 0; $j < count($members)-1; ++$j) {
                            echo $k.'. '.$this->Committee->full_name($members[$j]).'<br>';
                            $k++;
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
