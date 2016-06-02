<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 29.04.2016
 * Time: 10:43
 */
Class Ordermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addOrder($data = array(),$dataimage = array())
    {
        $sql = "INSERT INTO orders SET order_name='".$data['nameOrder']."', artikle='".$data['article']."', id_type_work='".$data['type_work']."', id_user='".$data['users']."', weight='".$data['weight']."', comment='".$data['comment']."', status='Новый'";
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
    public function addImageToOrder($dataImage = array(),$order_id,$type)
    {
        foreach($dataImage as $value) {
            $sql = "INSERT INTO images SET id_order='" . $order_id . "', type_image='" . $type . "', path='" .$value['data']."'";
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

        $sql = "SELECT * FROM orders o LEFT JOIN images i ON o.id_order=i.id_order INNER JOIN type_work tw ON o.id_type_work=tw.id_type_work INNER JOIN users u ON o.id_user=u.id_user WHERE o.id_order='".$id_order."' GROUP BY o.id_order";
        $query = $this->db->query($sql);
        $info_order = $query->row_array();

        $sql = "SELECT * FROM images WHERE id_order='".$id_order."' AND type_image='render'";
        $query_image = $this->db->query($sql);
        $images_render = $query_image->result_array();

        $sql = "SELECT * FROM images WHERE id_order='".$id_order."' AND type_image='cart_image'";
        $query_image = $this->db->query($sql);
        $images_cart = $query_image->result_array();

        $sql = "SELECT * FROM images WHERE id_order='".$id_order."' AND type_image='neworder'";
        $query_image = $this->db->query($sql);
        $images_new_order = $query_image->result_array();


        $return_data = array(
            'id_order'          => $info_order['id_order'],
            'order_name'        => $info_order['order_name'],
            'artikle'           => $info_order['artikle'],
            'type_work'         => $info_order['name_work'],
            'username'          => $info_order['username'],
            'date_start'        => $info_order['date_start'],
            'date_end'          => $info_order['date_end'],
            'weight'            => $info_order['weight'],
            'status'            => $info_order['status'],
            'comment'           => $info_order['comment'],
            'images_render'     => $images_render,
            'images_cart'       => $images_cart,
            'images_new'        => $images_new_order

        );
        return $return_data;

    }

    public function updateStatusOrder($id_order,$status)
    {
        $sql = "UPDATE orders SET status='".$status."' WHERE id_order='".$id_order."'";
        $this->db->query($sql);
    }

    public function updateDateOrderStart($id_order, $dateStart)
    {
        $sql = "UPDATE orders SET date_start='".$dateStart."' WHERE id_order='".$id_order."'";
        $this->db->query($sql);
    }

    public function updateOrderComment($id_order,$comment){
        $sql = "UPDATE orders SET comment='".$comment."' WHERE id_order='".$id_order."'";
        $this->db->query($sql);
    }

    public function updateDateOrderEnd($id_order, $dateEnd)
    {
        $sql = "UPDATE orders SET date_end='".$dateEnd."' WHERE id_order='".$id_order."'";
        $this->db->query($sql);
    }

    public function setUsedMaterialToOrder($data=array())
    {

        foreach($data['id'] as $key=>$value) {
            $sql = "INSERT INTO used_material SET id_order='" . $data['order_id'] . "', id_material='" . $key . "', count='" . $value . "'";
            $this->db->query($sql);
        }
    }


}