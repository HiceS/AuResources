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
			<h1><span class = "hugetitle" style="text-align: center;"><font color="#FFD119">Au</font>Merchandise: </span></h1>
				<div id="info_written">
				<a class="fancybox" style="float: left; padding 10px;" href="../images/medium1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img width="300px" height="200px" class="fancyimage" src="../images/medium1.jpg" alt="" /></a>
					<a class="fancyparagraph">
								<span class="fancytitle">Opportunity:</span>
								<p class="fancybody_right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis porttitor sapien, ut imperdiet odio. Sed vel aliquam quam. Ut faucibus odio ultrices sagittis tincidunt. Donec tincidunt dui sed sapien dignissim eleifend. Donec ac nibh congue, mollis nisl sed, luctus odio. In ornare neque sed magna posuere, eget sagittis massa semper. Cras dapibus tortor ligula, quis interdum enim molestie non. Cras augue odio, fringilla sed libero a, egestas volutpat urna. Etiam eros felis, consectetur sed risus eu, euismod sodales neque. Phasellus viverra tellus id dolor malesuada cursus. Sed condimentum ac velit a tristique. Sed id lectus dictum, commodo nibh quis, semper magna.
								<br>
								<button class="purchase" style = "float: right;">Purchase Now !</button>
								</p>
					</a>
				<a class="fancybox" style="float: left; padding 10px;" href="../images/medium1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img width="300px" height="200px" class="fancyimage" src="../images/medium1.jpg" alt="" /></a>
					<a class="fancyparagraph">
								<span class="fancytitle">Gold:</span>
								<p class="fancybody_right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis porttitor sapien, ut imperdiet odio. Sed vel aliquam quam. Ut faucibus odio ultrices sagittis tincidunt. Donec tincidunt dui sed sapien dignissim eleifend. Donec ac nibh congue, mollis nisl sed, luctus odio. In ornare neque sed magna posuere, eget sagittis massa semper. Cras dapibus tortor ligula, quis interdum enim molestie non. Cras augue odio, fringilla sed libero a, egestas volutpat urna. Etiam eros felis, consectetur sed risus eu, euismod sodales neque. Phasellus viverra tellus id dolor malesuada cursus. Sed condimentum ac velit a tristique. Sed id lectus dictum, commodo nibh quis, semper magna.
								<br>
								<button class="purchase" style = "float: right;">Purchase Now !</button>
								</p>
					</a>
				</div>
		</div>
	</form>
	</div>
	</body>
</html>