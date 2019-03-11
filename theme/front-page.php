<?php
	/**
	 * Template Name: フロントページ
	 */

	get_header();
?>
	<main>
		<?php get_template_part( './elements/fp-topheader' ); ?>


		<?php get_template_part( './elements/fp-welcome-mess' ); ?>


		<?php // get_template_part( 'elements/cta--jiko-lp' ); ?>



		<div class="row">
			<div class="column large-3 sidebar--wrap">
				<?php get_sidebar(); ?>
			</div>
			<div class="sidenav--overlay js--sidenav--button"></div>
			<div class="column small-12 large-8 contents --mt0 --pt0">
				<section class="contents--section contents--section__flow">
					<p>
						<img class="thumbnail" src="<?php echo get_template_directory_uri(), '/assets/img/topimage.png'; ?>" alt="不動産トラブルを弁護士が解決！">
					</p>
					<h2>弁護士16名在籍、不動産トラブルは広島最大級の山下江法律事務所へお任せください</h2>
					<div class="row">
						<div class="column small-6">
							<h3>
								<a href="<?php echo get_page_link( '6228' ); ?>">
									<?php echo get_the_title( '6228' ); ?>
								</a>
							</h3>
							<ul>
								<li>
									<a href="<?php echo get_page_link( '6230' ); ?>">
										<?php echo get_the_title( '6230' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6236' ); ?>">
										<?php echo get_the_title( '6236' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6241' ); ?>">
										<?php echo get_the_title( '6241' ); ?>
									</a>
								</li>
							</ul>
						</div>
						<div class="column small-6">
							<h3>
								<a href="<?php echo get_page_link( '6244' ); ?>">
									<?php echo get_the_title( '6244' ); ?>
								</a>
							</h3>
							<ul>
								<li>
									<a href="<?php echo get_page_link( '6247' ); ?>">
										<?php echo get_the_title( '6247' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6250' ); ?>">
										<?php echo get_the_title( '6250' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6253' ); ?>">
										<?php echo get_the_title( '6253' ); ?>
									</a>
								</li>
							</ul>
						</div>
						<div class="column small-6">
							<h3>
								<a href="<?php echo get_page_link( '6256' ); ?>">
									<?php echo get_the_title( '6256' ); ?>
								</a>
							</h3>
							<ul>
								<li>
									<a href="<?php echo get_page_link( '6266' ); ?>">
										<?php echo get_the_title( '6266' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6260' ); ?>">
										<?php echo get_the_title( '6260' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6241' ); ?>">
										<?php echo get_the_title( '6241' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6269' ); ?>">
										<?php echo get_the_title( '6269' ); ?>
									</a>
								</li>
							</ul>
						</div>
						<div class="column small-6">
							<h3>
								<a href="<?php echo get_page_link( '6303' ); ?>">
									<?php echo get_the_title( '6303' ); ?>
								</a>
							</h3>
							<ul>
								<li>
									<a href="<?php echo get_page_link( '6305' ); ?>">
										<?php echo get_the_title( '6305' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6307' ); ?>">
										<?php echo get_the_title( '6307' ); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link( '6309' ); ?>">
										<?php echo get_the_title( '6309' ); ?>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="row">
						<div class="column small-4">
							<a href="<?php echo get_page_link( '6226' ); ?>">
								<img src="<?php echo get_template_directory_uri(), '/assets/img/feature-01.png'; ?>" alt="<?php echo get_the_title( '6226' ); ?>">
							</a>
						</div>
						<div class="column small-4">
							<a href="<?php echo get_page_link( '5487' ); ?>">
								<img src="<?php echo get_template_directory_uri(), '/assets/img/feature-02.jpg'; ?>" alt="<?php echo get_the_title( '5487' ); ?>">
							</a>
						</div>
						<div class="column small-4">
							<a href="<?php echo get_page_link( '5492' ); ?>">
								<img src="<?php echo get_template_directory_uri(), '/assets/img/feature-03.jpg'; ?>" alt="<?php echo get_the_title( '5492' ); ?>">
							</a>
						</div>
					</div>
				</section>


				<?php get_template_part( './elements/fp--access' ); ?>



				<?php
				$args = array(
					'posts_per_page' => 4,
					'post_status'    => 'publish'
				);
				$news = new WP_Query( $args );
				if ( $news->have_posts() ) :
			?>
					<div class="contents--section">
						<h2>
							<a href="<?php echo get_page_link( '5749' ); ?>">最新情報
								<span class="badge">　></span>
							</a>
						</h2>
						<?php
					while ( $news->have_posts() ) : $news->the_post();
				?>
							<dl>
								<dt>
									<span class="label secondary">
										<?php get_the_date( 'Y-m-d' ); ?>
									</span>
									<?php the_category( '　' ); ?>
								</dt>
								<dd>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</dd>
							</dl>
							<?php
					endwhile;
				?>
							<p class="text-center contents--section_button" style="margin-top: 2rem">
								<a href="<?php echo get_page_link( '5749' ); ?>" class="button large">
									<?php NID_SVG::icon( 'list', array() ); ?>お知らせ一覧</a>
							</p>
					</div>
					<?php endif; ?>


					<div class="contents--section">
						<h2>
							<a href="https://www.law-yamashita.com/topics" target="_blank">事務所の最新情報
								<span class="badge">　></span>
							</a>
						</h2>
						<?php
					$url = 'https://www.law-yamashita.com/feed';
					$url = sprintf( esc_html( "%s" ), $url );
					add_filter( 'wp_feed_cache_transient_lifetime', function() { return 1800; } );
					include_once( ABSPATH . WPINC . '/feed.php' );
					$feed = fetch_feed( $url );
					remove_filter( 'wp_feed_cache_transient_lifetime', function() { return 1800; } );
					$maxitems = 3;
					if ( ! is_wp_error( $feed ) ) {
						$maxitems = $feed->get_item_quantity( $maxitems );
						$rss_items = $feed->get_items( 0, $maxitems );
					}
					$site_title = $feed->get_title();
					$site_url = $feed->get_permalink();

					$output = '';
					date_default_timezone_set( 'Asia/Tokyo' );
					foreach ( $rss_items as $item ) {
						$f_link = esc_url( $item->get_permalink() );
						$f_date = $item->get_date( 'Y-m-d' );
						$f_title = esc_html( $item->get_title() );
						$f_category = '';
						foreach ( $item->get_categories() as $category ) {
							$f_category .= $category->get_label();
						}
						$output .= <<< EOM
<dl>
	<dt><span class="label secondary">{$f_date}</span>　<span class="label">{$f_category}</span></dt>
	<dd><a href="{$f_link}" target="_blank">{$f_title}</a></dd>
</dl>
EOM;
					}
					echo $output;
				?>
							<p class="text-center contents--section_button" style="margin-top: 2rem">
								<a href="https://www.law-yamashita.com/topics" class="button large" target="_blank">
									<?php NID_SVG::icon( 'list', array() ); ?>メインサイトのお知らせ一覧
									<br>
									<br>
									<span style="font-size:0.8em">※メインサイトへ移行します。</span>
								</a>
							</p>
					</div>

			</div>
		</div>
	</main>
	<?php get_footer(); ?>
