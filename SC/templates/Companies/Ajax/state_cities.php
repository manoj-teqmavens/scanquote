<?php
/**
 * @var \App\View\AppView $this
 * @var string[] $citiesData
 */


if ($citiesData) {
	echo '<option value="">Please select</option>';
	foreach ($citiesData as $k => $v) {
		echo '<option value="' . $k . '">' . h($v) . '</option>';
	}
} else {
	echo '<option value="0">no Option available</option>';
}