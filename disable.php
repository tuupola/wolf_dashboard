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
$PDO->exec("DROP TABLE $table");
