<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 global $base_url;
?>
<div id="page-wrapper">
	<div id="page">

		<header class="header" id="header" role="banner">
			
      <?php if ($page['main_navigation']): ?>
      <?php print render($page['main_navigation']); ?>
        <div class="clear-block"></div>
      <?php endif; ?>
      <div class="header-inner">
				<?php if ($logo): ?>
					<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
				<?php endif; ?>

				<?php if ($site_name || $site_slogan): ?>
					<div class="header__name-and-slogan" id="name-and-slogan">
						<?php if ($site_name): ?>
							<h1 class="header__site-name" id="site-name">
								<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
							</h1>
						<?php endif; ?>

						<?php if ($site_slogan): ?>
							<div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				
				<div class="middle-header">
				  <img src="<?php print $base_url;?>/sites/all/themes/smo/images/flages.jpg" />
				</div>
				
				<?php print render($page['header']); ?>
      </div>
		</header>
		
		<div class="clear-block"></div>
		
		<?php print render($page['page_top']); ?>
		<div id="page_bottom"> 
      <?php print render($page['page_top']); ?>
    </div>
    
    
    <?php if ($page['content_top']): ?>
		  <?php print render($page['content_top']); ?>
		  <div class="clear-block"></div>
	  <?php endif; ?>
    
		<div id="main">
      <?php $sidebar_first  = render($page['sidebar_first']);?>
      <?php if ($sidebar_first || $sidebar_second): ?>
      <div class="sidebar-left">
			<?php print $sidebar_first; ?>
      </div>
      <?php endif; ?>
      <div id="content" class="column" role="main">
				<?php print render($page['highlighted']); ?>
				<?php print $breadcrumb; ?>
				<a id="main-content"></a>
				<?php print render($title_prefix); ?>
				<?php if ($title): ?>
					<h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
				<?php endif; ?>
				<?php print render($title_suffix); ?>
				<?php print $messages; ?>
				<?php print render($tabs); ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?>
					<ul class="action-links"><?php print render($action_links); ?></ul>
				<?php endif; ?>
				<?php print render($page['content']); ?>
				<?php print $feed_icons; ?>
			</div>
      
      <!--<div id="navigation">
        <?php print render($page['navigation']); ?>
      </div>-->

			<?php
				// Render the sidebars to see if there's anything in them.
				
				$sidebar_second = render($page['sidebar_second']);
			?>

			<?php if ($sidebar_second): ?>
				<aside class="sidebar-right">
					<?php print $sidebar_second; ?>
				</aside>
			<?php endif; ?>

		</div>
		
		<?php print render($page['content_bottom_one']); ?>
    <?php print render($page['content_bottom_two']); ?>
    <?php print render($page['content_bottom_three']); ?>
    
    <div class="clear-block"></div>
    <?php print render($page['content_bottom']); ?>
    <div class="clear-block"></div>
    <?php print render($page['page_bottom']); ?>
    <div class="clear-block"></div>
    <?php print render($page['footer']); ?>

	</div> <!--#page-->
<?php print render($page['bottom']); ?>
</div><!--#page-wrapper-->
