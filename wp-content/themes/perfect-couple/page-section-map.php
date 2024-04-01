<?php /* Template name: Section: Map */

wp_enqueue_script('google-map-api');

$style = '';

$section_page = get_post( $page->ID );

$css_classes = get_post_class('', $section_page->ID);
$css_classes[] = 'section-page map-section';

$min_height    = get_post_meta( $section_page->ID, 'pc_min-height', true );
$center_lat    = get_post_meta( $section_page->ID, 'pc_map-center-lat', true );
$center_lng    = get_post_meta( $section_page->ID, 'pc_map-center-lng', true );
$map_zoom      = get_post_meta( $section_page->ID, 'pc_map-zoom', true );
$map_type      = get_post_meta( $section_page->ID, 'pc_map-type', true );
$map_marker    = get_post_meta( $section_page->ID, 'pc_map-marker', true );
$locations     = get_post_meta( $section_page->ID, 'pc_locations', true );

if( !empty($min_height) ) {
	$style = ' style="';
	if( !empty( $min_height ) )  $style .= 'min-height:' . $min_height . 'px;';
	$style .= '"';
}

?><section id="<?php echo esc_attr(pc_getPCPageID($section_page->ID)); ?>" class="<?php echo implode(" ", $css_classes); ?>"<?php echo $style; ?>>
<div id="<?php echo esc_attr(pc_getPCPageID($section_page->ID)); ?>-map-canvas" class="map-canvas"></div>
<script type="text/javascript">

	function initialize() {

		// Create an array of styles.
		var styles = [
			{
				stylers: [
					{ "saturation": -100 },
					{ "gamma": 1 }
				]
			},{
				featureType: "road",
				elementType: "geometry",
				stylers: [
					{ lightness: 100 },
					{ visibility: "simplified" }
				]
			},{
				featureType: "road",
				elementType: "labels",
				stylers: [
					{ visibility: "off" }
				]
			}
		];

		// Create a new StyledMapType object, passing it the array of styles,
		// as well as the name to be displayed on the map type control.
		var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

		var mapOptions = {
			scrollwheel: false,
			zoom: <?php echo $map_zoom; ?>,
			center: new google.maps.LatLng(<?php echo $center_lat; ?>, <?php echo $center_lng; ?>),
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.<?php echo $map_type; ?>, 'map_style']
			}
		}
		var map = new google.maps.Map(document.getElementById('<?php echo esc_attr(pc_getPCPageID($section_page->ID)); ?>-map-canvas'), mapOptions);

		//Associate the styled map with the MapTypeId and set it to display.
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');

		setMarkers(map, places);
	    infowindow = new google.maps.InfoWindow({
            content: "loading...",
            maxWidth: 150
        });
	} 

	var places = [<?php
		if( !empty($locations) ) { 
			foreach( $locations as $location ) { ?>
				[<?php echo(json_encode($location["title"])); ?>, <?php echo($location['map-lat']); ?>, <?php echo($location['map-lng']); ?>, 1, <?php echo(json_encode($location['location-content'])); ?>], <?php
			}
		} ?>
	];

	function setMarkers(map, locations) {
		<?php if( !empty($map_marker) ) { ?>
		// Add markers to the map
		var image = {
			url: '<?php echo( esc_attr($map_marker) ); ?>',
			// This marker is 40 pixels wide by 42 pixels tall.
			size: new google.maps.Size(62, 58),
			// The origin for this image is 0,0.
			origin: new google.maps.Point(0,0),
			// The anchor for this image is the base of the pin at 20,42.
			anchor: new google.maps.Point(15, 58)
		};
		<?php } ?>

		for (var i = 0; i < locations.length; i++) {
			var place = locations[i];
			var myLatLng = new google.maps.LatLng(place[1], place[2]);
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				<?php if( !empty($map_marker) ) { ?>icon: image,<?php } ?>
				title: place[0],
				zIndex: place[3],
				animation: google.maps.Animation.DROP,
				html: place[4]
			});

	        google.maps.event.addListener(marker, "click", function () {
	            infowindow.setContent(this.html);
	            infowindow.open(map, this);
	        });

		}
	}
 
	google.maps.event.addDomListener(window, 'load', initialize);

</script>
<div class="container"><?php
	$content = apply_filters('the_content', $page->post_content);
	echo $content;
?></div>
</section>