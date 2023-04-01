<?php
/**
 * Widget Grassy Recent Projects
 *
 * @package Grassywp
 * @author Rs Theme
 * @link http://rstheme.com
 */

// Register and load the widget
function wpb_project_widget() {
    register_widget( 'grassy_recent_project' );
}
add_action( 'widgets_init', 'wpb_project_widget' );
 
// Creating the widget 
class grassy_recent_project extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget_project_project', 
 
// Widget name will appear in UI
__('Grassy Recent Project Widget', 'grassywp'), 
 
// Widget description
array( 'description' => __( 'Recent project widget with different options', 'grassywp' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Projects','grassywp' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		$show_featured_image = isset( $instance['show_featured_image'] ) ? $instance['show_featured_image'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
		    'post_type'			  => 'portfolios',	
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		
        <?php if ( $title ) {
                    echo $args['before_title'] . $title . $args['after_title'];
                } ?>    
                <ul class="recent-project">
					<?php while ( $r->have_posts() ) : $r->the_post(); ?>                  
                       <li>
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                       </li>                    
                    <?php 
                    endwhile; ?>               
                <?php
					// Reset the global $the_post as this query will have stomped on it
					wp_reset_postdata();
                ?>
               </ul> 
        <?php
        endif;
    }

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = sanitize_text_field( $new_instance['title'] );
	$instance['number'] = (int) $new_instance['number'];		
	return $instance;
}         
// Widget Backend 
public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;		
?>
<p>
  <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
    <?php _e( 'Title:','grassywp' ); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_js($title); ?>" />
</p>

<p>
  <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
    <?php _e( 'Number of posts to show:','grassywp' ); ?>
  </label>
  <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_js($number); ?>" size="3" />
</p>
<?php
}
} // Class wpb_widget_project ends here