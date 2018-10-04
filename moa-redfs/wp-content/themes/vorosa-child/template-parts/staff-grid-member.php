<?php
  $staff_data = cd_get_staff_metadata(get_the_ID());
  $post_thumbnail_src = get_the_post_thumbnail(get_the_ID(), 'thumbnail'); 
?>	
<div class="staff-member">		
  <div class="staff-member-wrap">
    <?php if (!empty($post_thumbnail_src)): ?>
      <a href="<?=the_permalink()?>"><div class="staff-photo"><?php echo $post_thumbnail_src; ?></div></a>
    <?php endif; ?>
    
    <div class="staff-member-text">
      <h3 class="staff-member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p class="staff-member-title"><?php echo $staff_data['my_title'] ?></p>
      <a href="<?php echo the_permalink(); ?>" class="overlay_link"></a>
    </div>
  </div>
</div>