<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datamselesai extends CI_model{

    public function tampildata()
    {
        return $this->db->get('data_selesaimhs');
    }
   }