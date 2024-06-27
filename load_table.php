<?php
$table = $_POST['table'];
switch ($table) {
    case 'employees':
        loadEmployeesTable();
        break;
    case 'products':
        loadProductsTable();
        break;
    case 'clients':
        loadClientsTable();
        break;
    default:
        echo "Invalid table";
        break;
}

function loadEmployeesTable() {
    echo '<h2>Manage Employees</h2>';
    echo '<table class="table table-striped table-hover">';
    // Tu código para cargar y mostrar la tabla de empleados
    echo '</table>';
}

function loadProductsTable() {
    echo '<h2>Manage Products</h2>';
    echo '<table class="table table-striped table-hover">';
    // Tu código para cargar y mostrar la tabla de productos
    echo '</table>';
}

function loadClientsTable() {
    echo '<h2>Manage Clients</h2>';
    echo '<table class="table table-striped table-hover">';
    // Tu código para cargar y mostrar la tabla de clientes
    echo '</table>';
}
?>
