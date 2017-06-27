<?php

namespace adapt\developer{
    
    /* Prevent direct access */
    defined('ADAPT_STARTED') or die;
    
    class view_bundle_information_form extends \adapt\view{
        
        public function __construct($bundle){
            parent::__construct('div');
            
            if ($bundle instanceof \adapt\bundle){
                
                $form = new html_form(array('method' => 'post', 'action' => "/bundle/{$bundle->name}"));
                $this->add($form);
                
                $form->add(new html_h2("Bundle information"));
                $form->add(new html_p("Information about the bundle, used by Adapt framework and also by Adapt repository.", array('class' => 'lead')));
                
                $row = new html_div(array('class' => 'row'));
                $form->add($row);
                
                $col1 = new html_div(['class' => 'col-sm-6']);
                $col2 = new html_div(['class' => 'col-sm-6']);
                $row->add($col1, $col2);
                
                $form_group = new html_div(['class' => 'form-group']);
                $col1->add($form_group);
                
                $form_group->add(new html_label('Name'));
                $form_group->add(new html_input(['type' => 'text', 'name' => 'bundle[name]', 'value' => $bundle->name, 'class' => 'form-control']));
                $form_group->add(new html_p("This name must be unique, no other bundle can exist called this.", ['class' => 'help-block']));
                
                $form_group = new html_div(['class' => 'form-group']);
                $col2->add($form_group);
                
                $form_group->add(new html_label('Label'));
                $form_group->add(new html_input(['type' => 'text', 'name' => 'bundle[label]', 'value' => $bundle->label, 'class' => 'form-control']));
                $form_group->add(new html_p("How should this bundle be labelled in the Adapt repository?", ['class' => 'help-block']));
                
                
                $row = new html_div(array('class' => 'row'));
                $form->add($row);
                
                $col = new html_div(['class' => 'col-xs-12']);
                $row->add($col);
                
                $form_group = new html_div(['class' => 'form-group']);
                $col->add($form_group);
                
                $form_group->add(new html_label('Description'));
                $form_group->add(new html_textarea($bundle->description, ['name' => 'bundle[description]', 'class' => 'form-control']));
                $form_group->add(new html_p("How should this bundle be described in the Adapt repository?", ['class' => 'help-block']));
                
                
                $row = new html_div(array('class' => 'row'));
                $form->add($row);
                
                $col = new html_div(['class' => 'col-xs-6']);
                $row->add($col);
                
                $form_group = new html_div(['class' => 'form-group']);
                $col->add($form_group);
                
                $form_group->add(new html_label('Bundle type'));
                
                $select = new html_select(['class' => 'form-control', 'name' => 'bundle[type]']);
                
                $bundle_types = $this->bundles->repository->get_bundle_types();
                foreach($bundle_types as $type){
                    $option = new html_option($type['label'], ['value' => $type['name']]);
                    if ($bundle->type == $type['name']){
                        $option->attr('selected', 'selected');
                    }
                    $select->add($option);
                }
                $form_group->add($select);
                $form_group->add(new html_p("What type of bundle is this?", ['class' => 'help-block']));
                
                
                $col = new html_div(['class' => 'col-xs-6']);
                $row->add($col);
                
                $form_group = new html_div(['class' => 'form-group']);
                $col->add($form_group);
                
                $form_group->add(new html_label('Namespace'));
                $form_group->add(new html_input(['type' => 'text', 'name' => 'bundle[namespace]', 'value' => $bundle->namespace, 'class' => 'form-control']));
                $form_group->add(new html_p("The namespace used by this bundle.", ['class' => 'help-block']));
                
                
                $row = new html_div(array('class' => 'row'));
                $form->add($row);
                
                $col = new html_div(['class' => 'col-xs-6']);
                $row->add($col);
                
                $form_group = new html_div(['class' => 'form-group']);
                $col->add($form_group);
                
                
                $form_group->add(new html_label('Version'));
                $form_group->add(new html_input(['type' => 'text', 'name' => 'bundle[version]', 'value' => $bundle->version, 'class' => 'form-control']));
                $form_group->add(new html_p("The version of this bundle", ['class' => 'help-block']));
                
                
                $col = new html_div(['class' => 'col-xs-6']);
                $row->add($col);
                
                $form_group = new html_div(['class' => 'form-group']);
                $col->add($form_group);
                
                
                $form_group->add(new html_label('Copyright'));
                $form_group->add(new html_input(['type' => 'text', 'name' => 'bundle[copyright]', 'value' => $bundle->copyright, 'class' => 'form-control']));
                $form_group->add(new html_p("The copyright holder of this bundle.", ['class' => 'help-block']));
            }
        }
        
    }
    
}

?>