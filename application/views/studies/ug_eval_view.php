<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Undergraduate Academic Evaluation:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>The total performance of a student in a given course is based on a scheme of continuous assessment. For theory courses this continuous assessment is made through a set of quizzes, class evaluation, class participation, homework assignment and a term final examination. The assessment in laboratory/sessional courses is made through observation of the student at work during the class, viva-voce during laboratory hours and quizzes.</p>
            <p>Each course has a certain number of credits, which describes its corresponding weights. A letter grade with a specified number of grade points is awarded for each course for which a student is registered. A student’s performance is measures both by the number of credits completed satisfactorily and by the weighted average of the grade point earned.</p>
            <p>Letter grades and corresponding grade points will be awarded in accordance to the provisions shown below.</p>
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
                    <td>A-</td>
                    <td>3.50</td>
                    <td>70% to below 75%</td>
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
                    <td>B-</td>
                    <td>2.75</td>
                    <td>55% to below 60%</td>
                </tr>
                <tr>
                    <td>C+</td>
                    <td>2.50</td>
                    <td>50% to below 55%</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>2.25</td>
                    <td>45% to below 50%</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>2.0</td>
                    <td>40% to below 45%</td>
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
                    <td>S</td>
                    <td>-</td>
                    <td>Satisfactory (non credit courses)</td>
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
            <h4>Distribution of Marks:</h4>
            <p>Thirty percent (30%) of marks of a theoretical course shall be allotted for continuous assessment, i.e. quizzes, home assignments, class evaluation and class performance. The rest of the marks will be allotted to the Term Final Examination that is conducted centrally by the university. There are internal and external examiners for each course in the Term Final Examination of three hours duration.</p>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Class Participation</td>
                    <td>10%</td>
                </tr>
                <tr>
                    <td>Homework assignment and quizzes</td>
                    <td>20%</td>
                </tr>
                <tr>
                    <td>Final Examination (3 hours)</td>
                    <td>70%</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>100%</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
