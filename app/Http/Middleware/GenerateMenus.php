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
                if (auth()->user()->hasRole('super admin')) {


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
    $classAndStandrard->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Classwise Section'), [
             'route' => 'backend.classsections.index',
            'class' => 'nav-item',
    ])
        ->data([
            'order' => 83,
            'activematches' => 'admin/classwisesection*',
            'permission' => ['edit_categories'],
        ])
        ->link->attr([
            'class' => 'nav-link',
        ]);


//                     $countryAdminTab->link->attr([
//                         'class' => 'nav-link nav-group-toggle',
//                         'href' => '#',
//                     ]);

//                     // Add the "Country User (existing user)" sub-item
//                     $countryAdminTab->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Country User (existing user)'), [
//                         //   'route' => 'backend.country.existing-user',
//                         'route' => 'backend.users.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 82,
//                             'activematches' => 'admin/country/existing-user',

//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);
//                     // Add the "Country User (new user)" sub-item
//                     $countryAdminTab->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Country User (new user)'), [
//                         //   'route' => 'backend.country.new-user',
//                         'route' => 'backend.users.create',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 83,
//                             'activematches' => 'admin/new-user*',
//                             'permission' => ['edit_categories'],
//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);

//                     // Add service point tab
//                     $service_point = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Service Point'), [
//                         'class' => 'nav-group',
//                         //  'route' => 'backend.service-point.index',

//                     ])
//                         ->data([
//                             'order' => 1,
//                             'activematches' => [
//                                 'activematches' => 'admin/service-point*',
//                             ],

//                         ]);
//                     $service_point->link->attr([
//                         'class' => 'nav-link nav-group-toggle',
//                         'href' => '#',
//                     ]);

//                     // Add the Service point existing location sub-item
//                     $service_point->add('<i class="nav-icon fa-regular fa-sun"></i> ' . __('Add ServicePoints'), [
//                         'route' => 'backend.servicepoints.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 77,
//                             'activematches' => ['admin/servicepoints*'],
//                             'permission' => ['view_servicepoints'],
//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);
//                     $service_point->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Existing location'), [
//                         //   'route' => 'backend.country.existing-user',
//                         'route' => 'backend.locations.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 82,
//                             'activematches' => 'admin/service-point/existing-location',

//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);
//                     // Add the Service point (new location)" sub-item
//                     $service_point->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('New location'), [
//                         //   'route' => 'backend.country.new-user',
//                         'route' => 'backend.locations.create',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 83,
//                             'activematches' => 'admin/service-point/new-location',

//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);

//                     // $country = $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> '.__('Country'), [
// //                 //    'route' => 'backend.country.index',
// //                     'class' => 'nav-item',
// //                 ])
// //                 ->data([
// //                     'order' => 9,
// //                     'activematches' => 'admin/country*',
// //                 ])
// //                 ->link->attr([
// //                     'class' => 'nav-link',
// //                 ]);

//                     // $service_point= $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> '.__('Service Point'), [
//                     //  //   'route' => 'backend.service-point.index',
//                     //     'class' => 'nav-item',
//                     // ]) 
//                     // ->data([
//                     //     'order' => 4,
//                     //     'activematches' => 'admin/service-point*',
//                     // ])
//                     // ->link->attr([
//                     //     'class' => 'nav-link dropdown-toggle',
//                     //     'data-bs-toggle' => 'dropdown',
//                     //     'aria-expanded' => 'false',

//                     // ]);
//                     // // Add the "Service Point" sub-item Exixting location and new location
//                     // $service_point_existing= $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> '.__('Service Point (existing location)'), [
//                     //  //   'route' => 'backend.service-point.existing-location',
//                     //     'class' => 'nav-item',
//                     // ]) 
//                     // ->data([
//                     //     'order' => 5,
//                     //     'activematches' => 'admin/service-point/existing-location',
//                     // ])
//                     // ->link->attr([
//                     //     'class' => 'nav-link',
//                     // ]);
//                     // $service_point_new= $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> '.__('Service Point (new location)'), [
//                     //  //   'route' => 'backend.service-point.new-location',
//                     //     'class' => 'nav-item',
//                     // ])
//                     // ->data([
//                     //     'order' => 6,
//                     //     'activematches' => 'admin/service-point/new-location',
//                     // ])
//                     // ->link->attr([
//                     //     'class' => 'nav-link',
//                     // ]);

//                     //territory creation
//                     $territory = $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> ' . __('Territory'), [
//                         //   'route' => 'backend.territory.index',
//                         'route' => 'backend.territories.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 7,
//                             'activematches' => 'admin/territory*',
//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);

//                     //role creation 
//                     $role = $menu->add('<i class="nav-icon fa-solid fa-user-shield"></i>' . __('Roles'), [
//                         'route' => 'backend.roles.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 8,
//                             'activematches' => 'admin/roles*',
//                             'permission' => ['view_roles'],
//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);


//                                     // // Countries
//             $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> '.__('Countries'), [
//                 'route' => 'backend.countries.index',
//                 'class' => 'nav-item',
//             ])
//             ->data([
//                 'order'         => 9,
//                 'activematches' => ['admin/countries*'],
//                 'permission'    => ['view_countries'],
//             ])
//             ->link->attr([
//                 'class' => 'nav-link',
//             ]);
//                     //profile creation
//                     $profile = $menu->add('<i class="nav-icon fa-solid fa-globe-americas"></i> ' . __('Profile'), [
//                         //  'route' => 'backend.users.profile'.'/'.auth()->user()->id,
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 9,
//                             'activematches' => 'admin/profile*',
//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                             'href' => route('backend.users.profile', auth()->user()->id),
//                         ]);



//                     $service_point = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('ROO & RTO Interface'), [
//                         'class' => 'nav-group',
//                         //  'route' => 'backend.service-point.index',

//                     ])
//                         ->data([
//                             'order' => 10,
//                             'activematches' => [
//                                 'activematches' => 'admin/service-point*',
//                             ],

//                         ]);
//                     $service_point->link->attr([
//                         'class' => 'nav-link nav-group-toggle',
//                         'href' => '#',
//                     ]);

//                     // Add the Service point existing location sub-item
//                     $service_point->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Retail Outlet Officer'), [
//                         //   'route' => 'backend.country.existing-user',
//                         //  'route' => 'backend.locations.index',
//                         'route' => 'backend.retailoutletofficers.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 82,
//                             'activematches' => 'admin/service-point/existing-location',

//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);
//                     // Add the Service point (new location)" sub-item
//                     $service_point->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Retail Territory Manager'), [
//                         //   'route' => 'backend.country.new-user',
//                         //   'route' => 'backend.locations.create',
//                         'route' => 'backend.retailterritorymanagers.index',
//                         'class' => 'nav-item',
//                     ])
//                         ->data([
//                             'order' => 83,
//                             'activematches' => 'admin/service-point/new-location',

//                         ])
//                         ->link->attr([
//                             'class' => 'nav-link',
//                         ]);


                    // {{route('backend.users.profile', Auth::user()->id)}}


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

                } else if (auth()->user()->hasRole('Student')) {
                    //Customer Tab
                //     $CustomerTab = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Customer'), [
                //         'class' => 'nav-group',
                //     ])
                //         ->data([
                //             'order' => 1,
                //             'activematches' => [
                //                 'admin/existing-user*',
                //                 'admin/new-user*',
                //             ],
                //             'permission' => ['view_posts', 'view_categories'],
                //         ]);
                //     $CustomerTab->link->attr([
                //         'class' => 'nav-link nav-group-toggle',
                //         'href' => '#',
                //     ]);

                //     //Search Referrer sub tab
                //     $CustomerTab->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Search Referrer'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     // Serrch Referee sub tab
                //     $CustomerTab->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Search Referee'), [
                //         //   'route' => 'backend.country.new-user',
                //         //    'route'=>'backend.users.create',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 83,
                //             'activematches' => 'admin/new-user*',
                //             'permission' => ['edit_categories'],
                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //refer a customer sub tab

                //     $CustomerTab->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Refer A Customer'), [
                //         //   'route' => 'backend.country.new-user',
                //         //    'route'=>'backend.users.create',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 83,
                //             'activematches' => 'admin/new-user*',
                //             'permission' => ['edit_categories'],
                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //promo validation sub tab
                //     $CustomerTab->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Promo Validation'), [
                //         //   'route' => 'backend.country.new-user',
                //         //    'route'=>'backend.users.create',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 83,
                //             'activematches' => 'admin/new-user*',
                //             'permission' => ['edit_categories'],
                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //resend the promo sub tab
                //     $CustomerTab->add('<i class="nav-icon fas fa-sitemap"></i> ' . __('Resend The Promo'), [
                //         //   'route' => 'backend.country.new-user',
                //         //    'route'=>'backend.users.create',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 83,
                //             'activematches' => 'admin/new-user*',
                //             'permission' => ['edit_categories'],
                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);

                //     //Refferrer History Tab

                //     $RefferrerHistoryTab = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Refferrer History'), [
                //         'class' => 'nav-group',
                //     ])
                //         ->data([
                //             'order' => 1,
                //             'activematches' => [
                //                 'admin/existing-user*',
                //                 'admin/new-user*',
                //             ],
                //             'permission' => ['view_posts', 'view_categories'],
                //         ]);
                //     $RefferrerHistoryTab->link->attr([
                //         'class' => 'nav-link nav-group-toggle',
                //         'href' => '#',
                //     ]);

                //     //Search refferr sub tab
                //     $RefferrerHistoryTab->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Search Referrer'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);


                //     //My refferal Tab

                //     $MyReferral = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('My refferal'), [
                //         'class' => 'nav-group',
                //     ])
                //         ->data([
                //             'order' => 1,
                //             'activematches' => [
                //                 'admin/existing-user*',
                //                 'admin/new-user*',
                //             ],
                //             'permission' => ['view_posts', 'view_categories'],
                //         ]);
                //     $MyReferral->link->attr([
                //         'class' => 'nav-link nav-group-toggle',
                //         'href' => '#',
                //     ]);

                //     //Referral Details sub tab
                //     $MyReferral->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Referral Details'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //Dashboard sub tab
                //     $MyReferral->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Dashboard'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //My Profile sub tab
                //     $MyReferral->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('My Profile'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);


                // } else if (auth()->user()->hasRole('rtm')) {
                //     // dd(auth()->user()->id);
                //     //RTM ->RETAIL TERRITORY MANAGER
                //     //My Team Tab
                //     $MyTeam = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('My Team'), [
                //         'class' => 'nav-group',
                //     ])
                //         ->data([
                //             'order' => 1,
                //             'activematches' => [
                //                 'admin/existing-user*',
                //                 'admin/new-user*',
                //             ],
                //             'permission' => ['view_posts', 'view_categories'],
                //         ]);
                //     $MyTeam->link->attr([
                //         'class' => 'nav-link nav-group-toggle',
                //         'href' => '#',
                //     ]);

                //     //Team Members sub tab
                //     $MyTeam->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Team Members'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //my location sub tab
                //     $MyTeam->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('My Locations'), [
                //         //   'route' => 'backend.country.existing-user',
                //         //  'route'=>'backend.users.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 82,
                //             'activematches' => 'admin/country/existing-user',

                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //Dashboard Tab
                //     $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> ' . __('Dashboard'), [
                //       //  'route' => 'backend.dashboard',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 1,
                //             'activematches' => 'admin/dashboard*',
                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);
                //     //My profile
                //     $Profile = $menu->add('<i class="nav-icon fa fa-user"></i>' . __('My Profile'), [
                //         // 'route' => 'backend.roles.index',
                //         'class' => 'nav-item',
                //     ])
                //         ->data([
                //             'order' => 8,
                //             'activematches' => 'admin/roles*',
                //             'permission' => ['view_roles'],
                //         ])
                //         ->link->attr([
                //             'class' => 'nav-link',
                //         ]);


                } 
                
                else if(auth()->user()->hasRole('Teacher')){

//                    // dd(auth()->user()->id);
//                    //Supervisor Dashboard Tab
//                    $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> ' . __('Dashboard'), [
//                   //  'route' => 'backend.dashboard',
//                     'class' => 'nav-item',
//                 ])
//                     ->data([
//                         'order' => 1,
//                         'activematches' => 'admin/dashboard*',
//                     ])
//                     ->link->attr([
//                         'class' => 'nav-link',
//                     ]);



//                     //Data Upload Tab
//                     $menu->add('<i class="nav-icon fa fa-upload"></i> ' . __('Data Upload'), [
//                         //  'route' => 'backend.dashboard',
//                           'class' => 'nav-item',
//                       ])
//                           ->data([
//                               'order' => 1,
//                               'activematches' => 'admin/dashboard*',
//                           ])
//                           ->link->attr([
//                               'class' => 'nav-link',
//                           ]);
// //My Profile
// $Profile = $menu->add('<i class="nav-icon fa fa-user"></i>' . __('My Profile'), [
//     // 'route' => 'backend.roles.index',
//     'class' => 'nav-item',
// ])
//     ->data([
//         'order' => 8,
//         'activematches' => 'admin/roles*',
//         'permission' => ['view_roles'],
//     ])
//     ->link->attr([
//         'class' => 'nav-link',
//     ]);
                    
                }
                
                
                
                else {
                    // dd(auth()->user()->id);
                    $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> ' . __('Dashboard'), [
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

                    // Notifications
                    $menu->add('<i class="nav-icon fas fa-bell"></i> Notifications', [
                        'route' => 'backend.notifications.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 99,
                            'activematches' => 'admin/notifications*',
                            'permission' => [],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Separator: Access Management
                    $menu->add('Management', [
                        'class' => 'nav-title',
                    ])
                        ->data([
                            'order' => 101,
                            'permission' => ['edit_settings', 'view_backups', 'view_users', 'view_roles', 'view_logs'],
                        ]);

                    // Settings
                    $menu->add('<i class="nav-icon fas fa-cogs"></i> Settings', [
                        'route' => 'backend.settings',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 102,
                            'activematches' => 'admin/settings*',
                            'permission' => ['edit_settings'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Backup
                    $menu->add('<i class="nav-icon fas fa-archive"></i> Backups', [
                        'route' => 'backend.backups.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 103,
                            'activematches' => 'admin/backups*',
                            'permission' => ['view_backups'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Access Control Dropdown
                    $accessControl = $menu->add('<i class="nav-icon fa-solid fa-user-gear"></i> Access Control', [
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

                    // Submenu: Roles
                    $accessControl->add('<i class="nav-icon fa-solid fa-user-shield"></i> Roles', [
                        'route' => 'backend.roles.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 106,
                            'activematches' => 'admin/roles*',
                            'permission' => ['view_roles'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Log Viewer
                    // Log Viewer Dropdown
                    $accessControl = $menu->add('<i class="nav-icon fa-solid fa-list-check"></i> Log Viewer', [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 107,
                            'activematches' => [
                                'log-viewer*',
                            ],
                            'permission' => ['view_logs'],
                        ]);
                    $accessControl->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);

                    // Submenu: Log Viewer Dashboard
                    $accessControl->add('<i class="nav-icon fa-solid fa-list"></i> Dashboard', [
                        'route' => 'log-viewer::dashboard',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 108,
                            'activematches' => 'admin/log-viewer',
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Submenu: Log Viewer Logs by Days
                    $accessControl->add('<i class="nav-icon fa-solid fa-list-ol"></i> Logs by Days', [
                        'route' => 'log-viewer::logs.list',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 109,
                            'activematches' => 'admin/log-viewer/logs*',
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

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