<?php
/**
 * Deprecated functions for backwards compatibility
 *
 * @package Steel
 * @since 1.3.0
 */

/**
 * Mark a function as deprecated and inform when it has been used.
 *
 * There is a hook deprecated_function_run that will be called that can be used
 * to get the backtrace up to what file and function called the deprecated
 * function.
 *
 * The current behavior is to trigger a user error if WP_DEBUG is true.
 *
 * This function is to be used in every function that is deprecated.
 *
 * @param string $function    The function that was called.
 * @param string $version     The version of Steel that deprecated the function.
 * @param string $replacement Optional. The function that should have been called. Default null.
 */
function steel_deprecated_function( $function, $version, $replacement = '' ) {

  /**
   * Filter whether to trigger an error for deprecated functions.
   *
   * @param bool $trigger Whether to trigger the error for deprecated functions. Default true.
   */
  if ( WP_DEBUG && apply_filters( 'deprecated_function_trigger_error', true ) ) {
		if ( ! is_null( $replacement ) ) {
			trigger_error( sprintf( __( '%1$s is <strong>deprecated</strong> since Steel version %2$s! Use %3$s instead.', 'steel' ), $function, $version, $replacement ) );
			} else {
			trigger_error( sprintf( __( '%1$s is <strong>deprecated</strong> since Steel version %2$s with no alternative available.', 'steel' ), $function, $version ) );
			}
  }
}

/**
 * Returns current plugin version.
 *
 * @deprecated 1.2.0 Use actual version number instead.
 *
 * @todo Remove backwards compatibility in Steel 1.4
 */
function steel_version() {
  steel_deprecated_function( __FUNCTION__, '1.2.0' );
  $steel_plugin_data = get_plugin_data( dirname( __FILE__ ) . '/steel.php', false );
  return $steel_plugin_data['Version'];
}

/**
 * Display Team Profile Title
 *
 * @deprecated 1.2.6 Use steel_profile_meta() instead
 */
function profile_title() {
  steel_deprecated_function( __FUNCTION__, '1.2.6', 'steel_profile_meta()' );
  echo steel_profile_meta( 'title' );
}

/**
 * Display Team Profile Email
 *
 * @deprecated 1.2.6 Use steel_profile_meta() instead
 */
function profile_email() {
  steel_deprecated_function( __FUNCTION__, '1.2.6', 'steel_profile_meta()' );
  echo steel_profile_meta( 'email' );
}

/**
 * Display profile phone number
 *
 * @deprecated 1.2.6 Use steel_profile_phone() instead
 *
 * @param string $pattern The format to display the phone number.
 */
function profile_phone( $pattern = '$1.$2.$3' ) {
  steel_deprecated_function( __FUNCTION__, '1.2.6', 'steel_profile_phone()' );
  echo steel_profile_phone( $pattern );
}

/**
 * Check to see if theme Flint is active.
 *
 * @deprecated 1.3.0
 */
function is_flint_active() {
  steel_deprecated_function( __FUNCTION__, '1.3.0' );
  return steel_is_flint_active();
}

/**
 * Generate Like button
 *
 * @deprecated 1.3.0 Use steel_btn_like()
 *
 * @param array $args An array of arguments.
 */
function like_this( $args = array() ) {
  steel_deprecated_function( __FUNCTION__, '1.3.0', 'steel_btn_like()' );
  return steel_btn_like( $args );
}

/**
 * Generate Pin It button (Pinterest)
 *
 * @deprecated 1.3.0 Use steel_btn_pin_it()
 *
 * @param array $args An array of arguments.
 */
function pin_it( $args = array() ) {
  steel_deprecated_function( __FUNCTION__, '1.3.0', 'steel_btn_pin_it()' );
  return steel_btn_pin_it( $args );
}

/**
 * Check to see if a particular Steel module is active.
 *
 * @deprecated 1.3.0 Use steel_module_status()
 *
 * @param string $module The name of the module to check status for.
 */
function is_module_active( $module ) {
  steel_deprecated_function( __FUNCTION__, '1.3.0', 'steel_module_status()' );
  return steel_module_status( $module );
}

/**
 * Generate Tweet button
 *
 * @deprecated 1.3.0 Use steel_btn_tweet()
 *
 * @param string $data_count The direction to display the Tweet count (horizontal, vertical, or none).
 * @param string $data_size  The size of the button (default or large).
 * @param string $data_via   The attribution will appear in a Tweet as " via @username" translated into the language of the Tweet author.
 * @param array  $args       An array of additional arguments.
 */
function tweet_this( $data_count = 'horizontal', $data_size = '', $data_via = '', $args = array() ) {
  steel_deprecated_function( __FUNCTION__, '1.3.0', 'steel_btn_tweet()' );
  return steel_btn_tweet( $data_count, $data_size, $data_via, $args );
}

/**
 * Steel_Link_Widget
 *
 * @deprecated 1.3.0 Use Steel_Widget_Button
 */
class Steel_Link_Widget extends WP_Widget {

  /**
   * PHP5 constructor
   */
  function __construct() {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Button' );
		$widget_ops = array(
		'classname' => 'link-widget',
		'description' => __( 'A widget that only displays a title with a link', 'steel' ),
		);
		$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'link-widget',
		);
		$this->__construct( 'link-widget', __( 'Steel: Custom Link Widget (deprecated)', 'steel' ), $widget_ops, $control_ops );
  }

  /**
   * Echo the widget content.
   *
   * @param array $args     Display arguments including before_title, after_title,
   *                        before_widget, and after_widget.
   * @param array $instance The settings for the particular instance of the widget.
   */
  function widget( $args, $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Button' );
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$href = $instance['href'];
		$style = strtolower( $instance['style'] );
		switch ( $style ) {
			case 'default':
				$style = 'btn btn-block btn-default';
			break;
			case 'primary':
				$style = 'btn btn-block btn-primary';
			break;
			case 'info':
				$style = 'btn btn-block btn-info';
			break;
			case 'success':
				$style = 'btn btn-block btn-success';
			break;
			case 'warning':
				$style = 'btn btn-block btn-warning';
			break;
			case 'danger':
				$style = 'btn btn-block btn-danger';
			break;
			case 'inverse':
				$style = 'btn btn-block btn-inverse';
			break;
			case 'link':
				$style = 'btn btn-block btn-link';
			break;
			}
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
		if ( $title ) { echo '<p><a class="' . $style . '" href=' . $href . ' type="button">' . $title . '</a></p>'; }
  }

  /**
   * Update a particular instance.
   *
   * This function should check that $new_instance is set correctly. The newly-calculated
   * value of `$instance` should be returned. If false is returned, the instance won't be
   * saved/updated.
   *
   * @param array $new_instance New settings for this instance as input by the user.
   * @param array $old_instance Old settings for this instance.
   * @return array Settings to save or bool false to cancel saving.
   */
  function update( $new_instance, $old_instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Button' );
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['href']  = strip_tags( $new_instance['href'] );
		$instance['style'] = strip_tags( $new_instance['style'] );
		return $instance;
  }

  /**
   * Output the settings update form.
   *
   * @param array $instance Current settings.
   */
  function form( $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Button' );
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$href  = ! empty( $instance['href'] )  ? $instance['href']  : 'http://';
		$style = ! empty( $instance['style'] ) ? $instance['style'] : ''; ?>

																			<p>
																			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'steel' ); ?></label>
																			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" style="width:100%;" />
																			</p>
																			<p>
																			<label for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e( 'Link:', 'steel' ); ?></label>
																			<input id="<?php echo $this->get_field_id( 'href' ); ?>" name="<?php echo $this->get_field_name( 'href' ); ?>" value="<?php echo $href; ?>" style="width:100%;" />
																			</p>
																			<p>
																			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Button Style:', 'steel' ); ?></label>
																			<input id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" value="<?php echo $style; ?>" style="width:100%;" />
																			</p>
																			<div class="btn-group" data-toggle="buttons-radio">
																			<button type="button" class="btn">Default</button>
																			<button type="button" class="btn btn-primary">Primary</button>
																			<button type="button" class="btn btn-info">Info</button>
																			<button type="button" class="btn btn-success">Success</button>
																			<button type="button" class="btn btn-warning">Warning</button>
																			<button type="button" class="btn btn-danger">Danger</button>
																			<button type="button" class="btn btn-inverse">Inverse</button>
																			<button type="button" class="btn btn-link">Link</button>
																			</div><?php
  }
}

/**
 * Steel_Link_Widget_Legacy
 *
 * @deprecated 1.3.0 Use Steel_Widget_Link
 */
class Steel_Link_Widget_Legacy extends WP_Widget {

  /**
   * PHP5 constructor
   */
  function __construct() {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Link' );
		$widget_ops = array(
		'classname' => 'link-widget-legacy',
		'description' => __( 'A widget that only displays a title with a link', 'steel' ),
		);
		$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'link-widget-legacy',
		);
		$this->__construct( 'link-widget-legacy', __( 'Steel: Custom Link Widget (deprecated)', 'steel' ), $widget_ops, $control_ops );
  }

  /**
   * Echo the widget content.
   *
   * @param array $args     Display arguments including before_title, after_title,
   *                        before_widget, and after_widget.
   * @param array $instance The settings for the particular instance of the widget.
   */
  function widget( $args, $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Link' );
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$href = $instance['href'];
		$class = $instance['class'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
		if ( $title ) { echo '<a class="link-widget-link ' . $class . '" href=' . $href . '>' . $before_widget . $before_title . $title . $after_title . $after_widget . '</a>'; }
  }

  /**
   * Update a particular instance.
   *
   * This function should check that $new_instance is set correctly. The newly-calculated
   * value of `$instance` should be returned. If false is returned, the instance won't be
   * saved/updated.
   *
   * @param array $new_instance New settings for this instance as input by the user.
   * @param array $old_instance Old settings for this instance.
   * @return array Settings to save or bool false to cancel saving.
   */
  function update( $new_instance, $old_instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Link' );
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['href'] = strip_tags( $new_instance['href'] );
		$instance['class'] = strip_tags( $new_instance['class'] );
		return $instance;
  }

  /**
   * Output the settings update form.
   *
   * @param array $instance Current settings.
   */
  function form( $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Link' );
		$defaults = array( 'title' => __( '', 'link-widget-legacy' ), 'show_info' => true );
		$defaults = array( 'href' => __( 'http://', 'link-widget-legacy' ), 'show_info' => true );
		$defaults = array( 'class' => __( '', 'link-widget-legacy' ), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

																	<p>
																	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'steel' ); ?></label>
																	<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if ( ! empty( $instance['title'] ) ) { echo $instance['title']; } ?>" style="width:100%;" />
																	</p>
																	<p>
																	<label for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e( 'Link:', 'steel' ); ?></label>
																	<input id="<?php echo $this->get_field_id( 'href' ); ?>" name="<?php echo $this->get_field_name( 'href' ); ?>" value="<?php if ( ! empty( $instance['href'] ) ) { echo $instance['href']; } ?>" style="width:100%;" />
																	</p>
																	<p>
																	<label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'Classes:', 'steel' ); ?></label>
																	<input id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" value="<?php echo $instance['class']; ?>" style="width:100%;" />
																	</p><?php
  }
}

/**
 * Steel_Nav_Menu_Widget
 *
 * @deprecated 1.3.0 Use Steel_Widget_List_Group
 */
class Steel_Nav_Menu_Widget extends WP_Widget {

  /**
   * PHP5 constructor
   */
  function __construct() {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_List_Group' );
		$widget_ops = array(
		'description' => __( 'Add a custom menu to your sidebar.' ),
		);
		parent::__construct( 'steel_nav_menu_widget', __( 'Steel: Menu Panel (deprecated)' ), $widget_ops );
  }

  /**
   * Echo the widget content.
   *
   * @param array $args     Display arguments including before_title, after_title,
   *                        before_widget, and after_widget.
   * @param array $instance The settings for the particular instance of the widget.
   */
  function widget( $args, $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_List_Group' );
		$nav_menu = ! empty( $instance['steel_nav_menu_widget'] ) ? wp_get_nav_menu_object( $instance['steel_nav_menu_widget'] ) : false;

		if ( ! $nav_menu ) {
			return;
			}

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo '<div class="panel panel-default">';

		if ( ! empty( $instance['title'] ) ) {
			echo '<div class="panel-heading"><h3 class="panel-title">' . $instance['title'] . '</h3></div>';
			}

		Steel_Walker_Nav_Menu_List_Group( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );

		echo '</div>';
  }

  /**
   * Update a particular instance.
   *
   * This function should check that $new_instance is set correctly. The newly-calculated
   * value of `$instance` should be returned. If false is returned, the instance won't be
   * saved/updated.
   *
   * @param array $new_instance New settings for this instance as input by the user.
   * @param array $old_instance Old settings for this instance.
   * @return array Settings to save or bool false to cancel saving.
   */
  function update( $new_instance, $old_instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_List_Group' );
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['steel_nav_menu_widget'] = (int) $new_instance['steel_nav_menu_widget'];
		return $instance;
  }

  /**
   * Output the settings update form.
   *
   * @param array $instance Current settings.
   * @return string Default return is 'noform'.
   */
  function form( $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_List_Group' );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['steel_nav_menu_widget'] ) ? $instance['steel_nav_menu_widget'] : '';

		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

		if ( ! $menus ) {
			echo '<p>' . sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), admin_url( 'nav-menus.php' ) ) . '</p>';
			return;
			} ?>

				<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
				</p>
				<p>
				<label for="<?php echo $this->get_field_id( 'steel_nav_menu_widget' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'steel_nav_menu_widget' ); ?>" name="<?php echo $this->get_field_name( 'steel_nav_menu_widget' ); ?>">
				<?php
				foreach ( $menus as $menu ) {
					echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>' . $menu->name . '</option>';
					}
				?>
				</select>
				</p>
				<?php
  }
}

/**
 * Steel_Quotes_Widget
 *
 * @deprecated 1.3.0 Use Steel_Widget_Random_Quote
 */
class Steel_Quotes_Widget extends WP_Widget {

  /**
   * PHP5 constructor
   */
  function __construct() {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Random_Quote' );
		$widget_ops = array(
		'classname' => 'random-quotes-widget',
		'description' => __( 'Displays a random quote', 'steel' ),
		);
		$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'random-quotes-widget',
		);
		$this->__construct( 'random-quotes-widget', __( 'Steel: Random Quotes (deprecated)', 'steel' ), $widget_ops, $control_ops );
  }

  /**
   * Echo the widget content.
   *
   * @param array $args     Display arguments including before_title, after_title,
   *                        before_widget, and after_widget.
   * @param array $instance The settings for the particular instance of the widget.
   */
  function widget( $args, $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Random_Quote' );
		$cat = ! empty( $instance['cat'] ) ? get_category( $instance['cat'] ) : false;

		if ( ! $cat ) {
			return;
			}

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
			}

		$quotes = new WP_Query(
		array(
        'post_type' => 'post',
        'orderby' => 'rand',
        'posts_per_page' => 1,
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $cat->slug,
          ),
          array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 'post-format-quote' ),
          )
        ),
		)
		);

		while ( $quotes->have_posts() ) : $quotes->the_post(); ?>
			<blockquote><?php the_content(); ?></blockquote>
		  <?php endwhile;

		echo $args['after_widget'];
  }

  /**
   * Update a particular instance.
   *
   * This function should check that $new_instance is set correctly. The newly-calculated
   * value of `$instance` should be returned. If false is returned, the instance won't be
   * saved/updated.
   *
   * @param array $new_instance New settings for this instance as input by the user.
   * @param array $old_instance Old settings for this instance.
   * @return array Settings to save or bool false to cancel saving.
   */
  function update( $new_instance, $old_instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Random_Quote' );
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['list'] = (int) $new_instance['list'];
		return $instance;
  }

  /**
   * Output the settings update form.
   *
   * @param array $instance Current settings.
   */
  function form( $instance ) {
		steel_deprecated_function( __CLASS__, '1.3.0', 'Steel_Widget_Random_Quote' );
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$list  = ! empty( $instance['list'] )  ? $instance['list']  : '';

		$cats = get_categories();
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ) ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'list' ); ?>"><?php _e( 'Category:' ); ?></label>
		<select id="<?php echo $this->get_field_id( 'list' ); ?>" name="<?php echo $this->get_field_name( 'list' ); ?>">
        <option value="">All Categories</option>
        <?php
          foreach ( $cats as $cat ) {
            $option  = '<option value="' . $cat->term_id . '" ' . selected( $list, $cat->term_id ) . '>';
            $option .= $cat->cat_name;
            $option .= '</option>';
            echo $option;
			}
        ?>
		</select>
		</p>
		<?php
  }
}

/**
 * Retrieve an image to represent an attachment.
 *
 * A mime icon for files, thumbnail or intermediate size for images.
 *
 * @see WordPress 4.3.1 wp_get_attachment_image_src()
 *
 * @param int          $attachment_id Image attachment ID.
 * @param string|array $size          Optional. Registered image size to retrieve the source for
 *                                    or a flat array of height and width dimensions.
 *                                    Default 'thumbnail'.
 * @param bool         $icon          Optional. Whether the image should be treated as an icon.
 *                                    Default false.
 * @return false|array Returns an array (url, width, height), or false, if no image is available.
 */
function steel_get_image_url( $attachment_id, $size = 'thumbnail', $icon = false ) {
  steel_deprecated_function( __FUNCTION__, '1.4.0', 'wp_get_attachment_image_url' );
  $image = wp_get_attachment_image_src( $attachment_id, $size, $icon );
  return $image[0];
}

/**
 * Retrieve post meta field, based on post ID and key.
 *
 * The post meta fields are retrieved from the cache where possible,
 * so the function is optimized to be called more than once.
 *
 * @see WordPress 4.3.1 get_post_custom()
 *
 * @param string $key     The meta key minus the module prefix.
 * @param int    $post_id Optional. Post ID. Default is ID of the global $post.
 * @return string Value for post meta for the given post and given key.
 */
function steel_slides_meta( $key, $post_id = 0 ) {
  steel_deprecated_function( __FUNCTION__, '1.4.0', 'UNDEFINED' );
  $meta = steel_meta( 'slides', $key, $post_id );
  return $meta;
}

/**
 * Display Slideshow by id
 *
 * @param int          $post_id The post ID of the slideshow.
 * @param string|array $size    Optional. Registered image size to retrieve the source for
 *                              or a flat array of height and width dimensions. Default 'full'.
 * @param string       $name    Name of slideshow to use as identifier. Default is $post_id.
 */
function steel_slideshow( $post_id, $size = 'full', $name = '' ) {
  steel_deprecated_function( __FUNCTION__, '1.4.0', 'UNDEFINED' );

  if ( 0 === $post_id ) {
		return;
  }

  $name = empty( $name ) ? $post_id : $name;

  $slides_media      = steel_slides_meta( 'media'     , $post_id );
  $slides_order      = steel_slides_meta( 'order'     , $post_id );
  $slides_media_url  = steel_slides_meta( 'media_url' , $post_id );
  $slides_skin       = steel_slides_meta( 'skin'      , $post_id );
  $slides_transition = steel_slides_meta( 'transition', $post_id );

  $slides_skin       = empty( $slides_skin )       ? 'Default' : $slides_skin;
  $slides_transition = empty( $slides_transition ) ? 'Default' : $slides_transition;

  $slides_class  = 'carousel slide';
  $slides_class .= ' carousel-' . strtolower( $slides_skin );
  $slides_class .= 'Default' !== $slides_transition ? ' carousel-' . strtolower( $slides_transition ) : '' ;

  $slides = explode( ',', $slides_order );

  $output     = '';
  $indicators = '';
  $items      = '';
  $controls   = '';
  $count      = -1;
  $i          = -1;
  $total      = -1;

  foreach ( $slides as $slide ) {
		if ( ! empty( $slide ) && false !== get_post_status( $slide ) ) {
			$total += 1;
			}
  }

  $col_lg = floor( 12 / max( ( $total + 1 ), 1 ) );
  $rem_lg = 12 - ( $col_lg * ( $total + 1 ) );
  $spc_lg = floor( $rem_lg / 2 );

  if ( 'Gallery' !== $slides_skin ) {
		$carousel_div = '<div id="carousel_' . $name . '" class="' . $slides_class . '" data-ride="carousel">';

		foreach ( $slides as $slide ) {
			if ( ! empty( $slide ) && false !== get_post_status( $slide ) ) {
				$image   = wp_get_attachment_image_src( $slide, $size );
				$title   = steel_slides_meta( 'title_' . $slide, $post_id );
				$content = steel_slides_meta( 'content_' . $slide, $post_id );
				$link    = steel_slides_meta( 'link_' . $slide, $post_id );
				$i += 1;

				$items .= $i >= 1 ? '<div class="item">' : '<div class="item active">';
				$items .= ! empty( $link ) ? '<a href="' . $link . '">' : '';
				$items .= '<img id="slide_img_' . $slide . '" src="' . $image[0] . '" alt="' . $title . '">';
				$items .= ! empty( $link ) ? '</a>' : '';

				if ( ! empty( $title ) || ! empty( $content ) ) {
					$items .= '<div class="carousel-caption">';
					if ( 'Bar' !== $slides_skin ) {
						if ( ! empty( $title ) ) { $items .= '<h3 id="slides_title_' . $slide . '">' . $title . '</h3>'; }
						if ( ! empty( $content ) ) { $items .= '<p class="hidden-xs" id="slides_content_' . $slide . '">' . $content . '</p>' ; }
					} else {
						if ( ! empty( $title ) ) { $items .= '<p id="slides_title_' . $slide . '">' . $title . '</p>'; }
					}
					$items .= '</div>';// .carousel-caption
				}
				$items .= '</div>';// .item
			}
			}
  } else {
		$carousel_div = '<div id="carousel_' . $name . '" class="row carousel-gallery">';

		foreach ( $slides as $slide ) {
			if ( ! empty( $slide ) && false !== get_post_status( $slide ) ) {
				$count += 1;
				$image  = wp_get_attachment_image_src( $slide, 'full' );
				$title  = steel_slides_meta( 'title_' . $slide, $post_id );
				$link   = steel_slides_meta( 'link_' . $slide, $post_id );

				$items .= '<span class="col-lg-' . $col_lg . ' col-md-' . $col_lg . '">';
				$items .= ! empty( $link ) ? '<a href="' . $link . '">' : '';
				$items .= '<img id="slide_thumb_' . $slide . '" src="' . $image[0] . '" alt="' . $title . '">';
				$items .= ! empty( $link ) ? '</a>' : '';
				$items .= '</span>';
			}
			}
  }

  if ( empty( $slides_skin ) || 'Default' === $slides_skin ) {
		$indicators .= '<ol class="carousel-indicators">';
		foreach ( $slides as $slide ) {
			if ( ! empty( $slide ) && false !== get_post_status( $slide ) ) {
				$count += 1;
				$indicators .= $count >= 1 ? '<li data-target="#carousel_' . $post_id . '" data-slide-to="' . $count . '"></li>' : '<li data-target="#carousel_' . $post_id . '" data-slide-to="' . $count . '" class="active"></li>';
			}
			}
		$indicators .= '</ol>';
  } elseif ( 'Tabs' === $slides_skin ) {
		$indicators .= '<ol class="nav nav-tabs carousel-indicators">';
		foreach ( $slides as $slide ) {
			if ( ! empty( $slide ) && false !== get_post_status( $slide ) ) {
				$count += 1;
				$title   = steel_slides_meta( 'title_' . $slide, $post_id );
				$indicators .= $count >= 1 ? '<li data-target="#carousel_' . $post_id . '" data-slide-to="' . $count . '"><a href="#carousel_' . $post_id . '">' . $title . '</a></li>' : '<li class="active" data-target="#carousel_' . $post_id . '" data-slide-to="' . $count . '"><a href="#carousel_' . $post_id . '">' . $title . '</a></li>';
			}
			}
		$indicators .= '</ol>';
  } elseif ( 'Thumbnails' === $slides_skin ) {
		$indicators .= '<div class="carousel-thumbs hidden-sm hidden-xs">';
		$indicators .= '<span class="col-lg-' . $spc_lg . ' col-md-' . $spc_lg . '"></span>';
		foreach ( $slides as $slide ) {
			if ( ! empty( $slide ) && false !== get_post_status( $slide ) ) {
				$count += 1;
				$image   = wp_get_attachment_image_src( $slide, 'steel-slide-thumb' );
				$title   = steel_slides_meta( 'title_' . $slide, $post_id );
				$indicators .= $count >= 1 ? '<span class="col-lg-' . $col_lg . ' col-md-' . $col_lg . '" data-target="#carousel_' . $post_id . '" data-slide-to="' . $count . '"><img id="slide_thumb_' . $slide . '" src="' . $image[0] . '" alt="' . $title . '"></span>' : '<span class="col-lg-' . $col_lg . ' col-md-' . $col_lg . '" data-target="#carousel_' . $post_id . '" data-slide-to="' . $count . '"><img id="slide_thumb_' . $slide . '" src="' . $image[0] . '" alt="' . $title . '"></span>';
			}
			}
		$indicators .= '<span class="col-lg-' . $spc_lg . ' col-md-' . $spc_lg . '"></span>';
		$indicators .= '</div>';
  } elseif ( 'Gallery' === $slides_skin ) {
		$indicators = '';
  }

  $controls .= ( 'Simple' === $slides_skin ) ? '<div class="carousel-controls">' : '';
  $controls .= '<a class="left carousel-control" href="#carousel_' . $post_id . '" data-slide="prev"><span class="icon-prev"></span></a>';
  $controls .= '<a class="right carousel-control" href="#carousel_' . $post_id . '" data-slide="next"><span class="icon-next"></span></a>';
  $controls .= ( 'Simple' === $slides_skin ) ? '</div>' : '';

  $output .= 'Tabs' === $slides_skin ? $indicators : '';
  $output .= $carousel_div;
  $output .= empty( $slides_skin ) || 'Default' === $slides_skin ? $indicators : '';
  $output .= 'Gallery' === $slides_skin ? '' : '<div class="carousel-inner">';
  $output .= $items;
  $output .= 'Gallery' === $slides_skin ? '' : '</div>';
  $output .= 'Gallery' === $slides_skin ? '' : $controls;
  $output .= '</div>';
  $output .= 'Thumbnails' === $slides_skin ? $indicators : '';

  return $output;
}

/**
 * Builds the Slideshow shortcode output.
 *
 * This implements the functionality of the Slideshow Shortcode for displaying
 * a slideshow in a post.
 *
 * @see WordPress 4.3.1 add_shortcode()
 * @see WordPress 4.3.1 wp_video_shortcode()
 *
 * @internal
 *
 * @param array  $attr Attributes of the shortcode.
 * @param string $content Shortcode content.
 * @return string|void HTML content to display slideshow.
 */
function steel_slideshow_shortcode( $attr, $content = '' ) {
  steel_deprecated_function( __FUNCTION__, '1.4.0', 'UNDEFINED' );

  extract( shortcode_atts( array( 'id' => 0, 'name' => '', 'size' => 'full' ), $attr ) );

  if ( ! empty( $id ) ) {
		return steel_slideshow( $id, $size );
  } elseif ( ! empty( $name ) ) {
		$show = get_page_by_title( $name, OBJECT, 'steel_slides' );
		if ( ! empty( $show ) ) {
			return steel_slideshow( $show->ID, $size, $name );
			}
  } else {
		return;
  }
}
add_shortcode( 'steel_slideshow', 'steel_slideshow_shortcode' );

/**
 * Return IDs for all slideshows
 */
function steel_get_slides() {
  steel_deprecated_function( __FUNCTION__, '1.4.0', 'UNDEFINED' );
  $args = array( 'post_type' => 'steel_slides', 'posts_per_page' => -1 );
  $slideshows = get_posts( $args );
  $slides = array();
  $slides[0] = 'None';
  if ( $slideshows ) {
		foreach ( $slideshows as $slideshow ) {
			$post_id = $slideshow->ID;
			$title = $slideshow->post_title;
			$slides[ $post_id ] = $title;
			}
		wp_reset_postdata();
  }
  return $slides;
}

/**
 * Sanitize options based on steel_get_slides
 *
 * @param mixed $input Unfiltered input.
 */
function steel_sanitize_get_slides( $input ) {
  steel_deprecated_function( __FUNCTION__, '1.4.0', 'UNDEFINED' );

  $valid = steel_get_slides( 'options' );

  if ( array_key_exists( $input, $valid ) ) {
		return $input;
  } else {
		return;
  }
}
