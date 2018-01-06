<script type="text/javascript">
	$(function() {

	    $('#id-login-form-link').click(function(e) {
			$("#id-login-form").delay(100).fadeIn(100);
	 		$("#id-reg-form").fadeOut(100);
			$('#id-reg-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#reg-form-link').click(function(e) {
			$("#id-reg-form").delay(100).fadeIn(100);
	 		$("#id-login-form").fadeOut(100);
			$('#id-login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

	});
</script>

