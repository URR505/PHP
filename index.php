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
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>crud dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <div class="body-overlay"></div>
     
      <!-------sidebar--design------------>
      <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="img/logo.png" class="img-fluid"/><span>Vishweb design</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="tab-button active">
                <a onclick="openTab('agentes')"><i class="material-icons">people</i><span>Agentes</span></a>
            </li>
            <li class="tab-button">
                <a onclick="openTab('clientes')"><i class="material-icons">people</i><span>Employees</span></a>
            </li>
            <li class="tab-button">
                <a  onclick="openTab('inmuebles')"><i class="material-icons">shopping_cart</i><span>Products</span></a>
            </li>
            <li class="tab-button">
                <a onclick="openTab('inmobiliarias')"><i class="material-icons">groups</i><span>Clients</span></a>
            </li>
        </ul>
    </nav>
     
    <!-------sidebar--design- close----------->
   
    <!-------page-content start----------->
    <div id="content">
      <!------top-navbar-start-----------> 
      <div class="top-navbar">
        <div class="xd-topbar">
          <div class="row">
            <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
              <div class="xp-menubar">
                <span class="material-icons text-white">signal_cellular_alt</span>
              </div>
            </div>
            <div class="col-md-5 col-lg-3 order-3 order-md-2">
              <div class="xp-searchbar">
                <form>
                  <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <button class="btn" type="submit" id="button-addon2">Go</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          <div class="xp-breadcrumbbar text-center">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Vishweb</a></li>
              <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
      <!------top-navbar-end-----------> 
      
      <!------main-content-start-----------> 
      <div class="main-content tab-pane active" id="agentes">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                    <h2 class="ml-lg-2">Manage Employees</h2>
                  </div>
                  <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                      <i class="material-icons">&#xE147;</i>
                      <span>Add New Employees</span>
                    </a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                      <i class="material-icons">&#xE15C;</i>
                      <span>Delete</span>
                    </a>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>CorreoElectronico</th>
                    <th>Direccion</th>
                    <th>MontoBase</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM agentes";
                  $result = sqlsrv_query($conn, $sql);
                  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Apellidos"] . "</td>";
                    echo "<td>" . $row["CorreoElectronico"] . "</td>";
                    echo "<td>" . $row["Direccion"] . "</td>";
                    echo "<td>". $row["MontoBase"] . "</td>";
                    echo '<td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                          </td>';
                    echo "</tr>";
                  }
                  sqlsrv_free_stmt($result);
                  ?>
                </tbody>
              </table>
              <div class="clearfix">
                <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
                <ul class="pagination">
                  <li class="page-item disabled"><a href="#">Previous</a></li>
                  <li class="page-item "><a href="#"class="page-link">1</a></li>
                  <li class="page-item "><a href="#"class="page-link">2</a></li>
                  <li class="page-item active"><a href="#"class="page-link">3</a></li>
                  <li class="page-item "><a href="#"class="page-link">4</a></li>
                  <li class="page-item "><a href="#"class="page-link">5</a></li>
                  <li class="page-item "><a href="#" class="page-link">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>





	  <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label>Name</label>
			<input type="text" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Email</label>
			<input type="emil" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Address</label>
			<textarea class="form-control" required></textarea>
		</div>
		<div class="form-group">
		    <label>Phone</label>
			<input type="text" class="form-control" required>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->
					   
					   
					   
					   
					   
				   <!----edit-modal start--------->
		<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label>Name</label>
			<input type="text" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Email</label>
			<input type="emil" class="form-control" required>
		</div>
		<div class="form-group">
		    <label>Address</label>
			<textarea class="form-control" required></textarea>
		</div>
		<div class="form-group">
		    <label>Phone</label>
			<input type="text" class="form-control" required>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->	   
					   
					   
					 <!----delete-modal start--------->
		<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Records</p>
		<p class="text-warning"><small>this action Cannot be Undone,</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Delete</button>
      </div>
    </div>
  </div>
</div>










      <!-------------------------------CLIENTES----------------------------------->
      <div class="main-content tab-pane" id="clientes">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                    <h2 class="ml-lg-2">Manage Clients</h2>
                  </div>
                  <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                      <i class="material-icons">&#xE147;</i>
                      <span>Add New Clients</span>
                    </a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                      <i class="material-icons">&#xE15C;</i>
                      <span>Delete</span>
                    </a>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>CorreoElectronico</th>
                    <th>Direccion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql2 = "SELECT * FROM clientes";
                  $result2 = sqlsrv_query($conn, $sql2);
                  while ($row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row2["Nombre"] . "</td>";
                    echo "<td>" . $row2["Apellidos"] . "</td>";
                    echo "<td>" . $row2["CorreoElectronico"] . "</td>";
                    echo "<td>" . $row2["Direccion"] . "</td>";
                    echo '<td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                          </td>';
                    echo "</tr>";
                  }
                  sqlsrv_free_stmt($result2);
                  ?>
                </tbody>
              </table>
              <div class="clearfix">
                <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
                <ul class="pagination">
                  <li class="page-item disabled"><a href="#">Previous</a></li>
                  <li class="page-item "><a href="#"class="page-link">1</a></li>
                  <li class="page-item "><a href="#"class="page-link">2</a></li>
                  <li class="page-item active"><a href="#"class="page-link">3</a></li>
                  <li class="page-item "><a href="#"class="page-link">4</a></li>
                  <li class="page-item "><a href="#"class="page-link">5</a></li>
                  <li class="page-item "><a href="#" class="page-link">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <!-- Add your scripts at the end of the body to make the page load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="script.js"></script>
  </body>
</html>

<?php
// Cerrar la conexión
sqlsrv_close($conn);
?>



