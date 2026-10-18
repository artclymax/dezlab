<section class="certificates-archive section">
	<div class="container">
		<?php if (have_posts()): ?>
			<ul class="certificates-archive__list grid">

				<?php while (have_posts()):
					the_post(); ?>
					<li class="certificates-archive__item">
						<a class="certificates-archive__link-wrapper image-box" href="<?php the_post_thumbnail_url(); ?>"
							data-fancybox><?php the_post_thumbnail(); ?></a>
					</li>
				<?php endwhile; ?>
			</ul>

			<!-- Пагинация -->
			<div class="pagination-page">
				<?php
				echo paginate_links([
					'total' => $wp_query->max_num_pages,
					'mid_size' => 1,
					'current' => max(1, get_query_var('paged')),
					'prev_text' => '<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.56055 15.1465C8.75581 15.3417 8.75581 15.6583 8.56055 15.8535C8.36528 16.0487 8.04876 16.0488 7.85351 15.8535L-3.49691e-07 8L7.85352 0.146484C8.04878 -0.048778 8.36528 -0.0487775 8.56055 0.146484C8.75581 0.341746 8.75581 0.658253 8.56055 0.853515L1.41406 8L8.56055 15.1465ZM17.5605 15.1465C17.7558 15.3417 17.7558 15.6583 17.5605 15.8535C17.3653 16.0487 17.0488 16.0488 16.8535 15.8535L9 8L16.8535 0.146484C17.0488 -0.0487778 17.3653 -0.0487778 17.5605 0.146484C17.7558 0.341747 17.7558 0.658253 17.5605 0.853516L10.4141 8L17.5605 15.1465Z" fill="currentColor"/></svg>',
					'next_text' => '<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.14649 0.853516C8.95122 0.658253 8.95122 0.341748 9.14649 0.146485C9.34175 -0.04874 9.65827 -0.0487648 9.85352 0.146485L17.707 8L9.85352 15.8535C9.65825 16.0488 9.34175 16.0488 9.14648 15.8535C8.95122 15.6583 8.95122 15.3417 9.14648 15.1465L16.293 8L9.14649 0.853516ZM0.146485 0.853516C-0.0487769 0.658253 -0.0487768 0.341747 0.146485 0.146484C0.34175 -0.0487404 0.658267 -0.0487652 0.853516 0.146484L8.70703 8L0.853516 15.8535C0.658253 16.0488 0.341747 16.0488 0.146484 15.8535C-0.0487778 15.6583 -0.0487778 15.3417 0.146484 15.1465L7.29297 8L0.146485 0.853516Z" fill="currentColor"/></svg>'
				]);
				?>
			</div>

		<?php else: ?>
			<p>Сертификатов пока нет</p>
		<?php endif; ?>

	</div>
</section>