<?php
	$error = '';
	$keyInputArr = 'inputArray';
	
	function requestPost($key) {
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}

	function formIsValid($key) {
		global $error;
		$strArr = requestPost($key);
	
		if ($strArr === null) {
			$error = "Error getting the form element by the '{$key}' key";
			return false;
		}
		if (strlen(trim($strArr)) === 0) {
			$error = "The array must have at least one element";
			return false;
		}
		$arr = explode(',', trim($strArr));
		foreach ($arr as $value) {
			if (!is_numeric($value)) {
				$error = "Not all elements are represented as a number.";
				return false;
			}
		}
		return true;
	}

	function sumExponentElements($arr, $exponent) {
		$result = 0;
		foreach ($arr as $value) {
			$result += $value ** $exponent;
		}
		return $result;
	}

	if ($_POST) {
		if (formIsValid($keyInputArr)) {
			$elements = explode(',', trim(requestPost($keyInputArr)));
			$strRes = sumExponentElements($elements, 2);
		} else {
			$strRes = $error;
		}
	} else {
		$strRes = "Form wasn't submitted yet";
	}

	
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Task 03</title>
</head>

<body>
	<h3>3. Введите массив (через запятую). С помощью цикла foreach найдите сумму квадратов элементов этого массива.</h3>

	<form method = 'POST'>
		<input type = 'text' name = <?= $keyInputArr ?> style = 'width: 50%;' value = '<?= requestPost($keyInputArr) ?>'>
		<button>Go</button>
	</form><br>

	<b>Result: </b><?= $strRes ?>
</body>
</html>