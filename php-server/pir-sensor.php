<?php

$data = file_get_contents("php://input")."\n";
file_put_contents('/tmp/cam-pir-history.txt', $data, FILE_APPEND);
