<?php

if ($_COOKIE['width'] > 540 and $_COOKIE['width'] < 720) {
    $at_line = 6;
} else {
    $at_line = 3;
}

	$indicators = $inner = "";
    $group = 0;

    $inner = "<div class='group carousel-item active'>";
    $indicators .= "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$group."' class='active' aria-current='true'></button>";

    foreach ($services as $key => $value) {
        if ($key > 1 and $key % $at_line == 0) {
            $inner .= "</div>";

            $group++;

//            if (isset($services[$key + 1])) {
                $inner .= "<div class='group carousel-item'>";
                $indicators .= "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$group."' class='active' aria-current='true'></button>";
//            }
        }
        if ($key < $at_line) {
			$inner .=
				"<div class='partners-layout $key'>
					<img src='".$value->img_src."'>
					<div class='carousel-caption d-none d-md-block' style='display: none!important;'>
						<h5>".$value->header."</h5>
						<p>".$value->description."</p>
					</div>
				</div>";
		} else {
            $inner .=
                "<div class='partners-layout $key'>
                    <img src='".$value->img_src."'>
                    <div class='carousel-caption d-none d-md-block' style='display: none!important;'>
                        <h5>".$value->header."</h5>
                        <p>".$value->description."</p>
                    </div>
                </div>";
        }
	}
    if (substr($inner, -6) != "</div>") {
        $inner .= "</div>";
    }

	echo "
		<div class='carousel-indicators'>
			$indicators
		</div>
		<div class='carousel-inner'>
			$inner
		</div>";