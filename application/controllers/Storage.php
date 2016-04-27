<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 27.04.2016
 * Time: 20:40
 */
class storage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('setting', '', TRUE);
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

        $data['type_materials'] = $this->setting->getAllTypeMaterial();


        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('storage',$data);

        $this->load->view('common/footer');
    }
}