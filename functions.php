<?php
/**
 * functions.php
 * テーマのための関数
 */

/** ============================================================
 * $
 * ファイルの読み込み
 * ========================================================== */

//管理画面以外の場合
if (!is_admin()) {

  /** ---------------------------------------
   * CSSの読み込み設定
   * ------------------------------------- */
  add_action('wp_print_styles', 'add_stylesheet');

  // 読み込むファイルを定義
  function register_style() {
    wp_register_style('training_style', get_template_directory_uri().'/style.css');
  }
  // 読み込み
  function add_stylesheet() {
    register_style();
    wp_enqueue_style('training_style');
    // フロントページのみで読み込み
    // if ( is_front_page() ) {
    // 	wp_enqueue_style('foobar');
    // }
  }


  /** ---------------------------------------
   * JSの読み込み設定
   * ------------------------------------- */
  add_action('wp_print_scripts', 'add_script');

  // 読み込むファイルを定義 trueでbody終了タグの前、falseでhead前
  function register_script(){
    wp_register_script('training_js', get_template_directory_uri().'/assets/js/app.js', array(), NULL, true);
  }
  // 読み込み
  function add_script() {
    register_script();
    wp_enqueue_script('training_js');
  }

}



/** ============================================================
 * $
 * 設定
 * ========================================================== */
/** ---------------------------------------
 * 不要な情報の削除
 * ------------------------------------- */
// WordPressのバージョン情報を削除
remove_action('wp_head', 'wp_generator');


/** ---------------------------------------
 * アイキャッチの有効化
 * ------------------------------------- */
add_theme_support('post-thumbnails');

/** ---------------------------------------
 * アイキャッチ出力タグのカスタマイズ
 * ------------------------------------- */
add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
  $html = preg_replace('/class=".*\w+"/', 'class="img_eyecatch"', $html);
  $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
  return $html;
}

/** ---------------------------------------
 * タイトルタグの有効化
 * ------------------------------------- */
add_theme_support( 'title-tag' );
add_filter( 'document_title_parts', 'remove_title_description', 10, 1 );
add_filter( 'document_title_separator', 'my_document_title_separator' );

function remove_title_description ( $title ) {
  if ( is_home() || is_front_page() ) {
    unset( $title['tagline'] );
  }
  return $title;
}
function my_document_title_separator( $sep ) {
  $sep = '｜';
  return $sep;
}


