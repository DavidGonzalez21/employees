</section><!-- End Content -->
 </div><!-- End Main -->
</div><!-- End Container -->
</body>
<script>
$(document).ready(function() {
		$menuLeft = $('.pushmenu-left');
		$nav_list = $('.span-menu');

		$nav_list.click(function() {
			$(this).toggleClass('active');
			//$('.pushmenu-push').toggleClass('pushmenu-push-toright');
			$menuLeft.toggleClass('pushmenu-open');
		});

    $('.pushmenu').mouseleave(function() {
    	$(this).removeClass('pushmenu-open');
    });
	});
</script>
