<?php

/*
 * Funky Cache - Frog CMS caching plugin
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
 
$PDO = Record::getConnection();

$table = TABLE_PREFIX . "dashboard_log";

$PDO->exec("CREATE TABLE $table (
    id          INT(11) NOT NULL AUTO_INCREMENT,
    ident       CHAR(16) NOT NULL,
    priority    INT NOT NULL,
    message     VARCHAR(255),
    created_on  DATETIME DEFAULT NULL,
    PRIMARY KEY (id)
    ) DEFAULT CHARSET=utf8");
