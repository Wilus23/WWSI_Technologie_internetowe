<?php
  require('baza.inc');
   
  
  $zm = new baza_sql();
  if (isset($_POST['w1']) && isset($_POST['w2']))
  {
    if ($zm->Czy_jest($_POST['w1'], $_POST['w2']))
	{
		session_start();
		$_SESSION['user']=$_POST['w1'];
		header("Location: nowa.php");
	}
	else
	{
	   echo "brak";
	}
  }
?> 