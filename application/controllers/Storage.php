<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 27.04.2016
 * Time: 20:40
 */
class Storage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('setting', '', TRUE);
        $this->load->model('storagemodel', '', TRUE);

        $this->load->library('table');
        $this->load->helper('form');
        $this->setTableTemplate();
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
        $data['manufacturers']  = $this->setting->getAllManufacturer();
        $this->table->set_heading('ID', 'Номер Накладной', 'Производитель', 'Количество', 'Вес', 'Материал', 'Дата', 'Коментарий', 'Сумма');
        $data['storage'] = $this->storagemodel->getAllStorage();

//        echo "<pre>";
//        print_r($data['storage']);
//        echo "</pre>";
//        die();
        $data['storage_table']= $this->table->generate($data['storage']);


        if($this->input->post('action')=='save')
        {

            $this->storagemodel->addStorage($this->input->post());
            redirect('storage', 'refresh');

        }
        if($this->input->post('action')=='update')
        {
            $this->storagemodel->updateStorage($this->input->post());
        }


        $this->load->view('common/header');
        $this->load->view('common/msg',$data);
        $this->load->view('common/leftbar');
        $this->load->view('storage',$data);

        $this->load->view('common/footer');
    }

    public function deleteStorage()
    {
        $this->storagemodel->deleteStorage($this->input->post('data'));
    }

    public function getUpdateData()
    {
        echo json_encode($this->storagemodel->getStorageById($this->input->post('data')));
    }


    private function setTableTemplate()
    {
        $template = array(
            'table_open'            => '<table border="0" cellpadding="4" cellspacing="0">',

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr style="width: 200px;">',
            'row_end'               => '</tr>',
            'cell_start'            => '<td style="width: 200px;">',
            'cell_end'              => '</td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',

            'table_close'           => '</table>'
        );

        $this->table->set_template($template);

    }
}