<?php

namespace App;

include(__DIR__ . '/../config.php');


class Template
{
    public $layout;

    public $title;



    function __construct($title = 'Mr.WorldWide', $layout = 'empty')
    {
        $layout = $GLOBALS['BASE_DIR'] . '/views/layouts/' . $layout . '.php';


        $this->layout = $layout;
        $this->title = $title;

        ob_start();
        register_shutdown_function(array($this, 'layout_shutdown'));
    }



    public function layout_shutdown()
    {

        $content = ob_get_contents();

        ob_end_clean();

        if (is_null($this->layout)) {
            echo $content;
            return;
        }

        $title = $this->title;
        require $this->layout;
    }

    public function include($path)
    {
        return include($GLOBALS['BASE_DIR'] . '/views/' . $path . '.php');
    }
    public function asset($path)
    {
        $random = $GLOBALS['DEV_MODE'] ? '?' . rand(1, 1200) : '';
        return '/files/' . $path . $random;
    }
}