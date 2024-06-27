<?php
// Ejemplo básico de conexión a SQL Server
$serverName = "localhost"; // Nombre del servidor SQL Server
$connectionOptions = array(
    "Database" => "Mobility_Sima_Reyes_Ucan_3C", // Nombre de la base de datos
    "Uid" => "admin", // Usuario de SQL Server
    "PWD" => "root" // Contraseña de SQL Server
);

// Conexión a SQL Server mediante autenticación SQL
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verificar la conexión
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Validar si se envió el parámetro de búsqueda
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para buscar por ID
    $sql = "SELECT * FROM agentes WHERE ID = ?";
    $params = array($id);
    $result = sqlsrv_query($conn, $sql, $params);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Mostrar resultados de la búsqueda
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "<h2>Resultados de la búsqueda por ID: $id</h2>";
        echo "<p>Nombre: " . $row['Nombre'] . "</p>";
        echo "<p>Apellidos: " . $row['Apellidos'] . "</p>";
        echo "<p>Correo Electrónico: " . $row['CorreoElectronico'] . "</p>";
        echo "<p>Dirección: " . $row['Direccion'] . "</p>";
        echo "<p>Área Asignada: " . $row['AreaAsignada'] . "</p>";
    }

    sqlsrv_free_stmt($result);
}

sqlsrv_close($conn);
?>
