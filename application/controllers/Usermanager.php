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

        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('usermanager',$data);

        $this->load->view('common/footer');
    }
    public function addUser()
    {
        echo $this->user->addUser($this->input->post("data"));

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