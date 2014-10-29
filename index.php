<?php
system('./scripts/compile.sh skeleton', $err);
if ($err == 0) {
    header("Content-Type: application/pdf");
    echo file_get_contents("./skeleton.out/out.pdf");
}
else {
    echo "<pre>";
    echo file_get_contents("./skeleton.out/log.txt");
    echo "</pre>";
}
