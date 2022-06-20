<?php
	require_once __DIR__."/../modal/ComponentController.php";

	$component = new ComponentController();

	if (isset($_POST['add']))
	{
		unset($_POST['add']);

		if (!empty($_POST['section']) && !empty($_POST['header']))
		{
			$section = $_POST['section']; unset($_POST['section']);
			$img_name = $_POST['img_new_name']; unset($_POST['img_new_name']);


			if (isset($_FILES['img_file']))
			{
				$_POST['img_src'] = $component->download_image($_FILES['img_file'], $section, $img_name);
			}

			$component->json_append($_POST, $section);
		}
	}

	if (isset($_POST['delete']))
	{
		unset($_POST['delete']);

		$component->json_remove($_POST['header'], $_POST['section']);
	}

	include __DIR__."/page.html";