			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h1><?= $blogSettings->blog_headline ?></h1>
							<p><?= $blogSettings->blog_summary ?></p>
						</header>
						<p><?= $pages->get('/about/')->blog_body ?></p>
					</div>
					<span class="image object"><img src="<?= $blogSettings->blog_header_image->url ?>" alt=""></span>
				</section>

