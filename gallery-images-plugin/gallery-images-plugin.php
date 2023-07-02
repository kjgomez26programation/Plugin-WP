<?php
/*
Plugin Name:gallery-images-plugin
Plugin URI: www.galleryimagesplugin.com
Description: Create and display image galleries in WordPress.
Version: 1.0.0
Author:Kjgomezpromation
Author URI:https://github.com/kjgomez26programation
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

// Your plugin code will come here

//shortcode 

// ...

// Registra y encola los estilos CSS
function gallery_images_plugin_enqueue_styles() {
    wp_enqueue_style('gallery-images-plugin-style', plugin_dir_url(__FILE__) . 'assets/css/gallery.css', array(), '1.0', 'all');
  }
  add_action('wp_enqueue_scripts', 'gallery_images_plugin_enqueue_styles');

// Registra y encola los scripts JavaScript
function gallery_images_plugin_enqueue_scripts() {
    wp_enqueue_script('gallery-images-plugin-script', plugin_dir_url(__FILE__) . 'assets/js/gallery.js', array('jquery'), '1.0', true);
  }
  add_action('wp_enqueue_scripts', 'gallery_images_plugin_enqueue_scripts');

// ...

function mi_plugin_galeria_shortcode($atts) {
    // Atributos del shortcode (opciones personalizables)
    $atts = shortcode_atts(array(
      'tamano_miniatura' => '100px',
    ), $atts);
  
    // Ruta de la carpeta de imágenes
    $image_folder = plugin_dir_url(__FILE__) . 'assets/img/';
  
    // Genera el HTML de la galería
    ob_start();
    ?>
    <div class="gallery-container">
      <?php for ($i = 1; $i <= 7; $i++) : ?>
        <?php $imagen = $image_folder . $i . '.jpg'; ?>
        <img src="<?php echo esc_url($imagen); ?>" alt="Imagen" class="gallery-thumbnail" style="width: <?php echo esc_attr($atts['tamano_miniatura']); ?>">
      <?php endfor; ?>
    </div>
    <img src="<?php echo esc_url($image_folder . '1.jpg'); ?>" alt="Imagen" class="gallery-main-image">
    <?php
    return ob_get_clean();
  }
  add_shortcode('mi_plugin_galeria', 'mi_plugin_galeria_shortcode');