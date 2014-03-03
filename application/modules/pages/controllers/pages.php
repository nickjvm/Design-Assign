<?php

class Pages extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('page_model');
            $this->load->helper('application');
        }

        //--------------------------------------------------------------------

        public function index()
        {
        }

        //--------------------------------------------------------------------

        public function page($slug)
        {
            $this->load->helper('typography');

            $page = $this->page_model->order_by('created_on', 'asc')
                                      ->limit(1)
                                      ->find_by("slug",$slug);

            Template::set('page', $page);
            Template::render();
        }

        //--------------------------------------------------------------------

    }