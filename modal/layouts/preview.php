<?php
	
	$indicators = $inner = "";

	foreach ($services as $key => $value)
	{
		if ($key == 0)
		{
			$indicators .= "<button type='button' data-bs-target='#preview' data-bs-slide-to='".$key."' class='active' aria-current='true'></button>";
			$inner .= 
				"<div class='carousel-item active' id='carousel-item-id-".$value->header."' >
					<img src='".$value->img_src."' height='500'>
				</div>";
		}
		else
		{
			$indicators .= "<button type='button' data-bs-target='#preview' data-bs-slide-to='".$key."'></button>";
			$inner .= 
				"<div class='carousel-item' id='carousel-item-id-".$value->header."'>
					<img src='".$value->img_src."' height='500'>
				</div>";
		}
	}

	echo "
		<div class='carousel-indicators'>
			$indicators
		</div>
		<div class='carousel-inner text-center py-5'>
			$inner
		</div>";