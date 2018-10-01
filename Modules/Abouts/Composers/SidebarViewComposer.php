<?php

namespace TypiCMS\Modules\Abouts\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-abouts')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Abouts'), function (SidebarItem $item) {
                $item->id = 'abouts';
                $item->icon = config('typicms.abouts.sidebar.icon');
                $item->weight = config('typicms.abouts.sidebar.weight');
                $item->route('admin::index-abouts');
                $item->append('admin::create-about');
            });
        });
    }
}
