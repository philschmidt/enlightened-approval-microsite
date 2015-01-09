<?php

	// SEND APPROVAL-MAIL TO MODS
	$to = $config['mail_mods'];
	$subject = 'New Enlightened '.$local['region1_en'].' invite request';
	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$header .= 'From: Enlightened Approval Request <'.$_POST['fname_invite'].'.'.$config['mail_noreply'].'>' . "\r\n";
	$header .= 'Reply-To: '.$_POST['fname_invite'].' <'.$_POST['fmail_invite'].'>' . "\r\n";
	$header .= 'X-Mailer: PHP/' . phpversion();

	// Nachricht
	$message = '<html>
<head>
  <title>New Enlightened '.$local['region1_en'].' invite request</title>
</head>
<body>
  <table>
    <tr>
      <td><b>Name</b></td><td><b>gMail</b></td><td><b>Area</b></td><td><b>Time</b></td><td><b>Profile</b></td>
    </tr>
    <tr>
      <td>'.$_POST['fname_invite'].'</td><td>'.$_POST['fmail_invite'].'</td><td>'.$_POST['farea_invite'].'</td><td>'.$_POST['ftime_invite'].'</td><td>'.$_POST['fprofile_invite'].'</td>
    </tr>
    <tr>
    	<td><b>Infotext</b></td><td colspan="4">'.$_POST['finfo_invite'].'</td>
    </tr>
  </table>

  <p>Tools: <a href="'.$gdoc_invites['sheet'].'">Invites</a>, <a href="http://www.ingress.com/intel?z=12&ll='.$config['mapsCoords'].'">Map</a> | ';

	$message .='</body>
</html>';

	$send = mail($to, $subject, $message, $header);
	if(!$send) die();

	// ----------------------------------------------------------------

	// SEND MAIL TO APPLICANT
	$to2 = $_POST['fmail_invite'];
	$subject2 = 'Ingress Enlightened '.$local['region1_en'].' invite requested';

	$header2  = 'MIME-Version: 1.0' . "\r\n";
	$header2 .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$header2 .= 'X-Priority: 3' . "\r\n";
	$header2 .= 'X-Mailer: PHP/' . phpversion();
	$header2 .= 'Organization: Ingress Enlightened '.$local['region1_en'].' Mods' . "\r\n";
	$header2 .= 'From: Ingress Enlightened '.$local['region1_en'].' invite requested <'.$config['mail_noreply'].'>' . "\r\n";
	$header2 .= 'Reply-To: Ingress Enlightened '.$local['region1_en'].' Mods <'.$config['mail_mods'].'>' . "\r\n";
	$header2 .= 'Return-Path: Ingress Enlightened '.$local['region1_en'].' Mods <'.$config['mail_mods'].'>' . "\r\n";

	// Nachricht
	$message2 = '<html>
<head>
  <title>Ingress Enlightened '.$local['region1_en'].' invite requested</title>
</head>
<body>
	<h3>Hi '.$_POST['fname_invite'].',</h3>
	<p>Danke für dein Interesse an der '.$local['region2_de'].' Enligthened Ingress Game Community.</p>
	<p>Wir haben deine Invite Anfrage erhalten und werden Dich schnellstmöglich per E-Mail oder Google+ oder Google Talk kontaktieren.</p>
	<p><b>Wir haben deinen Wunschtermin erhalten können dir aber nicht Versprechen das zu diesem Zeitpunkt jemand aus der Community Zeit hat, daher mach den genauen Zeitpunkt bitte im nächten Kontakt direkt mit einem Moderator aus.</b></p>
	
	<p><br/>Danke</p>
	<p><i>Enlightened '.$local['region1_de'].' Mods</i></p>
</body>
</html>';

	$send2 = mail($to2, $subject2, $message2, $header2);
	if(!$send2) die();

	exit;

?>