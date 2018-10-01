<?php

namespace TypiCMS\Modules\Magazines\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-magazines')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Magazines'), function (SidebarItem $item) {
                $item->id = 'magazines';
                $item->icon = config('typicms.magazines.sidebar.icon');
                $item->weight = config('typicms.magazines.sidebar.weight');
                $item->route('admin::index-magazines');
                $item->append('admin::create-magazine');
            });
        });
    }
}
