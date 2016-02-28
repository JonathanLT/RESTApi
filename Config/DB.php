<?php
/**
 * Created by PhpStorm.
 * User: loquet_j
 * Date: 28/02/2016
 * Time: 20:48
 */

namespace REST\Config;


class DB
{
    private $db;

    /**
     * @return \PDO
     */
    public static function connect()
    {
        $file = "setting.ini";
        $cfg = parse_ini_file($file, true);
        try {
            $DB = new \PDO($cfg['database']['driver'] . ':host=' . $cfg['database']['host'] . ':' . $cfg['database']['port'] .
                ';dbname=' . $cfg['database']['schema'],
                $cfg['database']['username'], $cfg['database']['password']);
            $DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $DB;
    }


    /**
     * @return mixed
     */
    public function getDb()
    {
        if ($this->db == null)
            $this->db = new DB();
        return $this->db;
    }
}