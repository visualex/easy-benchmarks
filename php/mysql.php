<?php

/* 
CREATE TABLE `test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rw` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/


$top = 50000;

$started = time();
function generate($length = 10)
{
   // return a constant string for linear results
   // return join('', range('a','Z'));
   $chars = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
   $result = '';
   for ($i = 0; $i < $length; $i++) {
      $result .= $chars[array_rand($chars)];
   }
   return $result;
}
$ds = new PDO('mysql:dbname=test;host=127.0.0.1', 'username', 'password');


for ($i = 0; $i < $top; $i++) {
   $ds->query('insert into test (rw) values ("' . generate($i) . '");');
}

$ended = time() - $started;
echo 'writes took: ', $ended, "\n";

foreach ($ds->query('select * from test') as $row) {
  
}

$ended = time() - $started;
echo 'reads took: ', $ended, "\n";
die;
