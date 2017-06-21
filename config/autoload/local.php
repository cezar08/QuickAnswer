<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' =>
                    'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => [
                    'host' => 'localhost',
                    'port' => '5432',
                    'user' => 'postgres',
                    'password' => 'root',
                    'dbname' => 'db_qa'
                ]
            ],
        ]
    ]
];
