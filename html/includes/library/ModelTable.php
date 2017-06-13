<?php 

namespace library; // обявление пространства имен

require_once("library/ConnectDB.php");
// абстрактний клас котрий описивает поля та методи 
abstract class ModelTable extends ConnectDB
{
	public  $id;

	// метод для взятия из бд всех елемментов
	abstract public function getAll(); 

	// метод для взятия елемента по его индетификатору
	abstract public function getElement($id);

	// метод для видалення елемента по его индетификатору
	abstract public function delete($id);
	
}
?>
