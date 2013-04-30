<?php

	// Post to Google Spreadsheet Form
	$url = $gdoc_invites['form'];

	// Create post array to send results to Google Spreadsheets
	// entry values according to Webform of Google Spreadsheet 
	$fields = array(
		'entry.135599862'=>urlencode($_POST['fname_invite']),
		'entry.2142525966'=>urlencode($_POST['farea_invite']),
		'entry.1072578125'=>urlencode($_POST['fmail_invite']),
		'entry.132727690'=>urlencode($_POST['fprofile_invite']),
		'entry.1066887706'=>urlencode($_POST['ftime_invite']),
		'entry.1190249990'=>urlencode($_POST['finfo_invite']),
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