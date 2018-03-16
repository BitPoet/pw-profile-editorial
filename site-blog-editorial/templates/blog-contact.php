<?php include('blog-head.php'); ?>

		<!-- Contact Form -->
					<article>
						<header class="main">
							<h1><?= $page->title ?></h1>
						</header>

						<div><?= $page->blog_body ?></div>

						<?= $modules->get('SimpleContactForm')->render(array(
							"emailTo"		=>	$blogSettings->email
						)) ?>

					</article>

				</div>
			</div>

<?php include('blog-sidebar.php'); ?>

<?php include('blog-footer.php'); ?>
