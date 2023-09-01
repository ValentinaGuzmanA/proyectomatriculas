<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['aprobaciónmatrícula'])) {

  	$NombreEstudiante = $_POST['NombreEstudiante'];
  	$NombreAcudiente = $_POST['NombreAcudiente'];
  	$NumRegristroCivilEstudiante = $_POST['NumRegristroCivilEstudiante'];
  	$CusoSeleccionado = $_POST['CusoSeleccionado'];

																																			
  	$query = "INSERT INTO `aprobaciónmatrícula`(`NombreEstudiante`, `NombreAcudiente`,`NumRegristroCivilEstudiante`,`CusoSeleccionado`) VALUES ('$NombreEstudiante','$NombreAcudiente', '$NumRegristroCivilEstudiante', '$CusoSeleccionado');";
  	if (mysqli_query($db,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Estudiante Ingresado Exitosamente</p>';
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Estudiante no ingresado, revise la información diligenciada.</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Aprobar matricula de Estudiante<small class="text-warning"> Nuevo Estudiante</small></h1>
<nav aria-label="breadcrumb">
<img src="admin/images/usuario1.jpg">
  <ol class="breadcrumb">
    
     <li class="breadcrumb-item active" aria-current="page">Agregar Estudiante</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Estudiante</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>



	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="NombreEstudiante">Nombre de Estudiante</label>
		    <input name="NombreEstudiante" type="text" class="form-control" id="NombreEstudiante" value="<?= isset($NombreEstudiante)? $NombreEstudiante: '' ; ?>" required="">
	  	</div>
		  <div class="form-group">
		    <label for="NombreAcudiente">Nombre Acudiente</label>
		    <input name="NombreAcudiente" type="text" class="form-control" id="NombreAcudiente" value="<?= isset($NombreAcudiente)? $NombreAcudiente: '' ; ?>" required="">
			</div>
	  	<div class="form-group">
		    <label for="NumRegristroCivilEstudiante">Registro Civil Estudiante</label>
			<input name="NumRegristroCivilEstudiante" type="text" class="form-control" id="NumRegristroCivilEstudiante" pattern="[0-9]{10}" value="<?= isset($NumRegristroCivilEstudiante)? $NumRegristroCivilEstudiante: '' ; ?>" required="">
			</div>  
	  	<div class="form-group">
		    <label for="CusoSeleccionado">Curso</label>
		    <select name="CusoSeleccionado" class="form-control" id="CusoSeleccionado">
		    	<option>Selecciona</option>
		    	<option value="Primero">Primero</option>
		    	<option value="Segundo">Segundo</option>
		    	<option value="Tercero">Tercero</option>
		    	<option value="Cuarto">Cuarto</option>
		    	<option value="Quinto">Quinto</option>
		    </select>
	  	</div>
		  <div class="form-group text-center">
		    <input name="aprobaciónmatrícula" value="Aprobar matricula " type="submit" class="btn btn-danger">
			<input name="addsolicitud" value="Desaprobar matricula " type="submit" class="btn btn-green">
	  	</div>
	 </form>
</div>
</div>