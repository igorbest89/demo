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

    private function treeMat($categories, $parent_id = 0, $parent_name = '') {
        $output = array();

        if (array_key_exists($parent_id, $categories)) {
            if ($parent_name != '') {
                $parent_name .= '-';
            }

            foreach ($categories[$parent_id] as $category) {
                $output[$category['id_material']] = array(
                    'category_id' => $category['id_material'],
                    'name'        => $parent_name . $category['name']
                );

                $output += $this->treeMat($categories, $category['id_material'], $parent_name . $category['name_material']);
            }
        }
        return $output;
    }


    public function index()
    {
        $data = array();

        $data['permission'][]=$this->user->getPermissionAll();

        $data['user_list'] = $this->user->getAllUser();
        $data['type_work'] = $this->setting->getAllTypeWork();
        $data['type_materials'] = $this->setting->getAllTypeMaterial();
        $data['type_product']   = $this->setting->getAllTypeProduct();
        $data['type_material_level_0'] = $this->setting->getTypeMaterialByOption(array(
           'parrent_id'     =>   '0'
        ));

        foreach($data['type_materials'] as $value)
    {
        $this->treeMat($value->id_material);
    }
//        echo "<pre>";
//        print_r($this->treeMats);
//        echo "</pre>";
        $data['type_test'] = $this->setting->getTypeMaterialByOption(array(
            'parrent_id'     =>   '0'
        ));
        $data['type_material_level_1'] = $this->setting->getTypeMaterialByOption(array(
            'parrent_id'     =>   '1'
        ));
        $data['type_material_level_2'] = $this->setting->getTypeMaterialByOption(array(
            'parrent_id'     =>   '2'
        ));

        $data['manufacturers']  = $this->setting->getAllManufacturer();
        $data = $this->user->menu($data);
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

    public function updateTypeProduct()
    {
        $this->setting->updateTypeProduct($this->input->post("data"));
    }

    public function deleteTypeProduct()
    {
        $this->setting->deleteTypeProduct($this->input->post("data"));
    }


    public function addManufacturer()
    {
        $this->setting->addManufacturer($this->input->post("data"));
    }

    public function updateManufacturer()
    {
        $this->setting->updateManufacturer($this->input->post("data"));
    }

    public function deleteManufacturer()
    {
        $this->setting->deleteManufacturer($this->input->post("data"));
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