<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 29.04.2016
 * Time: 10:41
 */
class Order extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('setting', '', TRUE);
        $this->load->model('storagemodel', '', TRUE);
        $this->load->model('ordermodel', '', TRUE);

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
        $this->load->view('order',$data);

        $this->load->view('common/footer');
    }

    public function doWork()
    {
        $getdata = $this->input->get('order_id');
        $data = array();
        if(isset($getdata)){
            $data['order_id'] = $getdata;
            $data['order_info'] = $this->ordermodel->getOrderById($getdata);
            $data['type_materials'] = $this->setting->getAllTypeMaterial();

        }else{
            $data['error'] = "Не выбран заказа";
        }

        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('order_dowork',$data);

        $this->load->view('common/footer');
    }

    public function usedMaterial()
    {
        $getdata = $this->input->get('order_id');
        $data = array();
        if(isset($getdata)){
            $data['order_id'] = $getdata;
            $data['order_info'] = $this->ordermodel->getOrderById($getdata);
            $data['type_materials'] = $this->setting->getAllTypeMaterial();

        }else{
            $data['error'] = "Не выбран заказа";
        }

        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('material.php',$data);

        $this->load->view('common/footer');
    }

    public function saveMaterialToOrder()
    {
       $this->ordermodel->setUsedMaterialToOrder($this->input->post());
    }

    public function updateOrderStart()
    {
        $data = $this->input->post();
        $this->ordermodel->updateDateOrderStart($data['order_id'],$data['date_start']);
        $this->ordermodel->updateOrderComment($data['order_id'],$data['comment']);
        $this->ordermodel->updateStatusOrder($data['order_id'],'В работе');

    }
    public function updateOrderEnd()
    {
        $data = $this->input->post();
        $this->ordermodel->updateDateOrderEnd($data['order_id'],$data['date_end']);
        $this->ordermodel->updateOrderComment($data['order_id'],$data['comment']);
        $this->ordermodel->updateStatusOrder($data['order_id'],'Завершенно');

    }


    public function addRenderToOrder()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']	= '99999';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $temp_files = $_FILES;
//        print_r($_FILES);
//        die();
        $count = count ($_FILES['file']['name']);
        $files_data = array();
        for ($i=0; $i<=$count-1; $i++)
        {
            $_FILES['file'] = array (
                'name'=>$temp_files['file']['name'][$i],
                'type'=>$temp_files['file']['type'][$i],
                'tmp_name'=>$temp_files['file']['tmp_name'][$i],
                'error'=>$temp_files['file']['error'][$i],
                'size'=>$temp_files['file']['size'][$i]);
            $this->upload->do_upload('file');
            $tmp_data = $this->upload->data();
            $files_data[$i]['data'] = $tmp_data['file_name'];
        }
        $this->ordermodel->addImageToOrder($files_data,$this->input->post('order_id'),'render');

    }


    public function addCartToOrder()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']	= '99999';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $temp_files = $_FILES;
//        print_r($_FILES);
//        die();
        $count = count ($_FILES['file']['name']);
        $files_data = array();
        for ($i=0; $i<=$count-1; $i++)
        {
            $_FILES['file'] = array (
                'name'=>$temp_files['file']['name'][$i],
                'type'=>$temp_files['file']['type'][$i],
                'tmp_name'=>$temp_files['file']['tmp_name'][$i],
                'error'=>$temp_files['file']['error'][$i],
                'size'=>$temp_files['file']['size'][$i]);
            $this->upload->do_upload('file');
            $tmp_data = $this->upload->data();
            $files_data[$i]['data'] = $tmp_data['file_name'];
        }
        $this->ordermodel->addImageToOrder($files_data,$this->input->post('order_id'),'cart_image');

    }


    public function addOrder()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']	= '99999';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $temp_files = $_FILES;
//        print_r($_FILES);
//        die();
        $count = count ($_FILES['file']['name']);
        $files_data = array();
        for ($i=0; $i<=$count-1; $i++)
        {
            $_FILES['file'] = array (
                'name'=>$temp_files['file']['name'][$i],
                'type'=>$temp_files['file']['type'][$i],
                'tmp_name'=>$temp_files['file']['tmp_name'][$i],
                'error'=>$temp_files['file']['error'][$i],
                'size'=>$temp_files['file']['size'][$i]);
            $this->upload->do_upload('file');
            $tmp_data = $this->upload->data();
            $files_data[$i]['data'] = $tmp_data['file_name'];
        }

        //print_r($files_data);

        $order_id = $this->ordermodel->addOrder($this->input->post());
        $this->ordermodel->addImageToOrder($files_data,$order_id,'neworder');
        redirect('order', 'refresh');
    }

}