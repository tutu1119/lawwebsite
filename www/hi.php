<?php
$server = array(
  'mongodb://lawuser:0000@localhost:27017',

);

$options = array(
  'connect' => true
);

$readOnly = false;

if (!class_exists('Mongo'))
{
  die("Mongo support required. Install mongo pecl extension with 'pecl install mongo; echo \"extension=mongo.so\" >> php.ini'");
}
try
{
  $mongo = new Mongo(getServer($server), $options);
}
catch (MongoConnectionException $ex)
{
  error_log($ex->getMessage());
  die("Failed to connect to MongoDB");
}


/**
 * Get the current MongoDB server.
 *
 * @param mixed $server
 * @return string $server
 */
function getServer($server)
{
  if (is_array($server)) {
    return (isset($_COOKIE['mongo_server']) && isset($server[$_COOKIE['mongo_server']])) ? $server[$_COOKIE['mongo_server']] : $server[0];
  } else {
    return $server;
  }
}
$coll=$mongo->selectDB('123')->selectCollection('hi');
$res=$coll->find();
foreach($res as $val)
{
	echo $val['name'];
}
//$user=array("name"=>"00056");
//$coll->insert($user);
?>