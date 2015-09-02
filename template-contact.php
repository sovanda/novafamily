<?php
/*
Template Name: Contact page
*/?>

<?php get_header(); ?>

	<section id="contacts">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			 jQuery(document).ready(function ($)
				{
					
					var delta = 0.005;
					var coordLat = 11.544401;
					var coordLng = 104.924208;
					if( jQuery(window).width() < 756 )
					{
						delta = 0;
					}
					
					var point = new google.maps.LatLng(coordLat,coordLng);
					var center = new google.maps.LatLng(coordLat,coordLng += delta);
					var styles = [
						    {
						        "featureType": "landscape",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "lightness": 65
						            },
						            {
						                "visibility": "on"
						            }
						        ]
						    },
						    {
						        "featureType": "poi",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "lightness": 51
						            },
						            {
						                "visibility": "simplified"
						            }
						        ]
						    },
						    {
						        "featureType": "road.highway",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "visibility": "simplified"
						            }
						        ]
						    },
						    {
						        "featureType": "road.arterial",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "lightness": 30
						            },
						            {
						                "visibility": "on"
						            }
						        ]
						    },
						    {
						        "featureType": "road.local",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "lightness": 40
						            },
						            {
						                "visibility": "on"
						            }
						        ]
						    },
						    {
						        "featureType": "transit",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "visibility": "simplified"
						            }
						        ]
						    },
						    {
						        "featureType": "administrative.province",
						        "stylers": [
						            {
						                "visibility": "off"
						            }
						        ]
						    },
						    {
						        "featureType": "water",
						        "elementType": "labels",
						        "stylers": [
						            {
						                "visibility": "on"
						            },
						            {
						                "lightness": -25
						            },
						            {
						                "saturation": -100
						            }
						        ]
						    },
						    {
						        "featureType": "water",
						        "stylers": [
						            {
						                "color": "#D5F1EC"
						            }
						        ]
						    }
						];
					
					var contentString = '<div id="popup-map">'+
							'<h5>Nova Cambodia</h5>'+
							'<span>#29B Mao Tse Toung Blvd, Phnom Penh, Cambodia</span>'+
							'<span>+855 23 223 577 / 012 825 646</span>'+
							'<span><a href="mailto:info@novacambodia.com">info@novacambodia.com</a></span>'+
							'</div>';
					var infowindow = new google.maps.InfoWindow({content: contentString }); 		
					var mapOptions = {	
						zoom: 14,
						center: center,
						styles: styles,
						scrollwheel: false,
						zoomControl: true,
						disableDefaultUI: true,
						zoomControlOptions: {
							style: google.maps.ZoomControlStyle.LARGE,
							position: google.maps.ControlPosition.LEFT_CENTER
						},
						mapTypeId: google.maps.MapTypeId.ROADMAP
				  }
				  var map = new google.maps.Map(document.getElementById('branch-map'), mapOptions);
				  var image = 'images/gmap_default.png';
				  var marker = new google.maps.Marker({
				  	map: map,
				  	position: point,
				  	title: "Nova Cambodia"
				  });
				  infowindow.open(map,marker);

				  	google.maps.event.addListener(marker, 'click', function() {
					  infowindow.open(map,marker);
					});
					google.maps.event.addListener(map, "click", function(){
					  infowindow.close();
					});
				});
			</script>

		<div id="branch-map"></div>
	</section>
	
<?php get_footer(); ?>