<?php
	global $staff_data;
	$my_phone = htmlspecialchars($staff_data['phone']);
	$my_email = htmlspecialchars($staff_data['email']);
	$my_title = htmlspecialchars($staff_data['title']);
	$my_website = htmlspecialchars($staff_data['website']);
	$my_address = nl2br(htmlspecialchars($staff_data['address']));
	$is_single_post = $staff_data['is_single_post'];
	$options = !empty($staff_data['options']) ? $staff_data['options'] : array();
	extract($options);
?>

<?php if ( is_single() || $is_single_post ): ?>
<div class="staff-member single-staff-member">
<?php else: ?> 
<div class="staff-member">
<?php endif; ?>

	<!-- Featured Image -->
	<?php if ( $show_photo ): ?>
		<?php $post_thumbnail_src = get_the_post_thumbnail($staff_data['ID'], 'thumbnail'); ?>
		<?php if (!empty($post_thumbnail_src)): ?>
			<div class="staff-photo"><?php echo $post_thumbnail_src; ?></div>
		<?php endif; ?>
	<?php endif; ?>

	<div class="staff-member-right">
		<?php if ( $show_name ): // will always be false on single views ?>
			<h3 class="staff-member-name"><?php echo $staff_data['full_name']; ?></h3>
		<?php endif; ?>
		
		<?php if ( $show_title && $my_title): ?>
			<p class="staff-member-title"><?php echo $my_title ?></p>
		<?php endif; ?>
		
		
		<?php if ( $show_bio ): ?>
			<div class="staff-member-bio">
				<?php echo $staff_data['content']; ?>
			</div>		
			<br />
		<?php endif; ?>
		
		<!-- Only show Mailing Address and Contact Info in single view -->
		<?php if ( is_single() || $is_single_post): ?>
			<?php if ( $show_address ): ?>
				<?php if ($my_address): ?>
				<div class="staff-member-address">
					<h4>Mailing Address</h4>
					<p class="addr">
						<?php echo $my_address ?>
					</p>
				</div>
				<?php endif; ?>
			<?php endif; ?>
			
			<?php if ( ($show_phone && $my_phone) || ($show_email && $my_email) || ($show_website && $my_website) ): ?>
			<div class="staff-member-contacts">
				<h4>Contact</h4>
				<?php if ( $show_phone && $my_phone ): ?><p class="staff-member-phone"><strong>Phone:</strong> <?php echo $my_phone ?></p><?php endif; ?>
				<?php if ( $show_email && $my_email ): ?><p class="staff-member-email"><strong>Email:</strong> <a href="mailto:<?php echo $my_email ?>"><?php echo $my_email ?></a></p><?php endif; ?>
				<?php if ( $show_website && $my_website ): ?><p class="staff-member-website"><strong>Website:</strong> <a href="<?php echo $my_website ?>"><?php echo $my_website ?></a></p><?php endif; ?>
			</div>
			<?php endif; ?>		
		<?php endif; ?>
	</div>
</div>