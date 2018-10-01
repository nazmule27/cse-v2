<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Researches extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Research_model');
        $this->load->model('Home_model');
    }
    public function index() {
        $data['research_update'] = $this->Home_model->getResearch();
        $data['research_news'] = $this->Home_model->getNews('Research');
        $this->load->view('research_view', $data);
    }
    public function area() {
        $data['research_area'] = $this->Research_model->getResearchArea();
        $this->load->view('research_area_view', $data);
    }
    public function string($string) {
        $r_area = urldecode(strip_tags($string));
        $data['research_detail'] = $this->Research_model->getResearchDetail($r_area);
        $research_id=$data['research_detail'][0]->research_id;
        $data['research_field'] = $this->Research_model->getResearchField($research_id);
        $data['research_faculty'] = $this->Research_model->getResearchFaculty($research_id);
        $data['research_pub'] = $this->Research_model->getResearchPublication($research_id);
        $this->load->view('research_area_detail_view', $data);
    }
    public function authors($pid) {
        $data['authors'] = $this->Research_model->getAuthors($pid);
        $authors="";
        foreach ($data['authors'] as $row) {
            $authors = $authors.$row->auid.', ';
        }
        return $authors;
    }
    public function facilities() {
        $data['research_facilities'] = $this->Research_model->getResearchArea();
        $this->load->view('research_facilities_view', $data);
    }
    public function facilities_detail() {
        $this->load->view('research_facility_detail_view');
    }
    public function publication() {
        $data['research_pub'] = $this->Research_model->getPublication('all');
        $data['pub_year'] = $this->Research_model->getPublicationYears();
        $this->load->view('research_publication_view', $data);
    }
    public function publication_ajax($year) {
        $data['research_pub'] = $this->Research_model->getPublication($year);
        echo '<table class="table publication">
                <tbody>';
                $k=1;
                foreach ($data['research_pub'] as $row) {
                    echo '<tr>';
                    echo '<td>';
                    echo $k.'.  ';
                    echo '</td>';
                    echo '<td>';
                    echo $row->authors.', <b>'.$row->title.'</b>, <i>'.$row->c_j_name.'</i>, '.$row->vol.', '.$row->page.', '.$row->year; if ($row->doi) echo '<a href="https://doi.org/'.$row->doi.'"> [paper link]</a>';
                    echo '</td>';
                    echo '</tr>';
                    $k++;
                }
        echo '</tbody>
            </table>';

    }
}
?>