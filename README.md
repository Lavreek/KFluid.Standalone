# Fluid.kz

<a href="https://fluid.kz/">Сайт проекта</a>

# Используемые компоненты

<ul>
	<li>Стили и анимации: <a href="https://getbootstrap.com">Bootstrap</a></li>
	<li>Анимации и взаимодействия: <a href="https://jquery.com/">jQuery</a></li>
</ul>

# ADD and REMOVE

Если вы посмотрите в контроллер:

>>/modal/ComponentController.php

То можно будет обнаружить функции хранения данных.

<ul>
	<li>json_append</li>
	<li>json_remove</li>
</ul>

!! Обратите внимание на <b>!self::debug!</b> класса ComponentController !!

Чтобы взаимодействовать с контроллером был добавлен небольшой ограничитель

const debug = true;

# Хранение данных

Данные хранятся посредством json строки в файлах разделённых на категории.

Формат строки

Array = [
	'img_src' => 'путь до файла', (CAN BE NULL)
	'header' => 'заголовок', (NOT NULL)
	'description' => 'описание', (CAN BE NULL)
]