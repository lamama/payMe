<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="<?=csrf_token()?>">

	<title>payMe sale</title>
	<style>
		.container {
			top: 20px;
		}
		.inner {
		}
	</style>
</head>
<body>
<div class="container">
	<div class="inner">
		<h1>Respones:</h1>
		<table>
			<?php
			foreach($showToUser as $key => $value) {
				?>
				<tr>
					<td><?=$key?>:</td>
					<td><?=$value?></td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</div>
</body>
</html>




