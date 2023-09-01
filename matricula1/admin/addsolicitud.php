<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addsolicitud'])) {

  	$Registrocivil = $_POST['Registrocivil'];
  	$NombreEstudiante = $_POST['NombreEstudiante'];
    $CargarEPS = explode('.', $_FILES['CargarEPS']['name']);
  	$CargarEPS = end($CargarEPS); 
    $CargarVACUNAS = explode('.', $_FILES['CargarVACUNAS']['name']);
  	$CargarVACUNAS = end($CargarVACUNAS); 
    $CargarREGISTRO = explode('.', $_FILES['CargarREGISTRO']['name']);
  	$CargarREGISTRO  = end($CargarREGISTRO); 
    $photo = explode('.', $_FILES['photo']['name']);
  	$photo = end($photo); 
	$Fecha = $_POST['Fecha'];
	

  	$query = "INSERT INTO `addsolicitud`(`Registrocivil`, `NombreEstudiante`,`CargarEPS`, `CargarVACUNAS`, `CargarREGISTRO`, `photo`, `Fecha`) VALUES ('$Registrocivil', '$NombreEstudiante','$CargarEPS','$CargarVACUNAS','$CargarREGISTRO','$photo','$Fecha');";
  	
	  $nombre_archivo = basename($_FILES['CargarEPS']['name']);
	  $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
	
	if (mysqli_query($db,$query)) {
		$datainsert['insertsucess'] = '<p style="color: green;">Estudiante Ingresado Exitosamente</p>';
		move_uploaded_file($_FILES['CargarEPS']['tmp_name'], 'DOCUMENTOS/'.$CargarEPS.$nombre_archivo);
		move_uploaded_file($_FILES['CargarVACUNAS']['tmp_name'], 'DOCUMENTOS/'.$CargarVACUNAS);
		move_uploaded_file($_FILES['CargarREGISTRO']['tmp_name'], 'DOCUMENTOS/'.$CargarREGISTRO);
		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
		
	}else{
		$datainsert['inserterror']= '<p style="color: red;">Estudiante no ingresado, revise la información diligenciada.</p>';
	}
}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Solicitud Matricula Estudiante<small class="text-warning"> Nuevo Estudiante</small></h1>
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
	    <strong class="mr-auto">Solicitud Matricula Estudiante</strong>
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
		    <label for="Registrocivil">Registro Civil </label>
		    <input name="Registrocivil" type="text" class="form-control" id="Registrocivil" value="<?= isset($Registrocivil)? $Registrocivil: '' ; ?>" required="">
	  	</div>
		  <div class="form-group">
		    <label for="NombreEstudiante">Nombre  de Estudiante Registrado</label>
		    <input name="NombreEstudiante" type="text" class="form-control" id="NombreEstudiante" value="<?= isset($NombreEstudiante)? $NombreEstudiante: '' ; ?>" required="">
			</div>
	  	
          <div class="form-group">
		    <label for="CargarEPS">Cargar certificado EPS</label>
		    <input name="CargarEPS" type="file" class="form-control" id="CargarEPS" >
	  	</div>
          <div class="form-group">
		    <label for="CargarVACUNAS">Cargar Carnet Vacunas</label>
		    <input name="CargarVACUNAS" type="file" class="form-control" id="CargarVACUNAS" >
	  	</div>
          <div class="form-group">
		    <label for="CargarREGISTRO">Cargar Registro Civil</label>
		    <input name="CargarREGISTRO" type="file" class="form-control" id="CargarREGISTRO">
	  	</div>
          <div class="form-group">
		    <label for="photo">Fotografía de Estudiante</label>
		    <input name="photo" type="file" class="form-control" id="photo" >
	  	</div>
	  	
	  <div class="form-group">
		    <label for="Fecha">Fecha </label>
		    <input name="Fecha" type="date" class="form-control" id="Fecha" pattern="[0-9]{10}" value="<?= isset($Fecha)? $Fecha: '' ; ?>" placeholder="Fecha" required="">
	  	</div>
	 
	  	<div class="form-group text-center">
		    <input name="addsolicitud" value="Registrar Solicitud de matricula " type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>