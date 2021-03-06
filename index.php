<?php
$dir = empty($_GET['dir']) ? 'sample' : $_GET['dir'];
if (!preg_match('/\A\w+\z/', $dir)) {
    echo "invalid parameter";
    exit(1);
}

$logname = tempnam('out', 'log_');
system('./scripts/compile.sh ' . escapeshellarg($dir) . ' ' . $logname, $err);
if ($err == 0) {
    header('Content-Type: application/pdf');
    echo file_get_contents("./out/$dir/out.pdf");
}
else {
    echo '<pre>';
    echo htmlspecialchars(file_get_contents($logname));
    echo '</pre>';
}
