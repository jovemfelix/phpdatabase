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
    printf("SHOW TABLES:");

    //Connect to MySQL using the PDO object.
    $pdo = new PDO('mysql:host=$dbhost;dbname=$dbname', '$dbuser', '$dbpwd');
    
    //Our SQL statement, which will select a list of tables from the current MySQL database.
    $sql = "SHOW TABLES";
    
    //Prepare our SQL statement,
    $statement = $pdo->prepare($sql);
    
    //Execute the statement.
    $statement->execute();
    
    //Fetch the rows from our statement.
    $tables = $statement->fetchAll(PDO::FETCH_NUM);
    
    //Loop through our table names.
    foreach($tables as $table){
        //Print the table name out onto the page.
        echo $table[0], '<br>';
    } 
}
$connection->close();
?>
