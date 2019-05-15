<?php

namespace App\Models;

use App\Exceptions\E404;
use App\Classes\Model;
use App\Classes\Db;


/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */

class News extends Model
{

    const TABLE = 'news';

    public $header;
    public $text;
    public $author_id;
    public $id;

    /**
     * @param int $limit
     * @return mixed
     * @throws E404
     */
    public static function findLatest($limit = 3)
    {
        $db= Db::instance();
        $res = $db->queryEach(
            'SELECT * FROM ' . self::TABLE . ' ORDER BY -id LIMIT '.$limit,
            self::class
        );
        if(!empty($res))
        {
            return $res;
        } else {
            return null;
        }
    }

    /**
     * @param $key
     * @return bool|null
     * @throws \App\Exceptions\E404
     */
    public function __get($key)
    {
        if($key = 'author' ) {
            $author = Author::findById($this->author_id);
            return $author;
        } else {
            return null;
        }
    }

    public function __isset($key)
    {
        if($key = 'author' && !empty($this->author_id)) {
            return true;
        } else {
            return false;
        }
    }

}
