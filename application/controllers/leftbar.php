<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 27.04.2016
 * Time: 21:38
 */
class Leftbar extends CI_Controller {

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
        $data['menu'][]= array(
            'item' =>  anchor('usermanager', 'Управление Пользователями')
        );
        $data['menu'][]= array(
            'item' =>  anchor('storege', 'Управление Складом')
        );

        $this->load->view('common/leftbar',$data);



    }
}