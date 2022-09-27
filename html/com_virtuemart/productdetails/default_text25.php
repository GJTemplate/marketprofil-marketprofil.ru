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
<h2>Металлические водосточные системы</h2>
<p>Металлические водостоки – к ним относятся как стальные, так и медные изделия – пользуются у покупателей активным спросом. Одним из ведущих отечественных производителей металлических водосточных систем является компания <a href="/catalog/" title="МеталлПрофиль">Металл Профиль</a>. 
<p>Водостоки МП изготовлены из стального оцинкованного проката толщиной от 0,5 до 0,7 мм. Плотность защитного цинкового покрытия может варьироваться от 140 до 275 г/м2. Кроме того, производитель использует различные варианты протекторно-декоративной обработки: "<?=$pokr;?>" в цвете "<?=$cvet;?>". 
<p>В ассортименте компании Металл Профиль представлены водостоки различных размеров (120/76, 125/90, 125/100, 150/100, 185/150) как с круглым, так и с прямоугольным сечением.
<h2>Прямоугольные водостоки</h2>
<p>Существует две разновидности водосточных систем с точки зрения формы сечения труб и желобов: прямоугольные (их называют «американские») и круглые (так называемые «скандинавские»). Каждый вариант сечения имеет определенные преимущества. 
Водосточные системы с прямоугольным сечением обладают увеличенной пропускной способностью (примерно на 20% в сравнении с круглыми водостоками). Поэтому зачастую в пользу прямоугольных водостоков делают выбор жители регионов, для которых характерны частые и обильные дожди. 
<!---- /Описание ---->   
<? ?>