<?php

/**
 * Created by PhpStorm.
 * User: igor
 * Date: 29.04.2016
 * Time: 10:43
 */
Class Taskmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addTask($data = array())
    {
        $sql = "INSERT INTO task SET task_name='" . $data['task_name'] .
            "', artikle='" . $data['article'] .
            "', id_type_work='" . $data['type_work'] .
            "', id_user='" . $data['users'] .
            "', weight='" . $data['weight'] .
            "', comment='" . $data['comment'] .
            "', date_start='" .'0000-00-00' .
            "', date_end='" . '0000-00-00' .
            "', status='" . $data['status'] .
            "', project_id='" . $data['project_id'] . "'";
        $this->db->query($sql);
        $ret = $this->db->insert_id();
        return $ret;
    }

    public function getTasks($data = array())
    {
        $sql = "SELECT * FROM task t INNER JOIN type_work tw ON t.id_type_work=tw.id_type_work INNER JOIN users u ON t.id_user=u.id_user  ";
        if(!empty($data['status'])||!empty($data['search'])) {
         $sql .= " WHERE ";
        }

        if(!empty($data['status'])) {

            if($data['status']=='0000-00-00')
            {
                $sql .= " t.date_start='" . $data['status'] . "' ";
               // $sql .= " t.date_start='0000-00-00'";

            }else {
                $sql .= " t.status='" . $data['status'] . "' ";
                $sql .= " AND t.date_start<>'0000-00-00' ";
            }
        }
        if(!empty($data['search']))
        {
            $sql .=  " AND concat(t.task_name,t.artikle,t.in_artikle) LIKE '%" . $data['search'] . "%'";
        }
//        echo "<pre>";
//        print_r($sql);
//        echo "</pre>";
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";

        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function getTask($id_task)
    {
        $sql = "SELECT * FROM task t INNER JOIN type_work tw ON t.id_type_work=tw.id_type_work INNER JOIN users u ON t.id_user=u.id_user WHERE id_task='" . $id_task . "'";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function addFileToTask($data = array(), $task_id, $project_id, $type)
    {
        foreach ($data as $value) {
            $sql = "INSERT INTO files SET id_task='" . $task_id
                . "', type_file='" . $type
                . "', path='" . $value['data']
                . "', id_project='" . $project_id . "'";
            $this->db->query($sql);
        }

    }

    public function getListTaskToProject($project_id)
    {
        $sql = "SELECT * FROM task t INNER JOIN type_work tw ON t.id_type_work=tw.id_type_work INNER JOIN users u ON t.id_user=u.id_user WHERE project_id='" . $project_id . "' ORDER BY id_task";

        $query = $this->db->query($sql);

        return $query->result_array();

    }

    public function getListFilesToProject($project_id)
    {
        $sql = "SELECT * FROM files WHERE id_project='" . $project_id . "'";
        $query = $this->db->query($sql);
        return $query->result_array();


    }

    public function getDownloadFiles($file_id)
    {
        $sql = "SELECT * FROM files WHERE id_files='" . $file_id . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function deleteFile($file_id)
    {
        $this->db->query("DELETE FROM files WHERE id_files='" . $file_id . "'");
    }


    public function getUsedMaterialByTask($task_id)
    {
        $sql = "SELECT * FROM used_task_material utm INNER JOIN type_material tm ON utm.id_material=tm.id_material WHERE utm.id_task='" . $task_id . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function addUsedTaskMaterial($data = array())
    {
        //Array ( [task_id] => 2 [input_data_used] => [material] => 5 [materialCount] => 01 )
        $date = '';
        if ($data['input_data_used'] == '') {
            $date = date("Y.m.d");//2016-04-30
        } else {
            $date = $data['input_data_used'];
        }
        $sql = "INSERT INTO used_task_material SET id_material='" . $data['material'] . "', count='" . $data['materialCount'] . "', id_task='" . $data['task_id'] . "',date_used='" . $date . "'";
        $this->db->query($sql);
    }

    public function deleteUsedMaterial($id_mat)
    {
        $this->db->query("DELETE FROM used_task_material WHERE id_used='" . $id_mat . "'");
    }

    public function updateTaskInfo($data = array(), $task_id)
    {
        $sql = "UPDATE task SET task_name='" . $data['task_name'] .
            "', artikle='" . $data['article'] .
            "', in_artikle='" . $data['in_artikle'] .
            "', id_type_work='" . $data['type_work'] .
            "', id_user='" . $data['users'] .
            "', date_start='" . $data['input_data_start'] .
            "', date_end='" . $data['input_data_end'] .
            "', weight='" . $data['weight'] .
            "', comment='" . $data['comment'] .
            "', status='" . $data['status'] .
            "'   WHERE id_task='".$task_id."'";
//        print_r($sql);
//        die();
        $this->db->query($sql);


    }

    //----------------------------
    public function addOrder($data = array(), $dataimage = array())
    {
        $sql = "INSERT INTO orders SET order_name='" . $data['nameOrder'] . "', artikle='" . $data['article'] . "', id_type_work='" . $data['type_work'] . "', id_user='" . $data['users'] . "', weight='" . $data['weight'] . "', comment='" . $data['comment'] . "', status='Новый'";
        $this->db->query($sql);
        $ret = $this->db->insert_id();
        return $ret;
//        print_r($sql);
//        die();
    }

    /**
     * @param array $dataImage масив картинок
     * @param $order_id
     * @param $type
     */
    public function addImageToOrder($dataImage = array(), $order_id, $type)
    {
        foreach ($dataImage as $value) {
            $sql = "INSERT INTO images SET id_order='" . $order_id . "', type_image='" . $type . "', path='" . $value['data'] . "'";
            $this->db->query($sql);
        }
    }

    public function getNewOrder()
    {
        $query = $this->db->query("SELECT * FROM orders o LEFT JOIN images i ON o.id_order=i.id_order INNER JOIN type_work tw ON o.id_type_work=tw.id_type_work INNER JOIN users u ON o.id_user=u.id_user WHERE o.status<>'complite' GROUP BY o.id_order");
        return $query->result();

    }

    public function getOrderById($id_order)
    {

        $sql = "SELECT * FROM orders o LEFT JOIN images i ON o.id_order=i.id_order INNER JOIN type_work tw ON o.id_type_work=tw.id_type_work INNER JOIN users u ON o.id_user=u.id_user WHERE o.id_order='" . $id_order . "' GROUP BY o.id_order";
        $query = $this->db->query($sql);
        $info_order = $query->row_array();

        $sql = "SELECT * FROM images WHERE id_order='" . $id_order . "' AND type_image='render'";
        $query_image = $this->db->query($sql);
        $images_render = $query_image->result_array();

        $sql = "SELECT * FROM images WHERE id_order='" . $id_order . "' AND type_image='cart_image'";
        $query_image = $this->db->query($sql);
        $images_cart = $query_image->result_array();

        $sql = "SELECT * FROM images WHERE id_order='" . $id_order . "' AND type_image='neworder'";
        $query_image = $this->db->query($sql);
        $images_new_order = $query_image->result_array();


        $return_data = array(
            'id_order' => $info_order['id_order'],
            'order_name' => $info_order['order_name'],
            'artikle' => $info_order['artikle'],
            'type_work' => $info_order['name_work'],
            'username' => $info_order['username'],
            'date_start' => $info_order['date_start'],
            'date_end' => $info_order['date_end'],
            'weight' => $info_order['weight'],
            'status' => $info_order['status'],
            'comment' => $info_order['comment'],
            'images_render' => $images_render,
            'images_cart' => $images_cart,
            'images_new' => $images_new_order

        );
        return $return_data;

    }

    public function updateStatusOrder($id_order, $status)
    {
        $sql = "UPDATE orders SET status='" . $status . "' WHERE id_order='" . $id_order . "'";
        $this->db->query($sql);
    }

    public function updateDateOrderStart($id_order, $dateStart)
    {
        $sql = "UPDATE orders SET date_start='" . $dateStart . "' WHERE id_order='" . $id_order . "'";
        $this->db->query($sql);
    }

    public function updateOrderComment($id_order, $comment)
    {
        $sql = "UPDATE orders SET comment='" . $comment . "' WHERE id_order='" . $id_order . "'";
        $this->db->query($sql);
    }

    public function updateDateOrderEnd($id_order, $dateEnd)
    {
        $sql = "UPDATE orders SET date_end='" . $dateEnd . "' WHERE id_order='" . $id_order . "'";
        $this->db->query($sql);
    }

    public function setUsedMaterialToOrder($data = array())
    {

        foreach ($data['id'] as $key => $value) {
            $sql = "INSERT INTO used_material SET id_order='" . $data['order_id'] . "', id_material='" . $key . "', count='" . $value . "'";
            $this->db->query($sql);
        }
    }


}