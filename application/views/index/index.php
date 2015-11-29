<?php 
$this->layout = '~/views/shared/_defaultLayout.php';
//$this->section['head']='<script src="http://code.jquery.com/jquery-latest.min.js"></script>'; 
?>
<div class="block bgWhite">
	<div class="content">
		<img src="/test.localhost/public/images/istiak.jpg" width="990" alt="" />
	</div>
</div>
<div class="block bgBlack">
	<div class="content">
		<div class="col">
			<h2>Video Widget Platform</h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_video.php')); ?>
		</div>
		<div class="col category">
			<h2>Smart Parking System </h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_ble.php')); ?>
		</div>
		<div class="col category">
			<h2>Online Voting System</h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_voting.php')); ?>
		</div>
	</div>	
</div>

<div class="block bgWhite">
	<div class="content">
		<div class="col">
			<img src="http://ww2.servicestack.net/wp-uploads/2010/06/asp-net-mvc.png" height="220" alt="" />
		</div>
		<div class="col" style="max-width:700px;">
			<h2>Education</h2>
			<?php include(MyHelpers::UrlContent('~/views/shared/_education.php')); ?>
		</div>
	</div>
</div>