<?php 

class Pixfly_Premium extends WP_Widget{

    /**
     * Register widget with WordPress.
     */
    function __construct() 
    {
        parent::__construct(
            'pixfly-premium-widget', // Base ID
            esc_attr__( 'pixfly -Sidebar social widget', 'pixfly' ), // Name
            array( 
                'description' => esc_attr__( 'Display a Premium or Feature description.', 'pixfly' ),
         'customize_selective_refresh' => true, // 1 Selective Refresh
            )
        );
    // 2 Enqueue style if widget is active (appears in a sidebar) or if in Customizer preview.
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
           
    function pixfly_premium_widget_scripts(){
      wp_enqueue_media();
      wp_enqueue_script( 'pixfly_premium_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true );
    }
    add_action('admin_enqueue_scripts', 'pixfly_premium_widget_scripts');
        }
    }
    
    /* *front-end widget form.
    front page view */
    public function widget( $args, $instance ){
    echo wp_kses_post($args['before_widget']);  
  $title = apply_filters('widget_title', empty($instance['social_title']) ? __('Follow us', 'pixfly') : $instance['social_title'], $instance, $this->id_base);
  ?>
    
        <h2 class="widget-title"> <?php if ( $title ) echo esc_html( $title ); ?></h2>
          <ul class="list-inline">
              <?php if( !empty( $instance['facebook_url'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['facebook_url'] ) ): echo esc_url(apply_filters( 'widget_title', $instance['facebook_url'] ) ); endif; ?>" title="<?php esc_html_e('facebook', 'pixfly'); ?>"><i class="fa fa-facebook"></i></a></li>
              <?php }?>
               <?php if( !empty( $instance['twitter_url'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['twitter_url'] ) ): echo esc_url(apply_filters( 'widget_title', $instance['twitter_url'] ) ); endif; ?>" title="<?php esc_html_e('twitter', 'pixfly'); ?>"><i class="fa fa-twitter"></i></a></li>
               <?php }?>
              <?php if( !empty( $instance['google_url'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['google_url'] ) ): echo esc_url(apply_filters( 'widget_title', $instance['google_url'] ) ); endif; ?>" title="<?php esc_html_e('google-plus', 'pixfly'); ?>"><i class="fa fa-google-plus"></i></a> </li>
              <?php }?>
        <?php if( !empty( $instance['dribbble'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['dribbble'] ) ): echo esc_url(apply_filters( 'widget_title', $instance['dribbble'] ) ); endif; ?>" title="<?php esc_html_e('dribbble', 'pixfly'); ?>"><i class="fa fa-dribbble"></i></a> </li>
              <?php }?>
               <?php if( !empty( $instance['behance'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['behance'] ) ): echo esc_url(apply_filters( 'widget_title', $instance['behance'] ) ); endif; ?>" title="<?php esc_html_e('behance', 'pixfly'); ?>"><i class="fa fa-behance"></i></a> </li>
              <?php }?>
              <?php if( !empty( $instance['inst_title'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['inst_title'] ) ): echo esc_url(apply_filters( 'widget_title', $instance['inst_title'] ) ); endif; ?>" title="<?php esc_html_e('instagram', 'pixfly'); ?>"><i class="fa fa-instagram"></i></a>
                <?php 
                    if( !empty($instance['text']) ):
                    
                        echo '<p>';
                            $wp_kses_args = array(
                                'br' => array(),
                                'em' => array(),
                                'strong' => array(),
                            );
                            echo wp_kses_post( wp_kses( apply_filters( 'widget_title', $instance['text'] ), $wp_kses_args ) );
                        echo '</p>';
                    endif;
                    ?>
            </li>
                <?php }?>
      <?php
      echo wp_kses_post($args['after_widget']);

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        ?>
        
         <p>
            <label for="<?php echo esc_html($this->get_field_id('social_title')); ?>"><?php esc_html_e( 'Social Title', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('social_title')); ?>"
                   id="<?php echo esc_html($this->get_field_id('social_title')); ?>" value="<?php if( !empty( $instance['social_title'] ) ): echo esc_attr($instance['social_title']); endif; ?>"
                   class="widefat"/>
        </p>        
         <p>
            <label for="<?php echo esc_html($this->get_field_id('facebook_url')); ?>"><?php esc_html_e( 'Facebook Url', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('facebook_url')); ?>"
                   id="<?php echo esc_html($this->get_field_id('facebook_url')); ?>" value="<?php if( !empty( $instance['facebook_url'] ) ): echo esc_attr($instance['facebook_url']); endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('twitter_url')); ?>"><?php esc_html_e( 'Twitter Url', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('twitter_url')); ?>"
                   id="<?php echo esc_html($this->get_field_id('twitter_url')); ?>" value="<?php if( !empty( $instance['twitter_url'] ) ): echo esc_attr($instance['twitter_url']); endif; ?>"
                   class="widefat"/>
        </p>           
        <p>
            <label for="<?php echo esc_html($this->get_field_id('google_url')); ?>"><?php esc_html_e( 'Google Url', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('google_url')); ?>"
                   id="<?php echo esc_html($this->get_field_id('google_url')); ?>" value="<?php if( !empty( $instance['google_url'] ) ): echo esc_attr($instance['google_url']); endif; ?>"
                   class="widefat"/>
        </p>       
        <p>
            <label for="<?php echo esc_html($this->get_field_id('inst_title')); ?>"><?php esc_html_e( 'Instagram Title', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('inst_title')); ?>"
                   id="<?php echo esc_html($this->get_field_id('inst_title')); ?>" value="<?php if( !empty( $instance['inst_title'] ) ): echo esc_attr($instance['inst_title']); endif; ?>"
                   class="widefat"/>
        </p>
         <p>
            <label for="<?php echo esc_html($this->get_field_id('dribbble')); ?>"><?php esc_html_e( 'Dribbble Url', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('dribbble')); ?>"
                   id="<?php echo esc_html($this->get_field_id('dribbble')); ?>" value="<?php if( !empty( $instance['dribbble'] ) ): echo esc_attr($instance['dribbble']); endif; ?>"
                   class="widefat"/>
        </p>              
        <p>
            <label for="<?php echo esc_html($this->get_field_id('behance')); ?>"><?php esc_html_e( 'Behance Url', 'pixfly' ); ?></label><br/>
            <input type="text" name="<?php echo esc_html($this->get_field_name('behance')); ?>"
                   id="<?php echo esc_html($this->get_field_id('behance')); ?>" value="<?php if( !empty( $instance['behance'] ) ): echo esc_attr($instance['behance']); endif; ?>"
                   class="widefat"/>
        </p>  
  
    <?php
    }
      
  /**
     * Update widget.
     *
     */
   
  public function update( $new_instance, $old_instance ) {
    $instance                   = $old_instance;
    $instance['social_title']       = sanitize_text_field( $new_instance['social_title'] );
    $instance['facebook_url']       = esc_url_raw( $new_instance['facebook_url'] );
    $instance['twitter_url']      = esc_url_raw( $new_instance['twitter_url'] );
    $instance['google_url']       = esc_url_raw( $new_instance['google_url'] );
    $instance['inst_title']       = esc_url_raw( $new_instance['inst_title'] );
    $instance['dribbble']         = esc_url_raw( $new_instance['dribbble'] );
    $instance['behance']        = esc_url_raw( $new_instance['behance'] );
    return $instance;
  }
  
}
register_widget( 'Pixfly_Premium' );
?>