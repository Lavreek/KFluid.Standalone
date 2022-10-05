<?php
	require_once __DIR__."/ImageController.php";

	/**
	 * Управление и размножение элементов в page.html
	 */
	class ComponentController extends ImageController
	{
		const debug = false;

		const filepath = [
			"preview" => __DIR__."/memory/preview",
			"services" => __DIR__."/memory/services",
			"partners" => __DIR__."/memory/partners",
		];

		public function get_resource(string $filekey)
		{
			$filepath = $this->file_alive(self::filepath[$filekey]);

			$services = json_decode(file_get_contents($filepath));

			$this->layout_services($filekey, $services);
		}

		private function layout_services(string $filekey, array $services)
		{
			switch ($filekey) {
				case 'services':
					include __DIR__."/layouts/services.php";
					break;

				case 'partners':
					include __DIR__."/layouts/partners.php";
					break;

				case 'preview':
					include __DIR__."/layouts/preview.php";
					break;
				
				default:
					break;
			}
		}

		public function json_append(array $append, string $filekey)
		{
			if (self::debug)
			{
				if (isset(self::filepath[$filekey]))
				{
					$filepath = $this->file_alive(self::filepath[$filekey]);
					
					$file_content = json_decode(file_get_contents($filepath));

					array_push($file_content, $append);

					file_put_contents($filepath, json_encode($file_content));	
				}
			}
		}

		public function json_remove(string $header, string $filekey)
		{
			if (self::debug) 
			{
				if (isset(self::filepath[$filekey]))
				{
					$filepath = $this->file_alive(self::filepath[$filekey]);

					$file_content = json_decode(file_get_contents($filepath));

					foreach ($file_content as $key => $value)
					{
						if ($value->header == $header)
						{
							if (!empty($value->img_src))
								if(!is_dir($value->img_src))
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

		private function file_alive(string $filepath)
		{	
			$dir = explode("/", $filepath)[1];
			$path = __DIR__."/".$dir;

			if (!is_dir($path))
				mkdir($path);
			
			if (!file_exists($filepath))
			{
				touch($filepath);
				file_put_contents($filepath, json_encode([]));
			}

			return $filepath;
		}
	}