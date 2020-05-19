<?php

function kamome_extend_get_post( $post, $output = OBJECT ) {
    if ( $post instanceof Kamome_Extend_Post ) {
        $_post = $post;
    } elseif ( is_object( $post ) ) {
        $_post = Kamome_Extend_Post::get_instance( $post->post_id );
    } else {
        $_post = Kamome_Extend_Post::get_instance( $post );
    }

    if ( ! $_post ) {
        return null;
    }

    if ( $output == ARRAY_A ) {
        return $_post->to_array();
    } elseif ( $output == ARRAY_N ) {
        return array_values( $_post->to_array() );
    }

    return $_post;
}

function kamome_extend_update_post_cache( $post_id, $postarr ) {
    $_post = Kamome_Extend_Post::get_instance( $post_id );

    if ( ! $_post ) {
        return false;
    }

    $_post->update($postarr);

    return true;
}

function kamome_extend_insert_post( $postarr, $wp_error = false ) {
    global $wpdb,$table_prefix;

    $defaults = array(
        'post_id'               => 0,
        'post_type'             => 0,
        'image'                 => '',
        'image2'                => '',
        'category'              => 0,
        'category2'             => 0,
        'category2_small'       => 0,
        'title2'                => '',
        'summary'               => '',
        'summary2'              => '',
        'country'               => '',
        'open_date'             => '1970-01-01',
        'pc_special'            => 0,
        'sp_special'            => 0,
        'pc_topic'              => 0,
        'sp_topic'              => 0,
    );

    $data = wp_parse_args( $postarr, $defaults );

    $data  = wp_unslash( $data );

    $post_id = $data['post_id'];

    $table = $table_prefix . 'kamome_extend_posts';

    if ( false === $wpdb->insert( $table, $data ) ) {
        if ( $wp_error ) {
            return new WP_Error( 'db_insert_error', __( 'Could not insert kamome extend post into the database' ), $wpdb->last_error );
        } else {
            return 0;
        }
    }

    return $post_id;
}

function kamome_extend_update_post( $postarr = array(), $wp_error = false ) {
    if ( is_object( $postarr ) ) {
        // Non-escaped post was passed.
        $postarr = get_object_vars( $postarr );
        $postarr = wp_slash( $postarr );
    }

    $post_id = $postarr['post_id'];

    // First, get all of the original fields.
    $post = kamome_extend_get_post( $post_id, ARRAY_A );

    if ( is_null( $post ) ) {
        return kamome_extend_insert_post( $postarr, $wp_error );
    }

    // Escape data pulled from DB.
    $post = wp_slash( $post );

    // Merge old and new fields with new fields overwriting old ones.
    $postarr = array_merge( $post, $postarr );

    global $wpdb,$table_prefix;

    $defaults = array(
        'post_type'             => 0,
        'image'                 => '',
        'image2'                => '',
        'category'              => 0,
        'category2'             => 0,
        'category2_small'       => 0,
        'title2'                => '',
        'summary'               => '',
        'summary2'              => '',
        'country'               => '',
        'open_date'             => '1970-01-01',
        'pc_special'            => 0,
        'sp_special'            => 0,
        'pc_topic'              => 0,
        'sp_topic'              => 0,
    );

    $data = wp_parse_args( $postarr, $defaults );

    $data  = wp_unslash( $data );

    $table = $table_prefix . 'kamome_extend_posts';
    $where = array( 'post_id' => $post_id );
    if ( false === $wpdb->update( $table, $data, $where ) ) {
        if ( $wp_error ) {
            return new WP_Error( 'db_update_error', __( 'Could not update kamome extend post in the database' ), $wpdb->last_error );
        } else {
            return 0;
        }
    }

    kamome_extend_update_post_cache($post_id, $data);

    return $post_id;
}
