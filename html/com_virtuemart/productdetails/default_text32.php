<? 
$arr_cat_id = array();
foreach ($this->product->categoryItem as $value) {
	$arr_cat_id[] = $value['virtuemart_category_id'];
}

foreach ($this->product->customfieldsSorted['right'] as $value) {
	if ($value->virtuemart_custom_id == '9') {
		$tol = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '10') {
		$cvet = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '22') {
		$pokr = $value->customfield_value;
	}
}
foreach ($this->product->customfieldsSorted['normal'] as $value) {
	if ($value->virtuemart_custom_id == '27') {
		$vid = $value->customfield_value;
	}				
}
?>
<!---- Описание ---->
<p>Софит «Lбрус-15х240» используется для подшивки карнизных и фронтонных свесов, благодаря наличию перфорации обеспечивается циркуляция воздуха в подкровельном пространстве. Вентиляция исключает возможность появления конденсата и, как следствие, развития плесени и грибка, способных разрушить теплоизоляционные материалы, элементы стропильной системы крыши и проч. 
<p>Софиты изготавливают из прочного и надежного материала: стального оцинкованного проката толщиной 0,45 или 0,5 мм, с различными вариантами полимерной обработки: ECOSTEEL®, PURMAN, VALORI, Viking MP, Viking MP E, полиэстер.
<h2>Софит Lбрус-15х240 (<?=$pokr;?> <?=$tol;?>)</h2>
<p>Данное изделие имеет стальное оцинкованное основание толщиной <?=$tol;?> мм. В качестве протекторно-декоративного состава используется полимерное покрытие Viking MP® Е (толщиной 45 мкм). Оно представляет собой модифицированную разновидность покрытия Viking MP®: в его состав входят полиуретан, полиэфир и полипропиленовый воск. В результате усовершенствованное полимерное покрытие обладает улучшенными протекторными качествами: надежнее защищает стальное основание от коррозийных поражений (подходит для использования даже в прибрежных зонах), от деформаций, вызванных механическими воздействиями, активным солнечным излучением, частыми и резкими температурными перепадами. Письменная гарантия от производителя на изделия с покрытием Viking MP® Е составляет 3 десятилетия. 

<!---- /Описание ---->   
<? ?>