<?php

const BASE_PATH   = __DIR__;
const PUBLIC_PATH = BASE_PATH."/public";
const PDO_PARAM   = [
  "mysql:host=10.7.7.1;port=9999;dbname=motion_sensor",
  "username",
  "password",
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]
];
const BASE_URL = "http://127.0.0.1:8000";
const BASE_ASSET_URL = BASE_URL."/assets";
