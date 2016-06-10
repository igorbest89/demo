<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 29.04.2016
 * Time: 16:42
 */
class Report extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('setting', '', TRUE);
        $this->load->model('storagemodel', '', TRUE);
        $this->load->model('ordermodel', '', TRUE);
        $this->load->model('repormodel', '', TRUE);

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
        $data['users'] = $this->user->getAllUser();
        $data['type_works'] = $this->setting->getAllTypeWork();
        $data['type_materials'] = $this->setting->getAllTypeMaterial();
        $data['type_products']  = $this->setting->getAllTypeProduct();
        $data['active_work']    = $this->ordermodel->getNewOrder();
        $data = $this->user->menu($data);

        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('report',$data);

        $this->load->view('common/footer');
    }

    public function showStorage()
    {
        $data = array();
        $data['info'] = $this->repormodel->storageDate($this->input->post());
        $data['type'] = "storage";

        $this->load->view('reportdata',$data);
    }
    public function showMaterialStock()
    {
        $data = array();
        $data['info'] = $this->repormodel->stockMaterial($this->input->post());
        $data['type'] = "material";

        $this->load->view('reportdata',$data);
    }

    public function showInStockStatus()
    {
        $data = array();
        $data['info'] = $this->repormodel->getUsedMaterials($this->input->post('date_start'));
        $data['type'] = "stostatus";

        $this->load->view('reportdata',$data);
    }

    public function rashod()
    {
        $data = array();
        $data['info'] = $this->repormodel->getRashodMaterials($this->input->post());
        $data['type'] = "rashod";

        $this->load->view('reportdata',$data);
    }

}