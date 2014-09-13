<?php
	function connectToDbLocal() {
		$user="root";
		$password="football555";
		$database="Football";
		$host = "localhost";
	
		$sql =  new mysqli($host, $user, $password, $database);
		return $sql;
	}
	function connectToDb() {
		$user="OfficeFootball";
		$password="footballintheOffice555#";
		$database="OfficeFootball";
		$host = "OfficeFootball.db.12033577.hostedresource.com";
	
		$sql =  new mysqli($host, $user, $password, $database);
		return $sql;
	}
?>