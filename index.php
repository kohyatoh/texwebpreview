<?php
system('./tex/compile.sh', $err);
if ($err == 0) {
    header("Content-Type: application/pdf");
    echo file_get_contents("./tex/out.pdf");
}
else {
    echo "<pre>";
    echo file_get_contents("./tex/log.txt");
    echo "</pre>";
}
