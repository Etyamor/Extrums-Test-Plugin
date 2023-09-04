<?php

declare(strict_types=1);

namespace ExtrumsTestPlugin\Pages;

class Main
{
    private string $pageTitle = 'Extrums Test Main';

    private string $menuTitle = 'Extrums Main';

    private string $capability = 'administrator';

    private string $slug = 'etp_main.php';

    public function __construct()
    {
        add_action('admin_menu', [$this, 'createOptionPage']);
    }

    public function createOptionPage(): void
    {
        add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->slug,
            [$this, 'render']
        );
        $this->enqueueAssets();
    }

    public function render(): void
    {
        ob_start();
        include "Templates/main-form.php";
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    public function enqueueAssets(): void
    {
        add_action('admin_enqueue_scripts', function($hook){
            if ($hook === 'toplevel_page_etp_main') {
                wp_enqueue_script(
                    'etp-scripts',
                    ETP_URL . 'src/assets/js/scripts.js',
                    array('jquery')
                );
                wp_localize_script('etp-scripts', 'etpVars', [
                    'admin_ajax' => admin_url('admin-ajax.php')
                ]);
            }
        });
    }
}