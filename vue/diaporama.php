<?php

require_once(PATH_VUE.'header.php');


foreach ($diapositives as $diapositive ){
	?>
	<div class="slideshow-container">
		<div class="mySlides fade">
			<img src="<?php echo PATH_IMAGES.$diapositive ['nomFichier'];  ?>" style="width:100%">
			<div class="text">Caption Text</div>
		</div>
		<?php

	}
	?>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
	<span class="dot" onclick="currentSlide(1)"></span>
	<span class="dot" onclick="currentSlide(2)"></span>
	<span class="dot" onclick="currentSlide(3)"></span>
</div>

<?php
require_once (PATH_VUE.'footer.php');
?>

<script src="<?php  echo PATH_SCRIPTS.'slider.js';?>"></script>
