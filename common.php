<?php

  // Custom html end of line constant (Leave it as it is)
  define('HTML_EOL', '<br />');


  // Our config for DynamoDB client
  $config = array(
    // Replace with your desired region visit
    // http://docs.aws.amazon.com/general/latest/gr/rande.html
    // to get your regions.
    'region' => 'eu-west-1',

    // Now needs a version
    'version' => '2012-08-10',
  );
