<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo $meta['title']; ?></title>
	<meta name="description" content="<?php echo $meta['description']; ?>" />
	<meta property="og:title" content="<?php echo $meta['title']; ?>" />
	<meta property="og:description" content="<?php echo $meta['description']; ?>" />
	<meta property="og:image" content="./img/og_thumbnail.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="author" href="humans.txt" />
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./css/screen.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans:400,700" type="text/css">
	<!--[if lte IE 9]><link rel="stylesheet" href="./css/ie.css" media="screen" type="text/css" /><![endif]-->
	<!--[if gte IE 9]><link rel="stylesheet" href="./css/ie9.css" media="screen" type="text/css" /><![endif]-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="./js/jquery.cookie.js"></script>
	<script src="./js/global.min.js"></script>
	<script src="//maps.googleapis.com/maps/api/js?sensor=false&key=<?php print $config['mapsApiKey']; ?>" type="text/javascript" ></script>
	<?php $mapsCoords = explode(',',$config['mapsCoords']); ?>
	<script type="text/javascript">
		 mapsLat = '<?php echo $mapsCoords[0]; ?>';
		 mapsLon = '<?php echo $mapsCoords[1]; ?>';
	</script>
	<script src="./js/map.js"></script>
<?php
	if($config_opt['analyticsKey'] != ''){
?>
	<script type="text/javascript">
		analyticsKey = '<?php echo $config_opt['analyticsKey']; ?>';
	</script>
	<script src="./js/analytics.js"></script>
<?php
	}
?>
</head>
