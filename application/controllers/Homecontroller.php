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
        $this->load->library('pagination');
        $this->load->library('Customlib');
        $this->load->helper(array(
            'cookie',
            'url',
            'captcha'
        ));
        $this->load->database();
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of About_us table's index to get query
     *            
     */
    function index($start = 0)
    {
        $data['_view'] = 'front/home/index';
        $this->load->view('layouts/front/body', $data);
    }
}