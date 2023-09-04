<?php

namespace ExtrumsTestPlugin\Finder;

use WP_Query;

class PostFinder
{
    private array $posts = [];

    public function __construct()
    {
        add_action('wp_ajax_etp-find-posts', [$this, 'getPosts']);
    }

    public function getPosts()
    {
        $key_word = $_GET['key'];
        $this->getPostsByTitle($key_word);
        $this->getPostsByContent($key_word);
        $this->getPostsByMetaTitle($key_word);
        $this->getPostsByMetaDesc($key_word);
        //echo json_encode($this->posts);

        ob_start();
        include __DIR__ . "/../Pages/Templates/main-results.php";
        $result = ob_get_contents();
        ob_get_clean();
        echo $result;

        die();
    }

    private function getPostsByTitle($title): void
    {
        add_filter('posts_where', [$this, 'titleFilter'], 10 , 2);
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'search_post_title' => $title
        ]);
        remove_filter('posts_where', [$this, 'titleFilter']);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $this->posts['byTitle'][] = [
                    'id' => get_the_ID(),
                    'content' => get_the_title()
                ];
            }
        }
        wp_reset_postdata();
    }

    private function getPostsByContent($content): void
    {
        add_filter('posts_where', [$this, 'contentFilter'], 10 , 2);
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'search_post_content' => $content
        ]);
        remove_filter('posts_where', [$this, 'contentFilter']);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $this->posts['byContent'][] = [
                    'id' => get_the_ID(),
                    'content' => get_the_content()
                ];
            }
        }
        wp_reset_postdata();
    }

    private function getPostsByMetaTitle($meta_title): void
    {
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'meta_key' => '_yoast_wpseo_title',
            'meta_value' => $meta_title,
            'meta_compare' => 'LIKE'
        ]);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $this->posts['byMetaTitle'][] = [
                    'id' => get_the_ID(),
                    'content' => get_post_meta(get_the_ID(), '_yoast_wpseo_title', true)
                ];
            }
        }
    }

    private function getPostsByMetaDesc($meta_desc): void
    {
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'meta_key' => '_yoast_wpseo_metadesc',
            'meta_value' => $meta_desc,
            'meta_compare' => 'LIKE'
        ]);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $this->posts['byMetaDesc'][] = [
                    'id' => get_the_ID(),
                    'content' => get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)
                ];
            }
        }
    }

    public function titleFilter($where, &$wp_query): string
    {
        global $wpdb;
        if ($search_term = $wp_query->get('search_post_title')) {
            $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like($search_term) . '%\'';
        }
        return $where;
    }

    public function contentFilter($where, &$wp_query): string
    {
        global $wpdb;
        if ($search_term = $wp_query->get('search_post_content')) {
            $where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'%' . $wpdb->esc_like($search_term) . '%\'';
        }
        return $where;
    }
}