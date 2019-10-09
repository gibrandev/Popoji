<?php

use App\Setting;

if (!function_exists('getSetting')) {
    function getSetting($options)
    {
		$result = Setting::where('options', $options)->first();
		if ($result) {
			return $result->value;
		} else {
			return '';
		}
	}
}

if (!function_exists('getSettingGroup')) {
    function getSettingGroup($groups)
    {
		$result = Setting::where('groups', $groups)->orderBy('id', 'asc')->get();
		if ($result) {
			return $result;
		} else {
			return [];
		}
	}
}

if (!function_exists('categoryTreeOption')) {
    function categoryTreeOption(array $elements, $parentId = 0, $indent = '')
    {
		foreach ($elements as $key => $element) {
			if ($element['parent'] == $parentId) {
				echo '<option value="'.$element['id'].'">'.$indent.' '.$element['title'].'</option>';
				
				$children = categoryTreeOption($elements, $element['id'], $indent.'-');
			}
		}
	}
}