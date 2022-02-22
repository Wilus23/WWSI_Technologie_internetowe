<?php
  
   function Czy_jest($l, $p)
   {
	    if ($l=="szymus" && $p=="zaq1"){
		    return true;
		}
		else
		{
     		 return false;
		}
   }
   
   session_start();
   $log=$_POST['w1'];
   $pas=$_POST['w2']; 
   if(isset($log) && isset($pas)){
     if (Czy_jest($log, $pas))
     {
        echo "jest";
     }
     else
     {
        echo "bledne dane";
     }
	}
	//stare
	$username="root";
	$password="";
	$database="proba";
	$tabela="dane";
	//$first=$_POST['w1']; 
	//$last=$_POST['w2']; 
	$con=@mysqli_connect("127.0.0.1",$username,$password, $database) or die("Brak serwera");
	$query = "SELECT * FROM $tabela";
       	$result=mysqli_query($con, $query); 
	//zliczanie iloœci wierszy
	$num=mysqli_num_rows($result); 
	//wyœwietlanie
	if ($num>0)
	{
		$i=0; 
		while ($i < $num) { 
			$first=mysql_result($result,$i,"id");
			$second=mysql_result($result,$i,"nazwa"); 
			echo "<b>$first $second</b><br>"; 
			$i++;
		} 
	}
	else
	{
		echo "Tabela nie zawiera danych"; 
	}
	mysql_close();
?> 