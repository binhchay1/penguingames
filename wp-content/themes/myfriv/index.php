<?php get_header(); ?>

<?php if (myfriv_get_option('index_728x90')) {
  get_template_part("partials/advertisement", "728");
} ?>

<?php
$topCategory = get_option('top_category_homepage');
$arrTopCategory = json_decode(json_encode(json_decode($topCategory)), true);

$args = array(
  'posts_per_page'   => -1,
  'post_type'        => 'post',
  'meta_key'         => 'top_game_homepage',
  'meta_value'       => '1'
);

$query = new WP_Query($args);
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
    <?php foreach ($query->posts as $post) {
      $img_url = get_post_meta($post->ID, 'mabp_thumbnail_url');
    ?>

      <article class="games" style="margin-left: 30px">
        <a href="<?php get_permalink($post->ID) ?>" data-hasqtip="27" oldtitle="<?php echo $post->post_title ?>" title="">
          <div class="thumb">
            <div class="play">
              <span class="icon icon-link"></span>
            </div>

            <img src="<?php echo $img_url[0] ?>" width="100" height="100" alt="<?php echo $post->post_title ?>">
          </div>
        </a>
      </article>
    <?php } ?>
  </div>
</div>

<p style="margin-left: 30px; font-size: 20px; font-weight: bold;">List games</p>
<div id="games_wrap">
  <section id="games">
    <?php get_template_part("partials/loop"); ?>
  </section>
</div>

<a id="inifiniteLoader"><?php _e("Loading games", "myfriv"); ?>... <span class="icon icon-clock"></span></a>
<a id="inifiniteLoaderEnd"><?php _e("No more games...", "myfriv"); ?> <span class="icon icon-clock"></span></a>

<?php $descriptionHomepage = get_option('description_homepage');
if ($descriptionHomepage) { ?>
  <div class="description-homepage">
    <?php echo html_entity_decode($descriptionHomepage) ?>
  </div>
<?php }
?>

<?php get_footer(); ?>