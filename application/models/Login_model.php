<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function data_user($data) {
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where('user_name', mysql_escape_string($data['username']));
        $query = $this->db->get();
        return $result = $query->row();
    }
    public function validate_user($data) {
        $this->db->where('u', $data['username']);
        return $this->db->get('all_name_email')->row();
    }
    public function insert_reset_link($username, $key) {
        $this->user_name = $username;
        $this->skey     = $key;
        $this->fdate    = date('Y-m-d H:i:s');
        $this->tdate    = date('Y-m-d H:i:s', time() + 86400);
        $this->status   = 0;
        $this->db->insert('user_passrest', $this);
    }
    public function checkKey($key) {
        $this->db->select("*");
        $this->db->from("user_passrest");
        $this->db->where('skey', $key);
        $this->db->where('status', 0);
        $this->db->where('`tdate`>now()');
        $query = $this->db->get();
        return $result = $query->row();
    }
    public function updateTable($key) {
        $this->db->set('status', 1);
        $this->db->where('skey', $key);
        $this->db->update('user_passrest');
    }
    public function changeRadPass($user,$val) {
        $raderr="";
        $conX=mysqli_connect("172.16.101.11","radchange","eKKYRNEEcGcXRJCW","radius");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql="update radcheck set value=MD5('$val') where username='$user'";
        if (mysqli_query($conX, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conX);
        }
        mysqli_close($conX);
        return $raderr;
    }
    public function checkOldMatchUpdate($username, $old_password, $password) {
        $err="";
        $conX=mysqli_connect("172.16.101.11","radchange","eKKYRNEEcGcXRJCW","radius");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql="update radcheck set value=MD5('$password') where username='$username' and value=MD5('$old_password')";
        if (mysqli_query($conX, $sql)) {
            if (mysqli_affected_rows($conX)!=1)
            {
                $err="There is an error, please contact with system administrator.<br>";
            }
        } else {
            echo "Error updating record: " . mysqli_error($conX);
        }
        mysqli_close($conX);
        return $err;
    }
    public function emailSend($to_email, $email_sub, $message){
        $name = 'Department of CSE, BUET';
        $from_email = 'info@cse.buet.ac.bd';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://webmail.buet.ac.bd';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'info@cse.buet.ac.bd';
        $config['smtp_pass'] = 'infO>CsE1@buet';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->from($from_email, $name);
        $this->email->to($to_email);
        $this->email->subject($email_sub);
        $this->email->message($message);
        if ($this->email->send()) {
            //echo $this->email->print_debugger();
            //exit;
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Email sent fail. Please contact with administrator with this error message.</div>');
            return "Error";
        }
    }
    public function randomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    public function get_ip() {
        if (function_exists( 'apache_request_headers' )) {
            $headers = apache_request_headers();
        } else {
            $headers = $_SERVER;
        }
        $the_ip = $headers['X-Forwarded-For'];
        $the_ip =  $the_ip. " ". $headers['HTTP_X_FORWARDED_FOR'];
        $the_ip = $the_ip. " ". filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        return $the_ip;
    }
    public function getQuestions() {
        $this->db->distinct("question");
        $this->db->from("user_securityquestion");
        $this->db->order_by("question");
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $arr[$row['question']]=$row['question'];
        }
        return $arr;
    }
    public function getQuestionInfo($username) {
        $this->db->select('*');
        $this->db->from('user_securityquestion');
        $this->db->where('user_name',$username);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function updateAnser($question, $answer, $username) {
        $this->db->set('question', $question);
        $this->db->set('answer', $answer);
        $this->db->where('user_name', $username);
        $this->db->update('user_securityquestion');
    }
    public function insertAnser($question, $answer, $username) {
        $this->user_name= $username;
        $this->question = $question;
        $this->answer   = $answer;
        $this->db->insert('user_securityquestion', $this);
    }
    function __destruct() {
        $this->db->close();
    }

}