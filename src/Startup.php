<?php

declare(strict_types=1);

namespace ExtrumsTestPlugin;

use ExtrumsTestPlugin\Finder\PostFinder;
use ExtrumsTestPlugin\Pages\Main;
use ExtrumsTestPlugin\Replacer\Replacer;

class Startup
{
    public function __construct()
    {
        new Main();
        new PostFinder();
        new Replacer();
    }
}