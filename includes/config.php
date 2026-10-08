<?php 
error_reporting(0);
ini_set('display_errors', 0);

// DB credentials.
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','srms');
// Establish database connection.
try
{
$initCmd = defined('Pdo\Mysql::ATTR_INIT_COMMAND') ? Pdo\Mysql::ATTR_INIT_COMMAND : (defined('PDO::MYSQL_ATTR_INIT_COMMAND') ? PDO::MYSQL_ATTR_INIT_COMMAND : 1002);
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(
    $initCmd => "SET NAMES 'utf8'"
));
}
catch (PDOException $e)
{
$dbh = null;
}
?>