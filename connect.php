<?php
	$Nombre =$_POST['Nombre'];
	$Apellido1 =$_POST['Apellido1'];
	$Apellido2 =$_POST['Apellido2'];
	$CorreoElectronico =$_POST['CorreoElectronico'];
	$Contrasena =$_POST['Contrasena'];
	$FechaNacimiento =$_POST['FechaNacimiento'];
	$Sexo =$_POST['Sexo'];

	// Conexión a la base de datos
	$conn = new mysqli('localhost','root','','es172004460');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Ha fallado la conexión ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into usuario(Nombre, Apellido1, Apellido2, CorreoElectronico, Contrasena, FechaNacimiento, Sexo) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $Nombre, $Apellido1, $Apellido2, $CorreoElectronico, $Contrasena, $FechaNacimiento, $Sexo);
		$execval = $stmt->execute();
		echo $execval;
		echo ("El registro ha sido exitoso");
		$stmt->close();
		$conn->close();

	}
?>

	<?php
		echo "<a href='index.html'>Regresar</a>";
?>
