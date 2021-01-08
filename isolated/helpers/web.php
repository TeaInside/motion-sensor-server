<?php

/**
 * @param string $str
 * @return string
 */
function e(string $str): string
{
  return htmlspecialchars($str, ENT_QUOTES);
}

/**
 * @return string
 */
function asset(string $str): string
{
  return e(BASE_ASSET_URL."/{$str}");
}

/**
 * @param string $__name
 * @param array  $__vars
 * @return mixed
 */
function load_view(string $__name, array $__vars = [])
{
  extract($__vars);
  return require BASE_PATH."/isolated/views/{$__name}.php";
}

/**
 * @param string $__name
 * @param array  $__vars
 * @return mixed
 */
function load_api(string $__name, array $__vars = [])
{
  extract($__vars);
  return require BASE_PATH."/isolated/api/{$__name}.php";
}
