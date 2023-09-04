<?php

namespace ExtrumsTestPlugin\Replacer;

class Replacer
{
    public function __construct()
    {
        add_action('wp_ajax_etp-replace-byTitle', [$this, 'replaceTitles']);
        add_action('wp_ajax_etp-replace-byContent', [$this, 'replaceContents']);
        add_action('wp_ajax_etp-replace-byMetaTitle', [$this, 'replaceMetaTitle']);
        add_action('wp_ajax_etp-replace-byMetaDesc', [$this, 'replaceMetaDesc']);
    }

    public function replaceTitles(): void
    {
        $key_word = $_POST['key'];
        $replace_word = $_POST['replace'];
        $post_ids = explode(',', $_POST['post_ids']);

        foreach ($post_ids as $id) {
            wp_update_post([
                'ID' => $id,
                'post_title' => str_replace($key_word, $replace_word, get_the_title($id))
            ]);
        }
        die();
    }

    public function replaceContents(): void
    {
        $key_word = $_POST['key'];
        $replace_word = $_POST['replace'];
        $post_ids = explode(',', $_POST['post_ids']);

        foreach ($post_ids as $id) {
            wp_update_post([
                'ID' => $id,
                'post_content' => str_replace($key_word, $replace_word, get_the_title($id))
            ]);
        }
        die();
    }

    public function replaceMetaTitle(): void
    {
        $key_word = $_POST['key'];
        $replace_word = $_POST['replace'];
        $post_ids = explode(',', $_POST['post_ids']);

        foreach ($post_ids as $id) {
            $wpseo_title = get_post_meta($id, '_yoast_wpseo_title', true);
            $wpseo_title = str_replace($key_word, $replace_word, $wpseo_title);
            update_post_meta($id, '_yoast_wpseo_title', $wpseo_title);
        }
        die();
    }

    public function replaceMetaDesc(): void
    {
        $key_word = $_POST['key'];
        $replace_word = $_POST['replace'];
        $post_ids = explode(',', $_POST['post_ids']);

        foreach ($post_ids as $id) {
            $wpseo_desc = get_post_meta($id, '_yoast_wpseo_metadesc', true);
            $wpseo_desc = str_replace($key_word, $replace_word, $wpseo_desc);
            update_post_meta($id, '_yoast_wpseo_metadesc', $wpseo_desc);
        }
        die();
    }
}