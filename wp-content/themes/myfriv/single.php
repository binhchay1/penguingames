<?php get_header(); ?>

<section class="play_wrap">

  <div class="breadcrumb">
    <span class="icon icon-location"></span>
    <?php myfriv_breadcrumb(); ?>
    <div class="spacer"></div>
  </div>

  <?php if (myfriv_get_option('single_728x90')) : ?>
    <?php get_template_part("partials/advertisement", "728"); ?>
  <?php endif; ?>

  <div class="clearfix"></div>

  <div class="single_game_wrap">
    <div class="main-game border-radius">
      <div class="title-special border-radius">
        <div class="padding-10">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>

      <div class="player">
        <div class="preloader">
          <?php
          if (!myfriv_get_option('preloader')) {
            if (myfriv_get_option('ad_336x280')) {
              get_template_part("partials/advertisement", "336");
            }
          ?>
            <p>
              <?php _e("Loading...", "myfriv"); ?>
              <br /><br />
              <img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" />
              <br /><br />
              <a href="#" class="skip"><?php _e("Skip Advertisement", "myfriv"); ?></a>
            <p>
            <?php
          } ?>
        </div>

        <div class="game">
          <center>
            <div id="myarcade_game">
              <?php
              if (function_exists('get_game')) {
                global $mypostid;
                $mypostid = $post->ID;
                echo myarcade_get_leaderboard_code();
                echo get_game();
              }
              ?>
            </div>
          </center>
          <div class="lgtbxbg-pofi"></div>
        </div>

        <div class="control">
          <ul>
            <li><a href="#" class="trnlgt" title="<?php _e("Turn lights on/off", 'kizitheme'); ?>"><span class="icon icon-lightbulb"></span></a></li>
            <li><a href="<?php echo get_permalink() . 'fullscreen'; ?>/" class="fa-arrows-alt" title="<?php _e('Play in fullscreen', 'myarcadetheme'); ?>"><span class="icon icon-resize-full-alt"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php if (myfriv_get_option('single_728x90')) : ?>
    <div class="adbelowgame">
      <?php get_template_part("partials/advertisement", "728"); ?>
    </div>
  <?php endif; ?>
</section>

<section class="container main border-radius">
  <div class="padding-both">
    <div class="twelve columns">
      <div class="description">
        <div class="title-special border-radius" style="float: none;">
          <div class="padding-10">
            <h2><?php _e("Detailed description of the " . get_the_title(), "myfriv"); ?></h2>
          </div>
        </div>

        <?php
        $get_post_meta = get_post_meta(get_the_ID());
        $date = get_the_modified_date('F j, Y', get_the_ID());
        $dateTime = get_the_modified_date('Y-m-d', get_the_ID());

        ?>
        <style>
          .stats-wrapper {
            display: flex;
            flex-wrap: wrap;
            margin: 0 10px;
          }

          .game-meta {
            display: table;
            flex-grow: 1;
            line-height: 2;
          }

          .meta-row {
            display: table-row;
            width: 100%;
          }

          .meta-label {
            border-top: #ddd solid 1px;
          }

          .meta-value {
            display: table-cell;
            border-top: #ddd solid 1px;
            padding: 0 10px;
            text-align: left;
            width: 50%;
          }
        </style>
        <div class="stats-wrapper">
          <ul class="game-meta info">
            <li class="meta-row">
              <div class="meta-label subtle">Game Type</div>
              <div class="meta-value"><?php echo $get_post_meta['mabp_game_type'][0] ?></div>
            </li>
            <li class="meta-row">
              <div class="meta-label subtle">Technology</div>
              <div class="meta-value"><?php echo $get_post_meta['mabp_technology'][0] ?></div>
            </li>
            <li class="meta-row">
              <div class="meta-label subtle">Supported Devices</div>
              <div class="meta-value"><?php echo $get_post_meta['mabp_supported'][0] ?></div>
            </li>
            <li class="meta-row">
              <div class="meta-label subtle">Game Resolution</div>
              <div class="meta-value"><?php echo $get_post_meta['mabp_width'][0] ?> x <?php echo $get_post_meta['mabp_height'][0] ?></div>
            </li>
          </ul>
          <ul class="game-meta info">
            <li class="meta-row">
              <div class="meta-label subtle">Last Updated</div>
              <div class="meta-value">
                <time datetime="<?php echo $dateTime ?>"><?php echo $date ?></time>
              </div>
            </li>
            <li class="meta-row">
              <div class="meta-label subtle">Play Count</div>
              <div class="meta-value"><?php echo $get_post_meta['myarcade_plays'][0] ?></div>
            </li>
            <li class="meta-row">
              <div class="meta-label subtle">Platform</div>
              <div class="meta-value"><?php echo $get_post_meta['mabp_platform'][0] ?></div>
            </li>
            <li class="meta-row">
              <div class="meta-label subtle">Rating</div>
              <div class="meta-value"><?php echo $get_post_meta['mabp_rating'][0] ?>%</div>
            </li>
          </ul>
        </div>

        <div class="padding-10 clearfix">
          <?php the_content(); ?>
        </div>

        <div class="padding-10">
          <div style="margin-top: 15px;">
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
              <a class="addthis_button_preferred_1"></a>
              <a class="addthis_button_preferred_2"></a>
              <a class="addthis_button_preferred_3"></a>
              <a class="addthis_button_preferred_4"></a>
              <a class="addthis_button_compact"></a>
              <a class="addthis_counter addthis_bubble_style"></a>
            </div>
            <script type="text/javascript">
              var addthis_config = {
                "data_track_addressbar": false
              };
            </script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-510b368f261b915a"></script>
          </div>

          <div class="clearfix"></div>
          <div class="spacer"></div>

          <?php the_tags('<div class="tags"><span class="icon icon-tag"></span><ul><li>', '</li><li>', '</li></ul></div>'); ?>
        </div>
      </div>
      <div style="margin-left: 15px;">
        <h3 style="margin-left: 10px">May you like it</h3>
        <?php
        $args = array(
          'category__in' => wp_get_post_categories(get_the_ID()),
          'posts_per_page' => intval(myfriv_get_option('related_number')),
          'post__not_in' => array(get_the_ID()),
        );

        $relatedgames = new WP_Query($args);

        if ($relatedgames->have_posts()) : ?>
          <?php while ($relatedgames->have_posts()) : $relatedgames->the_post(); ?>

            <article class="games">
              <a href="<?php the_permalink(); ?>" class="tooltip" title="<?php the_title(); ?>">
                <div class="thumb">
                  <div class="play">
                    <span class="icon icon-link"></span>
                  </div>

                  <?php myarcade_thumbnail(); ?>
                </div>
              </a>
            </article>
          <?php endwhile;
          wp_reset_postdata(); ?>

        <?php else : ?>
          <p><?php _e("No related games found", 'myfriv'); ?></p>
        <?php endif; ?>
      </div>
      <?php if (!myfriv_get_option('game_comments')) : ?>
        <div class="comments">
          <div class="title-special border-radius" style="margin-bottom: 10px;">
            <div class="padding-10">
              <?php _e("Comments", "myfriv"); ?>
            </div>
          </div>
          <?php comments_template(); ?>
        </div>
      <?php endif; ?>
    </div>

    <?php get_template_part("partials/related"); ?>
  </div>
</section>

<?php get_footer(); ?>