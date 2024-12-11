function getDBConnection()
{
    $dbUrl = getenv('DATABASE_URL');  // Retrieve the environment variable

    // Make sure the URL is retrieved
    if (!$dbUrl) {
        die("Database URL not found in environment variables.");
    }

    $db = parse_url($dbUrl);

    $host = $db['host'];
    $port = $db['port'] ?? 5432;
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
