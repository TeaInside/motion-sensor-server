<?php

require __DIR__."/../config.php";
require BASE_PATH."/isolated/helpers/global.php";

/**
 * @param string $class
 * @return void
 */
function myAutoloader($class)
{
  if (file_exists($f = BASE_PATH."/isolated/classes/"
      .str_replace($class, "\\", "/").".php")) {
    require $f;
  }
}

spl_autoload_register("myAutoloader");
