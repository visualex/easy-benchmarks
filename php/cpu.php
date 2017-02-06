<?php

// this needs the gmp extension
$from = 10000;
$upto = 10000000;

$started = time();
for ($i = $from; $i < $upto; $i++) {
   gmp_nextprime($i);
}
$ended = time() - $started;
var_dump( $ended );
