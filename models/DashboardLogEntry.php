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

class DashboardLogEntry extends Record 
{
    const TABLE_NAME = 'dashboard_log';
    
    public  $log_time;
    public  $ident;
    public  $priority;
    public  $message;


    public function beforeSave()
    {           
        $this->created_on = date('Y-m-d H:i:s');
        return true;
    }
}

