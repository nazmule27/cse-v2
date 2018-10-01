<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Graduate Academic Evaluation:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Grade</th>
                    <th>Grade Points</th>
                    <th>Numerical Markings</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>A+</td>
                    <td>4.0</td>
                    <td>80% and above</td>
                </tr>
                <tr>
                    <td>A</td>
                    <td>3.75</td>
                    <td>75% to below 80%</td>
                </tr>
                <tr>
                    <td>B+</td>
                    <td>3.25</td>
                    <td>65% to below 70%</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>3.0</td>
                    <td>60% to below 65%</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>2.25</td>
                    <td>45% to below 50%</td>
                </tr>
                <tr>
                    <td>F</td>
                    <td>0.00</td>
                    <td>Below 40%</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>-</td>
                    <td>Incomplete</td>
                </tr>
                <tr>
                    <td>X</td>
                    <td>-</td>
                    <td>Continuation (For project and thesis/design courses)</td>
                </tr>
                <tr>
                    <td>U</td>
                    <td>-</td>
                    <td>Unsatisfactory (non credit courses)</td>
                </tr>
                <tr>
                    <td>W</td>
                    <td>-</td>
                    <td>Withdrawal</td>
                </tr>
                </tbody>
            </table>
            <h4>Notes:</h4>
            <p>
                &raquo; Courses in which the student gets F grades shall not be counted towards credit hour requirements and for the calculation of GPA<br>
                &raquo; Grade I is given only when a student is unable to sit for the examination of a course at the end of the semester because of situations beyond his control. He must apply to the Head within one week after the examination to get an I grade.<br>
                &raquo; Student may enroll for noncredit courses termed as audit courses on recommendation of his thesis/project supervisor and Head of the department. However his grade for such courses will not be counted for his GPA.<br>
                &raquo; Satisfactory and Unsatisfactory- used only as final grades for thesis/project and noncredit courses. Grade for thesis/project “In Progress” shall be so recorded. If, however, thesis/project is discontinued an I grade shall be recorded.<br>
                &raquo; A student may withdraw from a course within two working weeks of the commencement of the semester or else his grade in that course shall be recorded as F unless he is eligible to get a grade of I. A student may be permitted to withdraw and change his course within the specified period with the approval of his adviser.<br>
                &raquo; Numerical markings may be made in the answer scripts, tests, etc. but all final grading to be reported to the controller of Examination shall be in the letter grade system.<br>
            </p>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
