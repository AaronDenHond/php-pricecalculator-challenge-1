<?php

class Database
{
    public static function openConnection(): PDO
    {
        $dbhost = $GLOBALS['DBHOST'];
        $dbuser = $GLOBALS['DBUSER'];
        $dbpass = $GLOBALS['DBPASS'];
        $db = $GLOBALS['DB'];

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }
}