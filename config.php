<?php
// CONTACT INFO FOR IMPRINT
// if you want to use this tool you must complete all contact fields
// ----------------------------------------------------------------------------
	$contact = array( 
		'name' => '', // Hans Gurke
		'street' => '', // Landstr. 12
		'city' => '', // 12345 Ort
		'mail' => '' // hans.gurke@domain.com
	);


// BASICS CONFIG
// ----------------------------------------------------------------------------

	// Obligatory config values
	// please complete all - otherwise the tool won't work properly
	$config = array( 
	// default language (en | de)
		'language' => 'en',
 	// Google Maps API key for background map - how to get one: http://goo.gl/g7zFq
		'mapsApiKey' => '',
	// local coords for background map and links (51.573816,11.117992)		
		'mapsCoords' => '',
	// mail address of moderator / mailing list - for notifications about new users		
		'mail_mods' => '',
	// from mail adress of info mail to user - to avoid SPAM rating 
			'mail_noreply' => '', 
	);

	// User data storage
	// please replace "XXXX" of both fields with your values
	$gdoc = array( 
		'sheet' => 'https://docs.google.com/spreadsheet/ccc?key=XXXX', // Google Docs Spreadsheet
		'form' => 'https://docs.google.com/forms/d/XXXX/formResponse' // Google Docs Spreadsheet Webform
	);

	// Optional config values
	// empty fields will be hidden / not included.
	$config_opt = array( 
		'analyticsKey' => 'UA', // Google Analytics property: UA-123456-12
	);


// LOCAL WORDING/INFOS
// ----------------------------------------------------------------------------

	// localize headlines/contents
	$local = array( 
		'region1_de' => '[Stadt]', 		// München
		'region2_de' => '[Städtische]', 	// Münchner
		'region1_en' => '[City]', 			// Munich
		'region2_en' => '[City]' 			// Munich
	);

	// local channels (nested array for each channel)
	// default = community, chat, group - more must be added to spreadsheet aswell (check source code of 'live form' for IDs)
	// also add those IDs in inc/gdoc.php:19 ...
	$channels = array( 
		array(
			// machine name
			'form_id' => 'community',
			// visible name
			'name' => 'Google+&nbsp;Community',
			// basic URL
			'url' => '',
			// URL for registration
			'url2' => ''
		),
		array(
			'form_id' => 'chat',
			'name' => 'Group&nbsp;Chat',
			'url' => '',
			'url2' => ''
		),
		array(
			'form_id' => 'group', 			
			'name' => 'Google&nbsp;Group',
			'url' => '',
			'url2' => '' 						
		)
	);


// CONTENTS/LINKS
// Please add or remove as you like
// ----------------------------------------------------------------------------

	// LINKS
	$links = array( 
		'tuts' => array( 
			array(
				'name_de' => 'How not to suck at Ingress',
				'name_en' => 'How not to suck at Ingress',
				'url' => 'https://docs.google.com/document/d/18wdwC7VU_T_jBmodnUamWFl9LwRmdP38AOJ7Zp58TE0'
			),
			array(
				'name_de' => 'Portals - how do they work?',
				'name_en' => 'Portals - how do they work?',
				'url' => 'https://docs.google.com/document/d/1ZKt6bvgcsS4Bzve8k36FZNmAYrwt8QrSn-wztNpOkhU'
			),
			array(
				'name_de' => 'Offizielle Support-Seiten',
				'name_en' => 'Official support pages',
				'url' => 'http://support.google.com/ingress'
			)
		),
		'info' => array( 
			array(
				'name_de' => 'Ingress Intel Map',
				'name_en' => 'Ingress Intel Map',
				'url' => 'http://www.ingress.com/intel'
			),
			array(
				'name_de' => 'Ingress Field Guide',
				'name_en' => 'Ingress Field Guide',
				'url' => 'http://www.ingressfieldguide.com'
			),
			array(
				'name_de' => 'Ingress portals app',
				'name_en' => 'Ingress portals app',
				'url' => 'https://play.google.com/store/apps/details?id=com.ics.ingresscalculator'
			),
			array(
				'name_de' => 'Ingress Statistik',
				'name_en' => 'Ingress demographics',
				'url' => 'https://play.google.com/store/apps/details?id=com.ics.ingresscalculator'
			),
			array(
				'name_de' => 'Ingress Global Control Diagramm',
				'name_en' => 'Ingress global control chart',
				'url' => 'https://play.google.com/store/apps/details?id=com.ics.ingresscalculator'
			)
		)
	);	

?>