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

/* Prevent direct access. */
if (!defined("FRAMEWORK_STARTING_MICROTIME")) {
    die("All your base are belong to us!");
}

$pdo = Record::getConnection();

$table = TABLE_PREFIX . "dashboard_log";

if ('mysql' == $pdo->getAttribute(PDO::ATTR_DRIVER_NAME)) {
    /* Schema for MySQL */
    $pdo->exec("CREATE TABLE $table (
        id          INT(11) NOT NULL AUTO_INCREMENT,
        ident       CHAR(16) NOT NULL,
        priority    INT NOT NULL,
        message     VARCHAR(255),
        username    VARCHAR(64),
        created_on  DATETIME DEFAULT NULL,
        PRIMARY KEY (id)
        ) DEFAULT CHARSET=utf8");    
} else {
    /* Otherwise assume SQLite */
    $pdo->exec("CREATE TABLE $table (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        ident       CHAR(16) NOT NULL,
        priority    INT NOT NULL,
        message     VARCHAR(255),
        username    VARCHAR(64),
        created_on  DATETIME DEFAULT NULL
        )");
}

