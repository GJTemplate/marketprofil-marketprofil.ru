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
<p>Профнастил С-21 – это стеновая разновидность популярного строительного материала. Его используют для проведения преимущественно вертикальных работ: обшивки стен, строительства заборов, однако нередко его выбирают для создания навесов и козырьков, так как данный профлист имеет достаточный запас прочности. Неплохие показатели несущей способности связаны с параметрами материала: он имеет 21-миллеметровую гофру (высота волны – важный показатель, влияющий на прочность профнастила), стальное основание, толщина <?=$tol;?> мм., изготовлен в цвете "<?=$cvet;?>".  
<p>Чтобы строительный материал имел как можно более продолжительный срок службы, его обрабатывают полимерными составами. <a href="/catalog/" title="МеталлПрофиль">Металл Профиль</a> использует покрытие "<?=$pokr;?>" для производства <?=$this->product->product_name;?>. 
<p>Говоря про главные достоинства профлиста С-21, стоит выделить:
<ul>
<li>продолжительный срок эксплуатации (во многом он зависит от плотности цинковой обработки и выбранного варианта полимерного состава);
<li>отличное соотношение цены и качества;
<li>широкую цветовую палитру;
<li>стойкость к различным атмосферным воздействиям.
</ul>
<!---- /Описание ---->   
<? ?>