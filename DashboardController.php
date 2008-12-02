<?php

/*
 * Dashboard - Frog CMS dashboard plugin
 *
 * Copyright (c) 2008 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://www.appelsiini.net/
 *
 */
 
class DashboardController extends PluginController
{
    function __construct() {
        AuthUser::load();
        if (!(AuthUser::isLoggedIn())) {
            redirect(get_url('login'));            
        }

        $this->setLayout('backend');
        #$this->assignToLayout('sidebar', new View('../../../plugins/dashboard/views/sidebar'));
    }

    function index() {
        $this->display('dashboard/views/index', array(
            'log_entry' => Record::findAllFrom('DashboardLogEntry')
        ));
    }
    
    function clear() {
        $log_entry = Record::findAllFrom('DashboardLogEntry');
        foreach ($log_entry as $entry) {
            $entry->delete();
        }        
        redirect(get_url('plugin/dashboard/'));   
    }    
}
