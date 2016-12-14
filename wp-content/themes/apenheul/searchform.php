<form role="search" method="get" class="form-search" action="<?php echo home_url('/'); ?>">
  <label class="screen-reader-text"><?php _e('Search for:', 'apenheul'); ?></label>
  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-query" placeholder="<?php _e('Zoeken', 'apenheul'); ?>">
  <button type="submit" class="search-icon"><img src="/wp-content/uploads/2016/09/search.png"></button>
</form>

