<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author: Amirul Momenin
 * Desc:Landing Page
 */
class Homecontroller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        if (! $this->session->userdata('validated')) {
            redirect('member/login/index');
        }
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['_view'] = 'member_homepage';
        $this->load->view('layouts/member/body', $data);
    }
}
