<?php
	require_once __DIR__."/../modal/ComponentController.php";

	$component = new ComponentController();

	if (isset($_POST['add']))
	{
		unset($_POST['add']);

		if (!empty($_POST['section']) && !empty($_POST['header']))
		{
			if (isset($_FILES['img_file']))
			{
				$filepath = $_FILES['img_file']['tmp_name'];
				$destination = "assets/images/".$_POST['section']."/";
				$destination_full = __DIR__."/../".$destination;
				$filename = basename($_FILES['img_file']['name']);

				if (!is_dir($destination_full))
				{
					mkdir($destination_full, 0777, false);
				}

				if (is_file($destination_full.$filename))
					unlink($destination_full.$filename);

				move_uploaded_file($filepath, $destination_full.$filename);

				$_POST['img_src'] = "/".$destination.$filename;
			}

			$section = $_POST['section']; unset($_POST['section']);

			$component->json_append($_POST, $section);
		}
	}

	if (isset($_POST['delete']))
	{
		unset($_POST['delete']);

		$component->json_remove($_POST['header'], $_POST['section']);
	}

	include __DIR__."/page.html";