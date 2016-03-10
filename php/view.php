<?php
$command = 'cd ../../../../var ; ls -l';
$a = `{$command}`;
$a = preg_replace('/[\t\r\n]/', '<br>', $a);
$a = preg_replace('/ /', '&nbsp', $a);
$a = '<pre>' . $a . '</pre>';
echo $a;

