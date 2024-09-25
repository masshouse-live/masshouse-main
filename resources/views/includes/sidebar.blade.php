<div class="flex flex-col min-h-screen bg-secondary  text-textSecondary 2xl:col-span-1 col-span-2">
    <div class="flex flex-col h-screen overflow-auto" id="menu">
        <a href="{{ route('admin.index') }}" class="flex pt-6 pb-4 px-4">
            <img alt="Access Logo" src="{{ asset('images/logo.png') }}" class="w-full h-auto" />
        </a>
        <div class="flex flex-col flex-grow">
            <div class="flex-grow flex flex-col py-5 justify-between items-start">
                <div class="flex flex-col space-y-2  w-full ">

                    <div class="w-full border-t px-2"></div>
                    <a href="{{ route('admin.index') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" view-box="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users_list') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>

                        </span>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.events_list') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>
                        </span>
                        <span>Events</span>
                    </a>
                    <a href="{{ route('admin.team_list') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                            </svg>
                        </span>
                        <span>Team Mambers</span>
                    </a>
                    <a href="{{ route('admin.professionals_list') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                        </span>
                        <span>Professionals</span>
                    </a>
                    <a href="{{ route('admin.playlist') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
                            </svg>
                        </span>
                        <span>Playlist & Media</span>
                    </a>
                    <a href="{{ route('admin.sponsors') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <title>handshake</title>
                                <path
                                    d="M11 6H14L17.29 2.7A1 1 0 0 1 18.71 2.7L21.29 5.29A1 1 0 0 1 21.29 6.7L19 9H11V11A1 1 0 0 1 10 12A1 1 0 0 1 9 11V8A2 2 0 0 1 11 6M5 11V15L2.71 17.29A1 1 0 0 0 2.71 18.7L5.29 21.29A1 1 0 0 0 6.71 21.29L11 17H15A1 1 0 0 0 16 16V15H17A1 1 0 0 0 18 14V13H19A1 1 0 0 0 20 12V11H13V12A2 2 0 0 1 11 14H9A2 2 0 0 1 7 12V9Z" />
                            </svg>
                        </span>
                        <span>Sponsors</span>
                    </a>
                    <a href="{{ route('admin.news') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <span>News & Blogs</span>
                    </a>

                    <div>
                        <li class="list-none">
                            <a href="#"
                                class="menu flex pl-1 2xl:px-3 py-2 space-x-1 2xl:space-x-1  items-center hover:text-accent not-active">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                </span>
                                <span>Merch & Shop</span>
                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </a>

                            <ul class="pl-8">
                                <li><a href="{{ route('admin.merchandise') }}"
                                        class=" flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">

                                        <span>Merchandise</span>
                                    </a></li>
                                <li><a href="{{ route('admin.merch_orders') }}"
                                        class=" flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">

                                        <span>Merch Orders</span>
                                    </a></li>

                            </ul>
                        </li>
                    </div>
                    <a href="{{ route('admin.contact') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>

                        </span>
                        <span>Contact & Support</span>
                    </a>
                    <a href="{{ route('admin.settings') }}"
                        class="flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                            </svg>
                        </span>
                        <span>Site settings</span>
                    </a>
                    <div>
                        <li class="list-none">
                            <a href="#"
                                class="menu flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent not-active">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <title>gavel</title>
                                        <path
                                            d="M2.3,20.28L11.9,10.68L10.5,9.26L9.78,9.97C9.39,10.36 8.76,10.36 8.37,9.97L7.66,9.26C7.27,8.87 7.27,8.24 7.66,7.85L13.32,2.19C13.71,1.8 14.34,1.8 14.73,2.19L15.44,2.9C15.83,3.29 15.83,3.92 15.44,4.31L14.73,5L16.15,6.43C16.54,6.04 17.17,6.04 17.56,6.43C17.95,6.82 17.95,7.46 17.56,7.85L18.97,9.26L19.68,8.55C20.07,8.16 20.71,8.16 21.1,8.55L21.8,9.26C22.19,9.65 22.19,10.29 21.8,10.68L16.15,16.33C15.76,16.72 15.12,16.72 14.73,16.33L14.03,15.63C13.63,15.24 13.63,14.6 14.03,14.21L14.73,13.5L13.32,12.09L3.71,21.7C3.32,22.09 2.69,22.09 2.3,21.7C1.91,21.31 1.91,20.67 2.3,20.28M20,19A2,2 0 0,1 22,21V22H12V21A2,2 0 0,1 14,19H20Z" />
                                    </svg>
                                </span>
                                <span>Legals & Policies</span>
                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </a>

                            <ul class="pl-8">
                                <li><a href="{{ route('admin.privacy-policy') }}"
                                        class=" flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">

                                        <span>Privacy Policy</span>
                                    </a></li>
                                <li><a href="{{ route('admin.terms-and-conditions') }}"
                                        class=" flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">

                                        <span>Terms & Conditions</span>
                                    </a></li>
                                <li><a href="{{ route('admin.delivery-policy') }}"
                                        class=" flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">

                                        <span>Delivery Policy</span>
                                    </a></li>
                                <li><a href="{{ route('admin.return-policy') }}"
                                        class=" flex px-1 2xl:px-3 py-2 space-x-1 2xl:space-x-2  items-center hover:text-accent sidebar-link not-active">

                                        <span>Return Policy</span>
                                    </a></li>
                            </ul>
                        </li>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="border-transparent border-l-8 hover:text-accent flex 2xl:px-3 py-2 space-x-2
                        items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" view-box="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </span>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
