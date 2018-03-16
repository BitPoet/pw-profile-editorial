							<!-- Sidebar -->
								<div id="sidebar">
									<div class="inner">

									<!-- Search Box -->
										<section id="search" class="alt">
											<form method="get" action="<?= $pages->get('/search/')->url ?>">
												<input type="text" class="text" name="search" placeholder="Search" />
											</form>
										</section>

									<!-- Navigation -->

<?php

										include("blog-nav.php");


foreach($blogSettings->blog_widgets as $widget) { ?>

				<!-- <?= $widget->title ?> -->
					<?php
	echo $widget->render();
}

?>

									</div>
									
									<a class="toggle" href="#sidebar"> Toggle </a>
								</div>
