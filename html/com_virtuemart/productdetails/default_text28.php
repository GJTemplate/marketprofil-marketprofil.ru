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
<p>Данное изделие имеет стальное оцинкованное основание толщиной <?=$tol;?> мм. В качестве протекторно-декоративного состава используется премиальное полимерное покрытие ECOSTEEL®. Этот состав невероятно точно имитирует текстуру древесины, софиты доступны в цвете мореный дуб, клен и сосна.
<p>Сталь с покрытием ECOSTEEL® представляет собой многослойный материал. На стальное основание толщиной 0,5 мм наносится алюмоцинковое покрытие плотностью 120 г/м2. После заготовка грунтуется, затем на грунтовку наносят базовое покрытие толщиной 15-20 мкм. Далее методом офсетной печати переносят детализованный рисунок, повторяющий тот или иной природный материал. Последний этап – нанесение фиксирующего слоя толщиной 10-15 мкм. В бюджетной версии используется полиэстер, в премиальной – PVDF. 
<p>Помимо высоких декоративных качеств, полимерный состав ECOSTEEL® отличается превосходными протекторными свойствами: он надежно защищает стальное основание от коррозии, активного солнечного излучения, механических воздействий и проч. Производитель дает 20-летнюю письменную гарантию на изделия с данным типом обработки. 


<!---- /Описание ---->   
<? ?>