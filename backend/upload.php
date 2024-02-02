<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(isset($_POST['image']))
	{
		$data = $_POST['image'];


		$image_array_1 = explode(";", $data);


		$image_array_2 = explode(",", $image_array_1[1]);


		$data = base64_decode($image_array_2[1]);

		session_start();
		$image_name = "../media/uploaded_media/profile_photos/" . $_SESSION['user_id'] . '.jpg';

		file_put_contents($image_name, $data);

		sleep(1);
	}
}
?>