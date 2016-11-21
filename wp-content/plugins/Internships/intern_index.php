<?php
/*
Plugin Name: Intbizth Internship Integrate
Description: Use in intbizth เด็กฝึกงาน.com เท่านั่น!!!
Version:     1.0.2
Plugin URI:  http://intbizth.com/
Author:      Intbizth TeamSix
Author URI:  http://intbizth.com/

Copyright 2016 Naja

*/
define ('INTERN_DEBUG', false);
define( 'INTERN_DIR_PATH', plugin_dir_path(__FILE__) );
define( 'INTERN_DIR_URL', plugin_dir_url(__FILE__) );

include_once INTERN_DIR_PATH.'config.php';
//include_once ('config.php');

add_action( 'init', 'intbizth_init' );

//เมื่อ Active Plugin
register_activation_hook(__FILE__, 'intern_activation');

include_once (INTERN_DIR_PATH.'pdf_control.php');

include_once (INTERN_DIR_PATH.'function.php');
//require_once ('vendor/fzaninotto/faker/src/autoload.php');
//require_once ('autoload.php');

//Test google translate
//include_once ('Provider/GoogleTranslator.php');

//===========:: INCLUDE CONTROLLER ::============//
include_once (INTERN_DIR_PATH.'Controller/TableController.php');
include_once (INTERN_DIR_PATH.'Controller/ImageController.php');

//===========:: INCLUDE MODEL ::============//
//foreach ( glob( plugin_dir_path( __FILE__ ) . "Model/*.php" ) as $file ) {
//    include_once $file;
//}


//===========:: INCLUDE ETC ::=============//
//ตัว upload รูป slim
//include_once ('UI/vendor/slim/server/slim.php');
//=========== END INCLUDE =============

//=========:: INCLUDE ADMIN PANEL ::==========//
if (is_admin())
{
    include_once (INTERN_DIR_PATH.'Admin/main.php');
}
//-------------------------

function intbizth_init()
{
    ob_start(); //make it can redirect!
}

/*intbizth add angularJS*/
add_action( 'wp_enqueue_scripts', 'intern_add_script');


function intern_add_script()
{
//    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.1.0.min.js', []);
    wp_enqueue_style('bootstrap', INTERN_DIR_URL.'UI/vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css', []);
    wp_enqueue_script('bootstrap', INTERN_DIR_URL.'UI/vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js', [], null, false);

    //ตัวโหลดหน้าเพจ
    wp_enqueue_style('pace', INTERN_DIR_URL.'UI/vendor/pace/pace.flash.css', array());
    wp_enqueue_script('pace', INTERN_DIR_URL.'UI/vendor/pace/pace.min.js', array(), null);

    //JS สำหรับทุกหน้า
    wp_enqueue_script('all-js', INTERN_DIR_URL.'UI/js/all_page.js', [], null, false);

    //ANGULAR 1.5.5
    wp_enqueue_script('angular-core', INTERN_DIR_URL.'UI/vendor/angularjs/angular.min.js', array('jquery'), null, false);
    wp_enqueue_script('angular-route', INTERN_DIR_URL.'UI/vendor/angularjs/angular-route.min.js', array('angular-core'), null, false);
    wp_enqueue_script('angular-resource', INTERN_DIR_URL.'UI/vendor/angularjs/angular-resource.min.js', array('angular-route'), null, false);
    wp_enqueue_script('angular-animate', INTERN_DIR_URL.'UI/vendor/angularjs/angular-animate.js', array(), null, false);

    //alert dialog
    wp_register_script('js-sweetalert', INTERN_DIR_URL.'UI/vendor/sweetalert/sweetalert.min.js', array(), null, false);
    wp_register_style('css-sweetalert', INTERN_DIR_URL.'UI/vendor/sweetalert/sweetalert.css', []);

    //กล่องแจ้งเตือน
    wp_register_script('pnotify', INTERN_DIR_URL.'UI/vendor/pnotify/pnotify.custom.min.js', [], null);
    wp_register_style('pnotify', INTERN_DIR_URL.'UI/vendor/pnotify/pnotify.custom.min.css', []);

    //upload-image crop&resize
    wp_register_style('slim', INTERN_DIR_URL.'UI/vendor/slim/slim.min.css', []);
    wp_register_script('slim', INTERN_DIR_URL.'UI/vendor/slim/slim.kickstart.min.js', [], null, false);

    //ang star https://github.com/melloc01/angular-input-stars
    wp_register_script('angular-input-stars', INTERN_DIR_URL.'UI/vendor/angular-input-stars/angular-input-stars.js', [], null, false);
    wp_register_style('angular-input-stars', INTERN_DIR_URL.'UI/vendor/angular-input-stars/angular-input-stars.css', []);

    //plugin's main style from Gentellela Alela
    //Progress Bar
    wp_enqueue_style('alela-nprogress', INTERN_DIR_URL.'UI/vendor/gentelella-master/vendors/nprogress/nprogress.css', array());
    //ตัว Switch css สวยๆ
    wp_enqueue_style('alela-switchery', INTERN_DIR_URL.'UI/vendor/gentelella-master/vendors/switchery/dist/switchery.min.css', array());

    //green select box
    wp_enqueue_style('alela-green', INTERN_DIR_URL.'UI/vendor/gentelella-master/vendors/iCheck/skins/flat/green.css', array());
    wp_enqueue_script('alela-green', INTERN_DIR_URL.'UI/vendor/gentelella-master/vendors/iCheck/icheck.min.js', array());
    //select2
    wp_enqueue_style('select2', INTERN_DIR_URL.'UI/vendor/ui-select/select.css', array());
    wp_enqueue_style('select2-css', 'http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css', array());
    wp_enqueue_script('select2', INTERN_DIR_URL.'UI/vendor/ui-select/select.js', array(), null);
    wp_enqueue_script('angular-sanitize', INTERN_DIR_URL.'UI/vendor/angular-sanitize/angular-sanitize.js', array(), null);

    //main
//        wp_enqueue_style('alela-main', INTERN_DIR_URL.'UI/vendor/gentelella-master/build/css/custom-intern.css', array());
//        wp_enqueue_script('alela-js', INTERN_DIR_URL.'UI/vendor/gentelella-master/build/js/custom.min.js', array(), null, false);


    //------STYLE------//
    wp_enqueue_style('animate-css', INTERN_DIR_URL.'UI/css/animate.css', array());
    wp_enqueue_style('all-page-css', INTERN_DIR_URL.'UI/css/all_page.css', array());

}

function intern_activation()
{
    include_once (INTERN_DIR_PATH.'Controller/TableController.php');
    include_once (INTERN_DIR_PATH.'Controller/TableStructure.php');
}

//====== DANGER! CODE FOR DEVELOP MODE ONLY =====//
if (isset($_GET['import_data']))
{
    include_once ('SampleData/RealData.php');
    if (INTERN_REAL_DATA::insertProvince())
        echo "<h1>OK!!! INSERTED Province!</h1>";
    else
        echo "<h1>FAIL! Cannot insert Province</h1>";

    if (INTERN_REAL_DATA::insertUniversity()){
        echo "<h1>OK!!! INSERTED UNIVERSITY!</h1>";
    }
    else
    {
        echo "<h1>FAIL! Cannot insert UNIVERSITY</h1>";
    }

}

add_action('after_setup_theme', 'internDebug');
function internDebug()
{
    if (INTERN_DEBUG) {
        ?>
        <div class="intern_debug">
            <table>
                <thead>
                <tr>
                    <td>
                        <?='is_user_logged_in: ' . is_user_logged_in()?>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
        <?php
    }
}

/* NOTE
http://plnkr.co/edit/nTf19f?p=preview
*/
    