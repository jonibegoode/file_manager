<?php
function debug($tableau) {
	echo '<pre>'.print_r($tableau, true).'</pre>';
}

function product_div($array){
	foreach ($array as $key => $product) { ?>
	<div class="col-sm-4 col-lg-4 col-md-4">
		<div class="thumbnail">
			<img src="<?= $product['picture'] ?>" alt="">
			<div class="caption">
				<h4 class="pull-right"><?= $product['price'] ?>€</h4>
				<h4><a href="product.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
				</h4>
				<p><?= substr($product['description'], 0, 50) ?>[...]</p>
			</div>
			<div class="ratings">
				<p class="pull-right">42 reviews</p>
				<p>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
				</p>
			</div>
			<div class="btns clearfix">
				<a class="btn btn-info pull-left" href="product.php?id=<?= $product['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span> View</a>
				<a class="btn btn-primary pull-right" href="product.php?id=<?= $product['id'] ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
			</div>
		</div><!-- /.thumbnail -->
	</div>
	<?php }
}?>