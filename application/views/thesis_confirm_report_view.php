<?php
$this->load->view('common/header');
?>

<div class="container padding-top-120">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <center><h3>Confirmation of Thesis Submission</h3></center>
            <hr>
            <big>Thesis title:</big><br><?php echo $thesis_report[0]->thesis_title;?> <br><br>
            <big>Student No.s:</big> <br><?php echo $thesis_report[0]->thesis_students;?><br><br>
            <big>Supervisor Name:</big> <br><?php echo $thesis_report[0]->thesis_advisor;?><br><br>
            <big>Date of Upload:</big> <br><?php echo $thesis_report[0]->thesis_date;?><br>
            <br>
            <br>
            <br>
            <br>
            <span class="pull-right">-------------------------------</span><br>
            <span class="pull-right">Signature of Supervisor</span><br>
            <a href="https://cse.buet.ac.bd/thesis_add/thesis_file/<?php echo $thesis_report[0]->file_name;?>">Download thesis pdf here</a>
        </div>
    </div>
