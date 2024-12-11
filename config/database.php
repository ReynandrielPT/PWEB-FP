<?php
function getDBConnection()
{
$db = parse_url(getenv(postgres://u83pkdmj3viohg:p46ccb1af85a6a102328ef91fe3a46fc886bc21ae91b9df3cb70948f84e80c991@c8lj070d5ubs83.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com:5432/d30mo4o64b32la
));
$conn_string = sprintf(
    "host=%s port=%s dbname=%s user=%s password=%s sslmode=require",
    $db['host'], 
    $db['port'], 
    ltrim($db['path'], '/'), 
    $db['user'], 
    $db['pass']
);
    try {
        $conn = new PDO(
            "pgsql:host=$host;port=$port;dbname=$dbname",
            $user,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
