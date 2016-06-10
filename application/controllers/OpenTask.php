<?php

/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10.06.2016
 * Time: 14:45
 */
class OpenTask extends CI_Controller
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
        $this->load->model('taskmodel', '', TRUE);

        $this->load->library('table');
        $this->load->helper('form');
        $this->load->helper('download');
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
        $data['status'] = $this->setting->getSetting('status');


        $this->load->view('common/header');
        $this->load->view('common/msg', $data);
        $this->load->view('common/leftbar', $data);
        $this->load->view('taskList', $data);

        $this->load->view('common/footer');

    }

    public function search()
    {
        $data['list_task'] = $this->taskmodel->getTasks($this->input->post());

//       echo "<pre>";
//        print_r($this->input->post());
//        echo "</pre>";
        $this->load->view('listTaskProject', $data);

    }

}
