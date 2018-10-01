<?php
$cse_role = $this->session->userdata('cse_role');
$cse_username = $this->session->userdata('cse_username');
?>
<div class="navbar navbar-inverse navbar-fixed-top margin-bottom-120" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Banner -->
        <div class="container header">
            <div class="row">
                <div class="col-md-6">
                    <a class="navbar-brand" href="<?=base_url();?>"><img src="<?=base_url();?>assets/img/logo.png" alt="logo">
                        <p class="cse">Department of Computer Science and Engineering</p>
                        <p class="buet">Bangladesh University of Engineering and Technology</p>
                    </a>
                </div>
                <div class="col-md-6">
                    <ul class="top-menu" role="group" >
                        <li><a class="btn btn-default btn-sm" target="_blank" href="https://cse.buet.ac.bd/logins.php">Login</a></li>
                        <li>&nbsp;</li>
                        <li><a target="_blank" href="https://cse.buet.ac.bd/feedback/login">Feedback</a></li>
                        <li style="color: #D0022E;">&diams;</li>
                        <li><a target="_blank" href="https://cse.buet.ac.bd/moodle">Moodle</a></li>
                        <li style="color: #D0022E;">&diams;</li>
                        <li><a target="_blank" href="http://lib.buet.ac.bd/home">Library</a></li>
                        <li style="color: #D0022E;">&diams;</li>
                        <li><a target="_blank" href="http://biis.buet.ac.bd/">BIIS</a></li>
                        <li style="color: #D0022E;">&diams;</li>
                        <li><a target="_blank" href="https://webmail.buet.ac.bd/">Web Mail</a></li>
                    </ul>
                    <div id="navbar" class="navbar-collapse collapse">
                        <!--<form class="navbar-form navbar-right" method="POST" action="https://cse.buet.ac.bd/common/login.php">
                            <div class="form-group">
                                <input type="text" name="user_text" placeholder="Username" class="input-sm form-control" required >
                            </div>
                            <div class="form-group">
                                <input name="pass_text" type="password" placeholder="Password" class="input-sm form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm ">Sign in</button>
                        </form>-->
                    </div><!--/.navbar-collapse -->
                </div>
            </div>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav full-width">
                <li><a class="padding-0" href="<?=base_url();?>"><img class="navbar-icon" src="<?=base_url();?>assets/img/logo.png" alt="logo"></a></li>
                <li><a href="<?=base_url();?>home">Home</a></li>
                <?php if($cse_role == FALSE){?>
                <li><a href="<?=base_url();?>admission"><!--<i class="glyphicon glyphicon-star-empty blink_me"></i>-->Admissions <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>admission">Admissions information</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>home/news_detail/122">Ph.D. Admission April 2018</a></li>
                        <li><a href="<?=base_url();?>home/news_detail/121">PG Admission October 2017</a></li>
                        <li><a href="<?=base_url();?>home/news_detail/119">PG Admission April 2017</a></li>

                    </ul>
                </li>
                <li><a href="<?=base_url();?>general_info">General Information <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>general_info/prosstd">Prospective Students</a></li>
                        <li><a href="<?=base_url();?>general_info/current_std">Current Students</a></li>
                        <li><a href="<?=base_url();?>studies/ug_studies">Undergraduate Studies</a></li>
                        <li><a href="<?=base_url();?>studies/pg_studies">Graduate Studies</a></li>
                        <li><a href="<?=base_url();?>general_info/poster">Undergraduate Thesis Posters</a></li>
                    </ul>
                </li>
                <li><a href="<?=base_url();?>researches" class="has-submenu">Research <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group">
                        <li><a href="<?=base_url();?>researches/publication">Publications</a></li>
                    </ul>
                </li>
                <li><a href="<?=base_url();?>activities">Activities <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>activities/indgov">Industry & Government</a></li>
                        <li><a href="<?=base_url();?>activities/feature">Features</a></li>
                        <li><a href="<?=base_url();?>activities/self_assessment">Self Assessment</a></li>
                        <li><a href="<?=base_url();?>activities/fulbright">Fulbright scholarship</a></li>
                        <li><a href="<?=base_url();?>home/all_event">Calendar Events</a></li>
                        <li><a href="<?=base_url();?>home/all_notice">Public Notices</a></li>

                    </ul>
                </li>
                <li><a href="javascript:void(0)">Student Section<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>downloads/class_routine">Class Routine</a></li>
                        <li><a href="http://cse.buet.ac.bd/moodle/">Moodle</a></li>
                        <li><a href="http://cse.buet.ac.bd/feedback/login">Feedback</a></li>
                        <li><a href="<?=base_url();?>student/student_notice">Student Notice</a></li>
                    </ul>
                </li>
                <li><a href="<?=base_url();?>faculty_list/home" class="has-submenu">Faculty <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>faculty_list/short_list">Active Faculty Short Detail</a></li>
                        <li><a href="<?=base_url();?>faculty_list">Active Faculty List</a></li>
                        <li><a href="<?=base_url();?>faculty_list/faculty_on_leave">Faculty List on Leave</a></li>
                        <li><a href="<?=base_url();?>faculty_list/faculty_served">Faculty who Served to CSE</a></li>
                    </ul>
                </li>
                <li><a href="<?=base_url();?>officer" class="has-submenu">Officers <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>officer/who_served">Officer who Served</a></li>
                        <li><a href="<?=base_url();?>officer/staff">Staff</a></li>
                    </ul>
                </li>
                <li><a href="#" class="has-submenu">Others <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>downloads">Downloadable Forms</a></li>
                        <li><a href="https://cse.buet.ac.bd/new/">PPC (new)</a></li>
                        <li><a href="https://cse.buet.ac.bd/iac/">IAC</a></li>
                        <li><a href="https://cse.buet.ac.bd/cnap/">Cisco Academy</a></li>
                        <li><a href="https://cse.buet.ac.bd/nsyss2018/">NSysS 2018</a></li>
                        <li><a href="https://cse.buet.ac.bd/walcom2018/">WALCOM 2018</a></li>
                    </ul>
                </li>
                <li><a href="<?=base_url();?>home/contact" class="has-submenu">Contact </a></li>
                <?php } ?>
                <!--End of public menu-->
                <?php if(($cse_role == 'Faculty')||($cse_role == 'Officer')||($cse_role == 'Staff')){?>
                <li><a href="javascript:(void)" class="has-submenu">Leave <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>leave">My Leave Application</a></li>
                        <li><a href="<?=base_url();?>leave/abroad_entry">Leave Abroad Entry</a></li>
                        <li><a href="<?=base_url();?>leave/abroad_entry_list">Leave Abroad Entry List</a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($cse_role == 'Officer'){?>

                <li><a href="<?=base_url();?>advance_bill" class="has-submenu">Bill Application <span class="caret"></span></a>
                    <?php if(($cse_username == 'azizahmed')||($cse_username == 'nazmul')){?>
                        <ul class="dropdown-menu" role="group" >
                            <li><a href="<?=base_url();?>advance_bill/view_all_bill">Confirm Applications</a></li>
                        </ul>
                    <?php } ?>
                </li>
                <li><a href="javascript:(void)" class="has-submenu">Committee <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>committee"> View My List</a></li>
                    </ul>
                </li>
                <li><a href="<?=base_url();?>thesis">Thesis Add</a></li>
                <li><a href="<?=base_url();?>booking">Booking</a></li>
                <?php } ?>

                <?php if(($cse_role == 'Admin')||($cse_role == 'Faculty')||($cse_role == 'Officer')||($cse_role == 'Staff')||($cse_role == 'Student')){?>
                <li class="pull-right m-full-width"><a href="javascript:(void)" class="has-submenu">Welcome: <?php echo $cse_username?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" >
                        <li><a href="<?=base_url();?>login/change_password">Change Password</a></li>
                        <li><a href="<?=base_url();?>login/security_question">Security Question</a></li>
                        <li><a href="<?=base_url();?>login/logout">Logout</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div>