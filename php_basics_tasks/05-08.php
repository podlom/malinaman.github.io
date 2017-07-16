<?php
	$age = '30t';	// попадет в 1-ое условие (преобразует к числу 30 при сравнении)
	
	if ($age > 0 && is_numeric($age)) {	
		switch (true) {
		case ($age >= 18 && $age < 60):
			echo "Вам еще работать и работать" . "<br>"; break;
		case ($age >= 60):
			echo "Вам пора на пенсию" . "<br>"; break;
		case ($age > 0 && $age < 18):
			echo "Вам еще рано работать" . "<br>"; break;
		}
	}
	else { // если 0 -> то человек еще не родился
		echo "Неизвестный возраст" . "<br>";
	}
?>