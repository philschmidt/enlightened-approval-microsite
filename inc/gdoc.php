<?php

	// Post to Google Spreadsheet Form
	$url = $gdoc['form'];

	// Create post array to send results to Google Spreadsheets
	// entry values according to Webform of Google Spreadsheet 
	$fields = array(
		'entry.1903210581'=>urlencode($_POST['fcode']),
		'entry.1407976456'=>urlencode($_POST['flevel']),
		'entry.86721807'=>urlencode($_POST['fnick']),
		'entry.735643312'=>urlencode($_POST['fname']),
		'entry.1548663937'=>urlencode($_POST['farea']),
		'entry.2044150024'=>urlencode($_POST['fmail']),
		'entry.1468901801'=>urlencode($_POST['fprofile']),
		'entry.2144383358'=>urlencode($_POST['fcommunity']),
		'entry.1123766997'=>urlencode($_POST['fchat']),
		'entry.1830974738'=>urlencode($_POST['fgroup']),
		'entry.677052144'=>urlencode($_POST['fcomment']),
		'submit'=>'submit'
	);

	//url-ify the data for the POST
	$fields_string = '';
	foreach($fields as $key=>$value) { 
		$fields_string .= $key.'='.$value.'&';
	}
	$fields_string = substr($fields_string, 0, strlen($fields_string)-1); 
	$result = "Fields_String: [" . $fields_string . "]<br />";

	//open connection for Google Spreadsheets
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

	//execute post
	$result .= "Curl Results: [" . curl_exec($ch) . "]<br />";

	//close connection
	curl_close($ch);

?>