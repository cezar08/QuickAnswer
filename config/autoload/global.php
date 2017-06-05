<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                    'params' => [
                        'host' => '127.0.0.1',
                        'port' => '3306',
                        'user' => 'postgres',
                        'password' => ' ',
                        'dbname' => 'db_qa_test'
                    ]
                ]
            ]
        ]
    ];
