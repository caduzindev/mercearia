<?php
session_start();

const BASE_URL = "http://192.168.1.105/Mercearia/";
const BASE_VIEWS = __DIR__."/src/Views";
const BASE_PATH_IMAGES = BASE_URL."src/Views/assets/images/";
const BASE_ASSETS = BASE_URL."src/Views/assets/dist/";
const BASE_PATH_PRODUCTS = __dir__.'/src/Views/assets/images/products/';

const DATABASE = [
    "driver"=>"mysql",
    "dbname"=>"mercearia",
    "user"=>"root",
    "password"=>"",
    "host"=>"localhost"
];