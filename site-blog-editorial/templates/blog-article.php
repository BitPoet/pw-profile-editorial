<?php

/**
 *
 * Output a single blog post with full body and images
 *
 */

$blogts = $page->getUnformatted("blog_date");
?>
					<!-- Post -->
					<section>
						<header class="main">
							<h1><a href="#"><?= $page->title ?></a></h1>
						</header>

						<article class="post">
							
							<div class="info">
								<?= blogDate($blogts); ?>
								<p>
								<a href="#" class="icon fa-comment" title="<?= sprintf(_x("%d comments", "blog"), $page->blog_comments->count) ?>"><?= $page->blog_comments->count ?></a>
								<a href="#" title="<?= sprintf(_x("%0.1f stars", "blog"), $page->blog_comments->stars(true)) ?>"><?= $page->blog_comments->renderStars() ?></a>
								</p>

							</div>
							
							<div class='BlogBody'>
								<?= $page->blog_body ?>
							</div>
							
							<?php include("blog-article-tags.php"); ?>

							<?php include("blog-prevnext.php"); ?>

							<p><?= $page->blog_comments->count > 0 ? $page->blog_comments->render() : "" ?></p>

							<div>

								<?= $page->blog_comments->renderForm(array(
								"headline"		=>	"<h3 class='icon fa-plus' title='" .
												_x("Click to leave a comment", "blog") .
												"'> " . _x("Post a Comment", "blog") . "</h3>"
								)) ?>

							</div>

						</article>
					</section>
