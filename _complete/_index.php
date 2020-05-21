<?php
/**
 * Training
 * index
 */
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); //テーマに必須の関数 ?>
</head>

<body>
	<header>
		<div class="title">
			<a href="<?php echo esc_url(home_url('')); //サイトのルートのURLを取得 ?>">TRAINING</a>
		</div>
	</header>

	<main>

		<?php 
		//もしポストがあったら
		if (have_posts()) :
		//ポストをある分だけ繰り返し処理（メインループ）
		while (have_posts()) : the_post(); ?>

		<div class="contents">
			<?php if (has_post_thumbnail()): //アイキャッチがあれば ?>
			<div class="contents_img">
				<?php the_post_thumbnail('full'); //アイキャッチ画像を表示 ?>
			</div>
			<?php endif; ?>
			
			<div class="contents_wrap">
				<div class="contents_date"><?php the_date('Y.m.d'); //投稿日を表示 ?></div>
				<h1 class="contents_title">
					<a href="<?php the_permalink(); //URLを取得 ?>">
						<?php the_title(); //タイトルを表示?>
					</a>
				</h1>
				<div class="contents_body">
					<?php the_content(); //投稿したコンテンツを表示 ?>
				</div>
				<div class="contents_cate">
					<?php the_category(); //カテゴリを表示 ?>
				</div>
				<div class="contents_tag">
					<span class="tag_icon"></span>
					<?php the_tags(''); //タグを表示 ?>
				</div>
			</div>
		</div><!--/.contents  -->
		<?php endwhile; ?>
		<?php //メインループ終了 ?>

		<?php else : ?>
		<?php //ポストが見つからなかったときの処理 ?>
		<div class="contents">
			<p>お探しの記事は見つかりませんでした。</p>
		</div>
		<?php endif; ?>

	</main>

	<footer>
		<div class="copyright">FireColor</div>
	</footer>

	<?php wp_footer(); //テーマに必須の関数 ?>

</body>
</html>