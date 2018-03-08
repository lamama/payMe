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
			position: relative;
			float: left;
			left: 50%;
		}

		.inner {
			position: relative;
			float: left;
			left: -50%;
		}

		iframe {
			/*margin-top:370px;*/
			width: 700px;
			height: 400px;
		}

		.left {
			padding: 20px;
			float: left;
			width: 400px;
		}

		.right {
			float: right;
		}

	</style>
</head>
<body>
<div class="left">
	<h1>Submit a sale to payMe</h1>
	<form action="submitSale" method="get" target="iframe">
		<input type="hidden" id="_token" value="<?=csrf_token()?>">
		<p>
			<label for="title">seller_payme_id</label>
			<input type="text" class="" id="seller_payme_id" name="seller_payme_id" placeholder=""
				   value="<?=$paymentId?>"
				   readonly> static
		</p>
		<p>
			<label for="title">sale_price</label>
			<input type="text" class="" id="sale_price" name="sale_price" placeholder="" value="">
		</p>
		<p>
			<label for="title">currency</label>
			<select id="currency" name="currency" placeholder="" value="">
				<?php
				foreach($currencies as $currency) {
					?>
					<option value="<?=$currency->code?>"><?=$currency->name?></option>
					<?php
				}
				?>
			</select>
		</p>
		<p>
			<label for="title">installments</label>
			<input type="text" class="" id="installments" name="installments" placeholder="" value="<?=$installments?>"
				   readonly>
			constant
		</p>
		<p>
			<label for="title">language</label>
			<input type="text" class="" id="language" name="language" placeholder="" value="<?=$language?>" readonly>
			constant
		</p>
		<p>
			<label for="title">description</label>
			<textarea rows="4" cols="50" class="" id="description" name="description"></textarea>
		</p>
		<button type="submit" class="">Submit</button>
	</form>
</div>

<div class="right">
	<iframe name="iframe" src="submitSale">
		<p>Your browser does not support iframe</p>
	</iframe>
</div>

</body>
</html>




