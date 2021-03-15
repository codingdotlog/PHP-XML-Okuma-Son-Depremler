<?php

try
{
    $MYSQLdb = new PDO("mysql:host=localhost;port=3306;dbname=depremler;charset=utf8", "root", "12345678", array(PDO::ATTR_PERSISTENT => true));   
    $MYSQLdb->query("SET CHARACTER SET utf8");
} 
catch (PDOException $e)
{
    print "Bağantı Hatası!: " . $e->getMessage();
    die();
}


?>
