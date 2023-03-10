<?php 
use ho_b7\phpmvc\Application;

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/


class m0002_add_password_column 
{
    public function up() 
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN `password` VARCHAR(512) NOT NULL;";
        $db->pdo->exec($SQL);
    }

    public function down() 
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN `password`;";
        $db->pdo->exec($SQL);
    }
}