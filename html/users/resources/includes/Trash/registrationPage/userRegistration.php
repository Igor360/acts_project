  	<form method = "POST" >
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Логін</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "text" name = "username" required="Поле є обовязковим">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Пароль</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password" required="Поле є обовязковим">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Повторіть пароль</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password2" required="Поле є обовязковим">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Електронна адреса</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "email" name = "email" required="Поле є обовязковим">
   		</div>
   	</div>
   	<input type="hidden" name="page" value="next">
   	<div class = "row text-right">
   		<button type="submit" name="Next" class="btn">
   			Далі
   			<i class="fa fa-chevron-right" aria-hidden="true"></i>
   		</button>
   	</div>
   	</form>
