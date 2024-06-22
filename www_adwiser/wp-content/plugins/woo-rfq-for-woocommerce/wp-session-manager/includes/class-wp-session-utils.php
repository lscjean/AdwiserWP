<?php

/**
 * Utility class for sesion utilities
 *
 * THIS CLASS SHOULD NEVER BE INSTANTIATED
 */

$session_type=get_option('settings_gpls_woo_rfq_cookie_or_phpsession',"rfq_cookie");
if($session_type === "php_session"){
    return ;
}

if(!class_exists('RFQTK_WP_Session_Utils')){
    #[\AllowDynamicProperties]
    class RFQTK_WP_Session_Utils
{
    /**
     * Count the total sessions in the database.
     *
     * @return int
     * @global wpdb $wpdb
     *
     */
    public static function count_sessions()
    {
        global $wpdb;

        $query = "SELECT distinct COUNT(*) FROM {$wpdb->base_prefix}nplugins1_sessions 
WHERE option_name LIKE '_rfqtk_wp_session_%' and misc_value <>'a:0:{}'";

        /**
         * Filter the query in case tables are non-standard.
         *
         * @param string $query Database count query
         */
        $query = apply_filters('_rfqtk_wp_session_count_query', $query);

        $sessions = $wpdb->get_var($query);

        return absint($sessions);
    }

    /**
     * Create a new, random session in the database.
     *
     * @param null|string $date
     */
    public static function create_dummy_session($date = null)
    {
        // Generate our date
        if (null !== $date) {
            $time = strtotime($date);

            if (false === $time) {
                $date = null;
            } else {
                $expires = date('U', strtotime($date));
            }
        }

        // If null was passed, or if the string parsing failed, fall back on a default
        if (null === $date) {

            $expires = time() + (int)apply_filters('_rfqtk_wp_session_expiration', RFQTK_WP_SESSION_EXPIRATION);
        }

        $session_id = self::generate_id();

        // Store the session
        RFQTK_WP_Session::get_instance()->np_add_session("_rfqtk_wp_session_{$session_id}", array(), '', 'no');

    }


    function RFQTK_php_session_reset()
    {
        if (defined('WP_SETUP_CONFIG')) {
            return;
        }

        if (!defined('WP_INSTALLING')) {
            /**
             * Determine the size of each batch for deletion.
             *
             * @param int
             */


            // Delete a batch of old sessions
            RFQTK_WP_Session_Utils::delete_all_sessions();
        }


    }

    /**
     * Delete old sessions from the database.
     *
     * @param int $limit Maximum number of sessions to delete.
     *
     * @return int Sessions deleted.
     * @global wpdb $wpdb
     *
     */
    public static function delete_old_sessions($limit = RFQTK_WP_SESSION_CLEAN_LIMIT)
    {


        if (defined('WP_INSTALLING')) {
            return 0;
        }

        if (defined('WP_SETUP_CONFIG')) {
            return;
        }

        if (defined('WP_INSTALLING')) {
            return 0;
        }


        global $wpdb;

        $limit = absint($limit);

        $limit = apply_filters('delete_old_sessions_filter', $limit);

        {

            $sql = " delete FROM {$wpdb->base_prefix}npxyz2021_sessions
          WHERE  misc_value='rfq_session' and  option_value = 'a:0:{}' or  expiration <= " . time() . " LIMIT " . $limit . " ";

            $wpdb->query($sql);

            //  $this->slide_expiration=true;

            return 0;
        }


    }


    /**
     * Remove all sessions from the database, regardless of expiration.
     *
     * @return int Sessions deleted
     * @global wpdb $wpdb
     *
     */
    public static function delete_all_sessions()
    {


        if (defined('WP_INSTALLING')) {
            return 0;
        }

        global $wpdb;
        $limit = RFQTK_WP_SESSION_CLEAN_LIMIT;

        $count = $wpdb->query("DELETE FROM {$wpdb->base_prefix}npxyz2021_sessions 
        WHERE misc_value='rfq_session' and  option_name LIKE '_rfqtk_wp_session_%'" . " LIMIT " . $limit . " ");

        return (int)($count);
    }

    /**
     * Generate a new, random session ID.
     *
     * @return string
     */
    public static function generate_id()
    {
        require_once(ABSPATH . 'wp-includes/class-phpass.php');
        $hash = new \PasswordHash(8, false);
//echo md5( $hash->get_random_bytes( 32 ) );
        return md5($hash->get_random_bytes(32));
    }

    public static function fix_old_sessions($limit = RFQTK_WP_SESSION_CLEAN_LIMIT)
    {


        if (defined('WP_INSTALLING')) {
            return 0;
        }

        global $wpdb;

        $sql = " delete FROM {$wpdb->base_prefix}options
        WHERE misc_value='rfq_session' and  option_name LIKE '_rfqtk_wp_session_%' LIMIT " . $limit . " ";

        $wpdb->query($sql);

    }


    public static function reset_sessions($limit = RFQTK_WP_SESSION_CLEAN_LIMIT)
    {


        if (defined('WP_INSTALLING')) {
            return 0;
        }

        global $wpdb;

        $sql = " truncate table {$wpdb->base_prefix}npxyz2021_sessions ";

        $wpdb->query($sql);

    }
}
}