<?php

	$indicators = $inner = "";

	foreach ($services as $key => $value)
	{
		if ($key == 0)
		{
			$indicators .= "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$key."' class='active' aria-current='true'></button>";
			$inner .= 
				"<div class='carousel-item partners-layout active'>
					<img src='".$value->img_src."'>
					<div class='carousel-caption d-none d-md-block'>
						<h5>".$value->header."</h5>
						<p>".$value->description."</p>
					</div>
				</div>";
		}
		else
		{
			$indicators .= "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$key."'></button>";
			$inner .= 
				"<div class='carousel-item partners-layout'>
					<img src='".$value->img_src."'>
					<div class='carousel-caption d-none d-md-block'>
						<h5>".$value->header."</h5>
						<p>".$value->description."</p>
					</div>
				</div>";
		}
	}

	echo "
		<div class='carousel-indicators'>
			$indicators
		</div>
		<div class='carousel-inner'>
			$inner
		</div>";