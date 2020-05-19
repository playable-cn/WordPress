<?php

class Kamome_Extend_Post {

    public $id;

    /**
     * POST ID
     */
    public $post_id;

    /**
     * 記事種類
     */
    public $post_type = 0;

    /**
     * 画像
     *
     */
    public $image = '';

    /**
     * 画像2
     *
     */
    public $image2 = '';

    /**
     * カテゴリ
     *
     */
    public $category = 0;

    /**
     * 記事カテゴリ
     *
     */
    public $category2 = 0;

    /**
     * 記事カテゴリ略
     *
     */
    public $category2_small = 0;

    /**
     * タイトル2
     *
     */
    public $title2 = '';

    /**
     * 要約
     *
     */
    public $summary = '';

    /**
     * 要約2
     *
     */
    public $summary2 = '';

    /**
     * 国名
     *
     */
    public $country = '';

    /**
     * 掲載日付
     *
     */
    public $open_date = '1970-01-01';

    /**
     * PC特集
     *
     */
    public $pc_special = 0;

    /**
     * SP特集
     *
     */
    public $sp_special = 0;

    /**
     * PC話題
     *
     */
    public $pc_topic = 0;

    /**
     * SP話題
     *
     */
    public $sp_topic = 0;

    private static $kamome_extends_posts = [];

    public static function get_instance( $post_id ) {
        global $wpdb,$table_prefix;

        $post_id = (int) $post_id;
        if ( ! $post_id ) {
            return false;
        }

        if ( ! isset(self::$kamome_extends_posts[$post_id]) ) {
            $table = $table_prefix . 'kamome_extend_posts';
            $_extend_post = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE post_id = %d LIMIT 1", $post_id ) );

            if ( ! $_extend_post ) {
                return false;
            }

            $instance = new Kamome_Extend_Post( $_extend_post );
            self::$kamome_extends_posts[$post_id] = $instance;
        } elseif ( empty( $_post->filter ) ) {
            $instance = self::$kamome_extends_posts[$post_id];
        }

        return $instance;
    }

    public function __construct( $post ) {
        foreach ( get_object_vars( $post ) as $key => $value ) {
            $this->$key = $value;
        }
    }

    public function update( $post ) {
        foreach ( $post as $key => $value ) {
            $this->$key = $value;
        }
    }

    public function to_array() {
        $post = get_object_vars( $this );

        return $post;
    }
}
