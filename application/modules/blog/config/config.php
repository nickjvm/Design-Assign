<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $config['module_config'] = array(
        'name'          => 'Blog',
        'description'   => 'A Simple Blog Example',
        'author'        => 'Nick VanMeter',
        'homepage'      => 'http://...',
        'version'       => '1.0.1',
        'menu'          => array(
            'context'   => 'path/to/view'
        ),
        'weights'       => array(
            'context'   => 0
        )
    );