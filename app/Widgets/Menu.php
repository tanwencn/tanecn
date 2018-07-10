<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\View;
use Tanwencn\Blog\Database\Eloquent\Menu as Model;

class Menu extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        abort_unless($this->config['slug'], 500, 'Invalid parameters:slug');
        $data = Model::findBySlug($this->config['slug']);

        $name = View::exists("widget.menu.{$this->config['slug']}")?$this->config['slug']:"default";

        return view("widget.menu.{$name}", compact('data'));
    }
}
