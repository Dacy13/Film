<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// application/config/bootstrap_pagination.php

        $config['pagination']['full_tag_open'] = '<ul class="pagination d-flex justify-content-center">';
        $config['pagination']['full_tag_close'] = '</ul>';
        $config['pagination']['num_tag_open'] = '<li class="page-item">';
        $config['pagination']['num_tag_close'] = '</li>';
        $config['pagination']['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['pagination']['cur_tag_close'] = '</a></li>';
        $config['pagination']['next_tag_open'] = '<li class="page-item">';
        $config['pagination']['next_tagl_close'] = '</a></li>';
        $config['pagination']['prev_tag_open'] = '<li class="page-item">';
        $config['pagination']['prev_tagl_close'] = '</li>';
        $config['pagination']['first_tag_open'] = '<li class="page-item">';
        $config['pagination']['first_tagl_close'] = '</li>';
        $config['pagination']['last_tag_open'] = '<li class="page-item">';
        $config['pagination']['last_tagl_close'] = '</a></li>';
        $config['pagination']['attributes'] = array('class' => 'page-link');
?>

