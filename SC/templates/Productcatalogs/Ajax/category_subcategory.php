<?php
/**
 * @var \App\View\AppView $this
 * @var string[] $category
 */


if ($categoryData) {
	echo '<option value="">Please select</option>';
	foreach ($categoryData as $k => $v) {
		echo '<option value="' . $k . '">' . h($v) . '</option>';
	}
} else {
	echo '<option value="0">no subcategory available</option>';
}