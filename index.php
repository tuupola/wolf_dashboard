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

define('DASHBOARD_LOG_EMERG',    0);
define('DASHBOARD_LOG_ALERT',    1);
define('DASHBOARD_LOG_CRIT',     2);
define('DASHBOARD_LOG_ERR',      3);
define('DASHBOARD_LOG_WARNING',  4);
define('DASHBOARD_LOG_NOTICE',   5);
define('DASHBOARD_LOG_INFO',     6);
define('DASHBOARD_LOG_DEBUG',    7);


Plugin::setInfos(array(
    'id'          => 'dashboard',
    'title'       => 'Dashboard', 
    'description' => 'Keep up to date what is happening with your site.', 
    'version'     => '0.1.0', 
    'license'     => 'MIT',
    'require_frog_version' => '0.9.3',
    'update_url'  => 'http://www.appelsiini.net/download/frog-plugins.xml',
    'website'     => 'http://www.appelsiini.net/'
));

/* Stuff for backend. */
if (class_exists('AutoLoader')) {
    require_once 'models/DashboardLogEntry.php';
    
    Plugin::addController('dashboard', 'Dashboard');

    Observer::observe('page_edit_after_save',   'dashboard_log_page_edit');
    Observer::observe('page_add_after_save',    'dashboard_log_page_add');
    Observer::observe('page_delete',            'dashboard_log_page_delete');
    
    /* These currently only work in MIT fork of Frog. */
    Observer::observe('layout_after_delete',    'dashboard_log_layout_delete');
    Observer::observe('layout_after_add',       'dashboard_log_layout_add');
    Observer::observe('layout_after_edit',      'dashboard_log_layout_edit');
    
    Observer::observe('snippet_after_delete',    'dashboard_log_snippet_delete');
    Observer::observe('snippet_after_add',       'dashboard_log_snippet_add');
    Observer::observe('snippet_after_edit',      'dashboard_log_snippet_edit');
    
    function dashboard_log_page_add($page) {
        $linked_title     = sprintf('<a href="%s">%s</a>', 
                                    get_url('page/edit/' . $page->id), $page->title);
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Page <b>:title</b> was created by :name', 
                                 array(':title' => $linked_title, 
                                       ':name'  => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }

    function dashboard_log_page_edit($page) {
        $linked_title     = sprintf('<a href="%s">%s</a>', 
                                    get_url('page/edit/' . $page->id), $page->title);
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Page <b>:title</b> was revised by :name', 
                                 array(':title' => $linked_title, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }

    function dashboard_log_page_delete($page) {
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Page <b>:title</b> was deleted by :name', 
                                 array(':title' =>  $page->title, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }
    
    function dashboard_log_layout_delete($layout) {
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Layout <b>:title</b> was deleted by :name', 
                                 array(':title' =>  $layout->name, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }

    function dashboard_log_layout_add($layout) {
        $linked_title     = sprintf('<a href="%s">%s</a>', 
                                    get_url('layout/edit/' . $layout->id), $layout->name);
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Layout <b>:title</b> was created by :name', 
                                 array(':title' =>  $linked_title, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }
    
    function dashboard_log_layout_edit($layout) {
        $linked_title     = sprintf('<a href="%s">%s</a>', 
                                    get_url('layout/edit/' . $layout->id), $layout->name);
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Layout <b>:title</b> was revised by :name', 
                                 array(':title' =>  $linked_title, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }

    /* Snippet */
    
    function dashboard_log_snippet_delete($snippet) {
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Snippet <b>:title</b> was deleted by :name', 
                                 array(':title' =>  $snippet->name, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }

    function dashboard_log_snippet_add($snippet) {
        $linked_title     = sprintf('<a href="%s">%s</a>', 
                                    get_url('snippet/edit/' . $snippet->id), $snippet->name);
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Snippet <b>:title</b> was created by :name', 
                                 array(':title' =>  $linked_title, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }
    
    function dashboard_log_snippet_edit($snippet) {
        $linked_title     = sprintf('<a href="%s">%s</a>', 
                                    get_url('snippet/edit/' . $snippet->id), $snippet->name);
        $data['ident']    = 'core';
        $data['priority'] = DASHBOARD_LOG_NOTICE;
        $data['message']  = __('Snippet <b>:title</b> was revised by :name', 
                                 array(':title' =>  $linked_title, 
                                       ':name' => AuthUser::getRecord()->name));
        $entry = new DashboardLogEntry($data);
        $entry->save();
    }

} 
