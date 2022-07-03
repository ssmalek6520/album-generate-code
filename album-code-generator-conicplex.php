 <?php
/*
  Plugin Name: Album Code Generator by ConicPlex
  Description: Album Code Generator by ConicPlex
  Version: 1.0
  Author: ConicPlex
  Author URI: https://conicplex.com
  License: GPL2
 */


//Enqueue CSS and JS
function lets_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'acgcp-script', plugins_url('assets/js/acgcp-script.js', __FILE__ ), false );

    wp_enqueue_style( 'acgcp-style', plugins_url('assets/css/acgcp-style.css', __FILE__ ));
    wp_enqueue_style( 'font-awesom-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css', false );
    wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Rajdhani&display=swap', false );

}

add_action( 'wp_enqueue_scripts', 'lets_enqueue_scripts' );

add_shortcode( 'album_code_generator', 'albumCodeGeneratorHtml' );

function albumCodeGeneratorHtml(){

    $customHtml = '
        <div class="acgcp_card">
            <select id="acgcp_selectForCodeGenerate" class="acgcp_selectForCodeGenerate" name="acgcp_selectForCodeGenerate">
                <option value="" selected disabled>Select Option</option>
                <option value="option1">Option 1</option>
                <option value="option1">Option 2</option>
                <option value="option1">Option 3</option>
            </select>
            <input type="button" name="acgcp_btnGenerateCode" id="acgcp_btnGenerateCode" class="acgcp_disabledClass"
                   value="generate code" disabled>
            <div class="acgcp_form-group">
                <input type="text" name="acgcp_redeemCode" id="acgcp_redeemCode" class="acgcp_redeemCode" readonly
                       value="Here is code">
                <button class="acgcp_copyCode" id="acgcp_copyCode" name="acgcp_copyCode">
                    <i class="bi bi-clipboard"></i>
                    <span class="acgcp_tooltiptext" id="acgcp_myTooltip">Copy Code</span>
                </button>
            </div>
            <div class="acgcp_linkRedeemNow">
                <a href="">Redeem Now</a>
            </div>
        </div>
    ';
    return $customHtml;

}

function my_ctp() {
    $labels = array(
        'name' => 'Album codes',
        'singular_name' => 'Album code'
    );
    $supports = array('title');
    $options = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug'=>'albumcodes'),
        'show_in_rest' => true,
        'supports' => $supports
    );
    register_post_type("Albumcode", $options);
}
add_action('init', 'my_ctp');
