<?php
/**
 *
 */
class Steel_Widget_Button extends WP_Widget {

  function __construct() {
    $widget_ops = array(
      'classname' => 'steel-widget-button',
      'description' => __('A widget that displays a linked button', 'steel')
    );
    $control_ops = array(
      'width' => 300,
      'height' => 350,
      'id_base' => 'steel-widget-button'
    );
    $this->__construct( 'steel-widget-button', __('Steel: Button', 'steel'), $widget_ops, $control_ops );
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
    if ( $title ) { echo '<p><a class="'. $style . '" href=' . $href . ' type="button">' . $title . '</a></p>'; }
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
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'steel'); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e('Link:', 'steel'); ?></label>
      <input id="<?php echo $this->get_field_id( 'href' ); ?>" name="<?php echo $this->get_field_name( 'href' ); ?>" value="<?php echo $href; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e('Button Style:', 'steel'); ?></label>
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
