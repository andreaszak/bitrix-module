<?php

// проброс значений в component_epilog
$templateData['HTML_ID'] = $arResult['HTML_ID'];
$templateData['BUTTONS'] = $arResult['BUTTONS'];

$row = $arResult['ROW'];
$props = $arResult['PROPS'];

$header		= null;
$topImage	= $row['PREVIEW_PICTURE'];
$title		= $row['NAME'];
$subTitle	= null;
$preview	= null;
$link		= $row['DETAIL_PAGE_URL'];
$footer		= null;
$bottomImage= null;
$links = [];
$buttons = [
	[
		'TEXT' => 'Подробнее',
	],
];

$styleClasses = $arParams['CSS_CLASS'] ?? '';

?>
<div id="<?= $arResult['HTML_ID'] ?>" class="bitrixModuleCssIblockElementViewCard card <?= $styleClasses ?>">
	<?php
	if ($topImage) {
		if ($link) {
			echo "<a href='{$link}'>
			<img class='card-img-top' src='{$topImage['SRC']}' alt='{$topImage['ALT']}'>
			</a>";
		}
		else {
			echo "<img class='card-img-top' src='{$topImage['SRC']}' alt='{$topImage['ALT']}'>";
		}
	}
	if ($header) {
		echo "<div class='card-header'>{$header}</div>";
	}

	echo "<div class='card-body'>";
	if ($title) {
		if ($link) {
			echo "<h5 class='card-title'>
			<a href='{$link}'>{$title}</a>
			</h5>";
		}
		else {
			echo "<h5 class='card-title'>{$title}</h5>";
		}
	}
	if ($subTitle) {
		echo "<h6 class='card-subtitle'>{$subTitle}</h6>";
	}
	if ($preview) {
		echo "<p class='card-text'>{$preview}</p>";
	}
	foreach ($links as $item) {
		$link = $item['LINK'] ?? $row['DETAIL_PAGE_URL'];
		echo "<a href='{$link}' class='card-link'>{$item['TEXT']}</a>";
	}
	foreach ($buttons as $item) {
		$link = $item['LINK'] ?? $row['DETAIL_PAGE_URL'];
		echo "<a href='{$link}' class='btn btn-primary'>{$item['TEXT']}</a>";
	}
	echo "</div>";

	if ($footer) {
		echo "<div class='card-footer'>{$footer}</div>";
	}
	if ($bottomImage) {
		echo "<img class='card-img-top' src='{$bottomImage['SRC']}' alt='{$bottomImage['ALT']}'>";
	}
	?>
</div>
