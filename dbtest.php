<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER");
$dbpwd = getenv("MYSQL_PASSWORD");
$dbname = getenv("MYSQL_DATABASE");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");

    $result = mysql_query("show tables"); // run the query and assign the result to $result
    while($table = mysql_fetch_array($result)) { // go through each row that was returned in $result
        echo($table[0] . "<BR>");    // print the table that was returned on that row.
    }    
}
$connection->close();
?>
