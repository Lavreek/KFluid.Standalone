<?php
	foreach ($services as $value)
	{
		if ($value->description == "")
			$value->description = "<p class='card-text text-muted'>".$value->header."</p>";

		else
			$value->description = "<p class='card-text'>".$value->description."</p>";

		echo "
<div class='col'>
	<div class='row justify-content-center'>
		<div class='container col text-center py-3'>
			<img class='services-image' src='".$value->img_src."'>
		</div>
		<div class='col col-md-8 py-4'>
			<div class='card-body'>
				<h5 class='card-title mb-3'>".$value->header."</h5>
				".$value->description."
			</div>
		</div>
	</div>
</div>";
	}