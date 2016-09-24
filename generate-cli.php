<?php

getParams();

function getParams() {
	echo "Desired length of the password :\n";
	$lengthPass = trim(fgets(STDIN));
	if (!is_numeric($lengthPass)) {
		echo "Please enter a numeric !\n";
		exit;
	}
	echo "Number of password to generate :\n";
	$numberPass = trim(fgets(STDIN));
	if (!is_numeric($numberPass)) {
		echo "Please enter a numeric !\n";
		exit;
	}
	echo "Name for the output file :\n";
	$outputFile = trim(fgets(STDIN));
	if (file_exists($outputFile)) {
		echo "File already exists !\n";
		exit;
	}
	if (empty($outputFile)) {
		$outputFile = "passwords.txt";
	}
	putInFile($lengthPass, $numberPass, $outputFile);
}

function putInFile($lengthPass, $numberPass, $outputFile) {
	$fp = fopen ($outputFile, "w");
	for ($i = 0; $i < $numberPass; $i++) {
		fputs ($fp, generate($lengthPass)."\n");
	}
	echo "Done. File ".$outputFile." has been created with ".$i." entries.\n";

}

function generate($lengthPass) {
	$chars = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
		'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
		'6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
		'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

	for ($rand = 0; $rand < $lengthPass; $rand++) {
		$random = rand(0, count($chars) - 1);
		$password .= $chars[$random];
	}
	return $password;
}

?>