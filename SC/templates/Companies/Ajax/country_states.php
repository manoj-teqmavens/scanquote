<?php
/**
 * @var \App\View\AppView $this
 * @var string[] $states
 */


if ($statesData) {
	echo '<option value="">Please select</option>';
	foreach ($statesData as $k => $v) {
		echo '<option value="' . $k . '">' . h($v) . '</option>';
	}
} else {
	echo '<option value="0">no Option available</option>';
}