<?php

$real_input = 1001;
$input = $real_input;
$reverse = 0;
$remainder = 0;
$strlen = strlen($input);

while ( $strlen != 0 ) {
    $remainder = $input % 10;
    $reverse = ($reverse * 10) + $remainder;
    $input = (int) ($input / 10);
    $strlen --;
}

if ($real_input === $reverse) :
    echo "It's a palindrome\n";
else:
    echo "It's not a palindrome\n";
endif;