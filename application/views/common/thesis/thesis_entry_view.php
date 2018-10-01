<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container padding-top-120">
    <h3 class="header-bg">Add Students' Thesis: </h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php echo $this->session->flashdata('flash_data'); ?>
            <form action="<?=base_url();?>thesis/save_thesis" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Type *:</label>
                            <select name="thesis_type" class="form-control" required>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Graduate">Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Submission Date*:</label>
                            <input type="text" name="thesis_date" id="thesis_date" pattern="\d{4}-\d{1,2}-\d{1,2}" class="form-control" placeholder="Submission date *" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Student(s) *:</label>
                            <input type="text" name="students"class="form-control" placeholder="Student(s) by comma separated *" required >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Supervisor *:</label>
                            <select name="supervisor" class="form-control" required>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Graduate">Graduate</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Title*:</label>
                            <textarea name="title" placeholder="Thesis title *" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Abstract*:</label>
                            <textarea name="abstract" placeholder="Thesis abstract *" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Submit</button>
            </form>
            <br><br>
            <br><br>
            <br><br>
        </div>
        <script src="<?=base_url();?>assets/js/datetimepicker/jquery.datetimepicker.js"></script>
        <script>
            $('#thesis_date').datetimepicker({
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
