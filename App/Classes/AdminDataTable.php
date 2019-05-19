<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 19.05.2019
 * Time: 14:04
 */

namespace App\Classes;

class AdminDataTable
{

    protected $models;
    protected $functions;

    /**
     * AdminDataTable constructor.
     * @param $models
     * @param callable ...$functions
     */
    public function __construct($models, callable ...$functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    /**
     * @return array
     */
    public function render(): array
    {
        $table = [];
        foreach ($this->models as $k=>$model) {
            foreach ($this->functions as $function) {
                $table[$k][] = $function($model);
            }
        }
        return $table;
    }


}