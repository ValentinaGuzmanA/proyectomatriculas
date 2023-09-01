<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['add-estudiante'])) {

  	$nombre = $_POST['nombre'];
  	$apellido = $_POST['apellido'];
  	$direccion = $_POST['direccion'];
	$photo = explode('.', $_FILES['photo']['name']);
  	$photo = end($photo); 
	$registroC = explode('.', $_FILES['registroC']['name']);
  	$registroC  = end($registroC); 
	$Documento = explode('.', $_FILES['Documento']['name']);
  	$Documento = end($Documento); 

  	$query = "INSERT INTO `estudiante`(`nombre`,
	 `apellido`,`direccion`,`photo`, `registroC`,`Documento`) VALUES ('$nombre', '$apellido', '$direccion', '$photo','$registroC','$Documento');";
  	  $nombre_archivo = basename($_FILES['Documento']['name']);
		$extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
	  
	  if (mysqli_query($db,$query)) {
		  $datainsert['insertsucess'] = '<p style="color: green;">Estudiante Ingresado Exitosamente</p>';
		  move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
		  move_uploaded_file($_FILES['registroC']['tmp_name'], 'DOCUMENTOS/'.$registroC.$nombre_archivo);
		  move_uploaded_file($_FILES['Documento']['tmp_name'], 'DOCUMENTOS/'.$Documento);
	  }else{
		  $datainsert['inserterror']= '<p style="color: red;">Estudiante no ingresado, revise la información diligenciada.</p>';
	  }
  }
  ?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Registrar Estudiante<small class="text-warning"> Nuevo Estudiante</small></h1>
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
		    <label for="nombre">Nombre de Estudiante</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?= isset($nombre)? $nombre: '' ; ?>" required="">
	  	</div>
		  <div class="form-group">
		    <label for="apellido">Apellido de Estudiante</label>
		    <input name="apellido" type="text" class="form-control" id="apellido" value="<?= isset($apellido)? $apellido: '' ; ?>" required="">
			</div>
		<div class="form-group">
		    <label for="direccion">Dirección de Estudiante</label>
		    <input name="direccion" type="text" value="<?= isset($direccion)? $direccion: '' ; ?>" class="form-control" id="direccion" required="">
	  	</div>
		  <div class="form-group">
		    <label for="photo">Fotografía de Estudiante</label>
		    <input name="photo" type="file" class="form-control" id="photo" >
	  	</div>
          <div class="form-group">
		    <label for="registroC">Registro Civil</label>
		    <input name="registroC" type="file" class="form-control" id="registroC" >
	  	</div>
          <div class="form-group">
		    <label for="Documento">Documento eps</label>
		    <input name="Documento" type="file" class="form-control" id="Documento">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="add-estudiante" value="Registrar Estudiante" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>