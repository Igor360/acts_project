  	<form method = "POST" >


   <div class = "row">
   	<div class="col-md-8">
      <div class = "row">
   		<div class = "col-md-6">
   		<span>Ім'я</span>	
   		</div>
   		<div class = "col-md-6">
   			<input type = "text" name = "firstname" required="Поле є обовязковим">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-6">
   		<span>По батькові</span>	
   		</div>
   		<div class = "col-md-6">
   			<input type = "text" name = "middlename" required="Поле є обовязковим">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-6">
   		<span>Прізвище</span>	
   		</div>
   		<div class = "col-md-6">
   			<input type = "text" name = "lastname" required="Поле є обовязковим">
   		</div>
   	</div>
      </div>
      <div class="col-md-4 text-center" style="border-left: 1px solid #57a2e3">
         <img src="../img/Photo.png" style="height: 140px; border-radius: 5px; margin: 0 auto;">
         <input type = "text" name="photo" placeholder="Посилання на фото" style = "margin-top: 5px;">
         <input type = "file" name="photofile" style = "margin-top: 5px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
      </div>

   </div>

                  <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Посада</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "position" required="Поле є обовязковим">
         </div>
      </div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Професія</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "text" name = "profession" required="Поле є обовязковим">
   		</div>
   	</div>
   	
            <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>День та час прийому відвідувачів</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "datetime" required="Поле є обовязковим">
         </div>
      </div>

     <div class = "row">
         <div class = "col-md-4">
         <span>Кімната</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "room" required="Поле є обовязковим">
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Стаціонарний телефон</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "phone" required="Поле є обовязковим">
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Мобільний телефон</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "mobile" required="Поле є обовязковим">
         </div>
      </div>

            <div class="row"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Професійні інтереси</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "profint"></textarea>
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Дисципліни</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "disciplines"></textarea>
         </div>
      </div>

   	<div class = "row text-right">
         <a href= "#" class="btn">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
             Назад
         </a>
   		<button type="submit" name="Save" class="btn">
   			Зареєструватися
   			<i class="fa fa-sign-in" aria-hidden="true"></i>
   		</button>
   	</div>
   	</form>
