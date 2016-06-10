<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 29.04.2016
 * Time: 16:43
 */
Class Repormodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storageDate($data = array())
    {
        $sql = "SELECT * FROM Storage s INNER JOIN type_material tm ON s.id_material=tm.id_material WHERE s.date>'".$data['date_start']."' AND s.date <'".$data['date_end']."'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function stockMaterial($data = array())
    {
        $sql = "SELECT * FROM Storage s INNER JOIN type_material tm ON s.id_material=tm.id_material WHERE  tm.id_material='".$data['id_material']."'";
        $query = $this->db->query($sql);
        $sql_orders = "SELECT * FROM orders o INNER JOIN used_material um ON o.id_order=um.id_order INNER JOIN type_material tm ON um.id_material=tm.id_material WHERE  um.id_material='".$data['id_material']."'";
        $query_mat =  $this->db->query($sql_orders);
        $data_result = array();
        foreach($query->result() as $valueStock)
        {
            foreach($query_mat->result() as $valueUsed)
            {
                if($valueStock->id_material==$valueUsed->id_material)
                {
                    $data_result[] = array(
                       'id_order'           =>$valueStock->id_storage,
                        'name_material'     =>$valueUsed->name_material,
                        'count'             =>$valueStock->counts-$valueUsed->count
                    ) ;
                }
            }
        }
        return $data_result;
//        echo "<pre>";
//        print_r($data_result);
//        echo "</pre>";
//        echo "<pre>".$sql_orders;
//        print_r($query_mat->result());
//        echo "</pre>";

    }
}
