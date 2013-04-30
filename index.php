<?php
// get config
require_once('./config.php');

// check config
if($contact['name'] == '' || $contact['mail'] == '' || $config['mail_mods'] == ''){
	exit('Please define config values first ...');
}

// load localized contents	
if ($_COOKIE['lang']) {
	require_once('./lang/'.$_COOKIE['lang'].'.php');
}else{
	require_once('./lang/'.$config['language'].'.php');
}

// if form submitted
if(isset($_GET['post']) && isset($_POST)) {
	require_once('./inc/gdoc.php');
	require_once('./inc/mail.php');
}
if(isset($_GET['postinvite']) && isset($_POST)) {
	require_once('./inc/gdoc_invite.php');
	require_once('./inc/mail_invite.php');
}


require_once('./inc/header.php');
?>
<body onload="initialize()">

	<div id="map_canvas" style="width:100%; height:100%"></div>
	
	<div id="header">
		<div class="separator">
			<div class="separator_left_arm"></div>
			<div class="separator_center"></div>
			<div class="separator_right_arm"></div>
		</div>
	</div>
	
	<div id="distance"></div>
	
	<div id="page">
	
		<div id="wrapper_out">
			<div id="wrapper" class="gradient">
				<div id="nav">
					<ul>
<?php
foreach($navi as $n){
	print "\t\t\t\t\t\t".'<li><a href="#'.$n['id'].'" class="'.$n['id'].' '.$n['x'].'">'.$n['name'].'</a></li>';
}
?>
					</ul>
				</div>
			
				<div id="inner">

					<div id="info">
<?php
	print $contents['info_header'];
	print $contents['info_channels'];
	print $contents['info_content'];
?>
					</div>

					<div id="approval">
<?php print $contents['form']; ?>
					</div>
<?php if($_COOKIE['lang']!=='en') : ?>
					<div id="invite">
<?php print $contents['form2']; ?>
					</div>
<?php endif; ?>
					<div id="imprint">
<?php print $contents['imprint']; ?>
					</div>

				</div>
			
			</div>
			<div id="logo"></div>
		</div>

<?php
require_once('./inc/footer.php');
?>