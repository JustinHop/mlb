<?php
	$options = get_option('inove_options');

	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>

<!-- sidebar START -->
<div id="sidebar">

<!-- sidebar north START -->
<div id="northsidebar" class="sidebar">

    <!-- payment -->
<script type="text/javascript"><!--
google_ad_client = "pub-0022581396450834";
/* 300x250, created 8/24/09 mlb right code */
google_ad_slot = "5893357379";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	<div class="widget widget_feeds"></div>

	<!-- showcase -->
	<?php if( $options['showcase_content'] && (
		($options['showcase_registered'] && $user_ID) || 
		($options['showcase_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
		($options['showcase_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
	) ) : ?>
		<div class="widget">
			<?php if($options['showcase_caption']) : ?>
				<h3><?php if($options['showcase_title']){echo($options['showcase_title']);}else{_e('Showcase', 'inove');} ?></h3>
			<?php endif; ?>
			<div class="content">
				<?php echo($options['showcase_content']); ?>
			</div>
		</div>
	<?php endif; ?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('north_sidebar') ) : ?>

	<!-- posts -->
	<?php if (is_single()) : ?>

	<div class="widget">
		<h3>Recent Posts</h3>
		<ul>
			<?php
			    $posts = get_posts('numberposts=10&orderby=post_date');
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
		</ul>
	</div>
    <?php endif; ?>

	<!-- recent comments -->
	<?php if( function_exists('wp_recentcomments') ) : ?>
		<div class="widget">
			<h3>Recent Comments</h3>
			<ul>
				<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
			</ul>
		</div>
	<?php endif; ?>

<?php endif; ?>
</div>
<!-- sidebar north END -->

<div id="centersidebar">

	<!-- sidebar east START -->
	<div id="eastsidebar" class="sidebar">
    <div class="widget">
<script type="text/javascript"><!--
google_ad_client = "pub-0022581396450834";
/* 120x600, created 8/24/09 mlb sidebar */
google_ad_slot = "8886452346";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
    </div>
	<!-- meta -->
	<div class="widget">
		<h3>Meta</h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</div>

	</div>
	<!-- sidebar east END -->

	<!-- sidebar west START -->
	<div id="westsidebar" class="sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('west_sidebar') ) : ?>

		<!-- categories -->
		<div class="widget widget_categories">
			<h3>Categories</h3>
			<ul>
				<?php wp_list_cats('sort_column=name&optioncount=0&depth=1'); ?>
			</ul>
		</div>

	<?php endif; ?>
	</div>
	<!-- sidebar west END -->
	<div class="fixed"></div>
</div>

<!-- sidebar south START -->
<div id="southsidebar" class="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('south_sidebar') ) : ?>

	<!-- tag cloud -->
	<div id="tag_cloud" class="widget">
		<h3>Tag Cloud</h3>
		<?php wp_tag_cloud('smallest=8&largest=16'); ?>
	</div>

		<!-- blogroll -->
		<div class="widget widget_links">
			<h3>Blogroll</h3>
			<ul>
				<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
			</ul>
		</div>

	<!-- archives -->
	<div class="widget">
		<h3>Archives</h3>
		<?php if(function_exists('wp_easyarchives_widget')) : ?>
			<?php wp_easyarchives_widget("mode=none&limit=6"); ?>
		<?php else : ?>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		<?php endif; ?>
	</div>

    <div class="widget" id="bigsidevert">
<script type="text/javascript"><!--
google_ad_client = "pub-0022581396450834";
/* 160x600, created 8/24/09 for bottom of sidebar */
google_ad_slot = "4814232503";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
    </div>

<div class="widget">
    <ul>
        <li><a href="http://www.buzzerhut.com"><img border="0" src="http://www.buzzerhut.com/images/mainlogo_small.gif" width="154" height="42" alt="Promote Your Blog" title="Promote Your Blog"></a></li>
    </ul>
</div>
<?php endif; ?>
</div>
<!-- sidebar south END -->

</div>
<!-- sidebar END -->
