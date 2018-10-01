<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index() {
        if($_POST) {
            $username = mysql_escape_string($this->input->post('username'));
            $password = mysql_escape_string($this->input->post('password'));

            //$this->load->library('Radius');
            //$ip_radius_server="172.16.101.11";
            //$shared_secret="testing123*cse";
            //$radius = new Radius($ip_radius_server, $shared_secret);
            //$resultRadius = $radius->AccessRequest($username, $password);
            //if(!empty($resultRadius)) {
                $result = $this->Login_model->data_user($_POST);
                if(isset($result)){
                    $data = [
                        'cse_username' => $result->user_name,
                        'cse_role' => $result->user_desc,
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                }
                else{
                    $this->session->set_flashdata('login_fail', 'This username is not registered in this system,<br> Please contact to admin!');
                    redirect('login');
                }
            /*} else {
                $this->session->set_flashdata('login_fail', 'Username or password is wrong!');
                redirect('login');
            }*/
        }
        $this->load->view('login/home_view');
    }
    public function logout() {
        $data = ['cse_role', 'cse_username'];
        $this->session->unset_userdata($data);
        redirect('login');
    }
    public function forgot() {
        if ($_POST) {
            $result = $this->Login_model->validate_user($_POST);
            if (isset($result)) {
                $to_email=$result->e;
                $username = $result->u;
                if($to_email!="") {
                    $to_email = explode (",", $to_email);
                    $to_email=$to_email[0];
                    $key=$this->Login_model->randomString();
                    $this->Login_model->insert_reset_link($username, $key);
                    $email_sub="Request of password reset, CSE, BUET";
                    $message="Dear User,<br> We have received a request for reset your password from CSE, BUET website. If you did not request it,  please ignore this mail and report to info@cse.buet.ac.bd. \n\n To reset your password please follow the following link.\n ".base_url()."login/reset_form/".$key."<br> This link is valid for 24 hours. \n To use 'forgot password' feature you need to set a security question by login in CSE, website. \n The request was submitted from: ".$this->Login_model->get_ip();
                    $response=$this->Login_model->emailSend($to_email, $email_sub, $message);
                    if ($response!="") {
                        redirect('login/forgot');
                    }
                    else {
                        $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Password reset link sent to your email! Please check your mail (If not found, also check in spam or junk).</div>');
                        redirect('login/forgot');
                    }
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Error 101: User not found! $username. Please contact with administrator with this error message <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>');
                    redirect('login/forgot');
                }
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">User not found! Contact to administrator <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>');
                redirect('login/forgot');
            }
        }
        $this->load->view("login/forgot_view");
    }
    public function reset_form($key) {
        $data['key']=$key;
        $this->load->view("login/reset_view",$data);
    }
    public function reset_password($key) {
        $result = $this->Login_model->checkKey($key);
        if(isset($result)) {
            $user_name = $result->user_name;
            $password = $this->input->post('password');
            $err = $this->checkPassword($password);
            if ($err == "") {
                $raderr = $this->Login_model->changeRadPass($user_name, $password);
                if ($raderr=="") {
                    $this->Login_model->updateTable($key);
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Password changed successfully. Go to <a href="'.base_url().'/login">login</a></div>');
                    redirect('login/reset_form/'.$key);
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Update Error.<br>' . $raderr . '</div>');
                    redirect('login/reset_form/'.$key);
                }
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">'.$err.'</div>');
                redirect('login/reset_form/'.$key);
            }
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Invalid url! Contact to administrator <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>');
            redirect('login/reset_form/'.$key);
        }
    }
    public function security_question() {
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
        $username = $this->session->userdata('cse_username');
        if($_POST) {
            $question = $this->input->post('question');
            $answer = $this->input->post('answer');
            $checkExist=$this->Login_model->getQuestionInfo($username);
            if(empty($checkExist)){
                $inerr=$this->Login_model->insertAnser($question, $answer, $username);
                if ($inerr=="") {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Your Question answer added successfully.</div>');
                    redirect('login/security_question');
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Insert Error.<br>' . $inerr . '</div>');
                    redirect('login/security_question');
                }
            }
            else {
                $uperr=$this->Login_model->updateAnser($question, $answer, $username);
                if ($uperr=="") {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Your Question answer updated successfully.</div>');
                    redirect('login/security_question');
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Update Error.<br>' . $uperr . '</div>');
                    redirect('login/security_question');
                }
            }

        }
        $data['question'] =$this->Login_model->getQuestionInfo($username);
        $data['questions'] = $this->Login_model->getQuestions();
        $this->load->view("login/security_question_view", $data);
    }
    public function change_password() {
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
        $username = $this->session->userdata('cse_username');
        if($_POST) {
            $old_password = $this->input->post('old_password');
            $password = $this->input->post('password');
            $checkOldMatchUpdate=$this->Login_model->checkOldMatchUpdate($username, $old_password, $password);
            if($checkOldMatchUpdate==''){
                $err = $this->checkPassword($password);
                if ($err == "") {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Your password updated successfully.</div>');
                    redirect('login/change_password');
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">'.$err.'</div>');
                    redirect('login/change_password');
                }
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Update Error.<br>' . $checkOldMatchUpdate . '</div>');
                redirect('login/change_password');
            }

        }
        $this->load->view("login/change_password_view");
    }
    function checkPassword($pwd) {
        $error="";
        if (strlen($pwd) < 8) {
            $error .= "Password too short! <br>";
        }
        if( !preg_match("#[0-9]+#", $pwd) ) {
            $error .= "Password must include at least one number! <br>";
        }
        if( !preg_match("#[a-z]+#", $pwd) ) {
            $error .= "Password must include at least one letter! <br>";
        }
        if( !preg_match("#[A-Z]+#", $pwd) ) {
            $error .= "Password must include at least one CAPS! <br>";
        }

        if( !preg_match("#\W+#", $pwd) ) {
            if (strpos($pwd,'_')==false)
                $error .= "Password must include at least one symbol!<br>";
        }
        return $error;
    }
}
?>