<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if(update('contact','set address = "'.$_POST['address'].'",phone = "'.$_POST['phone'].'",mobile = "'.$_POST['mobile'].'",email = "'.$_POST['email'].'",facebook = "'.$_POST['facebook'].'",twitter = "'.$_POST['twitter'].'",googleplus = "'.$_POST['googleplus'].'",linkedin = "'.$_POST['linkedin'].'",youtube = "'.$_POST['youtube'].'",dribble = "'.$_POST['dribble'].'",flickr = "'.$_POST['flickr'].'"',' where id = 1')) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=contact'); }
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=contact'); }
}

$row = getRowFromTable('*','contact',' where id = 1','');

?>