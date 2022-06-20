<?php
	class ImageController
	{
		/*
		 *	Array() - $file: Принимает $_FILE['file_name']
		 *	String - $section: Принимает параметр $_POST['section'] или "Имя раздела" для сохранения.
		 *	String - $img_name: Принимает параметр $_POST['img_new_name'] или "Новое имя изображения" для сохранения.
		 */
		public function download_image(array $file, string $section, string $img_name = "")
		{
			$tmp_path = $_FILES['img_file']['tmp_name'];

			// Директория, где должно быть сохранено изображение.
			$destination = "/assets/images/$section/";

			// Полный путь к директории
			$destination_full = __DIR__."/..".$destination;

			$file_format = explode(".", basename($_FILES['img_file']['name']));

			if ($img_name != "")
				$filename = $img_name.".".$file_format[1];
			else
				$filename = basename($_FILES['img_file']['name']);

			// Проверка наличия этого файла
			$this->image_alive($destination_full, $filename);

			move_uploaded_file($tmp_path, $destination_full.$filename);

			// Возвращение пути к файлу: /assets/images/<section>/<filename>.<jpg>
			return $destination.$filename;
		}

		/*
		 *	Проверка существования директории
		 */
		private function dir_alive(string $fullpath)
		{
			if (!is_dir($fullpath))
				mkdir($fullpath, 0777, false);
		}


		/*
		 *	Проверка существования изображения с похожим названием.
		 */
		private function image_alive($fullpath, $filename)
		{
			$this->dir_alive($fullpath);

			$file = $fullpath.$filename;

			if (is_file($file))
				unlink($file);
		}
	}