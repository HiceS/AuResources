<html>
	<!-- Add jQuery library -->
	<script type="text/javascript" src="../fancybox/lib/jquery-1.10.1.min.js"></script>	
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<script src="../chair_css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=0"></script>
	<script src="../js/jquery.dropotron-1.2.js"></script>
	<script src="../js/init.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		body {
			margin: 0 auto;
		}
	</style>
		<body>
	<div id="body-wrapper" class="wrapper">
	<form id="info_all-wrapper">
		<div class="padded_info">
			<h1><span class = "hugetitle" style="text-align: center;"><font color="#FFD119">Au</font>Photo Gallery: </span></h1>
				<div id="info_written">
					<a class="fancybox-media" href="http://www.youtube.com/watch?v=MaSH70Vc4e4">Youtube Video on gold mining</a>
					<p>
						<a class="fancybox" href="../images/medium1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="../images/medium1.jpg" alt="" /></a>

						<a class="fancybox" href="images\photo_center\2.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="images\photo_center\2.jpg" alt="" /></a>

						<a class="fancybox" href="images\photo_center\3.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\photo_center\3.jpg" alt="" /></a>

						<a class="fancybox" href="images\photo_center\4.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno"><img src="images\photo_center\4.jpg" alt="" /></a>
					</p>
					<p>
						<a class="fancybox" href="images\photo_center\5.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images\photo_center\5.jpg" alt="" /></a>

						<a class="fancybox" href="images\photo_center\6.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="images\photo_center\6.jpg" alt="" /></a>

						<a class="fancybox" href="images\photo_center\7.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\photo_center\7.jpg" alt="" /></a>

						<a class="fancybox" href="images\photo_center\8.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno"><img src="images\photo_center\8.jpg" alt="" /></a>
					</p>
				</div>
				</div>
			</form>
	</body>
</html>