<?php

	// SEND APPROVAL-MAIL TO MODS
	$to = $config['mail_mods'];
	$subject = 'New Enlightened '.$local['region1_en'].' approval request';
	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header .= 'From: Enlightened Approval Request <'.$_POST['fnick'].'.'.$config['mail_noreply'].'>' . "\r\n";
	$header .= 'Reply-To: '.$_POST['fname'].' ('.$_POST['fnick'].') <'.$_POST['fmail'].'>' . "\r\n";
	$header .= 'X-Mailer: PHP/' . phpversion();

	// Nachricht
	$message = '<html>
<head>
  <title>New Enlightened '.$local['region1_en'].' approval request</title>
</head>
<body>
  <table>
    <tr>
      <td><b>Level</b></td><td><b>Nick</b></td><td><b>Name</b></td><td><b>Area</b></td><td><b>eMail</b></td><td><b>Profile</b></td><td><b>Group</b></td><td><b>Chat</b></td><td><b>G+</b></td><td><b>Code</b></td>
    </tr>
    <tr>
      <td>'.$_POST['flevel'].'</td><td>'.$_POST['fnick'].'</td><td>'.$_POST['fname'].'</td><td>'.$_POST['farea'].'</td><td>'.$_POST['fmail'].'</td><td>'.$_POST['fprofile'].'</td><td>'.$_POST['fgroup'].'</td><td>'.$_POST['fchat'].'</td><td>'.$_POST['fcommunity'].'</td><td>'.$_POST['fcode'].'</td>
    </tr>
  </table>

  <p>Tools: <a href="'.$gdoc['sheet'].'">Members</a>, <a href="http://www.ingress.com/intel?z=12&ll='.$config['mapsCoords'].'">Map</a> | ';

foreach($channels as $c){
	$i++;
	$message .= '<a target="blank" href="'.$c['url'].'">'.$c['name'].'</a>';
	$message .= ( count($channels) > $i ) ? ' | ' : '';
}

	$message .='</body>
</html>';

	$send = mail($to, $subject, $message, $header);
	if(!$send) die();

	// ----------------------------------------------------------------

	// SEND MAIL TO APPLICANT
	$to2 = $_POST['fmail'];
	$subject2 = 'Ingress Enlightened '.$local['region1_en'].' Approval';

	$header2  = 'MIME-Version: 1.0' . "\r\n";
	$header2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header2 .= 'X-Priority: 3' . "\r\n";
	$header2 .= 'X-Mailer: PHP/' . phpversion();
	$header2 .= 'Organization: Ingress Enlightened '.$local['region1_en'].' Mods' . "\r\n";
	$header2 .= 'From: Ingress Enlightened '.$local['region1_en'].' Approval <'.$config['mail_noreply'].'>' . "\r\n";
	$header2 .= 'Reply-To: Ingress Enlightened '.$local['region1_en'].' Mods <'.$config['mail_mods'].'>' . "\r\n";
	$header2 .= 'Return-Path: Ingress Enlightened '.$local['region1_en'].' Mods <'.$config['mail_mods'].'>' . "\r\n";

	// Nachricht
	$message2 = '<html>
<head>
  <title>Ingress Enlightened '.$local['region1_en'].' Approval</title>
</head>
<body>
	<h3>Hi '.$_POST['fnick'].',</h3>
	<p>Danke für dein Interesse an der '.$local['region2_de'].' Ingress Game Community.</p>
	<p>Wir haben deinen Antrag erhalten und werden Dich sobald wir den Code ( '.$_POST['fcode'].' ) im COMM-Panel der Intel-Map entdeckt haben, in die gewünschten Kanäle einladen.</p>
	<p><b>Um den Vorgang zu beschleunigen, klicke doch kurz die folgenden Links und beantrage dort jeweils die Mitgliedschaft (das vereinfacht den Vorgang auf unserer Seite).</b></p>
	<table>';

foreach($channels as $c){
	$message2 .= '<tr><td>'.$c['name'].':</td><td>'.$c['url2'].'</td></tr>';
}

	$message2 .= '	</table>

	<p><hr/></p>

	<p>Thanks for applying for our ingress game community here in '.$local['region1_en'].'.</p>
	<p>We did receive your application and will invite you to the desired channels as soon we found your code ( '.$_POST['fcode'].' ) in the COMM panel inside the intel map.</p>
	<p><b>If you want to speed up the process, please click the links below and ask to join those channels (that way it\'ll make things easier for us).</b></p>

	<table>';

foreach($channels as $c){
	$message2 .= '<tr><td>'.$c['name'].':</td><td>'.$c['url2'].'</td></tr>';
}

	$message2 .= '	</table>

	<p><br/>Danke / Thanks</p>
	<p><i>Enlightened '.$local['region1_en'].' Mods</i></p>
</body>
</html>';

	$send2 = mail($to2, $subject2, $message2, $header2);
	if(!$send2) die();

	exit;

?>