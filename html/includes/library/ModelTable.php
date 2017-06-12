<?php 

namespace library; // обявление пространства имен

require_once("connectDB.php");
// абстрактний клас котрий описивает поля та методи 
abstract class ModelTable 
{
	public  $id;

	// метод для взятия из бд всех елемментов
	abstract public function getAll(); 

	// метод для взятия елемента по его индетификатору
	abstract public function getElement($id);

	// метод для видалення елемента по его индетификатору
	public function deleteElement($id)
	{
		global $connection;
		ConnectOpen();
		$query = "DELETE FROM {mb_strtolower(get_class($this))} WHERE id = {$id}";
		$result = mysqli_query($connection,$query);
		ConnectClose();
		return (bool)$result;
	}

}
?>
