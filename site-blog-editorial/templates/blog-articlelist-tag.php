						<section>
							<header class="main">
								<h1><?= _x("Tag:", "blog") ?> <?= $page->title ?></h1>
							</header>
							<p><?= sprintf(_x("All blog entries tagged with '%s'", "blog"), $page->title) ?></p>


							<!-- Posts -->
<?php

/**
 *
 * Output a list of articles having to the chosen tag
 *
 */

$sortorder = $session->chronological ? "" : "-";

$blogposts = $pages->find("template=blog-post, blog_tags=$page, sort={$sortorder}created, limit=" . $blogSettings->blog_numitems);

foreach($blogposts as $blogpost)
{
		$blogts = $blogpost->getUnformatted("blog_date");
?>
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


