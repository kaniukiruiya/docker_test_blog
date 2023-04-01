<?php
/**
 * default search form
 */
?>
<form role="search" class="bs-search search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
    	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'grassywp' ); ?></label>
        <input type="search" placeholder="<?php esc_attr_e( 'Search...', 'grassywp' ); ?>" name="s" class="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <button type="submit"  value="Search"><i class="fa fa-search"></i></button>
    </div>
</form>