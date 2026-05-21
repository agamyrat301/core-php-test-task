<?php

return [
    'host'     => getenv('DB_HOST')     ?: 'localhost',
    'database' => getenv('DB_DATABASE') ?: 'core_php_test_task',
    'username' => getenv('DB_USERNAME') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: '',
];
