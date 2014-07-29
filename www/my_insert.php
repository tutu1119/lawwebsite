<?php
//連線Mongo DB
require_once("lib/Smarty.php");
$server = array('mongodb://lawuser:0000@localhost:27017',);
$options = array('connect' => true);
//try to connect
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
//choose db&collection
$coll=$mongo->selectDB('cjkt')->selectCollection('taiwan');
$data=array(
"original_ID"=>"112",
"chinese_traditionalshape"=>"下水道",	
"chinese_statutory"=>"s",	
"chinese_equivalent"=>"",	
"chinese_equivalent_statutory"=>"",	
"overlapped"=>"",	
"compound"=>"",	
"verb_or_noun"=>"",	
"4type"=>"",
"existing_or_old_law"=>"",	
"source"=>"google",
"comment"=>"",	
"traditonalchinese_to_english"=>"sewerage;drainage"
);


$coll->insert($data);
echo "XD";
?>