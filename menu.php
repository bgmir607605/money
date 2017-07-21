<?php
echo '
	<div id="menu">
		<h3>Меню</h3>
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="report.php">Отчёты</a></li>
				<li><a href="cats.php">Категории</a></li>
				<li><button type="button" class="btn btn-link" data-toggle="modal" data-target="#myDiaIn">
					Диаграмма доходов
				</button></li>
				<li><button type="button" class="btn btn-link" data-toggle="modal" data-target="#myDiaOut">
					Диаграмма расходов
				</button></li>
			</ul>
	</div>
';
?>