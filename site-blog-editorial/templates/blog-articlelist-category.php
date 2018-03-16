							<section>
								<header class="main">
									<h1><?= _x("Category:", "blog") ?> <?= $page->title ?></h1>
								</header>
								<p><?= sprintf(_x("All blog entries in category '%s'", "blog"), $page->title) ?></p>


<?php

/**
 *
 * Output a list of articles belonging to the chosen category
 *
 */

$blogposts = $pages->find("template=blog-post, blog_categories=$page, sort=" . ($session->chronological ? "" : "-" ) . "created, limit=" . $blogSettings->blog_numitems);

foreach($blogposts as $blogpost)
{
		$blogts = $blogpost->getUnformatted("blog_date");
?>
							<!-- Posts -->

								<article class="post post-excerpt">
									<header>
										<h2><a href="#"><?= $blogpost->title ?></a></h2>
									</header>
									<div class="info">
										<?= blogDate($blogts); ?>

										<p>
											<a href="#" class="icon fa-comment" title="<?= sprintf(_x("%d comments", "blog"), $blogpost->blog_comments->count) ?>"><?= $blogpost->blog_comments->count ?></a>
											<a href="#" title="<?= sprintf(_x("%0.1f stars", "blog"), $blogpost->blog_comments->stars(true)) ?>"><?= $blogpost->blog_comments->renderStars() ?></a>
										</p>

									</div>
							
<?php if($blogpost->blog_images->count) {
								$img = $blogpost->blog_images->first;
								$thumb = $img->size(771, 0, array( 'upscaling' => false, 'cropping' => false, 'quality' => 90 ));
?>
									<p><img src="<?= $thumb->url ?>" class="image featured" alt="<?= str_replace('"', '&quot;', $thumb->description) ?>" /></p>
<?php } ?>

									<?= $blogpost->blog_summary ?: ("<p>" . makeSummary($blogpost->blog_body) . "</p>") ?>

									<p><em><?= sprintf(_x("This blog entry has %d comments", "blog"), $blogpost->blog_comments->count) ?></em></p>

									<p><a class="button morelink" href="<?= $blogpost->url ?>"><?= _x("Read full blog entry", "blog") ?></a></p>
								</article>
<?php
}

								echo blogPager($blogposts);

?>

							</section>
