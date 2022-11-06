<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="../../demo1/dist/index.html">
            <img alt="Logo" src="assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default"/>
            <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize"/>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.5"
                                              d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                              fill="currentColor"/>
										<path
                                            d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                            fill="currentColor"/>
									</svg>
								</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link @if($navItem=='home') active @endif"
                       href="{{route('admin.dashboard')}}">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect x="2" y="2" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
														<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
														<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
														<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                              fill="currentColor"/>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
                        <span class="menu-title">Dashboards</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

                @can('admin-users-read','admin-roles-read')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click"
                         class="menu-item   menu-accordion @if($navItem=='users' || $navItem=='roles')  show @endif">
                        <!--begin:Menu link-->
                        <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                                            fill="currentColor"/>
														<path opacity="0.3"
                                                              d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                                              fill="currentColor"/>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">User Management</span>
											<span class="menu-arrow"></span>
										</span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion  @if($navItem=='users') show here  @endif">
                            <!--begin:Menu item-->
                            @can('admin-roles-read')
                            <div data-kt-menu-trigger="click"
                                 class="menu-item menu-accordion mb-1 @if($navItem=='users') show @endif">
                                <!--begin:Menu link-->
                                <span class="menu-link">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Users</span>
													<span class="menu-arrow"></span>
												</span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link @if($navItem=='users') active @endif"
                                           href="{{ route('users.index')}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                            <span class="menu-title">Users List</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            @endcan
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            @can('admin-roles-read')
                            <div data-kt-menu-trigger="click"
                                 class="menu-item   menu-accordion  @if($navItem=='roles') show @endif">
                                <!--begin:Menu link-->
                                <span class="menu-link">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Roles</span>
													<span class="menu-arrow"></span>
												</span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion  @if($navItem=='roles') show @endif">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link  @if($navItem=='roles') active @endif"
                                           href="{{route('roles.index')}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                            <span class="menu-title">Roles List</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    {{--                                <div class="menu-item">--}}
                                    {{--                                    <!--begin:Menu link-->--}}
                                    {{--                                    <a class="menu-link" href="../../demo1/dist/apps/user-management/roles/view.html">--}}
                                    {{--															<span class="menu-bullet">--}}
                                    {{--																<span class="bullet bullet-dot"></span>--}}
                                    {{--															</span>--}}
                                    {{--                                        <span class="menu-title">View Role</span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <!--end:Menu link-->--}}
                                    {{--                                </div>--}}
                                    <!--end:Menu item-->
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            @endcan
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            {{--                        <div class="menu-item">--}}
                            {{--                            <!--begin:Menu link-->--}}
                            {{--                            <a class="menu-link" href="../../demo1/dist/apps/user-management/permissions.html">--}}
                            {{--													<span class="menu-bullet">--}}
                            {{--														<span class="bullet bullet-dot"></span>--}}
                            {{--													</span>--}}
                            {{--                                <span class="menu-title">Permissions</span>--}}
                            {{--                            </a>--}}
                            {{--                            <!--end:Menu link-->--}}
                            {{--                        </div>--}}
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcan
                @can('admin-services-read')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion  @if($navItem=='services') here show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                            fill="currentColor"></path>
														<path
                                                            d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                            fill="currentColor"></path>
														<path opacity="0.3"
                                                              d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                              fill="currentColor"></path>
														<path opacity="0.3"
                                                              d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                              fill="currentColor"></path>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">Services</span>
											<span class="menu-arrow"></span>
										</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{route('services.index')}}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                @endcan
                @can('admin-workshops-read')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion @if($navItem=='workshop') here show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                                            fill="currentColor"></path>
														<path opacity="0.3"
                                                              d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                                              fill="currentColor"></path>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">Contractors</span>
											<span class="menu-arrow"></span>
										</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link  @if($navItem=='workshop') active @endif"
                               href="{{route('workshop.index')}}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                @endcan
                @can('admin-locations-read')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion @if($navItem=='locations') here show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
											<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"
                                                            fill="currentColor"></path>
														<path opacity="0.3"
                                                              d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"
                                                              fill="currentColor"></path>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">Locations</span>
											<span class="menu-arrow"></span>
										</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link  @if($navItem=='locations') active @endif"
                               href="{{route('locations.index')}}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                @endcan
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion @if($navItem=='banners') here show @endif">
                    <!--begin:Menu link-->
                    <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
											<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path
                                                            d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"
                                                            fill="currentColor"></path>
														<path opacity="0.3"
                                                              d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"
                                                              fill="currentColor"></path>
													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title">Banners</span>
											<span class="menu-arrow"></span>
										</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link  @if($navItem=='banners') active @endif"
                               href="{{route('banners.index')}}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>

                {{--                @can('admin-products-read')--}}
{{--                <div data-kt-menu-trigger="click"--}}
{{--                     class="menu-item menu-accordion @if($navItem=='products') here show @endif">--}}
{{--                    <!--begin:Menu link-->--}}
{{--                    <span class="menu-link">--}}
{{--											<span class="menu-icon">--}}
{{--												<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->--}}
{{--											<span class="svg-icon svg-icon-2">--}}
{{--													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                                                         xmlns="http://www.w3.org/2000/svg">--}}
{{--														<path--}}
{{--                                                            d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"--}}
{{--                                                            fill="currentColor"></path>--}}
{{--														<path opacity="0.3"--}}
{{--                                                              d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"--}}
{{--                                                              fill="currentColor"></path>--}}
{{--													</svg>--}}
{{--												</span>--}}
{{--                                                <!--end::Svg Icon-->--}}
{{--											</span>--}}
{{--											<span class="menu-title">Products</span>--}}
{{--											<span class="menu-arrow"></span>--}}
{{--										</span>--}}
{{--                    <!--end:Menu link-->--}}
{{--                    <!--begin:Menu sub-->--}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                        <!--begin:Menu item-->--}}
{{--                        <div class="menu-item">--}}
{{--                            <!--begin:Menu link-->--}}
{{--                            <a class="menu-link  @if($navItem=='products') active @endif"--}}
{{--                               href="{{route('products.index')}}">--}}
{{--													<span class="menu-bullet">--}}
{{--														<span class="bullet bullet-dot"></span>--}}
{{--													</span>--}}
{{--                                <span class="menu-title">List</span>--}}
{{--                            </a>--}}
{{--                            <!--end:Menu link-->--}}
{{--                        </div>--}}
{{--                        <!--end:Menu item-->--}}

{{--                    </div>--}}
{{--                    <!--end:Menu sub-->--}}
{{--                </div>--}}
{{--                @endcan--}}
{{--                @can('admin-stocks-read')--}}
{{--                <div data-kt-menu-trigger="click"--}}
{{--                     class="menu-item menu-accordion @if($navItem=='stocks') here show @endif">--}}
{{--                    <!--begin:Menu link-->--}}
{{--                    <span class="menu-link">--}}
{{--											<span class="menu-icon">--}}
{{--												<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->--}}
{{--											<span class="svg-icon svg-icon-2">--}}
{{--													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                                                         xmlns="http://www.w3.org/2000/svg">--}}
{{--														<path--}}
{{--                                                            d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"--}}
{{--                                                            fill="currentColor"></path>--}}
{{--														<path opacity="0.3"--}}
{{--                                                              d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"--}}
{{--                                                              fill="currentColor"></path>--}}
{{--													</svg>--}}
{{--												</span>--}}
{{--                                                <!--end::Svg Icon-->--}}
{{--											</span>--}}
{{--											<span class="menu-title">Stock Management</span>--}}
{{--											<span class="menu-arrow"></span>--}}
{{--										</span>--}}
{{--                    <!--end:Menu link-->--}}
{{--                    <!--begin:Menu sub-->--}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                        <!--begin:Menu item-->--}}
{{--                        <div class="menu-item">--}}
{{--                            <!--begin:Menu link-->--}}
{{--                            <a class="menu-link  @if($navItem=='stocks') active @endif"--}}
{{--                               href="{{route('stocks.index')}}">--}}
{{--													<span class="menu-bullet">--}}
{{--														<span class="bullet bullet-dot"></span>--}}
{{--													</span>--}}
{{--                                <span class="menu-title">List</span>--}}
{{--                            </a>--}}
{{--                            <!--end:Menu link-->--}}
{{--                        </div>--}}
{{--                        <!--end:Menu item-->--}}

{{--                    </div>--}}
{{--                    <!--end:Menu sub-->--}}
{{--                </div>--}}
{{--                @endcan--}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
