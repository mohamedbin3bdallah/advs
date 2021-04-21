<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_FILES['file']['name'][0] != '') 
	{
		//delTree('uploads/slides');
		//if(uploadimgs('slides')) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=slides'); }
		//else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=slides'); }
		uploadimgs('slides');
		$_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=slides'); 
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=slides'); }
}
?>