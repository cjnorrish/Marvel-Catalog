<!DOCTYPE html>
<html>
<body>

<?php
$xml=simplexml_load_file("catalog.xml") or die("Error Cannot create object");
print_r($xml);
?>

</body>
</html>