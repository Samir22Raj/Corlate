<?php
/* Custom search form */
?>
<form role="form" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="text" class="search-form" autocomplete="off" placeholder="Search" value="<?php get_search_query(); ?>" name="s" id="s">
    <input type="submit" id="searchsubmit" value="" /><i class="fa fa-search"></i>
    <input type="hidden" name="post_type" value="corlate_blog" />
</form>