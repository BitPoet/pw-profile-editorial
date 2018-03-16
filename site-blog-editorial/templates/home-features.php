				<!-- Features -->
					<section id="features" class="container">
						<header class="major">
							<h2><?= _x("Latest and important posts", "blog") ?></h2>
						</header>
						<div class="posts">

<?php
	$cards = $pages->find("template=blog-post, sort=-blog_post_sticky, sort=-blog_date, limit=" . $blogSettings->blog_quantity);
	$cards->prepend($pages->find("template=blog-post, blog_post_sticky!=1, sort=-blog_date, limit=" . $blogSettings->blog_quantity));
	$cards = $cards->slice(0, $blogSettings->blog_quantity);
	$cardcount = 0;
		
	foreach($cards as $card) {
		$img = FALSE;
		if($card->blog_images) $img = $card->blog_images->first();
?>
							<!-- Feature -->
							<article>

								<?php if($img) { ?><a href="<?= $card->url ?>" class="image" title="<?= $card->title ?>"><img src="<?= $img->url ?>" alt="<?= $img->description ?>" /></a><?php } ?>

								<h3><?= $card->title ?></h3>
								<p><?= $card->blog_summary ?: makeSummary($card->blog_body) ?></p>
								<ul class="actions">
									<li><a class="button alt" href="<?= $card->url ?>"><?= _x("Read full post...", "blog") ?></a></li>
								</ul>

							</article>

<?php
	}
?>

<!--
						<ul class="actions"><?php $allposts = $pages->get('/posts'); ?>
							<li><a href="<?= $allposts->url ?>" class="button icon fa-file"><?= _x("Tell Me More", "blog") ?></a></li>
						</ul>
-->
						</div>
					</section>

