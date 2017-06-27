<?php

namespace adapt\developer{
    
    /* Prevent direct access */
    defined('ADAPT_STARTED') or die;
    
    class view_bundle extends \adapt\view{
        
        public function __construct($bundle){
            parent::__construct('div');
            $this->add_class('row');
            
            $this->add(new html_h1(array($bundle->label, " ", new html_small($bundle->name))));
            $this->add(new html_p($bundle->description, array('class' => 'lead')));
            
            $left_cell = new html_div(array('class' => 'col-xs-3'));
            $right_cell = new html_div(array('class' => 'col-xs-9'));
            
            $this->add($left_cell, $right_cell);
            
            
            $panel_group = new html_div(array('class' => 'panel-group', 'role' => 'tablist', 'area-multiselectable' => 'true'));
            $panel_group->set_id();
            $left_cell->add($panel_group);
            
            /*
             * Settings Panel
             */
            
            $panel_title = new html_h4(
                new html_a("Settings", array('role' => 'button', 'data-toggle' => 'collapse', 'data-parent' => '#' . $panel_group->id, 'aria-expanded' => 'true'))
            );
            
            $content = new html_div(
                array(
                    new html_button("Bundle information", array('class' => 'btn btn-link btn-block')),
                    new html_button("Dependencies", array('class' => 'btn btn-link btn-block')),
                    new html_button("Settings", array('class' => 'btn btn-link btn-block')),
                    new html_button("Schema design", array('class' => 'btn btn-link btn-block'))
                )
            );
            
            
            $panel = new \bootstrap\views\view_panel($content, $panel_title);
            $wrapper = new html_div(array('class' => 'panel-collapse collapse in', 'role' => 'tabpanel'));
            $wrapper->set_id();
            $panel_title->find('a')->attr('aria-controls', $wrapper->id);
            $panel_title->find('a')->attr('href', '#' . $wrapper->id);
            $panel->find('.panel-body')->wrap($wrapper);
            $panel_group->add($panel);
            
            
            /*
             * Classes Panel
             */
            
            $content = new html_div();
            $path = ADAPT_PATH . "{$bundle->name}/{$bundle->name}-{$bundle->version}/classes";
            
            $files = scandir($path);
            
            foreach($files as $file){
                if (preg_match("/\.php$/", $file)){
                    $content->add(new html_button($file, array('class' => 'btn btn-link btn-block')));
                }
            }
            
            $panel_title = new html_h4(
                new html_a("Classes", array('class' => 'collapsed', 'role' => 'button', 'data-toggle' => 'collapse', 'data-parent' => '#' . $panel_group->id, 'aria-expanded' => 'false'))
            );
            $panel = new \bootstrap\views\view_panel($content, $panel_title);
            $wrapper = new html_div(array('class' => 'panel-collapse collapse', 'role' => 'tabpanel'));
            $wrapper->set_id();
            $panel_title->find('a')->attr('aria-controls', $wrapper->id);
            $panel_title->find('a')->attr('href', '#' . $wrapper->id);
            $panel->find('.panel-body')->wrap($wrapper);
            $panel_group->add($panel);
            
            
            /*
             * Controllers Panel
             */
            $content = new html_div();
            $path = ADAPT_PATH . "{$bundle->name}/{$bundle->name}-{$bundle->version}/controllers";
            
            $files = scandir($path);
            
            foreach($files as $file){
                if (preg_match("/\.php$/", $file)){
                    $content->add(new html_button($file, array('class' => 'btn btn-link btn-block')));
                }
            }
            
            $panel_title = new html_h4(
                new html_a("Controllers", array('class' => 'collapsed', 'role' => 'button', 'data-toggle' => 'collapse', 'data-parent' => '#' . $panel_group->id, 'aria-expanded' => 'false'))
            );
            $panel = new \bootstrap\views\view_panel($content, $panel_title);
            $wrapper = new html_div(array('class' => 'panel-collapse collapse', 'role' => 'tabpanel'));
            $wrapper->set_id();
            $panel_title->find('a')->attr('aria-controls', $wrapper->id);
            $panel_title->find('a')->attr('href', '#' . $wrapper->id);
            $panel->find('.panel-body')->wrap($wrapper);
            $panel_group->add($panel);
            
            
            /*
             * Views Panel
             */
            $content = new html_div();
            $path = ADAPT_PATH . "{$bundle->name}/{$bundle->name}-{$bundle->version}/views";
            
            $files = scandir($path);
            
            foreach($files as $file){
                if (preg_match("/\.php$/", $file)){
                    $content->add(new html_button($file, array('class' => 'btn btn-link btn-block')));
                }
            }
            $panel_title = new html_h4(
                new html_a("Views", array('class' => 'collapsed', 'role' => 'button', 'data-toggle' => 'collapse', 'data-parent' => '#' . $panel_group->id, 'aria-expanded' => 'false'))
            );
            $panel = new \bootstrap\views\view_panel($content, $panel_title);
            $wrapper = new html_div(array('class' => 'panel-collapse collapse', 'role' => 'tabpanel'));
            $wrapper->set_id();
            $panel_title->find('a')->attr('aria-controls', $wrapper->id);
            $panel_title->find('a')->attr('href', '#' . $wrapper->id);
            $panel->find('.panel-body')->wrap($wrapper);
            $panel_group->add($panel);
            
            
            /*
             * Models Panel
             */
            $content = new html_div();
            $path = ADAPT_PATH . "{$bundle->name}/{$bundle->name}-{$bundle->version}/models";
            
            $files = scandir($path);
            
            foreach($files as $file){
                if (preg_match("/\.php$/", $file)){
                    $content->add(new html_button($file, array('class' => 'btn btn-link btn-block')));
                }
            }
            $panel_title = new html_h4(
                new html_a("Models", array('class' => 'collapsed', 'role' => 'button', 'data-toggle' => 'collapse', 'data-parent' => '#' . $panel_group->id, 'aria-expanded' => 'false'))
            );
            $panel = new \bootstrap\views\view_panel($content, $panel_title);
            $wrapper = new html_div(array('class' => 'panel-collapse collapse', 'role' => 'tabpanel'));
            $wrapper->set_id();
            $panel_title->find('a')->attr('aria-controls', $wrapper->id);
            $panel_title->find('a')->attr('href', '#' . $wrapper->id);
            $panel->find('.panel-body')->wrap($wrapper);
            $panel_group->add($panel);
            
            /*
             * Static content Panel
             */
            $content = new html_div();
            $path = ADAPT_PATH . "{$bundle->name}/{$bundle->name}-{$bundle->version}/static";
            
            $files = scandir($path);
            
            foreach($files as $file){
                if (preg_match("/^[^\.]$/", $file)){
                    $content->add(new html_button($file, array('class' => 'btn btn-link btn-block')));
                }
            }
            $panel_title = new html_h4(
                new html_a("Static content", array('class' => 'collapsed', 'role' => 'button', 'data-toggle' => 'collapse', 'data-parent' => '#' . $panel_group->id, 'aria-expanded' => 'false'))
            );
            $panel = new \bootstrap\views\view_panel($content, $panel_title);
            $wrapper = new html_div(array('class' => 'panel-collapse collapse', 'role' => 'tabpanel'));
            $wrapper->set_id();
            $panel_title->find('a')->attr('aria-controls', $wrapper->id);
            $panel_title->find('a')->attr('href', '#' . $wrapper->id);
            $panel->find('.panel-body')->wrap($wrapper);
            $panel_group->add($panel);
            
            /* Add a container for the main content - default it to the bundle form */
            $container = new html_div(new view_bundle_information_form($bundle), array('class' => 'bundle-content-container'));
            $right_cell->add($container);
        }
        
    }
    
}

?>