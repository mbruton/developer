<?php

namespace adapt\developer{
    
    /* Prevent Direct Access */
    defined('ADAPT_STARTED') or die;
    
    class bundle_developer extends \adapt\bundle{
        
        public function __construct($data){
            parent::__construct('developer', $data);
        }
        
        public function boot(){
            if (parent::boot()){
                /*
                 * When no application is present, adapt developer acts
                 * as the application and provides it's own controller_root.
                 * When an application is present, adapt developer adds
                 * itself to the global settings so it's always loaded
                 */
                
                return true;
            }
            
            return false;
        }
        
    }
    
    
}

?>