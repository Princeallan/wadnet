<?php

namespace TypiCMS\Modules\Sliders\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-sliders')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Sliders'), function (SidebarItem $item) {
                $item->id = 'sliders';
                $item->icon = config('typicms.sliders.sidebar.icon');
                $item->weight = config('typicms.sliders.sidebar.weight');
                $item->route('admin::index-sliders');
                $item->append('admin::create-slider');
            });
        });
    }
}
