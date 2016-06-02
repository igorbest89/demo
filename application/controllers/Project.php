<?php

/**
 * Created by PhpStorm.
 * User: igor
 * Date: 23.05.2016
 * Time: 16:47
 */
class Project extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('setting', '', TRUE);
        $this->load->model('storagemodel', '', TRUE);
        $this->load->model('ordermodel', '', TRUE);
        $this->load->model('repormodel', '', TRUE);
        $this->load->model('projectmodel', '', TRUE);

        $this->load->library('table');
        $this->load->helper('form');

        if (isset($_SESSION['login']->username) && isset($_SESSION['login']->password)) {
            $dataLogin = $this->user->login($_SESSION['login']->username, $_SESSION['login']->password);
            //print_r($dataLogin);

            if ($dataLogin) {
                redirect('login', 'refresh');
            } else {

                $data['msgs'][] = "";
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = array();
        $data = $this->user->menu($data);
        if ($this->input->post('action') == 'save') {

            $this->projectmodel->addProject($this->input->post());
            redirect('storage', 'refresh');

        }
        if ($this->input->post('action') == 'update')   {
            $this->projectmodel->updateProject($this->input->post());
        }






        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('project',$data);

        $this->load->view('common/footer');
    }

    public function getListProject()
    {
        $data = array();
        $data['listProject'] = $this->projectmodel->getProjects();
        $this->load->view('listProject',$data);
    }






}