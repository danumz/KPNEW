<?php
class M_sidebar extends CI_Model{

public function getrole()
    {
    	$query = "SELECT `user`.*, `user_role`.`role`
    	FROM `user` JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`"; 
    	return $this->db->query($query)->result_array();
    }
   }

   