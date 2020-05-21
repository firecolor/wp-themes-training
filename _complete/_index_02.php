<?php
/**
 * Training
 * index_02
 */
get_header(); // headタグまでを分離
?>

<body>
	<header>
		<div class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TRAINING</a></div>
	</header>

	<main>
	<?php if (have_posts()) :

		while (have_posts()) : the_post(); ?>

		<div class="contents">
			<?php if ( has_post_thumbnail()): ?>
			<div class="contents_img">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<?php endif; ?>
			
			<div class="contents_wrap">
				<div class="contents_date"><?php the_date('Y.m.d');?></div>
				<h1 class="contents_title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h1>
				<div class="contents_body">
					<?php the_content(); ?>
				</div>
				<div class="contents_cate">
					<?php the_category(); ?>
				</div>
				<div class="contents_tag">
					<span class="tag_icon"></span>
					<?php the_tags(''); ?>
				</div>
			</div>
		</div><!--/.contents  -->
		<?php endwhile; ?>

		<?php else : ?>
		<div class="contents">
			<p>お探しの記事は見つかりませんでした。</p>
		</div>
		<?php endif; ?>

	</main>

	<?php get_footer(); //footer部分を分離 ?>

</body>
</html>