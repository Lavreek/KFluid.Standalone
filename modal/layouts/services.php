<?php
	foreach ($services as $value)
	{
		if ($value->description == "")
			$value->description = "<p class='card-text text-muted'>".$value->header."</p>";

		else
			$value->description = "<p class='card-text'>".$value->description."</p>";

		echo "
<div class='production-preview'>
    <div class='production-focus'>
        <div class='production-header'>
            <span>".$value->header."</span>
        </div>
        <div class='production-image'>
            <img class='services-image' src='".$value->img_src."'>
        </div>
    </div>
    <div class='production-info'>
        <div class='production-header'>".$value->header."</div>
        <span class='production-description'>".$value->description."</span>
    </div>
</div>";
	}