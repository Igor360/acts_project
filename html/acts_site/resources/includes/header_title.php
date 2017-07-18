 <?php
function  GetTitle($page){
if (isset($page))
	switch ($page) {
		case 'department_info':
			echo "<title>".__('header_title.about_department')."</title>";
			break;
		
		case 'history':
			echo "<title>".__('header_title.history_department')."</title>";
			break;

		case 'studLife':
			echo "<title>".__('header_title.studLife')."</title>";
			break;

		case 'teachstaff':
			echo "<title>".__('header_title.teachstaff')."</title>";
			break;

		case 'otherpersonal':
			echo "<title>".__('header_title.otherpersonal')."</title>";
			break;

		case 'diplomWorks':
			echo "<title>".__('header_title.diplomWorks')."</title>";
			break;

		case 'employment':
			echo "<title>".__('header_title.employment')."</title>";
			break;

		case 'practice':
			echo "<title>".__('header_title.practice')."</title>";
			break;

		case '1kurs':
			echo "<title>".__('header_title.1kurs')."</title>";
			break;

		case '5kurs':
			echo "<title>".__('header_title.5kurs')."</title>";
			break;

		case 'offDoc':
			echo "<title>".__('header_title.offDoc')."</title>";
			break;

		case 'learnToActs':
			echo "<title>".__('header_title.learnToActs')."</title>";
			break;

		case 'actualInfo':
			echo "<title>".__('header_title.actualInfo')."</title>";
			break;

		case 'contacts':
			echo "<title>".__('header_title.contacts')."</title>";
			break;

	case 'home':
		echo "<title>".__('header_title.home')."</title>";
		break;
	case 'sport':
		echo "<title>".__('header_title.sport')."</title>";
		break;
	case 'science':
		echo "<title>".__('header_title.science')."</title>";
		break;
	case 'about':
		echo "<title>".__('header_title.about')."</title>";
		break;
	case 'incoming':
		echo "<title>".__('header_title.incoming')."</title>";
		break;
	case 'students':
		echo "<title>".__('header_title.students')."</title>";
		break;
	case 'aspirantura':
		echo "<title>".__('header_title.aspirantura')."</title>";
		break;
	case 'development':
		echo "<title>".__('header_title.development')."</title>";
		break;
	case 'registration':
		echo "<title>".__('header_title.registration')."</title>";
	default:
		echo "<title>".__('header_title.default')."</title>";
		break;
}

}
 ?>