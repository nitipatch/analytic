#!/usr/local/bin/php
<?php

function read($length='255') 
{ 
   if (!isset ($GLOBALS['StdinPointer'])) 
   { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 

echo "\nEnter syntax : ";
$command = read ();
print "\nwait..";
include'C://xampp/htdocs/analytic/SearchTerm_php.php'; 
print "\n\n*************************************\n";
print "Account Id  : $syntax[0]\n"; 
print "Property Id : $syntax[1]\n"; 
print "View name   : $syntax[8]\n";     
print "*************************************\n";
print "Total $syntax[3] : $syntax[7]\n";
print "*************************************\n";
?>