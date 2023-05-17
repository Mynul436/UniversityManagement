<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // dd(auth());
        // dd(auth()->user()->id);


        \Menu::make('admin_sidebar', function ($menu) {
            //   dd ("Hello");

            //dd(auth()->user()->id);

            if (auth()->user()) {
                if (auth()->user()->hasRole('admin')) {


                    $menu->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Dashboard'), [
                        'route' => 'backend.dashboard',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 1,
                            'activematches' => 'admin/dashboard*',
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                        $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Notices'), [
                            'route' => 'backend.notices.index',
                            'class' => 'nav-item',
                        ])
                        ->data([
                            'order'         => 77,
                            'activematches' => ['admin/notices*'],
                            'permission'    => ['view_notices'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Notifications
                  

                   // Class and section tab
                    $classAndStandrard = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Classes And Sections'), [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 1,
                            'activematches' => [
                                'admin/existing-user*',
                                'admin/new-user*',
                            ],
                            'permission' => ['view_posts', 'view_categories'],
                                            ]);
                    $classAndStandrard->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);
                    //add class or standard
                    $classAndStandrard->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Add Class or Standard'), [
                        'route' => 'backend.standardorclasses.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 82,
                            'activematches' => 'admin/class*',
                            'permission' => ['edit_posts'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                    //add section
                    $classAndStandrard->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Add Section'), [
                            'route' => 'backend.sections.index',
                                'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 83,
                            'activematches' => 'admin/section*',
                            'permission' => ['edit_categories'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                        //classwise section
                        // $classAndStandrard->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Classwise Section'), [
                        //         'route' => 'backend.classsections.index',
                        //         'class' => 'nav-item',
                        // ])
                        //     ->data([
                        //         'order' => 83,
                        //         'activematches' => 'admin/classwisesection*',
                        //         'permission' => ['edit_categories'],
                        //     ])
                        //     ->link->attr([
                        //         'class' => 'nav-link',
                        //     ]);

                    $accessControl = $menu->add('<i class="nav-icon fa-solid fa-user-gear"></i> Add Student/Teacher', [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 104,
                            'activematches' => [
                                'admin/users*',
                                'admin/roles*',
                            ],
                            'permission' => ['view_users', 'view_roles'],
                        ]);
                    $accessControl->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);

                    // Submenu: Users
                    $accessControl->add('<i class="nav-icon fa-solid fa-user-group"></i> Users', [
                        'route' => 'backend.users.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 105,
                            'activematches' => 'admin/users*',
                            'permission' => ['view_users'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                        $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Results'), [
                            'route' => 'backend.results.index',
                            'class' => 'nav-item',
                        ])
                        ->data([
                            'order'         => 77,
                            'activematches' => ['admin/results*'],
                            'permission'    => ['view_results'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                        $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Subjects'), [
                            'route' => 'backend.subjects.index',
                            'class' => 'nav-item',
                        ])
                        ->data([
                            'order'         => 77,
                            'activematches' => ['admin/subjects*'],
                            'permission'    => ['view_subjects'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                        $menu->add('<i class="nav-icon fa-solid fa-user-shield"></i>' . __('Roles'), [
                            'route' => 'backend.roles.index',
                            'class' => 'nav-item',
                        ])
                            ->data([
                                'order' => 8,
                                'activematches' => 'admin/roles*',
                                'permission' => ['view_roles'],
                            ])
                            ->link->attr([
                                'class' => 'nav-link',
                            ]);
                            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Attendences'), [
                                'route' => 'backend.attendences.index',
                                'class' => 'nav-item',
                            ])
                            ->data([
                                'order'         => 77,
                                'activematches' => ['admin/attendences*'],
                                'permission'    => ['view_attendences'],
                            ])
                            ->link->attr([
                                'class' => 'nav-link',
                            ]);


                } else if (auth()->user()->hasRole('student')) {

                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Notices'), [
                        'route' => 'backend.notices.index',
                        'class' => 'nav-item',
                    ])
                    ->data([
                        'order'         => 77,
                        'activematches' => ['admin/notices*'],
                        'permission'    => ['view_notices'],
                    ])
                    ->link->attr([
                        'class' => 'nav-link',
                    ]);

                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Results'), [
                        'route' => 'backend.results.index',
                        'class' => 'nav-item',
                    ])
                    ->data([
                        'order'         => 77,
                        'activematches' => ['admin/results*'],
                        'permission'    => ['view_results'],
                    ])
                    ->link->attr([
                        'class' => 'nav-link',
                    ]);

                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Subjects'), [
                        'route' => 'backend.subjects.index',
                        'class' => 'nav-item',
                    ])
                    ->data([
                        'order'         => 77,
                        'activematches' => ['admin/subjects*'],
                        'permission'    => ['view_subjects'],
                    ])
                    ->link->attr([
                        'class' => 'nav-link',
                    ]);
                } 
                
                else if(auth()->user()->hasRole('teacher')){

            // Attendences
            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Attendences'), [
                'route' => 'backend.attendences.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/attendences*'],
                'permission'    => ['view_attendences'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);

            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Results'), [
                'route' => 'backend.results.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/results*'],
                'permission'    => ['view_results'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('View Srudent'), [
                'route' => 'backend.users.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/subjects*'],
                'permission'    => ['view_subjects'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
                    
                }
                
                
                
                else {
                    // dd(auth()->user()->id);
                    // $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> ' . __('Dashboard'), [
                    //     'route' => 'backend.dashboard',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 1,
                    //         'activematches' => 'admin/dashboard*',
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // // Notifications
                    // $menu->add('<i class="nav-icon fas fa-bell"></i> Notifications', [
                    //     'route' => 'backend.notifications.index',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 99,
                    //         'activematches' => 'admin/notifications*',
                    //         'permission' => [],
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // // Separator: Access Management
                    // $menu->add('Management', [
                    //     'class' => 'nav-title',
                    // ])
                    //     ->data([
                    //         'order' => 101,
                    //         'permission' => ['edit_settings', 'view_backups', 'view_users', 'view_roles', 'view_logs'],
                    //     ]);

                    // // Settings
                    // $menu->add('<i class="nav-icon fas fa-cogs"></i> Settings', [
                    //     'route' => 'backend.settings',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 102,
                    //         'activematches' => 'admin/settings*',
                    //         'permission' => ['edit_settings'],
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // // Backup
                    // $menu->add('<i class="nav-icon fas fa-archive"></i> Backups', [
                    //     'route' => 'backend.backups.index',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 103,
                    //         'activematches' => 'admin/backups*',
                    //         'permission' => ['view_backups'],
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // // Access Control Dropdown
                    // $accessControl = $menu->add('<i class="nav-icon fa-solid fa-user-gear"></i> Access Control', [
                    //     'class' => 'nav-group',
                    // ])
                    //     ->data([
                    //         'order' => 104,
                    //         'activematches' => [
                    //             'admin/users*',
                    //             'admin/roles*',
                    //         ],
                    //         'permission' => ['view_users', 'view_roles'],
                    //     ]);
                    // $accessControl->link->attr([
                    //     'class' => 'nav-link nav-group-toggle',
                    //     'href' => '#',
                    // ]);

                    // // Submenu: Users
                    // $accessControl->add('<i class="nav-icon fa-solid fa-user-group"></i> Users', [
                    //     'route' => 'backend.users.index',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 105,
                    //         'activematches' => 'admin/users*',
                    //         'permission' => ['view_users'],
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // // Submenu: Roles
                    // $accessControl->add('<i class="nav-icon fa-solid fa-user-shield"></i> Roles', [
                    //     'route' => 'backend.roles.index',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 106,
                    //         'activematches' => 'admin/roles*',
                    //         'permission' => ['view_roles'],
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // // Log Viewer
                    // // Log Viewer Dropdown
                    // $accessControl = $menu->add('<i class="nav-icon fa-solid fa-list-check"></i> Log Viewer', [
                    //     'class' => 'nav-group',
                    // ])
                    //     ->data([
                    //         'order' => 107,
                    //         'activematches' => [
                    //             'log-viewer*',
                    //         ],
                    //         'permission' => ['view_logs'],
                    //     ]);
                    // $accessControl->link->attr([
                    //     'class' => 'nav-link nav-group-toggle',
                    //     'href' => '#',
                    // ]);

                    // // Submenu: Log Viewer Dashboard
                    // $accessControl->add('<i class="nav-icon fa-solid fa-list"></i> Dashboard', [
                    //     'route' => 'log-viewer::dashboard',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 108,
                    //         'activematches' => 'admin/log-viewer',
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // Submenu: Log Viewer Logs by Days
                    // $accessControl->add('<i class="nav-icon fa-solid fa-list-ol"></i> Logs by Days', [
                    //     'route' => 'log-viewer::logs.list',
                    //     'class' => 'nav-item',
                    // ])
                    //     ->data([
                    //         'order' => 109,
                    //         'activematches' => 'admin/log-viewer/logs*',
                    //     ])
                    //     ->link->attr([
                    //         'class' => 'nav-link',
                    //     ]);

                    // Access Permission Check
                    // $menu->filter(function ($item) {
                    //     if ($item->data('permission')) {
                    //         if (auth()->check()) {
                    //             if (auth()->user()->hasRole('super admin')) {
                    //                 return true;
                    //             } elseif (auth()->user()->hasAnyPermission($item->data('permission'))) {
                    //                 return true;
                    //             }
                    //         }

                    //         return false;
                    //     } else {
                    //         return true;
                    //     }
                    // });

                    // Set Active Menu
                    $menu->filter(function ($item) {
                        if ($item->activematches) {
                            $activematches = (is_string($item->activematches)) ? [$item->activematches] : $item->activematches;
                            foreach ($activematches as $pattern) {
                                if (request()->is($pattern)) {
                                    $item->active();
                                    $item->link->active();
                                    if ($item->hasParent()) {
                                        $item->parent()->active();
                                    }
                                }
                            }
                        }

                        return true;
                    });
                }
            }




        })->sortBy('order');

        return $next($request);
    }
}