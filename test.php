<?php
require __DIR__.'/autoload.php';
$db = \App\Classes\Db::instance();

$query = 'INSERT INTO news' . '(header,text,author_id) VALUES'.
    ' (:header,:text,:author_id)  ON DUPLICATE KEY UPDATE SET header=:header';
$db->execute($query,array(
    ':header'=>'asdasd',
    ':text'=>'qweqweqwe',
    ':author_id'=>'1'
));