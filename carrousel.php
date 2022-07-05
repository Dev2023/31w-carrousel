<?php 
/**
 * 
 * Description: Affiche dans une boîte modale le contenu d'une galerie d'image en animant le passage d'une image à l'autre
 * Author: Eddy Martin
 * Plugin URI: https://github.com/eddytuto
 */

    function carrousel_enqueue(){
        $version_js = filemtime(plugin_dir_path(__FILE__) . "script/carrousel.js");
        // var_dump($version_script); die();
        $version_css = filemtime(plugin_dir_path(__FILE__) . "style.css");

        wp_enqueue_style(   "carrou",
                            plugin_dir_url(__FILE__) . "style.css",
                            array(),
                            $version_css);

        wp_enqueue_script( "carrou",
                            plugin_dir_url(__FILE__) . "script/carrousel.js",
                            array(),
                            $version_js,
                            true);
    }
        
    add_action('wp_enqueue_scripts', 'carrousel_enqueue');     


    function carrousel_initialise(){
        $contenu = "<div class='carrousel'>";
        $contenu .= "<button class='carroussel__fermeture'>X</button>";
        $contenu .= "<figure class='carrousel__img'></figure>";
        $contenu .= "</div>";

        return $contenu;
    }

    add_shortcode('carrousel', 'carrousel_initialise');