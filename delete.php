<?php

include_once('configdata.php');

if (isset($_REQUEST['delId']) and $_REQUEST['delId'] != "") {

	$db->delete('data', array('id' => $_REQUEST['delId']));

	header('location: data.php?msg=rds');

	exit;
}
