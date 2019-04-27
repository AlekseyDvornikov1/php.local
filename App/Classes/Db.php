<?php

namespace App\Classes;

use App\Singleton;

class Db
{
    use Singleton;

    protected $dbh;

    /**
     * Db constructor.
     * @throws \App\Exceptions\Db
     */
    protected function __construct()
    {
        $config = Config::instance();
        try {
            $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
                $config->data['db']['user'],
                $config->data['db']['password']);
        } catch (\PDOException $ex) {
            throw new \App\Exceptions\Db("Ошибка с БД: " . $ex->getMessage());
        }
    }


    /**
     * @param $sql
     * @param array $data
     * @return bool
     * @throws \App\Exceptions\Db
     */
    public function execute($sql, $data = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
        } catch (\PDOException $ex) {
            throw new \App\Exceptions\Db("Ошибка с подготовкой запроса: " . $ex->getMessage());
        }
        try {
            $res = $sth->execute($data);
        } catch (\PDOException $ex) {
            throw new \App\Exceptions\Db("Ошибка с выполнением запроса: " . $ex->getMessage());
        }
        return $res;
    }

    /**
     * @param $sql
     * @param $class
     * @param array $data
     * @return array
     * @throws \App\Exceptions\Db
     */
    public function query($sql, $class, $data = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
        } catch (\PDOException $ex) {
            throw new \App\Exceptions\Db("Ошибка с подготовкой запроса: " . $ex->getMessage());
        }
        try {
            $res = $sth->execute($data);
        } catch (\PDOException $ex) {
            throw new \App\Exceptions\Db("Ошибка с выполнением запроса: " . $ex->getMessage());
        }
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    /**
     * @return int
     */
        public function lastId()
        {
            return (int)$this->dbh->lastInsertId('id');
        }
}
