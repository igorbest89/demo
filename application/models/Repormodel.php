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

    }
}
