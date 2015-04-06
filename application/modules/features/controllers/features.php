<?php
class Features extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('feature_model');
            $this->load->helper('text');
        }

        //--------------------------------------------------------------------

        public function index()
        {
            $this->load->helper('typography');

            $features = $this->feature_model->order_by('created_on', 'desc')
                                      ->limit(5)
                                      ->where('deleted',0)
                                      ->find_all();

          	for($i=0;$i<count($features);$i++) {
          		$features[$i]->teaser = word_limiter($features[$i]->body, 75);
          	}
            Template::set('features', $features);

            Template::render();
        }

        //--------------------------------------------------------------------

        public function view($slug = "")
        {
            $this->load->helper('typography');

            $feature = $this->feature_model->order_by('created_on', 'asc')
                                      ->limit(1)
                                      ->where('deleted',0)
                                      ->find_by("slug",$slug);
			if(!$feature) {
				show_404();
			}
            Template::set('feature', $feature);

            Template::render();
        }

        //--------------------------------------------------------------------

    }