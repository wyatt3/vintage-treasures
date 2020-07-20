<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();
        // ====================== Home Page Dropdown =================== //
        $homePageMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Home Page',
            'url' => '',
        ]);
        if (!$homePageMenuItem->exists) {
            $homePageMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-home',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }


        // ====================== Admin Dropdown =================== //
        $adminMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.tools'),
            'url'     => '',
        ]);
        if (!$adminMenuItem->exists) {
            $adminMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
                ])->save();
        }

        // ====================== Users =================== //
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.users'),
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => $adminMenuItem->id,
                'order'      => 3,
            ])->save();
        }
        
        // ====================== Database =================== //
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.database'),
            'url'     => '',
            'route'   => 'voyager.database.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $adminMenuItem->id,
                'order'      => 4,
                ])->save();
        }

        // ====================== Bread =================== //
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.bread'),
            'url'     => '',
            'route'   => 'voyager.bread.index',
            ]);
            if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread',
                'color'      => null,
                'parent_id'  => $adminMenuItem->id,
                'order'      => 4,
                ])->save();
            }

        // ====================== Menu Builder =================== //
        $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => __('voyager::seeders.menu_items.menu_builder'),
                'url'     => '',
                'route'   => 'voyager.menus.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-list',
                    'color'      => null,
                    'parent_id'  => $adminMenuItem->id,
                    'order'      => 5,
                ])->save();
            }

        // ====================== Settings =================== //

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.settings'),
            'url'     => '',
            'route'   => 'voyager.settings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-settings',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }
    }
}
