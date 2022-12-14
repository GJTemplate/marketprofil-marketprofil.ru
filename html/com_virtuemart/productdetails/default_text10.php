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
<p>Изготовленный по ГОСТ материал бывает 3 разновидностей: стеновым (обозначается литерой С), несущим (помечается буквой Н) и несуще-стеновым (маркируется аббревиатурой НС). Компания <a href="/catalog/" title="МеталлПрофиль">Металл Профиль</a> также выпускает профлисты, маркируемые буквосочетанием МП. Такой материал производят не по ГОСТ, а по ТУ. Изготовленный в рамках технических условий материал не уступает практическими качествами тому, что создан с учетом требований Госстандарта, главное отличие заключается лишь в измененных размерах профлистов. 
<p>Профнастил МП-20 имеет трапециевидный профиль высотой 20 мм. Данный профлист может использоваться при различных работах: как вертикальных, так и горизонтальных, важно лишь правильно подобрать толщину стального основания. Профнастил МП-20 может иметь стальную оцинкованную основу толщиной <?=$tol;?> мм. Он изготавливается в цвете "<?=$cvet;?>".
<p>Чтобы строительный материал имел как можно более продолжительный срок службы, его обрабатывают полимерными составами. Металл Профиль использует покрытие "<?=$pokr;?>" для производства <?=$this->product->product_name;?>.
<p>Говоря про главные достоинства профлиста МП-20, стоит выделить:
<ul>
<li>продолжительный период службы (во многом он зависит от плотности цинковой обработки и выбранного полимерного покрытия);
<li>отменную стойкость к различным воздействиям окружающей среды и атмосферным явлениям;
<li>отличное соотношение цены и качества;
<li>простоту монтажа.
</ul>
<!---- /Описание ---->   
<? ?>