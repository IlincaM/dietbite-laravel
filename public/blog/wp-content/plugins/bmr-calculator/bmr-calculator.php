<?php

/*
  Plugin Name: Calculate BMR
  Description: A simple plugin that calculates the BMR and TDEE
  Version:     0.1
  Author:     Moncea Ilinca
  License:     GPL2
 */


add_action('wp_enqueue_scripts', 'parsley_init');

function parsley_init() {
    wp_enqueue_script('parsley-js', plugins_url('/js/parsley.min.js', __FILE__));
}

session_start();
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
include( 'CalculatorValidator.php');

class BMR_Calculator {

    const LIGHT = 0.1;
    const MODERATE = 0.2;
    const DIFFICULT = 0.3;
    const INTENSE = 0.4;
    const SEDENTARY = 1.2;
    const LIGHT_ACTIVITY = 1.4;
    const NORMAL_ACTIVE = 1.6;
    const VERY_ACTIVE = 1.8;

    private $exerciseTableName;
    private $activityTableName;
    private $bmrTableName;
    private $collation;

    public function __construct() {
        global $wpdb;
        if (is_admin()) {
            register_activation_hook(__FILE__, array(&$this, 'activate'));
        }
        add_shortcode('BMR_calculator_form', function() {
            include(__DIR__ . '/templates/form.tpl.php');
        });
        add_action('admin_post_md_things_visitor', array(&$this, 'visitor'));
        $this->exerciseTableName = $wpdb->prefix . 'bmr_exercise';
        $this->activityTableName = $wpdb->prefix . 'bmr_activity';
        $this->bmrTableName = $wpdb->prefix . 'bmr_results';

        $this->collation = $wpdb->get_charset_collate();
    }

    public function activate() {
        global $wpdb;

        $sql = "CREATE TABLE $this->activityTableName (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
                sedentary DECIMAL(6,1),
                light_activity DECIMAL(6,1),
                normal_active DECIMAL(6,1),
                very_active DECIMAL(6,1),
		PRIMARY KEY  (id)
	) $this->collation;";
        dbDelta($sql);

        $wpdb->insert(
                $this->activityTableName, array(
            'sedentary' => self::SEDENTARY,
            'light_activity' => self::LIGHT_ACTIVITY,
            'normal_active' => self::NORMAL_ACTIVE,
            'very_active' => self:: VERY_ACTIVE,
                )
        );

        $sql = "CREATE TABLE $this->exerciseTableName (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
                light DECIMAL(6,1),
                moderate DECIMAL(6,1),
                difficult DECIMAL(6,1),
                intense DECIMAL(6,1),
		PRIMARY KEY  (id)
	) $this->collationy;";
        dbDelta($sql);

        $sql = "CREATE TABLE $this->bmrTableName (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
                bmr_result DECIMAL(6,1),
                weight DECIMAL(6,1),
                goal_weight DECIMAL(6,1),
                user_id int(11),
                user_role varchar(255),
                bmr_result_date  DATE,
                
		PRIMARY KEY  (id)
	) $this->collationy;";
        dbDelta($sql);

        $wpdb->insert(
                $this->exerciseTableName, array(
            'light' => self::LIGHT,
            'moderate' => self::MODERATE,
            'difficult' => self::DIFFICULT,
            'intense' => self::INTENSE,
                )
        );
    }

    public function visitor() {
        if (!function_exists('wp_get_current_user')) {
            include(ABSPATH . "wp-includes/pluggable.php");
        }
        $user = wp_get_current_user();
        global $wpdb;
        $validator = new CalculatorValidator();

        if (isset($_POST['action'])) {
            try {

                $validator->validate($_POST);

                if ($_POST['gender'] == male) {
                    (float) $activityAndExercise = $_POST['activity'] + $_POST['exercise'];
                    (float) $calculate = 9.99 * $_POST['weight'] + 6.25 * $_POST['height'] - 4.92 * $_POST['age'] + 5;
                    (float) $result = $calculate * $activityAndExercise;
                    $_SESSION['result'] = $result;
                }
                if ($_POST['gender'] == female) {
                    (float) $activityAndExercise = $_POST['activity'] + $_POST['exercise'];
                    (float) $calculat = 9.99 * $_POST['weight'] + 6.25 * $_POST['height'] - 4.92 * $_POST['age'] - 161;
                    (float) $result = $calculat * $activityAndExercise;
                    $_SESSION['result'] = $result;
                }
                //TODO Insert
                $wpdb->insert(
                        $this->bmrTableName, array(
                    'bmr_result' => $_SESSION['result'],
                    'weight' => $_POST['weight'],
                    'goal_weight' => $_POST['goalWeight'],
                    'user_id' => $user->ID,
                    'user_role' => $user->roles[0],
                    'bmr_result_date' => date("Y-m-d"),
                        )
                );
            } catch (Exception $e) {
                echo "<p class='errorStyle'>" . $e->getMessage() . "</p>";
            } finally {
                wp_safe_redirect($_POST['to']);
            }
        }
    }

    public static function activityLevel() {
        global $wpdb;
        $table = $wpdb->prefix . 'bmr_activity';
        $results = $wpdb->get_results("SELECT * FROM $table WHERE id=1");
        return $results;
    }

    public static function exerciseLevel() {
        global $wpdb;
        $table = $wpdb->prefix . 'bmr_exercise';
        $results = $wpdb->get_results("SELECT * FROM $table WHERE id=1");
        return $results;
    }

}

$md_things_plugin = new BMR_Calculator();

