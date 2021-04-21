<?php	
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['vision'] != ' ' && $_POST['mission'] != ' ')
	{
		if($_FILES['picture']['error'] == 0)	{ unlink($_POST['oldpicture']); $_POST['picture'] = 'uploads/'.uploadpic('picture',''); }
		else $_POST['picture'] = $_POST['oldpicture'];
		
		/*if($_FILES['whowearepicture']['error'] == 0)	{ unlink($_POST['oldwhowearepicture']); $_POST['whowearepicture'] = 'uploads/'.uploadpic('whowearepicture',''); }
		else $_POST['whowearepicture'] = $_POST['oldwhowearepicture'];*/
		
		if(update('about','set vision = "'.$_POST['vision'].'",mission = "'.$_POST['mission'].'",picture = "'.$_POST['picture'].'"',' where id = 1')) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=about'); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=about'); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=about'); }
}

$row = getRowFromTable('*','about',' where id = 1','');

?>