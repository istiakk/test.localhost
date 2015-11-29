<?php 
$this->layout = '~/views/shared/_defaultLayout.php';
?>
<div class="block bgWhite">
	<div class="content">
		<img src="/test.localhost/public/images/ist.png" width="200" alt="" />
	</div>
</div>
<div class="block bgWhite">
	<div class="content">
		<div class="col">
			<h2>Our Story</h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_null.php')); ?>
		</div>
		<div class="col">
			<h2>Our Mission</h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_null.php')); ?>
		</div>
		<div class="col">
			<h2>Work with us</h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_null.php')); ?>	
		</div>
	</div>
</div>

<script>
    $(document).ready(function () {
        $("#menu").on('click', function (e) {
            var data = {};

            $.ajax({
                url: '/test.localhost',
                type: 'post',
                data: data,
                success: function (returnedData) {
            return false;
        });
    });
</script>