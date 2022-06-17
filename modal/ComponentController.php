<?php
	/**
	 * Управление и размножение элементов в page.html
	 */
	class ComponentController
	{
		const debug = true;

		const filepath = [
			"services" => __DIR__."/Services/services",
		];

		function __construct() { }

		public function get_resource(string $filekey)
		{
			$filepath = self::filepath[$filekey];

			$services = json_decode(file_get_contents($filepath));

			foreach ($services as $element)
			{
				$this->layout_services($filekey, $element->img_src, $element->header, $element->description);
			}
		}

		private function layout_services(string $filekey, string $img_src, string $header, string $description)
		{
			if ($description == "")
				$description = "<p class='card-text text-muted'>$header</p>";
			
			else
				$description = "<p class='card-text'>$description</p>";

			echo "
<div class='col'>
	<div class='row justify-content-center'>
		<div class='container col text-center'>
			<img class='rounded-circle' src='$img_src'>
		</div>
		<div class='col col-md-8 py-4'>
			<div class='card-body'>
				<h5 class='card-title mb-3'>$header</h5>
				$description
			</div>
		</div>
	</div>
</div>";
		}

		public function json_append(array $append, string $filekey)
		{
			if (self::debug) {
				if (isset(self::filepath[$filekey]))
				{
					$filepath = self::filepath[$filekey];

					$file_content = json_decode(file_get_contents($filepath));

					array_push($file_content, $append);

					file_put_contents($filepath, json_encode($file_content));	
				}
			}
		}

		public function json_remove(string $header, string $filekey)
		{
			if (self::debug) {
				if (isset(self::filepath[$filekey]))
				{
					$filepath = self::filepath[$filekey];

					$file_content = json_decode(file_get_contents($filepath));

					foreach ($file_content as $key => $value)
					{
						if ($value->header == $header)
						{
							if (!empty($value->img_src))
								unlink(__DIR__."/../".$value->img_src);

							unset($file_content[$key]);
						}
					}

					file_put_contents($filepath, json_encode($file_content));
				}
			}
		}

		public function form_append()
		{
			if (self::debug)
				include __DIR__."/sample/form-append.html";
			
			else
				echo "<script>window.location.replace('../');</script>";
		}
	}