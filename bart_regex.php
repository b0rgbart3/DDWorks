#!/usr/bin/php
<?php

# I put the regex in a string for easier reading of the preg_match call
# in this example I made the match criteria case insensitive 
# by including 'i' at the end of the pattern ( note the i is not IN THE PATTERN )

###############
# regex match #
###############    
$regex = '/^[a-z|0-9|\ \|-]*$/i';
$string = "e------d      d i eCAruso";

if (! preg_match($regex,$string)){
 print "There is an error\n";
}
else{
  print "ok\n";
}

#################
# regex replace #
#################  
$regex = '/[4-7|\:\;\{\&\%]/';
  $regex = '/[|\:\;\{\&\%]/';
$string = trim("abc  ''\n\r   1:2;3{4&5%6:7");
$after=preg_replace($regex,'',$string);

print "Before: $string\n";
print " After: $after\n";
?>
