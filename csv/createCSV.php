<?php
echo "<pre>";
$file = fopen("download.csv","a");
fputcsv($file,$_REQUEST);
fclose($file);

?>