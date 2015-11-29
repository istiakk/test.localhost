<?php
	$pages = array();
	$pages["index"]="Home";
        $pages["contact"]="Contact";
	$pages["about-us"]="About-us";	
?>
<nav>
	<ul>
		<?php foreach($pages as $link=>$title) {
				 $current = ($this->_controller==$link) ? " class='current'" : "";
				 $addr = $link == 'index' ? '' : $link;
				 echo "<li{$current}><a class='link' href='/test.localhost/{$addr}'>{$title}</a></li>";
		      }			
		?>
	</ul>		
</nav>		