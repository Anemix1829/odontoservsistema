<?php
$oto="1234";
$hash = password_hash($oto, PASSWORD_DEFAULT, ['cost'=>5]);
echo $hash;
?>