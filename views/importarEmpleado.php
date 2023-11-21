<?php
include("./templates/header.php");
?>
            <!-- HOME AQUI AGREGUEN SU CONTENIDO -->
       
       </br>
       <center><h1>Importar Empleados desde CSV</h1>
       </br>
       <form id="formularioImportar" enctype="multipart/form-data">
            <label for="archivoCSV">Selecciona un archivo CSV:</label>
       </br> 
            <input type="file" id="archivoCSV" name="archivoCSV" accept=".csv" required><br>
       </br> 
            <button class="butonimportar" type="button" onclick="importarCSV()">Importar CSV</button>
          </form></center>
       </br>
       </br>

            <!-- HOME END AQUI AGREGUEN SU CONTENIDO -->
<?php
include("./templates/foother.php");
?>