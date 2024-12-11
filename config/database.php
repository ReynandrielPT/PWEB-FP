<?php
function getDBConnection()
{
    $dbUrl = getenv('postgres://u83pkdmj3viohg:p46ccb1af85a6a102328ef91fe3a46fc886bc21ae91b9df3cb70948f84e80c991@c8lj070d5ubs83.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com:5432/d30mo4o64b32la');

    $db = parse_url($dbUrl);

    $host = $db['host'];
    $port = $db['port'];
    $user = $db['user'];
    $password = $db['pass'];
    $dbname = ltrim($db['path'], '/');

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
