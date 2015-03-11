<?php

    class Page_model extends MY_Model
    {

        protected $table_name   = 'pages';
        protected $key          = 'page_id';
        protected $set_created  = true;
        protected $set_modified = true;
        protected $soft_deletes = true;
        protected $date_format  = 'datetime';

        //---------------------------------------------------------------
        protected $validation_rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'body',
                'label' => 'Body',
                'rules' => 'trim|xss_clean'
            )
        );

        protected $insert_validation_rules = array(
           'title' => 'required',
           'body'  => 'required'
       );
    }