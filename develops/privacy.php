<?php	
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['page'] != ' ')
	{
		if(update('privacy','set page = "'.$_POST['page'].'"',' where id = 1')) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=privacy'); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=privacy'); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=privacy'); }
}

$row = getRowFromTable('*','privacy',' where id = 1','');

?>