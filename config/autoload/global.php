<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => [
                        'host' => 'localhost',
                        'port' => '3306',
                        'user' => 'zf3',
                        'password' => 'root',
                        'dbname' => 'db_qa_test'
                    ]
                ]
            ]
        ]
    ];
