<?php
$dir = empty($_GET['dir']) ? 'skeleton' : $_GET['dir'];

system('./scripts/compile.sh ' . escapeshellarg($dir), $err);
if ($err == 0) {
    header('Content-Type: application/pdf');
    echo file_get_contents("./$dir.out/out.pdf");
}
else {
    echo '<pre>';
    echo file_get_contents("./$dir.out/log.txt");
    echo '</pre>';
}
