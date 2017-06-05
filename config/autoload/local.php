<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' =>
                    'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => [
                    'host' => '127.0.0.1',
                    'port' => '5432',
                    'user' => 'postgres',
                    'password' => 'postgres',
                    'dbname' => 'db_qa'
                ]
            ],
        ]
    ]
];
