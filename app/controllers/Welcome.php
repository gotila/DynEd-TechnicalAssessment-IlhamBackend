<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{

    function __construct() {
        parent::__construct();

        if (! $this->loggedIn) {
            redirect('login');
        }
        // $this->load->model('welcome_model');
        // if ($register = $this->site->registerData($this->session->userdata('user_id'))) {
        //     $register_data = array('register_id' => $register->id, 'cash_in_hand' => $register->cash_in_hand, 'register_open_time' => $register->date, 'store_id' => $register->store_id);
        //     $this->session->set_userdata($register_data);
        // }
    }

    function index() {
        if (!$this->loggedIn) {
            redirect('login');
        }
        // if (!$this->Admin) {
        //     $this->session->set_flashdata('warning', lang("access_denied"));
        //     redirect($_SERVER["HTTP_REFERER"]);
        // }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['users'] = $this->site->getAllUsers();
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
        $this->data['page_title'] = lang('dashboard');
        $this->page_construct('dashboard', $this->data, $meta);
        
    }

    // function disabled() {
    //     $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
    //     $this->data['page_title'] = lang('disabled_in_demo');
    //     $bc = array(array('link' => '#', 'page' => lang('disabled_in_demo')));
    //     $meta = array('page_title' => lang('disabled_in_demo'), 'bc' => $bc);
    //     $this->page_construct('disabled', $this->data, $meta);
    // }

    public function signing($req = NULL) {
        if (!$req) {
            header("Content-type: text/plain");
            echo file_get_contents('./files/public.pem');
            exit(0);
        } else {

            $privateKey = openssl_get_privatekey(file_get_contents('./files/private.pem'), 'S3cur3P@ssw0rd');
            $signature = null;
            openssl_sign($req, $signature, $privateKey);

            if ($signature) {
                header("Content-type: text/plain");
                echo base64_encode($signature);
                exit(0);
            }

            echo '<h1>Error signing message</h1>';
            exit(1);
        }
    }
    
}
