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
                    'password' => 'postgres',
                    'dbname' => 'db_qa_test'
                ]
            ],
        ]
    ]
];
