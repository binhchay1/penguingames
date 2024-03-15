<?php get_header(); ?>

<?php if (myfriv_get_option('index_728x90')) {
  get_template_part("partials/advertisement", "728");

  $table_category = $wpdb->prefix . 'category_custom';
  $category = get_category(get_query_var('cat'));
  $result = $wpdb->get_results("SELECT * FROM $table_category WHERE `category_id` = $category->term_id ");
  $description = $result[0]->content;
} ?>

<?php
$topCategory = get_option('top_category_homepage');
$arrTopCategory = json_decode(json_encode(json_decode($topCategory)), true);
$category = get_category(get_query_var('cat'));
$queryGet = "SELECT * FROM " . $wpdb->prefix . 'top_game_category WHERE category_id = "' . $category->term_id . '"';
$resultTopGame = $wpdb->get_results($queryGet);

if (empty($resultTopGame)) {
  $listTopGame = array();
} else {
  if (empty($resultTopGame[0]->game)) {
    $listTopGame = array();
  } else {
    $listTopGame = explode(',', $resultTopGame[0]->game);
  }
}

?>

<div class="top-cate-homepage">
  <h2 style="margin-left: 30px; font-size: 20px; font-weight: bold;">Top categories</h2>
  <div class="list-top-cate">
    <?php foreach ($arrTopCategory as $category => $status) {
      if ($status == 'true') { ?>
        <a href="<?php echo get_category_link(get_cat_ID($category)) ?>">
          <div class="in-list-top-cate"><?php echo ucfirst(str_replace('-', ' ', $category)) ?></div>
        </a>
    <?php }
    } ?>
  </div>
</div>

<div class="top-cate-homepage">
  <h2 style="margin-left: 30px; font-size: 20px; font-weight: bold;">Top games</h2>
  <div class="list-top-cate">
    <?php foreach ($listTopGame as $post_id) {
      $img_url = get_post_meta($post_id, 'mabp_thumbnail_url');
    ?>

      <article class="games" style="margin-left: 30px">
        <a href="<?php get_permalink($post_id) ?>" data-hasqtip="27" oldtitle="<?php echo get_the_title($post_id) ?>" title="">
          <div class="thumb">
            <div class="play">
              <span class="icon icon-link"></span>
            </div>

            <img src="<?php echo $img_url[0] ?>" width="100" height="100" alt="<?php echo get_the_title($post_id) ?>">
          </div>
        </a>
      </article>
    <?php } ?>
  </div>
</div>

<?php
global $wpdb;
$category = get_category(get_query_var('cat'));
$cat_id = $category->cat_ID;
$result = $wpdb->get_results("SELECT * FROM wp_category_custom WHERE category_id = '" . $cat_id . "'");
?>
<div id="games_wrap">
  <div class="padding-10">
    <h2>
      <?php
      if (is_category()) {
        echo single_cat_title('', false);
      } elseif (is_tag()) {
        echo single_tag_title('', false);
      } else {
        _e('Archives', 'myfriv');
      }
      ?>p
    </h2>

  </div>

  <section id="games">
    <?php get_template_part("partials/loop"); ?>
  </section>

  <div class="category-description">
    <?php if (!empty($result)) { ?>
      <?php echo htmlspecialchars_decode($result[0]->content); ?>
    <?php } ?>
  </div>

</div>

<a id="inifiniteLoader"><?php _e("Loading games...", "myfriv"); ?> <span class="icon icon-clock"></span></a>
<a id="inifiniteLoaderEnd"><?php _e("No more games...", "myfriv"); ?> <span class="icon icon-clock"></span></a>

<?php get_footer(); ?>