<?php

    class Projects_model extends MY_Model
    {

        protected $table_name   = 'briefs';
        protected $key          = 'brief_id';
        protected $set_created  = true;
        protected $set_modified = true;
        protected $soft_deletes = true;
        protected $date_format  = 'datetime';

        //---------------------------------------------------------------
        protected $validation_rules = array(
            array(
                'field' => 'title',
                'label' => 'Project Name',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'body',
                'label' => 'Description',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'type',
                'label' => 'Project Type',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'hours',
                'label' => 'Estimated project hours',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'audience',
                'label' => 'Audience',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'deliverables',
                'label' => 'Final product/deliverable',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'deadlines',
                'label' => 'Known Deadlines',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'goals',
                'label' => 'Goals of project',
                'rules' => 'required|trim|strip_tags|xss_clean'
            ),
            array(
                'field' => 'disclaimer',
                'label' => 'Disclaimer acceptance',
                'rules' => 'required'
            )
        );

        protected $insert_validation_rules = array(
           'title' => 'required',
           'body'  => 'required'
       );
    }