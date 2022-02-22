<?php
	
	$xml=simplexml_load_file("osoba.xml");
	print_r($xml);
	

	/*$myArr = array("imie"=>"John","imie1"=>"Mary");
	$linia = json_encode($myArr);
	echo $linia;
	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_GET["plik"], false);*/
	echo "<br><br>";
	
	/*$tab=1;
	
	$conn = new mysqli('localhost', 'root', '', 'javadb');
	$stmt = $conn->prepare("SELECT * FROM batonik");
	//$stmt->bind_param("ss", $tab);
	$stmt->execute();
	$result = $stmt->get_result();
	$outp = $result->fetch_all(MYSQLI_ASSOC);
	
	echo json_encode($outp);
	
	$conn->close();*/
	
	
	/* 2 */
	$conn = new mysqli("localhost", "root", "", "javadb");

	if (mysqli_connect_errno()) {
		echo "do d...";
		exit();
	}

	$batonik =1;
	$stmt =  $mysqli->stmt_init();
	if ($stmt->prepare("SELECT * FROM batonik WHERE id_b=?")) {
    $stmt->bind_param("s", $batonik);
    $stmt->execute();
    $stmt->bind_result($nazwa, $cena);
	 
	$returnArray = array();
	while ($stmt->fetch())
	{
		echo $nazwa . " " . $cena;
	}
	
$stmt->close();
$conn->close();
?>