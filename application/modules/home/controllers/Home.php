<?php
class Home extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('send');
       
    }

    public function index()
    {
        cek_session_admin();
        $this->template->load('home', 'dashboard');
    }

}
