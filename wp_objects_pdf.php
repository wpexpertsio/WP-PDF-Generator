<?php
/*
Plugin Name: WP PDF Generator
Plugin URI: https://wpexperts.io/
Description: Easy Web to PDF Download
Version: 1.0
Author: wpexperts.io
Author URI: https://wpexperts.io/
*/

include 'wp_objects_save_data.php';
//Register custom menu for PDF
add_action('admin_menu', 'wppg_objects_pdf_menu_page');
function wppg_objects_pdf_menu_page()
{
    add_menu_page('WP PDF', 'PDF', 'manage_options', 'PDF-setting', 'wppg_my_custom_menu_page', plugins_url('/images/pdf-icon.gif', __FILE__), 10);
}

function wppg_theme_name_scripts()
{
    wp_enqueue_script('script-name', plugins_url('/script/front.js', __FILE__), array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'wppg_theme_name_scripts');
//Authentation form
function wppg_my_custom_menu_page()
{
    $wp_objects_get_pdf = get_option('wp_objects_pdf_data');
    $wp_objects_get_type = get_option('wp_objects_pdf_type');
?>
    <div id='pdf-wrapper'>
    <form action='#' method='post'>
    <!-- Sidebar -->
    <div id='side-right'>
        <p> Easy Web to PDF plugin! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book.</p>
            <span id='short-code-head'>
                Simply paste short code to your site!
            </span>
        <br/>
        <input type='text' readonly value='[wp_objects_pdf]'/>
        <br/><br/><br/>
            <span id='function-head'>
                Simply paste function to your site!
            </span>
         <br/>
       <input type='text' readonly value='wp_objects_pdf();'/>
    </div>
    <!-- Sidebar -->
        <span id='bold-head'>
        Choose Your PDF Button Style
        </span>
    <div id='pdf-image'><input type='radio' required onclick='wppg_pdf_image()' name='pdf-choose' value='PDF Button Image'/>
        PDF Image Button
    </div>
    <div class='btn-style-wrapper'>
        <div class='btn-style'>
            <img src='<?php echo plugins_url('/images/images.png', __FILE__) ?>' width='25'/>
            <div align='center'
                 class='btn-radio'><?php if ($wp_objects_get_pdf == plugins_url('/images/images.png', __FILE__)) { ?>
                    <input name='pdf-btn' value='<?php echo plugins_url('/images/images.png', __FILE__) ?>'
                           checked='checked' type='radio'/> <?php } else { ?><input name='pdf-btn'
                                                                                    value='<?php echo plugins_url('/images/images.png', __FILE__) ?>'
                                                                                    type='radio'/><?php } ?></div>
        </div>
        <div class='btn-style'>
            <img src='<?php echo plugins_url('/images/images.jpg', __FILE__) ?>' width='25'/>
            <div align='center'
                 class='btn-radio'><?php if ($wp_objects_get_pdf == plugins_url('/images/images.jpg', __FILE__)) { ?>
                    <input name='pdf-btn' value='<?php echo plugins_url('/images/images.jpg', __FILE__) ?>'
                           checked='checked' type='radio'/> <?php } else { ?><input name='pdf-btn'
                                                                                    value='<?php echo plugins_url('/images/images.jpg', __FILE__) ?>'
                                                                                    type='radio'/><?php } ?></div>
        </div>
        <div class='btn-style'>
            <img src='<?php echo plugins_url('/images/pdf2.jpg', __FILE__) ?>' width='25'/>
            <div align='center'
                 class='btn-radio'><?php if ($wp_objects_get_pdf == plugins_url('/images/pdf2.jpg', __FILE__)) { ?>
                    <input name='pdf-btn' value='<?php echo plugins_url('/images/pdf2.jpg', __FILE__) ?>'
                           checked='checked' type='radio'/> <?php } else { ?><input name='pdf-btn'
                                                                                    value='<?php echo plugins_url('/images/pdf2.jpg', __FILE__) ?>'
                                                                                    type='radio'/><?php } ?></div>
        </div>
        <div class='btn-style'>
            <img src='<?php echo plugins_url('/images/pdf11.png', __FILE__) ?>' width='25'/>
            <div align='center'
                 class='btn-radio'><?php if ($wp_objects_get_pdf == plugins_url('/images/pdf11.png', __FILE__)) { ?>
                    <input name='pdf-btn' value='<?php echo plugins_url('/images/pdf11.png', __FILE__) ?>'
                           checked='checked' type='radio'/> <?php } else { ?><input name='pdf-btn'
                                                                                    value='<?php echo plugins_url('/images/pdf11.png', __FILE__) ?>'
                                                                                    type='radio'/><?php } ?></div>
        </div>
        <div class='btn-style'>
            <img src='<?php echo plugins_url('/images/pdf1.jpg', __FILE__) ?>' width='25'/>
            <div align='center'
                 class='btn-radio'><?php if ($wp_objects_get_pdf == plugins_url('/images/pdf1.jpg', __FILE__)) { ?>
                    <input name='pdf-btn' value='<?php echo plugins_url('/images/pdf1.jpg', __FILE__) ?>'
                           checked='checked' type='radio'/> <?php } else { ?><input name='pdf-btn'
                                                                                    value='<?php echo plugins_url('/images/pdf1.jpg', __FILE__) ?>'
                                                                                    type='radio'/><?php } ?></div>
        </div>
    </div>
    <br/><br/><br/>
    <div id='pdf-image'><input type='radio' required onclick='wppg_pdf_text()' name='pdf-choose' value='PDF_text'/> PDF Image
        Button
    </div>
    <div class='text-style-wrapper'>
        <div class='text-style'>
            <input type='text' id='pdf-text' name='pdf-text'
                   value='<?php if ($wp_objects_get_pdf && $wp_objects_get_type == 'PDF_text') {
                       echo $wp_objects_get_pdf;
                   } ?>' placeholder='Save as PDF Document'/>
        </div>
    </div>
    <?php //echo 'A:'.$wp_objects_pdf->wp_objects_get_pdf('wp_objects_pdf_data')?>
    <input type='submit' name='pdf-save' id='sub-btn' class='button button-primary' value='Save and Apply'/>
    </form>
    </div>
<?php
}

function wppg_objects_pdf()
{
    $wp_object_pdf_format = get_option('wp_objects_pdf_data');
    $wp_objects_pdf_type = get_option('wp_objects_pdf_type');

    if ($wp_objects_pdf_type == "PDF Button Image") {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = urlencode($actual_link);
        $wp_object_pdf_link = "<a onclick='wppg_loading_pdf()' href='http://FreeHTMLtoPDF.com/?convert=$actual_link'><img src='$wp_object_pdf_format' width='25'/></a><img id='loading_gif' style='display:none' src='" . plugins_url('/images/loading.gif', __FILE__) . "' />";
        return $wp_object_pdf_link;
    } else if ($wp_objects_pdf_type == "PDF_text") {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = urlencode($actual_link);
        $wp_object_pdf_link = "<a onclick='wppg_loading_pdf()' href='http://FreeHTMLtoPDF.com/?convert=$actual_link'>$wp_object_pdf_format</a><img id='loading_gif' style='display:none' src='" . plugins_url('/images/loading.gif', __FILE__) . "' />";
        return $wp_object_pdf_link;
    }
}
function wppg_object_pdf_download()
{
    echo wppg_objects_pdf_link();
}

function wppg_objects_pdf_link()
{
    $wp_object_pdf_format = get_option('wp_objects_pdf_data');
    $wp_objects_pdf_type = get_option('wp_objects_pdf_type');

    if ($wp_objects_pdf_type == "PDF Button Image") {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = urlencode($actual_link);
        $wp_object_pdf_link = "<a onclick='wppg_loading_pdf()' href='http://FreeHTMLtoPDF.com/?convert=$actual_link'><img src='$wp_object_pdf_format' width='25'/></a><img id='loading_gif' style='display:none' src='" . plugins_url('/images/loading.gif', __FILE__) . "' />";
        return $wp_object_pdf_link;
    } else if ($wp_objects_pdf_type == "PDF_text") {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = urlencode($actual_link);
        $wp_object_pdf_link = "<a onclick='wppg_loading_pdf()' href='http://FreeHTMLtoPDF.com/?convert=$actual_link'>$wp_object_pdf_format</a><img id='loading_gif' style='display:none' src='" . plugins_url('/images/loading.gif', __FILE__) . "' />";
        return $wp_object_pdf_link;
    }
}

add_shortcode('wp_objects_pdf', 'wppg_object_pdf_download');
add_action('admin_enqueue_scripts', 'wppg_safely_add_stylesheet_to_admin');
/**
 * Add stylesheet to the page
 */
function wppg_safely_add_stylesheet_to_admin()
{
    wp_enqueue_style('prefix-style', plugins_url('style/style.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'wppg_safely_add_javascript_to_admin');

/**
 * Add stylesheet to the page
 */
function wppg_safely_add_javascript_to_admin()
{
    wp_enqueue_script('prefix-script', plugins_url('script/script.js', __FILE__));
}