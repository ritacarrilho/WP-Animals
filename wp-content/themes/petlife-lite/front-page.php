<?php
/**
 *
 * @package Petlife Lite
 */

get_header(); 

if (!is_home() && is_front_page()) {
  $hideslide = get_theme_mod('hide_slider', '1');
  if($hideslide == ''){   
    $petlife_lite_pages = array();
    for($sld=7; $sld<10; $sld++) { 
      $mod = absint( get_theme_mod('page-setting'.$sld));
      if ( 'page-none-selected' != $mod ) {
        $petlife_lite_pages[] = $mod;
      } 
    } 
    if( !empty($petlife_lite_pages) ) :
    $args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $petlife_lite_pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : 
    $sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php
    $i = 0;
    while ( $query->have_posts() ) : $query->the_post();
    $i++;
    $petlife_lite_slideno[] = $i;
    $petlife_lite_slidetitle[] = get_the_title();
    $petlife_lite_slidedesc[] = get_the_excerpt();
    $petlife_lite_slidelink[] = esc_url(get_permalink());
      ?>
      <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
      <?php
    $sld++;
    endwhile;
      ?>
    </div>
    <?php
    $k = 0;
    foreach( $petlife_lite_slideno as $petlife_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $petlife_lite_sln ); ?>" class="nivo-html-caption">
        <h2><a href="<?php echo esc_url($petlife_lite_slidelink[$k] ); ?>"><?php echo esc_html($petlife_lite_slidetitle[$k] ); ?></a></h2>
        <p><?php echo esc_html($petlife_lite_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide-button paw-effect" href="<?php echo esc_url($petlife_lite_slidelink[$k] ); ?>">
          <?php echo esc_html(get_theme_mod('slide_text',__('Read More','petlife-lite')));?>
          <span class="paw1"><i class="fa fa-paw"></i></span>
          <span class="paw2"><i class="fa fa-paw"></i></span>
          <span class="paw3"><i class="fa fa-paw"></i></span>
          <span class="paw4"><i class="fa fa-paw"></i></span>
          <span class="paw5"><i class="fa fa-paw"></i></span>
          <span class="paw6"><i class="fa fa-paw"></i></span>
        </a>
    </div>
    <?php $k++;
      wp_reset_postdata();
    } ?>
    <?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>

<div class="main-container">

  <?php
    $hidewelsec = get_theme_mod('hide_wel_section','1');
    if( $hidewelsec == '' ){
  ?>

  <div class="intro-section">

    <div class="container">

      <div class="flex-box">

        <?php
          if( get_theme_mod('display-setting1') != '' ){
            $welquery = new WP_Query(
              array(
                'page_id' => get_theme_mod('display-setting1')
              )
            );

            while( $welquery->have_posts() ) : $welquery->the_post(); ?>

              <div class="half-col">

                <?php if( has_post_thumbnail()) { the_post_thumbnail(); } ?>

              </div><!-- col 6 -->

              <div class="half-col">

                <div class="intro-content">

                  <h2 class="section-title"><?php the_title(); ?></h2>

                  <?php the_content(); ?>

                  <?php if( !empty( get_theme_mod('welmore-txt') ) ) { ?>
                    <a href="<?php the_permalink(); ?>" class="main-button"><?php echo esc_html(get_theme_mod('welmore-txt')); ?></a>
                  <?php } ?>

                </div><!-- intro content -->

              </div><!-- half-col -->

          <?php
            endwhile;
          }
        ?>

      </div><!-- flex-box -->

    </div><!-- container -->

  </div><!-- intro-section -->
  <?php
   }
  ?>

  <?php $hidebox = get_theme_mod('hide_section', '1'); ?>  

  <?php if($hidebox  == '') { ?>

  <div class="service-section">

    <div class="service-inner">

      <?php
        $sersectl = get_theme_mod('service-ttl');
        if( $sersectl != '' ){
          echo '<h2 class="section-title">'.esc_html($sersectl).'</h2>';
        }
      ?>

      <div class="flex-box">

      <?php for($j = 1; $j<4; $j++) { ?>

      <?php if(get_theme_mod('page-setting'.$j,true) != '' ) { ?>

      <?php if(get_theme_mod('page-setting'.$j) != '') { ?>

      <?php $page_query = new WP_Query(array('page_id' => get_theme_mod('page-setting'.$j))); ?>

      <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>

      <div class="serbox one_third_col">

        <div class="thumbbx">

          <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail('medium'); ?><?php } ?>

        </div><!-- thumbbx -->

        <div class="featbxcntnt">

          <h3><?php the_title(); ?></h3>

          <?php the_excerpt(); ?>

          <a href="<?php the_permalink(); ?>" class="main-button"><?php esc_html_e('Read More','petlife-lite'); ?></a>

        </div><!-- featbxcntnt -->

      </div><!-- featbox --> 

      <?php endwhile; ?>

      <?php } }} ?>

      </div><!-- flex -->

    </div><!-- service-inner --><div class="clear"></div>

  </div><!-- service-section -->

  <?php } ?>

  <div class="content-area">

    <div class="middle-align content_sidebar">

      <div class="site-main" id="sitemain">

        <?php
        if ( have_posts() ) :
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content-page', get_post_format() );

          endwhile;

          // Previous/next post navigation.
          the_posts_pagination();
          wp_reset_postdata();

          else :

          // If no content, include the "No posts found" template.
          get_template_part( 'no-results' );

        endif;
        ?>
      </div>
      <?php get_sidebar();?>
      <div class="clear"></div>

    </div>

  </div>

  <?php get_footer(); ?>