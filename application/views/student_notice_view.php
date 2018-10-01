<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> Student Notice</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table table-border-none">
                <thead>
                <tr>
                    <th>Posted on</th>
                    <th>Notice Title</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($student_notice); ++$i) {?>
                <tr>
                    <td><?php echo $student_notice[$i]->notice_date;?></td>
                    <td><?php echo $student_notice[$i]->notice_head;?></td>
                    <td><a href="<?=base_url();?>common/file/<?php echo $student_notice[$i]->notice_file;?>">Download</a> </td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
