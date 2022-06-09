<h1>Registro de Afiliado</h1>
	
	<div class="container" >

	<div class="form-register " >		
		
		<form action="controladores/registro_Usuario_ProveedorN.php" method="post" class="bg-white shadow p-5 rounded-lg">
	
		<h4 class="pb-3" style="color:#0c62bf">Afiliado</h4>

		<div class="form-row">
			<div class="form-group col-md-4">	
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre"  class="form-control"  id="nombre" required maxlength="20" minlength="4">
			</div>	
			<div class="form-group col-md-4">
			<label for="appPaterno" >Apellido Paterno</label>
			<input type="text" name="appPaterno"  class="form-control" id="appPaterno"   required maxlength="20" minlength="4">	
			</div>
			<div class="form-group col-md-4">
			<label for="appMaterno" >Apellido Materno</label>
			<input type="text" name="appMaterno" class="form-control" id="appMaterno"  required maxlength="20" minlength="4">	
			</div>
		</div>
		

	

		

		<div class="form-row">	
			<label for="correo">Correo electrónico</label>
			<input type="email" name="correo" class="form-control" id="correo"  required  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  maxlength="40" minlength="10">
		</div><br>	

		<div class="form-row">	
			<div class="form-group col-md-6">	
			<label for="contraseña">Contraseña</label>
			<input type="password" name="contraseña" class="form-control" id="contraseña"  required pattern="[A-Za-z0-9!?-]{8,12}"  title="La contraseña debe tener al menos 8 dígitos. Un número, una mayúscula, una minúscula y un carácter especial" required maxlength="12" minlength="8" >
			</div>
			<div class="form-group col-md-6">	
			<label for="ccontraseña">Confirmar contraseña</label>
			<input type="password" name="ccontraseña" class="form-control"  id="ccontraseña"  required required maxlength="12" minlength="8" >
			</div>
		</div>
		
		<div class="form-group">
            <div class="text-center">
                <h3>
				<input type="submit" value="Registrarse" class="btn btn-primary">
                    
                </h3>
            </div>
        </div>

		
		
		
		</form>
		<br>
	</div>

	</div>

