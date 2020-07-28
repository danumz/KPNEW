<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datadselesai extends CI_model{

    public function tampildata()
    {
        return $this->db->get('data_selesaidosen');
    }
   }