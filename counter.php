<?php
    session_start();
    $host = "db5021754894.hosting-data.io";
    $dbname = "dbs16274044";
    $username = "dbu3718287";
    $password = "Sl1mb0dude1!";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        die("Could not connect. " . $e->getMessage());
    } 

    try{
        if (!isset($_SESSION['visitor_counted'])) {
            $sql = "UPDATE visitor_count SET count = count + 1 WHERE `index` = 1";
            $conn->exec($sql);
            $_SESSION['visitor_counted'] = true;
        }

        $stmt = $conn->query(
            "SELECT count FROM visitor_count WHERE `index` = 1"
        );
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $row ? htmlspecialchars((string)$row['count']) : '0';
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>