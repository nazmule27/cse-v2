<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> Committee/ Responsibility Detail:</h3>
    <div class="row">
        <?php echo $this->session->flashdata('flash_data'); ?>
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
                    <tr>
                        <td><?php echo $committee[0]->title;?></td>
                        <td><?php echo $committee[0]->ctype;?></td>
                        <td><?php echo $committee[0]->sdate;?></td>
                        <td><?php
                            $members=explode(",", $committee[0]->members);
                            $k=1;
                            for ($j = 0; $j < count($members)-1; ++$j) {
                                echo $k.'. '.$this->Committee->full_name($members[$j]).'<br>';
                                $k++;
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>Status of the work: <?php if($committee[0]->iscomplete=='0') {echo 'Not Compete';} else 'Completed'?>; Completion Date: <?php echo $committee[0]->completedate;?>; <a href="<?=base_url();?>committee/committee_pdf/<?php echo $committee[0]->cid;?>">Download Committee PDF</a> </p>
        </div>
    </div> <!--row end-->
    <?php
    $cls='';
        if($committee[0]->iscomplete=='1') {
            $cls='display-none';
        }
    ?>
    <h3 class="<?php echo $cls; ?>">Mark as complete:</h3>
    <div class="row <?php echo $cls; ?>">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="<?=base_url();?>committee/as_complete/<?php echo $committee[0]->cid; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Complete Date*:</label>
                            <input type="text" name="complete_date" id="complete_date" pattern="\d{4}-\d{1,2}-\d{1,2}" class="form-control" placeholder="Submission date *" required >
                        </div>
                        <div class="form-group">
                            <label>Attachment (if any) [pdf, doc, docx, jpg]:</label>
                            <input type="file" name="attachment">
                            <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Report (if any):</label>
                            <textarea name="report" placeholder="Report (if any)" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Complete</button>
            </form>
            <br><br>
            <br><br>
            <br><br>
        </div>
        <script src="<?=base_url();?>assets/js/datetimepicker/jquery.datetimepicker.js"></script>
        <script>
            $('#complete_date').datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                dayOfWeekStart : 6,
                lang:'en',
                maxDate: new Date(),
                step:10,
                closeOnDateSelect:true,
            });
        </script>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
