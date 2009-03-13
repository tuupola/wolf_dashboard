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
    
    public  $created_on;
    public  $ident;
    public  $priority;
    public  $message;


    public function beforeSave()
    {           
        $this->created_on = date('Y-m-d H:i:s');
        return true;
    }
    
    /* TODO: hack while we are waiting for PHP 5.3, expect extending  */
    /* class to have static function like the following:              */
    
    public static function count($params=null, $class=__CLASS__) {
        $params['select'] = 'COUNT(*)';
        $sql = Record::buildSql($params, $class);
        return self::connection()->query($sql, PDO::FETCH_COLUMN, 0)->fetch();
    }

    public static function findById($id, $class=__CLASS__) {
        $params['where'] = sprintf('id=%d', $id);
        $sql = Record::buildSql($params, $class);
        return self::connection()->query($sql, PDO::FETCH_CLASS, $class)->fetch();
    }
    
    public static function find($params=null, $class=__CLASS__) {
        $retval = array();
        $sql = Record::buildSql($params, $class);
        foreach (self::connection()->query($sql, PDO::FETCH_CLASS, $class) as $object) {
            $retval[] = $object;
        }

        return $retval;
    }
}

