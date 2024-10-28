
<?php

$d = getdate();
$d_str = sprintf("%s %d %d",$d["month"],$d["mday"],$d["year"]);
?>

<html>
<head>
</head>
<body>

<?php
if ($d["mon"] == "1" and $d["mday"] == "1")
{
    echo "<h1>Access Granted</h1>";
    echo '<img width="500" src="img/back-to-the-future-delorean.jpg">';
}
else
{
    echo "<h1>Access Denied</h1><h1>It is not New Years Day</h1>";
    echo "<h2>System DateTime: ".$d_str."<h2>";
    echo '<img width="500" src="img/back-to-the-future-1080P-wallpaper.jpg">';
}

?>
</body>
</html>
