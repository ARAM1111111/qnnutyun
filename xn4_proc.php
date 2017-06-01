<?php 
$ID_comp = $_POST['ID_comp'];
$plane = $_POST['plane'];
$town_from =$_POST['town_from'];
$town_to = $_POST['town_to'];
$time_out = $_POST['time_out'];
$time_in = $_POST['time_in'];
$action = $_POST['action'];
$id = $_POST['id'];

$conn = mysqli_connect("localhost","root","","myflot") or die(mysqli_connect_error());

if($action == "add"){
	$res = mysqli_query($conn,"INSERT INTO `trip`( `ID_comp`, `plane`, `town_from`, `town_to`, `time_out`, `time_in`) VALUES ('$ID_comp','$plane','$town_from','$town_to','$time_out','$time_in')") or die(mysqli_error());	
}
else if($action == "Delete"){
		$res = mysqli_query($conn,"DELETE FROM `trip` WHERE trip_no=$id");
}
else if($action == "Edit"){
	$query = "UPDATE `trip` SET trip_no=$id,`ID_comp`='$ID_comp',`plane`='$plane',`town_from`='$town_from',`town_to`='$town_to',`time_out`='$time_out',`time_in`='$time_in' WHERE trip_no=$id";
	$res = mysqli_query($conn,$query);

}

	 

?>