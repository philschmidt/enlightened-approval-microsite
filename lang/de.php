<?php

$meta = array( 
	'title' => 'Ingress Enlightened '.$local['region1_de'],
	'description' => 'Bestätige deine Zugehörigkeit zur Enlightened Fraktion und werde Mitglied der '.$local['region2_de'].' Ingress Enlightened Community.'
);

$navi = array(
	array(
		'name' => 'Info',
		'id' => 'info',
		'x' => 'active'
	),
	array(
		'name' => 'Anmeldung',
		'id' => 'approval',
		'x' => ''
	),
	//array(
	//	'name' => 'Invite Anfrage',
	//	'id' => 'invite',
	//	'x' => ''
	//),
	array(
		'name' => 'Impressum  / Datenschutz',
		'id' => 'imprint',
		'x' => ''
	),
);

$contents['info_header'] = '<h2>Enlightened '.$local['region1_de'].'</h2>
	<p>Willkommen auf der Übersicht der '.$local['region2_de'].' Enlightened Faction des AR-Game Ingress.</p>
	<p>Folgende Kanäle sind in '.$local['region1_de'].' für verifizierte Enlightened-Spieler verfügbar:</p>';

$contents['info_channels'] = '<h3>';
$i=0;
foreach($channels as $c){
	$i++;
	$contents['info_channels'] .= '<a target="blank" href="'.$c['url'].'">'.$c['name'].'</a>';
	$contents['info_channels'] .= ( count($channels) > $i ) ? ' | ' : '';
}
$contents['info_channels'] .= '</h3>';

$contents['info_content'] = '<p class="notice">Wenn Du für die '.$local['region2_de'].' Enlightened spielst und bis jetzt noch nicht angemeldet bist,<br/>füll bitte das <a href="#approval">Anmeldeformular</a> aus.</p>
	<hr/>

	<div class="panel c50">
		<h3>Fragen zum Spiel?</h3>		
		<p>Diese Anleitungen sind ein guter Start:</p>
		<ul>';

foreach($links['tuts'] as $c){
	$contents['info_content'] .= '		<li><a target="blank" href="'.$c['url'].'">'.$c['name_de'].'</a></li>';
}

$contents['info_content'] .= '		</ul>
	</div>
	<div class="panel c50">
		<h3>Weitere Links:</h3>		
		<ul>';

foreach($links['info'] as $c){
	$contents['info_content'] .= '		<li><a target="blank" href="'.$c['url'].'">'.$c['name_de'].'</a></li>';
}

$contents['info_content'] .= '		</ul>
	</div>';

$contents['form'] = '<div id="form_intro">
		<h2>Enlightened '.$local['region1_de'].' Anmeldung</h2>
		<p class="info">Um deine Zugehörigkeit zur Enlightened-Fraktion zu bestätigen, teile uns bitte dein aktuelles Level, Nickname, Viertel und deine E-Mail-Adresse mit:</p>
	</div>

	<div id="form_inner">
		<label id="lnick" for="fnick">Level / Ingress Nickname</label>
		<select id="flevel" name="flevel"><option>&ndash;</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option></select>
		<input type="text" id="fnick" name="fnick" maxlength="64" placeholder="Ingress Nickname" />

		<label id="lname" for="fname">Echter Name</label>
		<input type="text" id="fname" name="fname" maxlength="128" placeholder="Echter Name" />
		
		<label id="larea" for="farea">Haupt-Viertel/Ort</label>
		<input type="text" id="farea" name="farea" maxlength="256" placeholder="Haupt-Viertel/Ort" />
		
		<label id="lmail" for="fmail">gMail (für Feedback und Group/Chat-Account)</label>
		<input type="text" id="fmail" placeholder="gMail (für Feedback und Accounts)" name="fmail" maxlength="128"/>
		
		<label id="lprofile" for="fprofile">G+ Profil URL (für Community-Account)</label>
		<input type="text" id="fprofile" placeholder="G+ Profil URL (für Community-Account)" name="fprofile" maxlength="128"/>
		
		<div id="errorbox">
			<p id="errorlevel">Bitte wähle dein Level.</p>
			<p id="error">Bitte fülle alle markierten Felder aus.</p>
			<p id="errormail">Bitte prüfe die E-Mail-Adresse.</p>
			<button class="button">OK</button>
		</div>

		<p id="lchannels">Bitte in folgende Channels aufnehmen:</p>';

foreach($channels as $c){
	$contents['form'] .= '		<span class="checkbox"><input type="checkbox" id="f'.$c['form_id'].'" name="f'.$c['form_id'].'" checked="checked" /><label id="l'.$c['form_id'].'" for="f'.$c['form_id'].'">'.$c['name'].'</label></span>';
}


$contents['form'] .= '<button class="button submit positive">Senden</button>
	</div>

	<div class="success" style="display: none;">
		<h2>Danke.</h2>
		<p>Wir haben deine Daten erhalten. Bitte kopiere nun den folgenden Code ins COMM-Fenster unserer Fraktion (entweder in der <a href="http://www.ingress.com/intel?z=12&ll='.$config['mapsCoords'].'" target="_blank">Intel Map</a> oder der Ingress App).</p>
		<p id="ver_code"></p>
		<img id="comm" src="./img/comm.png" />
		<p>Alle Infos zum weiteren Vorgehen haben wir Dir per Mail geschickt<br/> (prüfe ggf auch den SPAM-Ordner).</p>
		<p class="signature">Cheers, Enlightened '.$local['region1_en'].' Mods</p>
	</div>';

$contents['form2'] = '<div id="form_intro_invite">
		<h2>Enlightened '.$local['region1_de'].' Invite anfrage</h2>
		<p class="info">Um einen Invite von uns anzufragen, teile uns bitte dein Google+ Profil, Namen, Viertel und deine E-Mail-Adresse mit.
		Zusätzlich schlage uns noch einen Zeitpunkt vor an dem wir dich in '.$local['region1_de'].' treffen können:</p>
	</div>

	<div id="form_inner_invite">
		<label id="lname_invite" for="fname_invite">Name</label>
		<input type="text" id="fname_invite" name="fname_invite" maxlength="128" placeholder="Name" />
		
		<label id="larea_invite" for="farea_invite">Haupt-Viertel/Ort</label>
		<input type="text" id="farea_invite" name="farea_invite" maxlength="256" placeholder="Haupt-Viertel/Ort" />
		
		<label id="lmail_invite" for="fmail_invite">gMail (für Feedback)</label>
		<input type="text" id="fmail_invite" placeholder="gMail (für Feedback und Accounts)" name="fmail_invite" maxlength="128"/>
		
		<label id="lprofile_invite" for="fprofile_invite">G+ Profil URL (für Community-Account)</label>
		<input type="text" id="fprofile_invite" placeholder="G+ Profil URL (für Community-Account)" name="fprofile_invite" maxlength="128"/>
		
		<label id="ltime_invite" for="ftime_invite">Wann möchtest du uns für den Invite treffen (Datum, Uhrzeit, Ort)</label>
		<input type="text" id="ftime_invite" placeholder="Wann möchtest du uns für den Invite treffen (Datum, Uhrzeit, Ort)" name="ftime_invite" maxlength="128"/>

		<label id="linfo_invite" for="finfo_invite">Warum sollen wir gerade dir einen Invite geben?</label>
		<input type="text" id="finfo_invite" placeholder="Warum sollen wir gerade dir einen Invite geben?" name="finfo_invite" />

		<div id="errorbox_invite">
			<p id="error_invite">Bitte fülle alle markierten Felder aus.</p>
			<p id="errormail_invite">Bitte prüfe die E-Mail-Adresse.</p>
			<button class="button">OK</button>
		</div>
		Sobald wir deine Anfrage bekommen haben bekommst du von uns eine E-Mail mit Treffpunkt/Zeit an welchem du bitte mit installierter Ingress-App auf deinem Smartphone vorbeischaust.<br />
		Zu diesem Zeitpunkt wird dir dann ein Mitspieler der Enlightened '.$local['region1_de'].' einen Invite Code übergeben und dich bei deinen ersten Ingress Schritten begleiten.
		<br /><br />
		';
$contents['form2'] .= '<button class="button submit positive">Senden</button>
	</div>

	<div class="success" style="display: none;">
		<h2>Danke.</h2>
		<p>Wir haben deine Daten erhalten und werden uns bei dir Zeitnah melden.</p>
		<p>Alle Infos zum weiteren Vorgehen haben wir Dir per Mail geschickt<br/> (prüfe ggf auch den SPAM-Ordner).</p>
		<p class="signature">Cheers, Enlightened '.$local['region1_en'].' Mods</p>
	</div>';

$contents['imprint'] = '<h2>Impressum</h2>
	<h3>Über diese Site</h3>
	<p>Dieses Tool wurde Anfang 2013 von den Enlightened München erstellt um die Verifikation und Organisation von neuen Communitymitgliedern zu erleichtern. Es darf gerne auch von anderen Enlightened Verbänden genutzt werden und steht als Download zur Verfügung. Weitere Infos finden sich unter <a href="http://ingress.philschmidt.net">ingress.philschmidt.net</a></p>

	<hr>

	<h3>Betreiber dieser Site / Verantwortlicher gemäß §10 MDStV :</h3>';

$contents['imprint'] .= ($contact['name'] != '') ? $contact['name']."<br/>\n" : '';
$contents['imprint'] .= ($contact['street'] != '') ? $contact['street']."<br/>\n" : '';
$contents['imprint'] .= ($contact['city'] != '') ? $contact['city']."<br/>\n" : '';
$contents['imprint'] .= ($contact['mail'] != '') ? '<a href="mailto:'.$contact['mail'].'">'.$contact['mail']."</a><br/>\n" : '';

$contents['imprint'] .= '
	<h3>DATENSCHUTZ</h3>
	<p>Diese Seite nimmt den Datenschutz ernst und speichert/verwendet persönliche Daten ausschließlich in Zusammenhang mit dem Spiel Ingress innerhalb des  Organisationsteams '.$local['region1_de'].'. Spätestens mit Einstellung des Spiels seitens Google bzw. auf Wunsch auch vorab werden die Daten gelöscht. In keinem Fall werden die Daten an Dritte weitergegeben.<br/>Bei Fragen wenden Sie sich bitte an <a href="mailto:'.$contact['mail'].'">'.$contact['mail'].'</a></p>

	<h3>HINWEIS ZU COOKIES</h3>
	<p>Wenn Sie diese Website besuchen, wird ein Cookie auf Ihrem Computer abgelegt, damit die Sprachauswahl für den nächsten Besuch gespeichert wird. Falls Sie das Hinterlegen von Cookies unterbunden haben, können Sie diese Website dennoch in vollem Umfang nutzen. Im Hilfe-Menü Ihres Browsers fnden Sie Informationen darüber, wie Sie Cookies deaktivieren können.</p>

	<h3>RECHTLICHER HINWEIS</h3>
	<p>Alle Logos/Grafiken sind Eigentum der Google Inc. („Google“). Diese Bilder dürfen nicht zur gewerblichen Nutzung oder Verbreitung verwendet werden. Diese Objekte dürfen weder verändert noch auf anderen Websites veröffentlicht werden. Alle sonstigen Marken sind Eigentum ihrer jeweiligen Inhaber.</p>';

$contents['imprint'] .= ($config_opt['analyticsKey'] != '') ? '<h3>GOOGLE ANALYTICS</h3>
	<p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. („Google“). Google Analytics verwendet sog. „Cookies“, Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA übertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf dieser Webseite, wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum zuvor gekürzt. Nur in Ausnahmefällen wird die volle IP-Adresse an einen Server von Google in den USA übertragen und dort gekürzt. Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegenüber dem Websitebetreiber zu erbringen. Die im Rahmen von Google Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengeführt. Sie können die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer Browser-Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website vollumfänglich werden nutzen können. Sie können darüber hinaus die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitung dieser Daten durch Google verhindern, indem sie das unter dem folgenden Link verfügbare Browser-Plugin herunterladen und installieren.</p>
	<p><a href="http://tools.google.com/dlpage/gaoptout?hl=de">Browser-Add-on zur Deaktivierung von Google Analytics</a></p>' : '';
?>
