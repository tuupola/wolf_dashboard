<?php

/*
 * Dashboard - Frog CMS dashboard plugin
 *
 * Copyright (c) 2008-2009 Mika Tuupola
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
            'log_entry_today' => Record::findAllFrom('DashboardLogEntry', 'created_on > CURRENT_DATE() ORDER BY created_on DESC'),
            'log_entry_yesterday' => Record::findAllFrom('DashboardLogEntry', 'created_on > DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY) AND created_on < CURRENT_DATE() ORDER BY created_on DESC'),
            'log_entry_older' => Record::findAllFrom('DashboardLogEntry', '1=1 ORDER BY created_on DESC')
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
