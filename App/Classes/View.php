<?php

namespace App\Classes;


use App\TMagic;

class View
{
    use TMagic;

    /**
     * @param $template string Путь к шаблону
     * @return false|string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @param $template string Путь к шаблону
     */
    public function display($template)
    {
        echo $this->render($template);
    }



}