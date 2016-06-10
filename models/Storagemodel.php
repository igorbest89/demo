<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 28.04.2016
 * Time: 14:32
 */
Class Storagemodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addStorage($data = array())
    {
        $sql = "INSERT INTO Storage SET name='".$data['article']."', id_material='".$data['type_material']."', counts='".$data['count']."', weight='".$data['weight']."', id_manufacturer='".$data['manufacturer']."', date='".$data['input-date']."', coment='".$data['comment']."', sum='".$data['sum']."'";
        $this->db->query($sql);
    }

    public function updateStorage( $data = array())
    {
        $sql = "UPDATE Storage SET name='".$data['article']."', id_material='".$data['type_material']."', counts='".$data['count']."', weight='".$data['weight']."', id_manufacturer='".$data['manufacturer']."', date='".$data['input-date']."', coment='".$data['comment']."', sum='".$data['sum']."' WHERE id_storage='".$data['id_storage']."'";
        $this->db->query($sql);
    }

    public function deleteStorage($id_sorage)
    {
        $sql ="DELETE FROM Storage WHERE id_storage='".$id_sorage."'";
        $this->db->query($sql);
    }
    public function getAllStorage($data =array())
    {
        $sql ="SELECT s.id_storage, s.name, m.name AS manufacturer, s.counts, s.weight,tm.name_material, s.date, s.coment,s.sum FROM Storage s INNER JOIN type_material tm ON s.id_material=tm.id_material INNER JOIN manufacturer m ON s.id_manufacturer=m.id_manufacturer ORDER BY s.id_storage DESC";
        if(isset($data['start'])&&isset($data['end'])) {
            $sql .= "LIMIT " . $data['start'] . ", " . $data['end'];
        }
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function getStorageById($id_storage)
    {
        $sql ="SELECT s.id_storage, s.name, m.name AS manufacturer,s.id_manufacturer,s.id_material, s.counts, s.weight,tm.name_material, s.date, s.coment,s.sum FROM Storage s INNER JOIN type_material tm ON s.id_material=tm.id_material INNER JOIN manufacturer m ON s.id_manufacturer=m.id_manufacturer WHERE s.id_storage='".$id_storage."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}