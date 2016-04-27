<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.2016
 * Time: 12:53
 */
class usermanager extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
        $this->load->model('setting','',TRUE);
        if(isset($_SESSION['login']->username)&&isset($_SESSION['login']->password))
        {
            $dataLogin = $this->user->login($_SESSION['login']->username,$_SESSION['login']->password);
            //print_r($dataLogin);

            if($dataLogin)
            {
                redirect('login', 'refresh');
            }else{

                $data['msgs'][]="";
            }
        }else{
            redirect('login', 'refresh');
        }
    }
    public function index()
    {
        $data = array();

        $data['permission'][]=$this->user->getPermissionAll();

        $data['user_list'] = $this->user->getAllUser();
        $data['type_work'] = $this->setting->getAllTypeWork();
        $data['type_materials'] = $this->setting->getAllTypeMaterial();
        $data['type_product']   = $this->setting->getAllTypeProduct();
//        print_r($data);
//        die();

        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('usermanager',$data);

        $this->load->view('common/footer');
    }

    public function deleteUser()
    {
        $data = $this->input->post("data");
        $this->user->deleteUser($data['id_user']);

    }

    public function addUser()
    {
      //  print_r($this->input->post("data"));

        $data =$this->input->post("data");
        $data['password'] = MD5($data['password']);
        echo $this->user->addUser($data);

    }

    public function addTypeMaterial()
    {
        $this->setting->addTypeMaterial($this->input->post("data"));

    }

    public function updateTypeMaterial()
    {
        $this->setting->updateTypeMaterial($this->input->post("data"));
    }

    public function deleteTypeMaterial()
    {
        $this->setting->deleteTypeMaterial($this->input->post("data"));
    }

    public function addTypeWork()
    {
        echo $this->setting->addTypeWork($this->input->post("data"));
    }

    public function updateTypeWork()
    {
        echo $this->setting->updateTypeWork($this->input->post("data"));
    }

    public function deleteTypeWork()
    {
        $this->setting->deleteTypeWork($this->input->post("data"));
    }

    public function addTypeProduct()
    {
        $this->setting->addTypeProduct($this->input->post("data"));
    }

    public function test()
    {
        print_r($this->input->post("data"));
    }
    public function test1()
    {
        echo "sdasd";
    }
}