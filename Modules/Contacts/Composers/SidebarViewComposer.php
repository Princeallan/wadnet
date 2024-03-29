<?php

namespace TypiCMS\Modules\Contacts\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-contacts')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Contacts'), function (SidebarItem $item) {
                $item->id = 'contacts';
                $item->icon = config('typicms.contacts.sidebar.icon');
                $item->weight = config('typicms.contacts.sidebar.weight');
                $item->route('admin::index-contacts');
                $item->append('admin::create-contact');
            });
        });
    }
}
