<?php

namespace adapt\developer{
    
    class controller_root extends \adapt\controller{
        
        protected $_content;
        
        public function __construct(){
            parent::__construct();
            
            //$navbar = new bs\view_navbar();
            //$navbar->add_class('product-nav');
            //$navbar->static_top = true;
            //$navbar->brand = array('adapt');
            //$navbar->brand_url = "http://www.adaptframework.com";
            //$navbar->add('Framework', 'http://www.adaptframework.com');
            //$navbar->add('Social', 'http://social.adaptframework.com');
            //$navbar->add('Video', 'http://video.adaptframework.com');
            //$this->view->add($navbar);
            
            $navbar = new \bootstrap\views\view_navbar();
            $navbar->static_top = true;
            $navbar->brand = array(new html_strong('adapt'), ' developer');
            $navbar->brand_url = "/";
            //$navbar->add('Getting started', '/getting-started');
            //
            $menu = new \bootstrap\views\view_dropdown('Bundles');
            $menu->add(new \bootstrap\views\view_dropdown_menu_item('New bundle...'));
            $menu->add(new \bootstrap\views\view_dropdown_menu_item('Open bundle...'));
            $navbar->add($menu);
            
            $menu = new \bootstrap\views\view_dropdown('Applications');
            $menu->add(new \bootstrap\views\view_dropdown_menu_item('Run application...'));
            $navbar->add($menu);
            //
            //$menu = new bs\view_dropdown('Documentation');
            //$menu->add(new bs\view_dropdown_header('Articles'));
            //$menu->add(new bs\view_dropdown_menu_item('Quick overview'));
            //$menu->add(new bs\view_dropdown_menu_item('Installation'));
            //$menu->add(new bs\view_dropdown_menu_item('Bundle design'));
            //$menu->add(new bs\view_dropdown_menu_item('Data types'));
            //$menu->add(new bs\view_dropdown_menu_item('Controllers and URL Routing'));
            //$menu->add(new bs\view_dropdown_menu_item('Views and aQuery'));
            //$menu->add(new bs\view_dropdown_menu_item('Models and SQL'));
            //$menu->add(new bs\view_dropdown_divider());
            //$menu->add(new bs\view_dropdown_header('References'));
            //$menu->add(new bs\view_dropdown_menu_item('Class reference'));
            //$menu->add(new bs\view_dropdown_menu_item('Schema design'));
            //$navbar->add($menu);
            //
            //$menu = new bs\view_dropdown('Repository');
            //$menu->add(new bs\view_dropdown_menu_item('Upload your bundle'));
            //$menu->add(new bs\view_dropdown_menu_item('Browse bundles'));
            //$menu->add(new bs\view_dropdown_divider());
            //$menu->add(new bs\view_dropdown_menu_item('Create your own reposititory'));
            //$menu->add(new bs\view_dropdown_menu_item('Configuring repositories in Adapt'));
            //$navbar->add($menu);
            
            //$menu = new model_menu();
            //if ($menu->load_by_name('adapt_website_main_navigation')){
            //    $view = $menu->get_view();
            //    $navbar->find('.navbar-collapse')->append($view);
            //}
            //
            //if ($this->session->is_logged_in){
            //    $menu = new model_menu();
            //    $menu->load_by_name('adapt_website_account_navigation');
            //    $view = $menu->get_view();
            //    $view->add_class('navbar-right');
            //    $view->set_variables($this->session->user->to_hash_string());
            //    //print new html_pre(print_r($this->session->user->to_hash_string(), true));
            //    $navbar->find('.navbar-collapse')->append($view);
            //}else{
            //    $menu = new model_menu();
            //    $menu->load_by_name('adapt_website_login_navigation');
            //    $view = $menu->get_view();
            //    $view->add_class('navbar-right');
            //    $navbar->find('.navbar-collapse')->append($view);
            //}
            
            //$nav = new bs\view_nav('navbar');
            //$nav->add_class('navbar-right');
            //$navbar->find('.navbar-collapse')->append($nav);
            
            //$navbar->add('Cloud hosting', '/cloud-hosting');
            
            parent::add_view($navbar);
            $this->_content = new html_div(null, array('class' => 'col-xs-12'));
            $container = new html_div(new html_div($this->_content, array('class' => 'row')), array('class' => 'container main-content'));
            parent::add_view($container);
            
            
            
        }
        
        public function add_view($view){
            $this->_content->add($view);
        }
        
        public function permission_view_account(){
            return $this->session->is_logged_in;
        }
        
        public function view_default(){
            
        }
        
        public function view_bundle(){
            $this->add_view(new view_bundle($this->bundles->load_bundle('bootstrap')));
        }
        
        public function view_has_bundle(){
            if ($value = $this->bundles->repository->has('advanced_data_types')){
                $this->add_view('Has ' . $value);
                $this->bundles->repository->get('advanced_data_types', $value);
            }else{
                $this->add_view('Has not');
            }
        }
        
    }
    
}

?>
