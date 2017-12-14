<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->config('ion_auth', TRUE);

        //initialize db tables data
        $this->tables = $this->config->item('tables', 'ion_auth');

        //initialize data
        $this->identity_column = $this->config->item('identity', 'ion_auth');
        $this->store_salt = $this->config->item('store_salt', 'ion_auth');
        $this->salt_length = $this->config->item('salt_length', 'ion_auth');
        $this->join = $this->config->item('join', 'ion_auth');
    }

   
    public function getUserGroups() {
        $this->db->order_by('id', 'asc');
        $q = $this->db->get("users_groups");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function userGroups() {
        $ugs = $this->getUserGroups();
        if ($ugs) {
            foreach ($ugs as $ug) {
                $this->db->update('users', array('group_id' => $ug->group_id), array('id' => $ug->user_id));
            }
            return true;
        }
        return false;
    }

}
