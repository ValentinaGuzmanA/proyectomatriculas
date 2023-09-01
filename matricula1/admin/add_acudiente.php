<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['add_acudiente'])) {

  	$nombreAcudiente = $_POST['nombreAcudiente'];
  	$identificacion = $_POST['identificacion'];
  	$apellido = $_POST['apellido'];
  	$correo = $_POST['correo'];

																																			
  	$query = "INSERT INTO `acudiente`(`nombreAcudiente`,`apellido`, `identificacion`,`correo`) VALUES ('$nombreAcudiente', '$apellido','$identificacion', '$correo');";
  	if (mysqli_query($db,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Estudiante Ingresado Exitosamente</p>';
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Estudiante no ingresado, revise la información diligenciada.</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Registrar Acudiente<small class="text-warning"> Nuevo Estudiante</small></h1>
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
	    <strong class="mr-auto">Acudiente</strong>
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
		    <label for="nombreAcudiente">Nombre de Acudiente</label>
		    <input name="nombreAcudiente" type="text" class="form-control" id="nombreAcudiente" value="<?= isset($nombreAcudiente)? $nombreAcudiente: '' ; ?>" required="">
	  	</div>
		  <div class="form-group">
		    <label for="apellido">Apellido de Acudiente</label>
		    <input name="apellido" type="text" class="form-control" id="apellido" value="<?= isset($apellido)? $apellido: '' ; ?>" required="">
			</div>
	  	<div class="form-group">
		    <label for="identificacion">identificacion</label>
		    <input name="identificacion" type="text" value="<?= isset($identificacion)? $identificacion: '' ; ?>" class="form-control" pattern="[0-9]{}" id="identificacion" required="">
	  	</div>	  
	 
	  	<div class="form-group">
		    <label for="correo">correo de Acudiente</label>
		    <input name="correo" type="text" value="<?= isset($correo)? $correo: '' ; ?>" class="form-control" id="correo" required="">
	  	</div>
	 
	  	<div class="form-group text-center">
		    <input name="add_acudiente" value="Registrar acudiente" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>