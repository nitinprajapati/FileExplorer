<?php

$fso = new COM('Scripting.FileSystemObject');
$D = $fso->Drives;
$type = array("Unknown","Removable","Fixed","Network","CD-ROM","RAM Disk");
$drivesArray	=	array();
$drivesArray2	=	array();
foreach($D as $d ){
	$dO = $fso->GetDrive($d);
	$s = "";
	if($dO->DriveType == 3){
		$n = $dO->Sharename;
	}else if($dO->IsReady){
		$n = $dO->VolumeName;
		$s = file_size($dO->FreeSpace) . " free of " . file_size($dO->TotalSize);
	}else{
		$n = "";
	}
	//echo $dO->DriveLetter . ": - " . $type[$dO->DriveType] . " - " . $n . " - " . $s;
	$drivesArray =	array('DriveLetter' => $dO->DriveLetter, 'DriveType' => $type[$dO->DriveType], 'VolumeName' => $n, 'Size' => $s) ;
	array_push($drivesArray2, $drivesArray);
}

echo json_encode($drivesArray2);

function file_size($size)
{
	$filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	return $size ? round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i] : '0 Bytes';
}

?>