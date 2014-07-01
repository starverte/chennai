<?php
/**
 * Flint functions and definitions
 *
 * @package Flint\Chennai
 * @since Chennai 0.9
 */

function flint_custom_header_setup() {
  $default_image = get_template_directory_uri();
  $args = array(
    'default-image'          => $default_image.'/inc/default-header.png',
    'default-text-color'     => '00a6e5',
    'width'                  => 360,
    'height'                 => 240,
    'flex-height'            => true,
    'random-default'     => true,
    'wp-head-callback'       => 'flint_header_style',
    'admin-head-callback'    => 'flint_admin_header_style',
    'admin-preview-callback' => 'flint_admin_header_image',
  );

  $args = apply_filters( 'flint_custom_header_args', $args );

  if ( function_exists( 'wp_get_theme' ) ) {
    add_theme_support( 'custom-header', $args );
  } else {
    // Compat: Versions of WordPress prior to 3.4.
    define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
    define( 'HEADER_IMAGE',        $args['default-image'] );
    define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
    define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
    add_custom_image_header( $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
  }

  register_default_headers( array(
    'basha' => array(
      'url' => '%2$s/img/headers/basha.jpg',
      'thumbnail_url' => '%2$s/img/headers/basha-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'basha', 'chennai' )
    ),
    'danalakshmi' => array(
      'url' => '%2$s/img/headers/danalakshmi.jpg',
      'thumbnail_url' => '%2$s/img/headers/danalakshmi-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'danalakshmi', 'chennai' )
    ),
    'mani' => array(
      'url' => '%2$s/img/headers/mani.jpg',
      'thumbnail_url' => '%2$s/img/headers/mani-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'mani', 'chennai' )
    ),
    'radha' => array(
      'url' => '%2$s/img/headers/radha.jpg',
      'thumbnail_url' => '%2$s/img/headers/radha-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'radha', 'chennai' )
    ),
    'sendhamarai' => array(
      'url' => '%2$s/img/headers/sendhamarai.jpg',
      'thumbnail_url' => '%2$s/img/headers/sendhamarai-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'sendhamarai', 'chennai' )
    ),
    'shanthammal' => array(
      'url' => '%2$s/img/headers/shanthammal.jpg',
      'thumbnail_url' => '%2$s/img/headers/shanthammal-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'shanthammal', 'chennai' )
    ),
    'siva-kumar' => array(
      'url' => '%2$s/img/headers/siva-kumar.jpg',
      'thumbnail_url' => '%2$s/img/headers/siva-kumar-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'siva-kumar', 'chennai' )
    ),
    'vijayalakshmi' => array(
      'url' => '%2$s/img/headers/vijayalakshmi.jpg',
      'thumbnail_url' => '%2$s/img/headers/vijayalakshmi-thumb.jpg',
      /* translators: header image description */
      'description' => __( 'vijayalakshmi', 'chennai' )
    )
  ) );
}
// BEGIN - Create custom fields
add_action( 'add_meta_boxes', 'chennai_add_custom_boxes' );

function chennai_add_custom_boxes() {
  if (has_term('Beneficiaries', 'sp_cause_type')) {
  add_meta_box('chennai_beneficiary_meta', 'Beneficiary Details', 'chennai_beneficiary_meta', 'sp_cause', 'side', 'high');
  }
}

/* Cause Details */
function chennai_beneficiary_meta() {
  global $post;
  $custom = get_post_custom($post->ID);

?>
    <p><label>Native Language</label>
  <input type="text" size="10" name="cause_lang" value="<?php if (isset($custom['cause_lang'])) { echo $custom["cause_lang"] [0]; } ?>" /></p>
    <p><label>Native Area</label>
  <input type="text" size="10" name="cause_home" value="<?php if (isset($custom['cause_home'])) { echo $custom["cause_home"] [0]; } ?>" /></p>
    <p><label>Physical Ailments</label>
  <input type="text" size="10" name="cause_ailments" value="<?php if (isset($custom['cause_ailments'])) { echo $custom["cause_ailments"] [0]; } ?>" /></p>
<?php }

/* Save Details */
add_action('save_post', 'save_chennai_beneficiary_details');

function save_chennai_beneficiary_details(){
  global $post;
  $custom = get_post_custom($post->ID);
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE && (isset($post_id)) ) {
  return $post_id;
  }

  if( defined('DOING_AJAX') && DOING_AJAX && (isset($post_id)) ) { //Prevents the metaboxes from being overwritten while quick editing.
  return $post_id;
  }

  if( ereg('/\edit\.php', $_SERVER['REQUEST_URI']) && (isset($post_id)) ) { //Detects if the save action is coming from a quick edit/batch edit.
  return $post_id;
  }
  // save all meta data
  if (isset($_POST['cause_lang'])) {
    update_post_meta($post->ID, "cause_lang", $_POST["cause_lang"]);
  }
  if (isset($_POST['cause_home'])) {
    update_post_meta($post->ID, "cause_home", $_POST["cause_home"]);
  }
  if (isset($_POST['cause_ailments'])) {
    update_post_meta($post->ID, "cause_ailments", $_POST["cause_ailments"]);
  }
}
// END - Custom Fields
function cause_lang( $before = '<div class="cause-lang">Tongue: <span>' , $after = '</span></div>' ) {
  $custom = get_post_custom();
  if (isset($custom['cause_lang']) && !empty($custom['cause_lang'] [0])) {
    $cause_lang = $custom["cause_lang"] [0];
    printf( $before . $cause_lang . $after);
  }
}
function cause_home( $before = '<div class="cause-home">' , $after = '</div>' ) {
  $custom = get_post_custom();
  if (isset($custom['cause_home']) && !empty($custom['cause_home'] [0])) {
    $cause_home = $custom["cause_home"] [0];
    printf( $before . $cause_home . $after);
  }
}
function cause_ailments( $before = '<div class="cause-ailments">' , $after = '</div>' ) {
  $custom = get_post_custom();
  if (isset($custom['cause_ailments']) && !empty($custom['cause_ailments'] [0])) {
    $cause_ailments = $custom["cause_ailments"] [0];
    printf( $before . $cause_ailments . $after);
  }
}
