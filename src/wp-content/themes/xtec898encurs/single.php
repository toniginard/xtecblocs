	<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="pageheader">
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
		</div>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link','encurs');?>: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry">
				<?php the_content('<p class="serif">'. __('Read the rest of this entry &raquo;','encurs') .'</p>'); ?>
				<?php /* the_meta(); */?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','encurs').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="postmetadata2">
					<small>
						<?php _e('This entry was posted','encurs');?>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
							
<?php /******* MODIFICACIO XTEC ******* 							
						<?php _e('on');?> <?php the_time('j/M/y') ?> at <?php the_time() ?> */ ?>
						<?php _e('on','encurs');?> <?php the_date() ?> <?php _e('at','encurs');?> <?php the_time() ?>
<?php /******* FI MODIFICACIO XTEC *******/ ?>						
						
						<?php _e('and is filed under','encurs');?> <?php the_category(', ') ?>.						
						<?php _e('You can follow any responses to this entry through the','encurs');?> <?php comments_rss_link('RSS 2.0'); ?> <?php _e('feed.','encurs');?>
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<?php _e('You can','encurs');?> <a href="#respond"><?php _e('leave a response','encurs')?></a>, <?php _e('or');?> <a href="<?php trackback_url(true); ?>" rel="trackback"><?php _e('trackback','encurs');?></a> <?php _e('from your own site.','encurs');?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can','encurs');?> <a href="<?php trackback_url(true); ?> " rel="trackback"><?php _e('trackback','encurs');?></a> <?php _e('from your own site.','encurs');?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','encurs');?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','encurs');?>

						<?php } edit_post_link(__('Edit this entry.','encurs'),'',''); ?>

					</small>
				</p>

			</div>
		</div>

	<div class="pagecomments">
	<?php comments_template(); ?>
	</div>
	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','encurs');?></p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>
