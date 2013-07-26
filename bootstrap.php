<?php
/* Include Path*/
set_include_path(
    get_include_path().PATH_SEPARATOR.
    __DIR__.'/library'.PATH_SEPARATOR.
    __DIR__.'/tests'
);
/*Autolad*/
spl_autoload_register(
    function ($classname) {
        $classname = ltrim($classname, '\\');
        preg_match('/^(.+)?([^\\\\]+)$/U', $classname, $match);
        $classname = str_replace('\\', '/', $match[1]).
            str_replace(['\\', '_'], '/', $match[2]).'.php';
        require $classname;
    }
);
