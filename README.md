# Fluid.kz

Cайт проекта: <a href="https://fluid.kz/">https://fluid.kz/</a>
github: https://github.com/Lavreek/fluid_kz

# Используемые компоненты

<ul>
	<li>Стили и анимации: <a href="https://getbootstrap.com">Bootstrap</a></li>
	<li>Анимации и взаимодействия: <a href="https://jquery.com/">jQuery</a></li>
</ul>

# ADD and REMOVE

Изначально готовая страница для добавления

>example.com/<b>append</b>/

Если вы посмотрите в контроллер:

>/modal/ComponentController.php

То можно будет обнаружить функции хранения данных.

<ul>
	<li>json_append</li>
	<li>json_remove</li>
</ul>

!! Обратите внимание на <b>self::debug</b> класса <b>ComponentController</b> !!

Чтобы взаимодействовать с контроллером был добавлен небольшой ограничитель

>const debug = true;

# Хранение данных

Данные хранятся посредством json строки в файлах разделённых на категории.

<li>Формат строки</li>

>Array = [<br>'img_src' => 'путь до файла', (CAN BE NULL)<br>'header' => 'заголовок', (NOT NULL)<br>'description' => 'описание', (CAN BE NULL)<br>]