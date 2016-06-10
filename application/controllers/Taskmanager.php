<?php

/**
 * Created by PhpStorm.
 * User: igor
 * Date: 07.06.2016
 * Time: 11:13
 */
class Taskmanager extends CI_Controller
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

        if ($this->input->get('project_id') != '') {
            $data['users'] = $this->user->getAllUser();
            $data['type_works'] = $this->setting->getAllTypeWork();
            $data['type_materials'] = $this->setting->getAllTypeMaterial();
            $data['type_products'] = $this->setting->getAllTypeProduct();
            $data['project_id'] = $this->input->get('project_id');
            $data['status'] = $this->setting->getSetting('status');
        } else {
            $data['error'] = "Не выбран проект!!";
        }
        $data = $this->user->menu($data);
        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar',$data);
        $this->load->view('task', $data);

        $this->load->view('common/footer');

    }

    public function addTask()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|png|stel|gif|rar|3d|zip';
        $config['max_size'] = '99999';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $temp_files = $_FILES;
//        print_r($_FILES);
//        die();
        $count = count($_FILES['file']['name']);
        $files_data = array();
        for ($i = 0; $i <= $count - 1; $i++) {
            $_FILES['file'] = array(
                'name' => $temp_files['file']['name'][$i],
                'type' => $temp_files['file']['type'][$i],
                'tmp_name' => $temp_files['file']['tmp_name'][$i],
                'error' => $temp_files['file']['error'][$i],
                'size' => $temp_files['file']['size'][$i]);
            $this->upload->do_upload('file');
            $tmp_data = $this->upload->data();
            $files_data[$i]['data'] = $tmp_data['file_name'];
        }

        //print_r($files_data);

        $order_id = $this->taskmodel->addTask($this->input->post());
        if(count($files_data)>=0&&$files_data[0]['data']!='') {
            $this->taskmodel->addFileToTask($files_data, $order_id, $this->input->post('project_id'), 'neworder');
        }
        redirect('Taskmanager?project_id=' . $this->input->post('project_id'), 'refresh');
    }

    public function getListTaskToProject()
    {
        $data = array();
        if ($this->input->get('project_id')) {
            $data['list_task'] = $this->taskmodel->getListTaskToProject($this->input->get('project_id'));
            $data['project_id'] = $this->input->get('project_id');

        } else {
            $data['error'] = "Не задан ид проекта";
        }
        $this->load->view('listTaskProject', $data);
    }

    public function getFilesForProject()
    {
        $data = array();
        if ($this->input->get('project_id')) {
            $data['list_files'] = $this->taskmodel->getListFilesToProject($this->input->get('project_id'));

        } else {
            $data['error'] = "Не задан ид проекта";
        }
        $this->load->view('listFilesProject', $data);
    }

    public function downloadFiles()
    {
        if ($this->input->get('file_id')) {

            $data = $this->taskmodel->getDownloadFiles($this->input->get('file_id'));
            //print_r('upload/'.$data[0]['path']);

            force_download('upload/' . $data[0]['path'], NULL);


        } else {
            echo "Не задан ид файла";
        }

    }

    public function deleteFile()
    {
        if ($this->input->get('file_id')) {

            $this->taskmodel->deleteFile($this->input->get('file_id'));
            //print_r('upload/'.$data[0]['path']);

            // force_download('upload/'.$data[0]['path'], NULL);


        } else {
            echo "Не задан ид файла";
        }
    }

    //---edit task
    public function test()
    {
        $status = array(
            'Обычный' => 'Обычный',
            'Срочный' => 'Срочный',
            'Отложенный' => 'Отложенный',
            'Закрытый' => 'Закрытый'
        );

        $this->setting->setSetting('status', $status);
    }

    public function workTask()
    {
        $data = array();

        if ($this->input->get('task_id')) {
            $data['users'] = $this->user->getAllUser();
            $data['type_works'] = $this->setting->getAllTypeWork();
            $data['type_materials'] = $this->setting->getAllTypeMaterial();
            $data['type_products'] = $this->setting->getAllTypeProduct();
            $data['status'] = $this->setting->getSetting('status');
            $data['task_info'] = $this->taskmodel->getTask($this->input->get('task_id'));
            $data['project_id'] = $this->input->get('project_id');

        } else {

        }
      //  $this->load->view('common/header');
        $data = $this->user->menu($data);
        $this->load->view('common/header');

        $this->load->view('common/leftbar',$data);
        $this->load->view('work_task', $data);
    }

    public function addUsedMaterial()
    {
        if ($this->input->post()) {

            $this->taskmodel->addUsedTaskMaterial($this->input->post());
        }
    }

    public function getUsedMaterial()
    {
        $data = array();
        if ($this->input->get('task_id')) {
            $data['list_material'] = $this->taskmodel->getUsedMaterialByTask($this->input->get('task_id'));

        } else {

        }


        $data = $this->user->menu($data);

        $this->load->view('usedMaterial', $data);



    }
    public function deleteMaterial()
    {
        if ($this->input->post('id_used_mat')) {
            $this->taskmodel->deleteUsedMaterial($this->input->post('id_used_mat'));
        }
    }
    public function updateTask()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|png|stel|gif|rar|3d|zip';
        $config['max_size'] = '99999';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $temp_files = $_FILES;
//        print_r($_FILES);
//        die();
        $count = count($_FILES['file']['name']);
        $files_data = array();
        for ($i = 0; $i <= $count - 1; $i++) {
            $_FILES['file'] = array(
                'name' => $temp_files['file']['name'][$i],
                'type' => $temp_files['file']['type'][$i],
                'tmp_name' => $temp_files['file']['tmp_name'][$i],
                'error' => $temp_files['file']['error'][$i],
                'size' => $temp_files['file']['size'][$i]);
            $this->upload->do_upload('file');
            $tmp_data = $this->upload->data();
            $files_data[$i]['data'] = $tmp_data['file_name'];
        }
//        echo "<pre>";
//        print_r($files_data);
//        echo "</pre>";
//        die();

        $this->taskmodel->updateTaskInfo($this->input->post(),$this->input->post('task_id'));
        if(count($files_data)>=0&&$files_data[0]['data']!='') {
            $this->taskmodel->addFileToTask($files_data, $this->input->post('task_id'), $this->input->post('project_id'), 'neworder');
        }
        redirect('Taskmanager?project_id=' . $this->input->post('project_id'), 'refresh');
    }



    //----

}