<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 22.04.2016
 * Time: 17:22
 */

Class Setting extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addTypeWork($data=array())
    {
        $this->db->query("INSERT INTO type_work SET name_work='".$data['typework']."'");
        $ret = $this->db->insert_id();
        return $ret;

    }

    public function updateTypeWork($data=array())
    {
        $this->db->query("UPDATE type_work SET name_work='".$data['typeworkadd']."' WHERE id_type_work='".$data['id_work']."'");

    }

    public function deleteTypeWork($id_type)
    {
        $this->db->query("DELETE FROM type_work WHERE id_type_work='".$id_type."'");

    }

    public function getAllTypeWork()
    {
        $this->db->select("id_type_work, name_work");
        $this->db->from("type_work");
        $query = $this->db->get();
        return $query->result();

    }

    public function getAllTypeMaterial()
    {
        $this->db->select("id_material, name_material, material_config");
        $this->db->from("type_material");
        $query = $this->db->get();
        $result = $query->result();
       // print_r($result);
       if(isset($result['material_config'])) {
           $result['material_config'] = unserialize($result['material_config']);
       }
        return $result;
    }

    public function addTypeMaterial($data = array())
    {
        $this->db->query("INSERT INTO type_material SET name_material='".$data['name_material']."', material_config='".serialize($data['config'])."'");
        $ret = $this->db->insert_id();
        return $ret;
    }

    public function updateTypeMaterial($data = array())
    {
        $this->db->query("UPDATE type_material SET name_material='".$data['name_material']."', material_config='".serialize($data['config'])."' WHERE id_material='".$data['id_material']."'");
    }


    public function deleteTypeMaterial($id_type)
    {
        $this->db->query("DELETE FROM type_material WHERE id_material='".$id_type."'");
    }


    public function getAllTypeProduct()
    {
        $this->db->select("id_type_product, name, config");
        $this->db->from("type_product");
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result['config'])){
            $result['config'] = unserialize($result['config']);
        }
        return $result;
    }

    public function addTypeProduct($data = array())
    {
        $this->db->query("INSERT INTO type_product SET name='".$data['name_product']."', config='".serialize($data['config'])."'");
        $ret = $this->db->insert_id();
        return $ret;
    }
    public function updateTypeProduct($data=array())
    {
        $this->db->query("UPDATE type_product SET name='".$data['name_product']."', config='".serialize($data['config'])."' WHERE id_type_product='".$data['id_product_type']."'");
    }

    public function deleteTypeProduct($id_product)
    {
        $this->db->query("DELETE FROM type_product WHERE id_type_product='".$id_product."'");
    }


    public function getAllManufacturer()
    {
        $this->db->select("id_manufacturer, name");
        $this->db->from("manufacturer");
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }


    public function addManufacturer($data = array())
    {
        $this->db->query("INSERT INTO manufacturer SET name='".$data['name_manufacturer']."' ");
        $ret = $this->db->insert_id();
        return $ret;
    }
    public function updateManufacturer($data=array())
    {
        $this->db->query("UPDATE manufacturer SET name='".$data['name_manufacturer']."' WHERE id_manufacturer='".$data['id_manufacturer']."'");
    }

    public function deleteManufacturer($id_product)
    {
        $this->db->query("DELETE FROM manufacturer WHERE id_manufacturer='".$id_product."'");
    }


}