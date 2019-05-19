<?php

namespace App\Classes;

use App\MultiException;
use App\TMagic;

abstract class Model
{
    use TMagic;
    const TABLE = '';

    /**
     * @return mixed
     */
    public static function findAll()
    {
        $db = Db::instance();
            $res = $db->queryEach(
                'SELECT * FROM ' . static::TABLE,
                static::class
            );
        return $res;
    }

    /**
     * @param $id
     * @return |null
     */
    public static function findById($id)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );
        if (count($res) === 1) {
            return $res[0];
        }
        return null;
    }

    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * @return void
     */
    public function insert()
    {
        $columns = [];
        $values = [];

        foreach ($this as $k => $v) {
            if ('id' == $k || is_null($this->$k)) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $columns) . ') VALUES (' . implode(',', array_keys($values)) . ')';
        $db = Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->lastId();
    }

    /**
     * @return void
     */
    public function update()
    {
        $values = [];
        $columns = [];
        foreach ($this as $k => $v) {
            if ('id' == $k || empty($this->$k)) {
                continue;
            }
            $values[':' . $k] = $v;
            $columns[] = '`' . $k . '` = :' . $k;
        }
        $values[':id'] = (int)$this->id;
        $sql = 'UPDATE `' . static::TABLE . '` SET ' . implode(', ', $columns) . ' WHERE `id` = :id';
        var_dump($sql);die;
        $db = Db::instance();
        $db->execute($sql, $values);
    }

    /**
     * @return void
     */
    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    /**
     * @return void
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id= :id';
        $db = Db::instance();
        $db->execute($sql, [':id' => $this->id]);
    }

    /**
     * @param $data
     * @throws MultiException
     */
    public function fill($data)
    {
        $e = new MultiException();
        foreach ($data as $key => $value) {
            $this->$key = $value;
            if (empty($this->$key)) {
                $e[] = new \Exception('Не заполнено обязательно поле');
            }
        }
        if (!$e->isEmpty()) {
            throw $e;
        }

    }
}
