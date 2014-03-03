<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $config['module_config'] = array(
        'name'          => 'Project Brief',
        'description'   => 'Allow creation of project briefs for Nonprofits',
        'author'        => 'Nick VanMeter',
        'homepage'      => 'http://...',
        'version'       => '1.0.1',
        'menu'          => array(
            'context'   => 'path/to/sview'
        ),
        'weights'       => array(
            'context'   => 10
        )
    );