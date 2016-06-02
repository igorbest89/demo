<?php

/**
 * Created by PhpStorm.
 * User: igor
 * Date: 23.05.2016
 * Time: 17:50
 */
Class Projectmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data[start], $data[end]
     * @return mixed
     *
     */
    public function getProjects($data = array())
    {
        $query = "SELECT * FROM project";
        if (!empty($data['start'])) {
            $query .= " LIMIT " . $data['start'];
        }
        if (!empty($data['end'])) {
            $query .= " ," . $data['end'];
        }
        $return = $this->db->query($query);
        return $return->result();
    }

    /**
     * @param array $data
     * @return mixed
     *
     */
    public function addProject($data = array())
    {
        $sql = "INSERT INTO project SET name_project='".$data['nameProject']."', desk='".$data['deskProject']."', status='".$data['statusProject']."'";
        $this->db->query($sql);
        return  $this->db->insert_id();
    }

    public function updateProject($data = array())
    {
        $sql = "UPDATE project SET name_project='".$data['nameProject']."', desk='".$data['deskProject']."', status='".$data['statusProject']."'";
        $this->db->query($sql);

    }

    public function deleteProject($id_project)
    {
        $this->db->query("DELETE FROM project WHERE id_project='".$id_project."'");
    }

}
