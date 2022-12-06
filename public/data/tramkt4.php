
<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
$database = 'webgis_air';
$username = 'postgres';
$password = '123';
$host = 'localhost';
$port = '5432';

$db_conn = pg_connect("host = $host dbname = $database user = $username password = $password  port=$port");


 $sql = "SELECT * FROM tb_point WHERE pm25 >= 151 AND pm25 < 200";


 $results = pg_query($sql) or die('Error message: ' . pg_last_error());



   //$myarray = array();
while ($row = pg_fetch_assoc($results)) {
  $myarray[] = $row;
}

echo json_encode($myarray);

    //$db = NULL;

?>