#!/usr/local/bin/php
<?php

function read($length='255') { 
   if (!isset ($GLOBALS['StdinPointer']))    { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 

echo "\nEnter syntax : ";
$command = read ();
print "\nwait..";
include'C://xampp/htdocs/analytic/resultSearchTerm.php'; 
print "\n\n*************************************\n";
print "Account Id  : ".$syntax['accountId']."\n"; 
print "Property Id : ".$syntax['propertyId']."\n"; 
print "View name   : ".$syntax['profileName']."\n";     
print "*************************************\n";
print "Total ".$syntax['metric']." : ".$syntax['totalResults']."\n";
print "*************************************\n";
?>