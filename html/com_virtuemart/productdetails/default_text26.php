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
<p>Водосточная система – важный элемент для любой постройки. Она необходима для того, чтобы обеспечить организованный сбор дождевой и талой воды. Контролируемый сбор и отвод воды способен обеспечить не только сохранность внешнего вида строения, но и продлить срок службы как отдельных элементов здания (фасада, цоколя, фундамента), так и всей постройки в целом. 
<p>Разнообразие представленных сегодня водосточных систем весьма широко. Производители предлагают водостоки, изготовленные из различного сырья (как правило, оцинкованной стали и высокопрочного ПВХ), имеющие два варианта геометрии сечения (круглое и квадратное), с разной пропускной способностью.
<h2>Пластиковые водостоки</h2>
<p>Водосточные системы из высокопрочного ПВХ – продукция, которая вполне может составить конкуренцию металлическим водостокам. Основные эксплуатационные качества (прочность, надежность, долговечность) пластиковых моделей не уступают аналогичным показателям металлических водостоков. Но при этом ПВХ изделия имеют определенные преимущества перед стальными: более низкую стоимость, меньший вес, неподверженность коррозии. 
<p>Наиболее известными и авторитетными производителями пластиковых водостоков являются немецкая компания DOCKE и польская BRYZA. Для производства водосточных систем эти изготовители используют модифицированный полимерами ПВХ. Толщина стенок пластиковых труб и желобов в зависимости от модели может варьироваться от 1,7 до 2,2 мм. 
<p>Размерный ряд водосточных систем DOCKE и BRYZA довольно обширен, так что покупатели смогут найти подходящий водосток как для небольшого жилого дома, так и для постройки большой площади.
<h2>Круглые водостоки</h2>
<p>Существует две разновидности водосточных систем с точки зрения формы сечения труб и желобов: круглые (так называемые «скандинавские») и прямоугольные (их называют «американские»). Каждый вариант сечения имеет определенные преимущества. 
<p>В России большим спросом пользуются круглые водостоки. Считается, что они лучше подходят для использования в местностях с частыми перепадами температур. Дело в том, что трубы и желоба с круглым сечением подвержены меньшим деформациям в случае образования льда. Форма желобов способствует тому, что ледяная масса выталкивается вверх, а не разрывает трубы, расширяясь. 

<!---- /Описание ---->   
<? ?>