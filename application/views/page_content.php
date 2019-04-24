<?php /* Lightbox Container Mobil+Tablet */ ?>
<div class="extras">
	<div class="holder"></div>
</div>

<?php /* Waterfall Bilder Stuff */ ?>
<div class="content">
	<div class="row">
		<div class="large-12 columns">
			<ul id="waterfall"></ul>
		</div>
	</div>
</div>

<?php /* Cookie Hinweis */ ?>
<div class="cookie hide">
	<div class="row">
	  <div class="columns">
	      <div class="dce-copy">
	          <div class="copy">
	              Die Agentur 22 Website benutzt Cookies. Wenn Sie unsere Website weiter nutzen, stimmen Sie der Verwendung von Cookies zu.
	              <a class="datenschutz" href="/datenschutz">
	                Erfahren Sie mehr
	              </a>
	          </div>
	          <a class="accept" href="#">Akzeptieren</a>
	      </div>
	  </div>
	</div>
</div>

<?php /* Waterfall js stuff + LikeButton + Lightbox Funktion */ ?>
<script type="text/javascript">
var data = <?php echo json_encode($result, JSON_HEX_TAG); ?>;
var origin = window.location.origin;
var loading = false;
var dist = 500;
var start = 0;
var end = data.length;

setInterval(function ()
{
	if ($(window).scrollTop() >= $(document).height() - $(window).height() - dist && !loading) {
		if (start < end) {
			loading = true;

			$("#waterfall").append(
				"<li><div class='card "+data[start].id+" noselect'>"+
					"<img src='"+data[start].url+"' alt='"+data[start].alt+"'>"+
					"<div class='card-section'>"+
						"<div class='row'>"+
							"<div class='small-7 medium-7 columns'>"+
								"<div class='pholder transform4'>"+
									"<p>#wirsind<span>freundevon</span> "+data[start].alt+"<br>"+
									"<a href='"+data[start].quelle+"' target='_blank'>&copy; Quelle</a></p>"+
								"</div>"+
							"</div>"+
							"<div class='small-5 medium-5 columns text-right' id='"+data[start].id+"'>"+
								"<div class='likeButton'>"+
									"<div class='icon-Herz-Icon-01 size'></div>"+
									"<span id='likes'>"+((data[start].likes === null) ? "" : data[start].likes)+"</span>"+
								"</div>"+
								"<div class='deleteButton'>"+
									"<div class='icon-Plus-Icon-23 size'></div>"+
								"</div>"+
							"</div>"+
						"</div>"+
  					"</div>"+
				"</div></li>");

				$("#"+data[start].id).click(function(event) {
					var id = this.id;

					var packet = {
						id: id,
			            likes: $(this).find("span").text().trim()
			        };

					var response = jQuery.ajax({
						type: "POST",
						url: origin+"/page/like/",
						data: packet,
						success: function(data) {

							$("#"+id).find("span").text(" "+data);
							$('#'+id).find(".likeButton").css({color: 'rgb(205,23,25)'});
							$('#'+id).off('click');

						}
					});
				});


				/* Mobile Zoom in und Clone Like Function */
				if ($(window).width() < 640) {
					$("."+data[start].id).click(function() {
						var clone = $(this).clone();
						if ($(window).width() > 320) {
							clone.find(".card-section").css("display", "block");
						}
						clone.find("img").wrap("<div class='mobile-wrapper'><div class='close-wrapper'></div></div>");
						clone.find("img").after("<div class='close'><div class='icon-Plus-Icon-23 '></div></div>");
						clone.find(".close").click(function() {
							$(".card:first").remove();
							$("header").css("pointer-events", "all");
							$(".content").css("pointer-events", "all");
							$("nav").css("display", "inline-block");
						})

						clone.find(".small-5").click(function(event) {
							var id = this.id;

							var packet = {
								id: id,
					            likes: $(this).find("span").text().trim()
					        };

							var color = $('.content').find('#'+id).find('.likeButton').css('color');
							if (!(color == 'rgb(205, 23, 25)')) {
								var response = jQuery.ajax({
									type: "POST",
									url: origin+"/page/like/",
									data: packet,
									success: function(data) {

										$('#'+id).find('span').text(' '+data);
										$('#'+id).find('.likeButton').css({color: 'rgb(205,23,25)'});
										$('#'+id).off('click');
										$('.content').find('#'+id).find('span').text(' '+data);
										$('.content').find('#'+id).find('.likeButton').css({color: 'rgb(205,23,25)'});
										$('.content').find('#'+id).off('click');

									}
								});
							}
						});

						clone.find(".likeButton").css("position", "relative");
						clone.find(".likeButton").css("width", "100%");
						clone.find(".icon-Herz-Icon-01").css("display", "inline-block");
						clone.find("#likes").css("display", "inline-block");
						clone.find("#likes").css("line-height", "170%");
						clone.prependTo(".holder");
						$(".extras").find(".card-section").appendTo(".close-wrapper");
						$("header").css("pointer-events", "none");
						$(".content").css("pointer-events", "none");
						$("nav").css("display", "none");
						/* center img horizontal */
						var imgwidth = $(".extras").find("img").width();
						var mobilewidth = $(".extras").find(".mobile-wrapper").width();
						var windowwidth = $(window).width();
						var innerwidth = (windowwidth - imgwidth) / 2;
						var outerwidth = (windowwidth - mobilewidth) / 2;
						var final = innerwidth - outerwidth;
						$(".extras").find(".close-wrapper").css("left", ""+final+"px");
					});
				}

			start++;
			loading = false;

		} else {
			return;
		}
	}
}, 250);
</script>
