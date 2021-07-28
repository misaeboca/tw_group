<!DOCTYPE html>
<html>
<head>
    <title>Notificacion de registro</title>
</head>
<body>
	<center><h2>TW Group</h2><center>
	<hr>
	<center><h3>Hola usuario, {{ $details['usuario'] }}!<h3><center> 
	<center><h3>Se ha registrado un nuevo logs para la siguente tarea</h3><center>
	<br>
    <center><h3><b>Task ID:</b> {{ $details['tasks_id'] }}</h3>
    <h3><b>Description:</b> {{ $details['description'] }}</h3><center>

    <br>
    <center><p><b>Nota:</b> Inicie sesion para revisar sus tareas</p><center>

    <hr>
    <center><a href="{{$details['url']}}"><h3>Ingresar a mi Cuenta</h3></a><center>
</body>
</html>