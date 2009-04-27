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

$PDO = Record::getConnection();

$table = TABLE_PREFIX . "dashboard_log";
$PDO->exec("DROP TABLE $table");
