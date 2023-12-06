<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verbinde mit der Datenbank (ersetze die Platzhalter)
    $servername = "localhost";
    $username = "dein_db_benutzer";
    $password = "dein_db_passwort";
    $dbname = "deine_db_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen, ob die Verbindung erfolgreich ist
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Daten aus dem Formular holen
    $kilometers = $_POST["kilometers"];
    $name = empty($_POST["name"]) ? 'Anonym' : $_POST["name"];

    // SQL-Query zum Einfügen des Eintrags in die Datenbank
    $sql = "INSERT INTO kilometer_entries (kilometers, name) VALUES ('$kilometers', '$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Eintrag erfolgreich in die Datenbank eingefügt";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Verbindung schließen
    $conn->close();
}
?>
