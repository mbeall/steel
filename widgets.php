<?php
/*
* Creates custom widgets
*
* @package Steel
* @module Widgets
*
*/

add_action( 'widgets_init', 'steel_widgets' );
function steel_widgets() {
  register_widget( 'Steel_Link_Widget' );
  register_widget( 'Steel_Link_Widget_Legacy' );
}

class Steel_Link_Widget extends WP_Widget {
  function Steel_Link_Widget() {
    $widget_ops = array( 'classname' => 'link-widget', 'description' => __('A widget that only displays a title with a link', 'link-widget') );
    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'link-widget' );
    $this->WP_Widget( 'link-widget', __('Steel: Custom Link Widget', 'link-widget'), $widget_ops, $control_ops );
  }
  
  function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    $href = $instance['href'];
    $style = strtolower($instance['style']);
    switch ($style) {
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
    if ( $title ) { echo '<a class="'. $style . '" href=' . $href . ' type="button">' . $title . '</a>'; }
  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance; 
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['href']  = strip_tags( $new_instance['href']  );
    $instance['style'] = strip_tags( $new_instance['style'] );
    return $instance;
  }
  
  function form( $instance ) {
    $title = !empty($instance['title']) ? $instance['title'] : '';
    $href  = !empty($instance['href'])  ? $instance['href']  : 'http://';
    $style = !empty($instance['style']) ? $instance['style'] : ''; ?>
    
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'link-widget'); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e('Link:', 'link-widget'); ?></label>
      <input id="<?php echo $this->get_field_id( 'href' ); ?>" name="<?php echo $this->get_field_name( 'href' ); ?>" value="<?php echo $href; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e('Button Style:', 'link-widget'); ?></label>
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

class Steel_Link_Widget_Legacy extends WP_Widget {  
  function Steel_Link_Widget_Legacy() {
    $widget_ops = array( 'classname' => 'link-widget-legacy', 'description' => __('A widget that only displays a title with a link', 'link-widget-legacy') );
    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'link-widget-legacy' );
    $this->WP_Widget( 'link-widget-legacy', __('Steel: Custom Link Widget (Legacy)', 'link-widget-legacy'), $widget_ops, $control_ops );
  }
    
  function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    $href = $instance['href'];
    $class = $instance['class'];
    $show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
    if ( $title ) { echo '<a class="link-widget-link '. $class . '" href=' . $href . '>' . $before_widget . $before_title . $title . $after_title . $after_widget . '</a>'; }
  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance; 
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['href'] = strip_tags( $new_instance['href'] );
    $instance['class'] = strip_tags( $new_instance['class'] );
    return $instance;
  }  
  
  function form( $instance ) {
    $defaults = array( 'title' => __('', 'link-widget-legacy'), 'show_info' => true );
    $defaults = array( 'href' => __('http://', 'link-widget-legacy'), 'show_info' => true );
    $defaults = array( 'class' => __('', 'link-widget-legacy'), 'show_info' => true );
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>
    
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'link-widget-legacy'); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e('Link:', 'link-widget-legacy'); ?></label>
      <input id="<?php echo $this->get_field_id( 'href' ); ?>" name="<?php echo $this->get_field_name( 'href' ); ?>" value="<?php echo $instance['href']; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e('Classes:', 'link-widget-legacy'); ?></label>
      <input id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" value="<?php echo $instance['class']; ?>" style="width:100%;" />
    </p><?php    
  }
}
?>
