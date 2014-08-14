<!DOCTYPE html>
<html>
 <head <?php language_attributes(); ?>>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
 </head>
 
 <body <?php body_class(); ?>>
  <div class="header" role="banner">
   <h1><?php bloginfo('name'); ?></h1>
   <small class="tagline"><?php bloginfo('description'); ?></small>
  </div>

  <div class="nav" role="navigation">
   <?php wp_nav_menu(array('depth' => 1, 'theme_location' => 'header_nav')); ?>
  </div>
  
  <div class="section" role="main">

    <div class="article-layout">

    <?php if (have_posts()): while( have_posts()): the_post(); ?>

     <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2><?php the_title(); ?></h2>
      <?php if (get_post_type() == 'post'): ?>
       <div class="article-meta">Posted in: <?php the_category(', '); ?> <?php the_tags(); ?></div>
      <?php endif; ?>
      <?php the_content(); wp_link_pages(); ?>
      <div class='lastmod'>
       <a href="<?php the_permalink(); ?>" title="Permalink"><?php the_time(get_option('date_format')); ?></a>
       by <?php the_author_posts_link(); ?>
      </div>
      <?php if (is_single()): ?>
       <div class="posts-nav-link"><?php previous_post_link(); ?> &bull; <?php next_post_link(); ?></div>
      <?php endif; ?>
      <div class="comment-box"><?php comments_template(); ?></div>
     </div>

    <?php endwhile; ?>
     <div class="posts-nav-link"><?php posts_nav_link(); ?></div>
    <?php else: ?>
     <p><?php _e('Sorry, no posts matched your criteria.', 'newsprint'); ?></p>
    <?php endif; ?>

   </div>

   <div class="sidebar-layout">
    <ul>
     <?php if (!dynamic_sidebar(1)): ?>
      <li>
       <h2><?php print __('Sitemap', 'newsprint'); ?></h2>
       <ul><?php wp_list_pages(array('title_li' => '')); ?></ul>
      </li>
      <li><br><?php get_search_form(); ?></li>
      <li>
       <h2><?php print __('Post calendar', 'newsprint'); ?></h2>
       <?php get_calendar(); ?>
      </li>
     <?php endif; ?>
    </ul>
   </div>
   
   <div class="guard"></div>
  </div>
  
  <div class="footer">
   Powered by <a href="http://wordpress.org/">WordPress</a><br>
   and the <a href="http://felix.plesoianu.ro/index.php/page:Webdesign:Newsprint%20Template">Newsprint</a> theme.
  </div>

  <?php wp_footer(); ?>
 </body>
</html>
