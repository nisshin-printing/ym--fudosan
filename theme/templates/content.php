<?php
	if ( is_home() || is_archive() ) {
?>
<article <?php post_class( 'post post--topic' ); ?> itemscope itemtype="http://schema.org/Article" itemref="author-prof">
	<meta itemprop="description" content="<?php the_excerpt(); ?>">
	<ul class="post--meta menu">
		<li class="published" itemprop="datePublished dateCreated" datetime="<?php echo get_the_time( 'Y-m-d' ); ?>"></li>
		<li class="updated" itemprop="dateModified" datetime="<?php echo get_the_modified_time( 'Y-m-d' ); ?>"></li>
		<li class="author hide" itemprop="author copyrightHolder editor" itemscope itemtype="http://schema.org/Person"><span class="author" itemprop="name"><?php bloginfo( 'name' ); ?></span></li>
	</ul>
	<div class="row align-middle">
		<?php
			if ( has_post_thumbnail() ) :
		?>
		<div class="column small-4"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
		<div class="column small-8">
		<?php
			else :
		?>
			<div class="column small-12">
		<?php
			endif;
		?>
			<h2 itemprop="about headline" class="entry-title post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
	</div>
	<div class="post--label">
	<?php
		echo '<span class="label secondary">', get_the_date( 'Y-m-d' ),'</span>';
		$categories = get_the_category( $post->ID );
		foreach ( $categories as $category ) :
	?>
		<a href="<?php echo get_category_link( $category->cat_ID ); ?>" class="label"><?php echo $category->name; ?></a>
	<?php
			endforeach;
	?>
	</div>
</article>
<?php
	} else {
?>
<article <?php post_class( 'post' ); ?> itemscope itemtype="http://schema.org/Article" itemref="author-prof">
	<meta itemprop="description" content="<?php the_excerpt(); ?>">
	<ul class="post--meta menu">
		<li class="published" itemprop="datePublished dateCreated" datetime="<?php echo get_the_time( 'Y-m-d' ); ?>"></li>
		<li class="updated" itemprop="dateModified" datetime="<?php echo get_the_modified_time( 'Y-m-d' ); ?>"></li>
		<li class="author hide" itemprop="author copyrightHolder editor" itemscope itemtype="http://schema.org/Person"><span class="author" itemprop="name"><?php bloginfo( 'name' ); ?></span></li>
	</ul>
	<h2 itemprop="about headline" class="entry-title post--title"><?php the_title(); ?></h2>
	<div class="post--label">
	<?php
		echo '<span class="label secondary">', get_the_date( 'Y-m-d' ), '</span>';
		$categories = get_the_category();
		foreach ( $categories as $category ) :
	?>
		<a href="<?php echo get_category_link( $category->cat_ID ); ?>" class="label"><?php echo $category->name; ?></a>
	<?php
			endforeach;
	?>
	</div>
	<div class="post--content"><?php the_content(); ?></div>
</article>
<?php
	}
