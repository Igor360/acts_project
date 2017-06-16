 <?php
function  GetTitle($page){
if (isset($page))
	switch ($page) {
		case 'department_info':
			echo "<title>Про кафедру</title>";
			break;
		
		case 'history':
			echo "<title>Історія кафедри</title>";
			break;

		case 'studLife':
			echo "<title>Студентське життя</title>";
			break;

		case 'diplomWorks':
			echo "<title>Дипломні роботи</title>";
			break;

		case 'employment':
			echo "<title>Працевлашування</title>";
			break;

		case 'practice':
			echo "<title>Практика</title>";
			break;

		case '1kurs':
			echo "<title>Вступ на 1 курс</title>";
			break;

		case '5kurs':
			echo "<title>Вступ на 5 курс</title>";
			break;

		case 'offDoc':
			echo "<title>Офіційні документи</title>";
			break;

		case 'learnToActs':
			echo "<title>Навчання на АУТС</title>";
			break;

		case 'actualInfo':
			echo "<title>Актуальна інформація</title>";
			break;

		case 'contacts':
			echo "<title>Контакти</title>";
			break;

	case 'home':
		echo "<title>Автоматика і Управління в Технічних Системах (АУТС)</title>";
		break;
	case 'sport':
		echo "<title>Спорт</title>";
		break;
	case 'science':
		echo "<title>Наука</title>";
		break;
	case 'about':
		echo "<title>Про АУТС</title>";
		break;
	case 'incoming':
		echo "<title>Вступнику</title>";
		break;
	case 'students':
		echo "<title>Студентам</title>";
		break;
	case 'aspirantura':
		echo "<title>Аспірантам</title>";
		break;
	case 'development':
		echo "<title>Розробки</title>";
		break;
	case 'registration':
		echo "<title>Реєстрація</title>";
	default:
		echo "<title>Автоматика і Управління в Технічних Системах (АУТС)</title>";
		break;
}

}
 ?>