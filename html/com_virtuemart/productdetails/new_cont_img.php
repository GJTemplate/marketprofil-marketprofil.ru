	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<?php
		$host = 'ga411290.mysql.tools'; $bd = 'ga411290_librari'; $pass = ')b2+EZ8t9m';
		$link = mysqli_connect($host, $bd, $pass, $bd);
		$link->set_charset('utf8mb4');
		$prefix_bd = 'h8xyn_';
		if ($link == false){
			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}
		else {
			print("Соединение установлено успешно");
		}



		//$sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_products';								if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}
		// $sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_product_categories';					if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}
		// $sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_product_prices';						if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}
		// $sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_product_medias';						if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}
		// $sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_product_customfields';					if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}
		// $sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_medias';								if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}
		//$sql = 'TRUNCATE TABLE '.$prefix_bd.'virtuemart_products_uk_ua';						if (!mysqli_query($link, $sql)) {printf("Сообщение ошибки: %s\n", mysqli_error($link));}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'https://api.librarius.com.ua/api/v1/categories');
		$result=curl_exec($ch);
		curl_close($ch);
		$categories = json_decode($result, true);
		$product = '';

		foreach ($categories['categories'] as $values) {
			if ($values['id'] != '97' && $values['id'] != 93 && $values['id'] != 89) {
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL, 'https://api.librarius.com.ua/api/v1/categories/'.$values['id'].'/books?per_page=2000');
				$result=curl_exec($ch);
				curl_close($ch);
				$books = json_decode($result, true);

				foreach ($books['books'] as $value) {
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_URL, 'https://api.librarius.com.ua/api/v1/books/'.$value['id']);
					$result=curl_exec($ch);
					curl_close($ch);
					$boo = json_decode($result, true);

			// /** Создания продукта **/
					$product = 'INSERT INTO '.$prefix_bd.'virtuemart_products SET virtuemart_product_id = '.$boo['book']['id'].',  product_sku = "'.$boo['book']['ebooks'][0]['isbn'].'",published = 1, has_categories = 1, has_medias = 1, has_prices = 1;';
					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					if (!mysqli_query($link, $product)) {
						printf("Сообщение ошибки: %s\n", mysqli_error($link));
					}
					mysqli_close($link);
			// /*************/
			// /** Название продукта **/
					$link = explode('/',$boo['book']['sharing_link']);
					$desc = str_replace(array("\r\n", "\n", "\r"), '<p>', $boo['book']['description']);
					$desc = str_replace('"', '\"', $desc);
					$product_ua = 'INSERT INTO '.$prefix_bd.'virtuemart_products_uk_ua SET virtuemart_product_id = '.$boo['book']['id'].', product_desc = "<p>'.$desc.'</p>", product_name = "'.$boo['book']['name'].'", slug = "'.array_pop($link).'"';
					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					if (!mysqli_query($link, $product_ua)) {
						printf("Сообщение ошибки: %s\n", mysqli_error($link));
					}
					mysqli_close($link);


			// /*************/
			// /** привязка  продукта к кате **/

					$cats = 'INSERT INTO '.$prefix_bd.'virtuemart_product_categories SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_category_id = "'.$values['id'].'"';
					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					if (!mysqli_query($link, $cats)) {
						printf("Сообщение ошибки: %s\n", mysqli_error($link));
					}
					mysqli_close($link);

			// /*************/
			// /** Price product **/
					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					$sql = 'SELECT product_price FROM '.$prefix_bd.'virtuemart_product_prices WHERE virtuemart_product_id = '.$boo['book']['id'];
					$result = mysqli_query($link, $sql);
					if ($result->num_rows == 0) {
						$price = 'INSERT INTO '.$prefix_bd.'virtuemart_product_prices SET virtuemart_product_id = '.$boo['book']['id'].', product_price = "'.$boo['book']['ebooks'][0]['price'].'", product_override_price = "'.$boo['book']['ebooks'][0]['price'].'"';

						if (!mysqli_query($link, $price)) {
							printf("Сообщение ошибки: %s\n", mysqli_error($link));
						}
					}
					mysqli_close($link);

			// /*************/
			// /** Medias product **/
					$name = explode("/",  $boo['book']['image']['media_url']);
					$sql_name_prod = array_pop($name);
					$format = explode('.', $sql_name_prod);
					$media = 'INSERT INTO '.$prefix_bd.'virtuemart_medias SET virtuemart_media_id = '.$boo['book']['id'].', file_title = "'.$sql_name_prod.'", file_mimetype = "image/'.array_pop($format).'", file_type = "product", file_url = "images/book/'.$sql_name_prod.'"';
					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					if (!mysqli_query($link, $media)) {
						printf("Сообщение ошибки: %s\n", mysqli_error($link));
					}
					mysqli_close($link);
					$prod_media = 'INSERT INTO '.$prefix_bd.'virtuemart_product_medias SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_media_id = '.$boo['book']['id'];
					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					if (!mysqli_query($link, $prod_media)) {
						printf("Сообщение ошибки: %s\n", mysqli_error($link));
					}
					mysqli_close($link);
			// /*************/



			// /** Customfields product **/

					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					$sql = 'SELECT customfield_value FROM '.$prefix_bd.'virtuemart_product_customfields WHERE virtuemart_product_id = '.$boo['book']['id'].' AND virtuemart_custom_id = 3';
					if ($result->num_rows == 0) {
						$custom_1 = 'INSERT INTO '.$prefix_bd.'virtuemart_product_customfields SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_custom_id = 3, customfield_value = "'.$boo['book']['publish_year'].'"';
						if (!mysqli_query($link, $custom_1)) {
							printf("Сообщение ошибки: %s\n", mysqli_error($link));
						}
					}
					mysqli_close($link);

					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					$sql = 'SELECT customfield_value FROM '.$prefix_bd.'virtuemart_product_customfields WHERE virtuemart_product_id = '.$boo['book']['id'].' AND virtuemart_custom_id = 4';
					if ($result->num_rows == 0) {
						$custom_2 = 'INSERT INTO '.$prefix_bd.'virtuemart_product_customfields SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_custom_id = 4, customfield_value = "'.$boo['book']['publisher']['name'].'"';
						if (!mysqli_query($link, $custom_2)) {
							printf("Сообщение ошибки: %s\n", mysqli_error($link));
						}
					}
					mysqli_close($link);

					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					$sql = 'SELECT customfield_value FROM '.$prefix_bd.'virtuemart_product_customfields WHERE virtuemart_product_id = '.$boo['book']['id'].' AND virtuemart_custom_id = 5';
					if ($result->num_rows == 0) {
						$custom_3 = 'INSERT INTO '.$prefix_bd.'virtuemart_product_customfields SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_custom_id = 5, customfield_value = "'.$boo['book']['authors'][0]['name'].'"';
						if (!mysqli_query($link, $custom_3)) {
							printf("Сообщение ошибки: %s\n", mysqli_error($link));
						}
					}
					mysqli_close($link);

					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					$sql = 'SELECT customfield_value FROM '.$prefix_bd.'virtuemart_product_customfields WHERE virtuemart_product_id = '.$boo['book']['id'].' AND virtuemart_custom_id = 6';
					if ($result->num_rows == 0) {
						$custom_4 = 'INSERT INTO '.$prefix_bd.'virtuemart_product_customfields SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_custom_id = 6, customfield_value = "'.$boo['book']['languages'][0]['name'].'"';
						if (!mysqli_query($link, $custom_4)) {
							printf("Сообщение ошибки: %s\n", mysqli_error($link));
						}
					}
					mysqli_close($link);

					$link = mysqli_connect($host, $bd, $pass, $bd);
					$link->set_charset('utf8mb4');
					$sql = 'SELECT customfield_value FROM '.$prefix_bd.'virtuemart_product_customfields WHERE virtuemart_product_id = '.$boo['book']['id'].' AND virtuemart_custom_id = 7';
					if ($result->num_rows == 0) {
						$custom_5 = 'INSERT INTO '.$prefix_bd.'virtuemart_product_customfields SET virtuemart_product_id = '.$boo['book']['id'].', virtuemart_custom_id = 7, customfield_value = "'.$boo['book']['ebooks'][0]['page_count'].'"';
						if (!mysqli_query($link, $custom_5)) {
							printf("Сообщение ошибки: %s\n", mysqli_error($link));
						}
					}
					mysqli_close($link);
					/***************************/
					// $asset = explode(".s3.amazonaws.com/", $boo['book']['image']['media_url']);
					// $name = explode("/",  $boo['book']['image']['media_url']);
					// $dt = array('bucket'=>'notio-general-storage', 'key'=>$asset[1]);
					// print_r('https://cdn.librarius.com.ua/'.base64_encode(json_encode($dt)));
					// $ch = curl_init('https://cdn.librarius.com.ua/'.base64_encode(json_encode($dt)));
					// $fp = fopen('./images/book/'.array_pop($name), 'wb');
					// curl_setopt($ch, CURLOPT_FILE, $fp);
					// curl_setopt($ch, CURLOPT_HEADER, 0);
					// curl_exec($ch);
					// curl_close($ch);
					// fclose($fp);
				}

			}
		}




		?>
	</body>
	</html>

