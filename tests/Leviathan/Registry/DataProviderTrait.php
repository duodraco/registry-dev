<?php
namespace Leviathan\Registry;

trait DataProviderTrait
{

    public function storageProvider()
    {
        return [
            [
                [
                    'a' => 'test 1',
                    'b' => 'test 2',
                    'c' => [
                        'new' => [
                            'namespace' => 'Leviathan'
                        ]
                    ]
                ],
                [
                    'a' => 'test 1',
                    'b' => 'test 2',
                    'c.new.namespace' => 'Leviathan'
                ]
            ],
            [
                [
                    'db' => [
                        'dsn' => 'mysql:host=localhost;dbname=my_db',
                        'user' => 'duodraco',
                        'password' => 'P@55w0rd!',
                        'options[]' => [
                            \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
                        ]
                    ]
                ],
                [
                    'db.dsn' => 'mysql:host=localhost;dbname=my_db',
                    'db.user' => 'duodraco',
                    'db.password' => 'P@55w0rd!',
                    'db.options' => [
                        \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
                    ]
                ]
            ]
        ];
    }
}
