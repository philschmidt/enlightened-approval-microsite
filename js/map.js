function initialize() {

	var mapOptions = {
		center: new google.maps.LatLng(mapsLat,mapsLon),
		zoom: 15,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControl: false,
		navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		streetViewControl: false,
	};

	var styles = [{
		"stylers": [
			{ "invert_lightness": true },
			{ "hue": "#00fff7" },
			{ "saturation": -49 }
		]
	},{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [{ "color": "#b3bfcf" }]
	},{
		"featureType": "poi",
		"stylers": [{ "visibility": "off" }]
	},{
		"featureType": "transit",
		"stylers": [{ "visibility": "off" }]
	}];

	var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

	var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style'); 

	setTimeout('google.maps.event.trigger(map, "resize");map.setZoom(map.getZoom());', 200);
}