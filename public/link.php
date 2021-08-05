<?php

$target = "../public";
$link = "../storage/app/public";
symlink($target, $link);
echo readlink($link);