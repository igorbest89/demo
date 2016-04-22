<?php
Class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this -> db -> select('id_user, username, password, permission');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getPermissionAll()
    {
        $this->db->select('id_permission, name, language_id');
        $this->db->from('permission_description');
        $query = $this->db->get();
        return $query->result();
    }


    public function addUser($data=array())
    {
       // print_r($data);
        $this -> db -> select('id_user, username, password, permission');
        $this -> db -> from('users');
        $this -> db -> where('username', $data['username']);
        $ret='';
        $query = $this -> db -> get();
        if($query -> num_rows() ==0 ) {
            $this->db->insert("users", $data);
            $ret =$this->db->insert_id();
        }else{
            $ret = '-1';
        }
        return $ret;
        // $this->db->query("INSERT INTO users SET username='".$data['username']."', password='".MD5($data['password'])."',permission='".$data['permission']."'");

    }
    public function updateUser($data=array())
    {
        $this->db->query("UPDATE users SET username='".$data['username']."', password='".MD5($data['password'])."',permission='".$data['permission']."' WHERE id_user='".$data['id_user']."'");
    }
    public function deleteUser($idUser)
    {
        $this->db->query("DELETE FROM users WHERE id_user='".$idUser."'");
        
    }

}