<?php
system('./tex/compile.sh');
header("Content-Type: application/pdf");
echo file_get_contents("./tex/out.pdf");

