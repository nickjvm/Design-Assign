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

        public function page($slug,$slug2 = "")
        {
            $this->load->helper('typography');

            if($slug2) {
                $slug = $slug."/".$slug2;
            }
            $page = $this->page_model->order_by('created_on', 'asc')
                                      ->limit(1)
                                      ->find_by("slug",$slug);

            Template::set('page', $page);
            Template::render();
        }

        //--------------------------------------------------------------------

    }