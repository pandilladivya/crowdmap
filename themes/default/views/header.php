<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo html::specialchars($page_title.$site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php echo $header_block; ?>
	<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>

</head>

<?php
  // Add a class to the body tag according to the page URI

  // we're on the home page
  if (count($uri_segments) == 0)
  {
  	$body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }
?>

<body id="page" class="<?php echo $body_class; ?>">

	<?php echo $header_nav; ?>

	<!-- wrapper -->
	<div class="wrapper floatholder rapidxwpr">

		<!-- header -->
		<div id="header">

			<!-- searchbox -->
			<div id="searchbox">

				<!-- languages -->
				<?php echo $languages;?>
				<!-- / languages -->

				<!-- searchform -->
				<?php echo $search; ?>
				<!-- / searchform -->
				
				<!-- azerbaijani characters -->
				<div class="az_char_search">
                                <div class="az_char_table">
                               	 <?php echo form::open("az_char"); ?>
                                	<ul class="az_buttons">
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_e" value="ə" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_c" value="ç" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_g" value="ğ" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_i" value="ı" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_o" value="ö" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_u" value="ü" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_s" value="ş" class="az_char_buttons"></li>
                                		<li class="az_buttons"><input type="button" id="az_char_search_buttons_w" value="w" class="az_char_buttons"></li>
                                	</ul>
                                <?php form::close(); ?>
                                </div>
                        </div>
				<!-- / azerbaijani characters -->
			</div>
			<!-- / searchbox -->

			<!-- logo -->
			<?php if ($banner == NULL): ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
				<span><?php echo $site_tagline; ?></span>
			</div>
			<?php else: ?>
			<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php endif; ?>
			<!-- / logo -->

			<!-- submit incident -->
			<?php echo $submit_btn; ?>
			<!-- / submit incident -->

		</div>
		<!-- / header -->
        <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<!-- JP: Show or hide reports_submit tab, depending on settings. -->
						<?php nav::main_tabs($this_page, (Kohana::config('settings.show_submit_report_tab') ? array() : array('reports_submit'))); ?>
					</ul>

					<?php if ($allow_feed == 1) { ?>
					<div class="feedicon"><a href="<?php echo url::site(); ?>feed/"><img alt="<?php echo html::escape(Kohana::lang('ui_main.rss')); ?>" src="<?php echo url::file_loc('img'); ?>media/img/icon-feed.png" style="vertical-align: middle;" border="0" /></a></div>
					<?php } ?>

				</div>
				<!-- / mainmenu -->
