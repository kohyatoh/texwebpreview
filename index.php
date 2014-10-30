<?php
$dir = empty($_GET['dir']) ? 'skeleton' : $_GET['dir'];
if (!preg_match('/\A\w+\z/', $dir)) {
    echo "invalid parameter";
    exit(1);
}

system('./scripts/compile.sh ' . escapeshellarg($dir), $err);
if ($err == 0) {
    header('Content-Type: application/pdf');
    echo file_get_contents("./$dir.out/out.pdf");
}
else {
    echo '<pre>';
    echo htmlspecialchars(file_get_contents("./$dir.out/log.txt"));
    echo '</pre>';
}
