
<?php

$meta = array( 
	'title' => 'Ingress Enlightened '.$local['region1_en'],
	'description' => 'Verify your \'Enlightenment\' and join the '.$local['region2_en'].' Ingress Enlightened Community.'
);

$navi = array(
	array(
		'name' => 'Info',
		'id' => 'info',
		'x' => 'active'
	),
	array(
		'name' => 'Approval',
		'id' => 'approval'
	),
	//coming soon
	//array(
	//	'name' => 'Invite approval',
	//	'id' => 'invite'
	//),
	array(
		'name' => 'Disclaimer / Privacy',
		'id' => 'imprint'
	)
);

$contents['info_header'] = '<h2>Enlightened '.$local['region1_en'].'</h2>
	<p>Welcome to the info board of the '.$local['region2_en'].' Enlightened faction of the augmented reality game Ingress.</p>
	<p>Verified enlightened players will be granted access to these channels:</p>';

$contents['info_channels'] = '<h3>';
foreach($channels as $c){
	$i++;
	$contents['info_channels'] .= '<a target="blank" href="'.$c['url'].'">'.$c['name'].'</a>';
	$contents['info_channels'] .= ( count($channels) > $i ) ? ' | ' : '';
}
$contents['info_channels'] .= '</h3>';

$contents['info_content'] = '<p class="notice">If you are playing for the '.$local['region1_en'].' Enlightened and aren\'t verified so far,<br/>please complete the <a href="#approval">approval form</a></p>' 
		.  ////'<p class="notice">If you want to play for the '.$local['region1_en'].' Enlightened and aren\'t invited so far,<br/>please complete the <a href="#invite">invite approval form</a></p>
	'<hr/>

	<div class="panel c50">
		<h3>Got questions?</h3>		
		<p>These manuals bear a helping hand:</p>
		<ul>';

foreach($links['tuts'] as $c){
	$contents['info_content'] .= '		<li><a target="blank" href="'.$c['url'].'">'.$c['name_en'].'</a></li>';
}

$contents['info_content'] .= '		</ul>
	</div>
	<div class="panel c50">
		<h3>Other ressources:</h3>		
		<ul>';

foreach($links['info'] as $l){
	$contents['info_content'] .= '		<li><a target="blank" href="'.$l['url'].'">'.$l['name_en'].'</a></li>';
}

$contents['info_content'] .= '		</ul>
	</div>';

$contents['form'] = '<div id="form_intro">
		<h2>Enlightened '.$local['region1_en'].' Approval</h2>
		<p class="info">To verify your \'Enlightenment\', please share at least your current level, ingame alias, main area and your eMail:</p>
	</div>

	<div id="form_inner">
		<label id="lnick" for="fnick">level / ingress nickname</label>
		<select id="flevel" name="flevel"><option>&ndash;</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option></select>
		<input type="text" id="fnick" name="fnick" maxlength="64" placeholder="ingress nickname" />

		<label id="lname" for="fname">real name</label>
		<input type="text" id="fname" name="fname" maxlength="128" placeholder="real name" />

		<label id="larea" for="farea">main area</label>
		<input type="text" id="farea" name="farea" maxlength="256" placeholder="main area" />

		<label id="lmail" for="fmail">gMail (for feedback and group/chat account)</label>
		<input type="text" id="fmail" placeholder="gMail (for feedback and accounts)" name="fmail" maxlength="128"/>

		<label id="lprofile" for="fprofile">G+ profile url (for community invite)</label>
		<input type="text" id="fprofile" placeholder="G+ profile url (for community invite)" name="fprofile" maxlength="128"/>

		<div id="errorbox">
			<p id="errorlevel">Please select your level.</p>
			<p id="error">Please complete all marked fields.</p>
			<p id="errormail">Please check the mail address.</p>
			<button class="button">OK</button>
		</div>

		<p id="lchannels">Please add me to:</p>';

foreach($channels as $c){
	$contents['form'] .= '		<span class="checkbox"><input type="checkbox" id="f'.$c['form_id'].'" name="f'.$c['form_id'].'" checked="checked" /><label id="l'.$c['form_id'].'" for="f'.$c['form_id'].'">'.$c['name'].'</label></span>';
}

$contents['form'] .= '<button class="button submit positive">Submit</button>
	</div>

	<div class="success" style="display: none;">
		<h2>Thank you.</h2>
		<p>We received your data. Now please post the code below into the COMM panel of our faction (either in the <a href="http://www.ingress.com/intel?z=12&ll='.$config['mapsCoords'].'" target="_blank">intel map</a> or the mobile app).</p>
		<p id="ver_code"></p>
		<img id="comm" src="./img/comm.png" />
		<p>We just sent you an email how to proceed further (please also check your SPAM folder).</p>
		<p class="signature">Cheers, Enlightened '.$local['region1_en'].' Mods</p>
	</div>';

$contents['imprint'] = '<h2>Legal notice / privacy&nbsp;policy</h2>
	<h3>About</h3>
	<p>This tool was built by the Munich Enlightened in January 2013 to ease the management and approval of new community members. It shall be used by the Enlightened in other regions too and can be downloaded for your own server. For more info please visit <a href="http://ingress.philschmidt.net">ingress.philschmidt.net</a></p>

	<h3>Site Owner/Responsible for this Site:</h3>';

$contents['imprint'] .= ($contact['name'] != '') ? $contact['name']."<br/>\n" : '';
$contents['imprint'] .= ($contact['street'] != '') ? $contact['street']."<br/>\n" : '';
$contents['imprint'] .= ($contact['city'] != '') ? $contact['city']."<br/>\n" : '';
$contents['imprint'] .= ($contact['mail'] != '') ? '<a href="mailto:'.$contact['mail'].'">'.$contact['mail']."</a><br/>\n" : '';

$contents['imprint'] .= '
	<h3>Privacy Policy</h3>
	<p>We do respect your right to privacy. Any information we obtain through your use of this site will be kept within the team that organizes the '.$local['region2_en'].' game play. We will not sell or share information about you. We make every effort to only ask for information that is germane to you playing the game Ingress. If you are uncomfortable with providing a piece of information to us, please don\'t use this site. If you have further questions please get back to us: <a href="mailto:'.$contact['mail'].'">'.$contact['mail'].'</a></p>

	<h3>Cookie Policy</h3>
	<p>This site puts a cookie on your computer to define your default language when you return to this site. Disabling cookies will not affect your ability to utilize any feature of this web site. Please consult the help section of your web browser for information on how to disable cookies.</p>

	<h3>Legal Notice</h3>
	<p>The images, graphics on this sites are property of Google Inc. („Google“). These images may not be copied for commercial use or distribution without specific written permission. All other trademarks are the property of their respective owners.</p>';
?>
