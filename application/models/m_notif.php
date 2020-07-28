<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notif extends CI_model{


    	  public function tampildata()
    {
    	$query = $this->db->select('*')
        ->from('notif')
        ->order_by('id_notif', 'DESC')
        ->get();
        return $query->result();
    }

    public function gabungan()
    {
    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->join('notif','notif.user_id=user.id_user');
        $this->db->where('notif.status',0);
    	$this->db->order_by('id_notif','DESC');
    	$query = $this->db->get();
    	return $query;
    }

     public function gabunganlimit()
    {
    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->join('notif','notif.user_id=user.id_user');
    	$this->db->order_by('notif.id_notif','DESC');
    	$this->db->limit(5);
    	$query = $this->db->get();
    	return $query->result();
    }

     public function hapus_data($where,$table)
    {
         $this->db->where($where);
         $this->db->delete($table);
    }
    }
    