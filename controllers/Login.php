<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.2016
 * Time: 9:53
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user');//,'',TRUE);
    }
    public function index()
    {
        $this->load->helper('form');
        $data = array();
        //validateSession
//        echo "<pre>";
//               print_r($_SESSION['login']->username);
//            echo "</pre>";
        if(isset($_SESSION['login']->username)&&isset($_SESSION['login']->password))
        {
            $dataLogin = $this->user->login($_SESSION['login']->username,$_SESSION['login']->password);
            if($dataLogin)
            {


            }else{

                $data['msgs'][]="уже авторизованы";
                redirect('home', 'refresh');
            }
        }

        //---------------

        if($this->input->post('action')=='login')
        {

            $dataLogin = $this->user->login($this->input->post('username'),$this->input->post('password'));

//            echo "<pre>";
//               print_r($dataLogin);
//            echo "</pre>";
            if($dataLogin)
            {

              $_SESSION['login'] = $dataLogin[0];
                $data['msgs'][] = "Авторизовались";
                redirect('home', 'refresh');
            }else{
                $data['errors'][] = "неправильный логин или пароль.";
            }
            // echo $this->login->getUser($dataLogin);

        }


//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        /*Load controller views*/
        $this->load->view('common/header1');
        $this->load->view('common/msg',$data);
        //$this->load->view('common/leftbar');
        $this->load->view('login',$data);

        //$this->load->view('common/footer');
    }




}