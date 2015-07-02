<?php

    // Date now needs to be set, which I guess is a good thing!
    date_default_timezone_set('Europe/London');

    // Find out what the issues are:
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);

    require '/var/www/html/vendor/autoload.php';
    use Aws\DynamoDb\DynamoDbClient;

    $client = DynamoDbClient::factory(array(
        'region' => 'eu-west-1',  // replace with your desired region
        'version' => '2012-08-10' // Now needs a version
    ));

    # Setup some local variables for dates

    date_default_timezone_set('UTC');

    $oneDayAgo = date('Y-m-d H:i:s', strtotime('-1 days'));
    $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
    $fourteenDaysAgo = date('Y-m-d H:i:s', strtotime('-14 days'));
    $twentyOneDaysAgo = date('Y-m-d H:i:s', strtotime('-21 days'));

    $tableName = 'ProductCatalog';
    echo "Adding data to the $tableName table..." . PHP_EOL;

    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '1101'),
                            'Title'           => array('S' => 'Book 101 Title'),
                            'ISBN'            => array('S' => '111-1111111111'),
                            'Authors'         => array('SS' => array('Author1')),
                            'Price'           => array('N' => '2'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 0.5'),
                            'PageCount'       => array('N' => '500'),
                            'InPublication'   => array('N' => '1'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '102'),
                            'Title'           => array('S' => 'Book 102 Title'),
                            'ISBN'            => array('S' => '222-2222222222'),
                            'Authors'         => array('SS' => array('Author1', 'Author2')),
                            'Price'           => array('N' => '20'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 0.8'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '1'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '103'),
                            'Title'           => array('S' => 'Book 103 Title'),
                            'ISBN'            => array('S' => '333-3333333333'),
                            'Authors'         => array('SS' => array('Author1', 'Author2')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '201'),
                            'Title'           => array('S' => '18-Bike-201'),
                            'Description'     => array('S' => '201 Description'),
                            'BicycleType'     => array('S' => 'Road'),
                            'Brand'           => array('S' => 'Mountain A'),
                            'Price'           => array('N' => '100'),
                            'Gender'          => array('S' => 'M'),
                            'Color'           => array('SS' => array('Red', 'Black')),
                            'ProductCategory' => array('S' => 'Bicycle')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '202'),
                            'Title'           => array('S' => '21-Bike-202'),
                            'Description'     => array('S' => '202 Description'),
                            'BicycleType'     => array('S' => 'Road'),
                            'Brand'           => array('S' => 'Brand-Company A'),
                            'Price'           => array('N' => '200'),
                            'Gender'          => array('S' => 'M'),
                            'Color'           => array('SS' => array('Green', 'Black')),
                            'ProductCategory' => array('S' => 'Bicycle')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '203'),
                            'Title'           => array('S' => '19-Bike-203'),
                            'Description'     => array('S' => '203 Description'),
                            'BicycleType'     => array('S' => 'Road'),
                            'Brand'           => array('S' => 'Brand-Company B'),
                            'Price'           => array('N' => '300'),
                            'Gender'          => array('S' => 'W'),
                            'Color'           => array('SS' => array('Red', 'Green', 'Black')),
                            'ProductCategory' => array('S' => 'Bicycle')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '204'),
                            'Title'           => array('S' => '18-Bike-204'),
                            'Description'     => array('S' => '204 Description'),
                            'BicycleType'     => array('S' => 'Mountain'),
                            'Brand'           => array('S' => 'Brand-Company B'),
                            'Price'           => array('N' => '400'),
                            'Gender'          => array('S' => 'W'),
                            'Color'           => array('SS' => array('Red')),
                            'ProductCategory' => array('S' => 'Bicycle')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '205'),
                            'Title'           => array('S' => '20-Bike-205'),
                            'Description'     => array('S' => '205 Description'),
                            'BicycleType'     => array('S' => 'Hybrid'),
                            'Brand'           => array('S' => 'Brand-Company C'),
                            'Price'           => array('N' => '500'),
                            'Gender'          => array('S' => 'B'),
                            'Color'           => array('SS' => array('Red', 'Black')),
                            'ProductCategory' => array('S' => 'Bicycle')
                        )
                    )
                )
            ),
        ),
    ));

    echo "done." . PHP_EOL;



    $tableName = 'Forum';
    echo "Adding data to the $tableName table..." . PHP_EOL;

    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Name'     => array('S' => 'Amazon DynamoDB'),
                            'Category' => array('S' => 'Amazon Web Services'),
                            'Threads'  => array('N' => '0'),
                            'Messages' => array('N' => '0'),
                            'Views'    => array('N' => '1000')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Name'     => array('S' => 'Amazon S3'),
                            'Category' => array('S' => 'Amazon Web Services'),
                            'Threads'  => array('N' => '0')
                        )
                    )
                ),
            )
        )
    ));

    echo "done." . PHP_EOL;


    $tableName = 'Reply';
    echo "Adding data to the $tableName table..." . PHP_EOL;

    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 1'),
                            'ReplyDateTime' => array('S' => $fourteenDaysAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 1 Reply 2 text'),
                            'PostedBy'      => array('S' => 'User B')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 2'),
                            'ReplyDateTime' => array('S' => $twentyOneDaysAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 2 Reply 3 text'),
                            'PostedBy'      => array('S' => 'User B')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 2'),
                            'ReplyDateTime' => array('S' => $sevenDaysAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 2 Reply 2 text'),
                            'PostedBy'      => array('S' => 'User A')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 2'),
                            'ReplyDateTime' => array('S' => $oneDayAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 2 Reply 1 text'),
                            'PostedBy'      => array('S' => 'User A')
                        )
                    )
                )
            ),
        )
    ));

    echo "done." . PHP_EOL;
