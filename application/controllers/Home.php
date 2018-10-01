<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index() {
        $data['notice'] = $this->Home_model->getNotice();
        $data['news'] = $this->Home_model->getNews('News');
        $data['events'] = $this->Home_model->getNews('Events');
        $this->load->view('home_view', $data);
    }
    public function all_news() {
        $data['news'] = $this->Home_model->getAllNews('News');
        $this->load->view('all_news_view', $data);
    }
    public function all_event() {
        $data['news'] = $this->Home_model->getAllNews('Events');
        $this->load->view('all_news_view', $data);
    }
    public function news_detail($news_id) {
        $data['news_detail'] = $this->Home_model->getNewsDetail($news_id);
        $this->load->view('news_detail_view', $data);
    }
    public function all_notice() {
        $data['notice_cat'] = $this->Home_model->getNoticeCat();
        $data['notice'] = $this->Home_model->getAllNotice();
        $this->load->view('notice_view', $data);
    }
    public function notice_ajax($cat) {
        $cat = urldecode(strip_tags($cat));
        $data['notice'] = $this->Home_model->getNoticeAjax($cat);
        foreach ($data['notice'] as $row) {
            echo '<p>';
            echo '<a target="_blank" href="'.base_url().'common/files/'.$row->notice_file.'">';
            echo '<i class="glyphicon glyphicon-pushpin"></i> ';
            echo $row->notice_head;
            echo '</a>';
            echo ' <i class="news-date"> ('.date("d-m-Y", strtotime($row->notice_time)).') </i>'.'<br>';
            echo '</p>';
        }


    }
    public function contact() {
        $this->load->view('contact_view');
    }

}
?>