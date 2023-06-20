<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>


    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

    @auth
        <script>
            // document.addEventListener('DOMContentLoaded', function() {
            // var htmlElement = document.querySelector("html");
            document.querySelector("html").setAttribute("data-theme", localStorage.getItem("theme"));
            // });
        </script>
    @endauth

    @livewireStyles

    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    @stack('styles')

    <title>@yield('title')</title>

</head>

<body class="h-screen pb-16"> {{--  bg-gradient-to-br from-cyan-400 to-sky-900 --}}
    <div class="h-full flex flex-col">
        <div class="flex flex-col items-center relative h-full">
            <div class="container w-full mb-2 md:mb-5 ">
                <div class="navbar py-0 md:py-4 px-4 bg-base-100 justify-between md:justify-start">
                    <a href="{{ route('home') }}">
                        {{-- <img src="{{ asset('storage/instabyte-logo-2.svg') }}" alt="logo"> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="106" height="33" class="fill-base-content mt-2">
                            <g transform="matrix(0.17320262 0 0 0.17320262 -0 0.43790907)">
                                <g transform="matrix(0.1 0 -0 -0.1 0 188)">
                                    <path
                                        d="M2086 1804C 2073 1792 2070 1766 2070 1684L2070 1684L2070 1580L1986 1580C 1889 1580 1877 1572 1876 1507L1876 1507L1875 1465L1966 1462L2058 1459L2054 1208L2050 956L2022 921C 1994 884 1929 820 1919 820C 1916 820 1914 853 1914 893C 1915 995 1888 1039 1765 1131L1765 1131L1671 1202L1694 1234C 1733 1286 1750 1327 1750 1369C 1750 1417 1732 1430 1667 1430C 1610 1430 1562 1398 1533 1340C 1505 1285 1504 1235 1530 1192L1530 1192L1551 1158L1515 1093C 1439 958 1371 854 1346 836C 1298 800 1295 815 1295 1100C 1295 1356 1295 1359 1272 1383C 1236 1421 1177 1444 1136 1436C 1062 1422 997 1334 930 1159L930 1159L891 1055L888 1230L885 1405L857 1418C 812 1440 759 1445 749 1429C 736 1408 738 760 751 721C 757 704 770 685 780 680C 803 668 860 667 878 679C 886 683 898 723 906 766C 923 867 984 1058 1022 1135C 1060 1210 1119 1300 1131 1300C 1135 1300 1138 1184 1137 1043C 1135 796 1136 783 1157 738C 1170 710 1189 685 1204 679C 1281 643 1376 724 1510 940C 1559 1020 1602 1090 1604 1095C 1609 1109 1737 982 1755 944C 1780 891 1775 843 1740 808C 1705 773 1680 775 1617 816C 1568 848 1542 844 1512 800C 1479 751 1486 729 1545 700C 1590 677 1607 675 1720 675C 1835 675 1850 677 1903 702C 1941 720 1983 752 2021 792C 2059 832 2080 848 2080 837C 2080 805 2129 722 2161 699C 2249 637 2361 677 2441 800L2441 800L2457 825L2478 785C 2550 644 2693 630 2811 751L2811 751L2869 809L2875 780C 2890 713 2980 660 3057 675C 3115 685 3186 765 3249 889C 3290 971 3298 995 3290 1011C 3279 1031 3263 1035 3242 1022C 3235 1017 3204 967 3172 910C 3106 791 3074 760 3035 778C 2990 799 2986 826 2988 1104C 2989 1278 2986 1368 2978 1377C 2963 1395 2892 1413 2864 1406C 2846 1401 2840 1393 2840 1373L2840 1373L2840 1346L2808 1377C 2762 1420 2738 1430 2683 1430C 2537 1429 2431 1244 2430 988C 2430 901 2325 757 2276 776C 2255 784 2231 851 2223 919C 2220 951 2221 1083 2225 1214L2225 1214L2232 1450L2335 1450C 2446 1450 2453 1453 2464 1507C 2474 1551 2453 1560 2336 1560L2336 1560L2240 1560L2240 1669L2240 1778L2198 1793C 2126 1819 2103 1821 2086 1804zM2787 1288C 2819 1252 2833 1193 2833 1090C 2834 945 2801 836 2744 791C 2709 763 2674 764 2646 795C 2563 884 2579 1203 2671 1288C 2702 1318 2760 1318 2787 1288z"
                                        stroke="none" />
                                    <path
                                        d="M3578 1806C 3470 1775 3396 1722 3336 1630C 3259 1514 3226 1390 3250 1304C 3266 1247 3338 1166 3386 1150C 3442 1131 3449 1148 3414 1217C 3389 1267 3385 1286 3385 1355C 3386 1483 3449 1647 3510 1680L3510 1680L3531 1691L3523 1458C 3519 1330 3515 1128 3515 1010C 3515 779 3518 762 3572 714C 3608 681 3655 670 3759 670C 3961 670 4091 736 4160 872C 4236 1025 4166 1188 4000 1247C 3972 1257 3950 1267 3950 1270C 3951 1273 3977 1292 4010 1312C 4136 1391 4176 1547 4099 1663C 4063 1718 4011 1755 3923 1788C 3840 1819 3656 1828 3578 1806zM3834 1706C 3904 1685 3947 1651 3975 1596C 4002 1541 4005 1514 3989 1457C 3967 1375 3888 1318 3779 1305C 3677 1292 3680 1287 3680 1469C 3680 1556 3683 1648 3686 1674L3686 1674L3693 1720L3740 1720C 3766 1720 3808 1714 3834 1706zM3924 1177C 4009 1112 4041 1008 4006 915C 3982 852 3913 794 3845 779C 3788 766 3708 774 3691 793C 3678 810 3672 1198 3685 1205C 3691 1207 3738 1208 3791 1207C 3879 1205 3890 1203 3924 1177z"
                                        stroke="none" />
                                    <path
                                        d="M4926 1804C 4913 1792 4910 1766 4910 1684L4910 1684L4910 1580L4826 1580C 4729 1580 4717 1572 4716 1507L4716 1507L4715 1465L4806 1462L4898 1459L4894 1213L4890 968L4839 904C 4811 869 4786 840 4783 840C 4779 840 4779 962 4783 1110L4783 1110L4788 1380L4752 1396C 4732 1404 4697 1410 4675 1408L4675 1408L4635 1405L4630 1195L4625 985L4590 916C 4553 842 4493 770 4468 770C 4442 770 4419 795 4410 835C 4397 891 4399 1103 4413 1244C 4422 1325 4422 1366 4415 1376C 4390 1409 4292 1422 4270 1395C 4252 1373 4262 874 4282 802C 4328 642 4500 627 4597 774L4597 774L4627 820L4632 768L4637 716L4561 646C 4364 465 4315 392 4322 292C 4327 219 4349 188 4418 154C 4462 132 4480 128 4524 133C 4618 143 4702 203 4737 288C 4763 350 4780 469 4780 586L4780 586L4780 700L4841 775C 4903 850 4920 863 4920 835C 4920 805 4970 721 5001 699C 5019 687 5053 675 5080 672C 5157 665 5223 708 5287 811L5287 811L5316 858L5340 814C 5427 648 5653 625 5794 766C 5872 846 5949 982 5929 1006C 5905 1035 5883 1021 5837 948C 5759 822 5702 780 5614 780C 5536 780 5500 806 5471 886C 5442 961 5444 967 5490 975C 5559 987 5647 1037 5685 1088C 5751 1173 5769 1316 5722 1379C 5676 1442 5571 1457 5484 1412C 5376 1356 5300 1209 5300 1056C 5300 1007 5294 986 5263 931C 5206 828 5181 794 5155 782C 5120 766 5104 775 5086 822C 5061 883 5057 958 5065 1214L5065 1214L5072 1450L5175 1450C 5286 1450 5293 1453 5304 1507C 5314 1551 5293 1560 5176 1560L5176 1560L5080 1560L5080 1669L5080 1778L5038 1793C 4966 1819 4943 1821 4926 1804zM5651 1328C 5676 1282 5641 1162 5588 1113C 5559 1086 5499 1060 5465 1060C 5436 1060 5433 1081 5450 1171C 5472 1287 5525 1350 5602 1350C 5630 1350 5642 1345 5651 1328zM4631 372C 4626 337 4612 289 4600 266C 4568 198 4500 179 4455 225C 4398 281 4442 394 4578 541L4578 541L4635 603L4638 519C 4640 473 4636 407 4631 372z"
                                        stroke="none" />
                                    <path
                                        d="M445 1788C 423 1777 376 1737 340 1701C 236 1596 168 1433 184 1328C 193 1269 239 1198 287 1166C 373 1111 398 1126 356 1208C 310 1300 313 1423 365 1553C 388 1612 445 1695 468 1704C 479 1709 481 1615 478 1187C 475 728 472 659 457 615C 434 548 435 540 467 540C 485 540 509 556 545 592C 589 636 602 658 621 720C 644 794 645 800 645 1280L645 1280L645 1764L611 1787C 567 1817 500 1817 445 1788z"
                                        stroke="none" />
                                </g>
                            </g>
                        </svg>
                    </a>

                    <div class="flex-1 justify-center">
                        @auth
                            {{-- @if (request()->is('profile')) --}}

                            {{-- @else --}}
                            <div class="indicator gap-4 hidden md:flex">
                                {{-- <span class="indicator-item badge w-[7rem] badge-secondary">Coming Soon</span> --}}
                                <div class="lg:tooltip lg:tooltip-bottom " data-tip="Home">
                                    <a href="{{ route('home') }}"
                                        class="btn btn-circle btn-outline border-none hover:bg-base-200">
                                        <svg aria-label="Home"
                                            class="{{ request()->is('/') ? 'fill-base-content stroke-base-content' : 'fill-gray-400 stroke-gray-400' }}"
                                            height="20" role="img" viewBox="0 0 24 24" width="20">
                                            <path
                                                d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z"
                                                fill="{{ request()->is('/') ? 'fill-base-content' : 'none' }}"
                                                stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>
                                    </a>
                                </div>

                                <div class="lg:tooltip lg:tooltip-bottom " data-tip="Search">
                                    <a href="{{ route('user.search') }}" class="btn btn-circle btn-outline border-none hover:bg-base-200">
                                        <svg aria-label="Search"
                                            class="{{ request()->is('search') ? 'stroke-base-content' : 'stroke-gray-400' }}"
                                            color="rgb(245, 245, 245)" fill="rgb(245, 245, 245)" height="20"
                                            role="img" viewBox="0 0 24 24" width="20">
                                            <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            </path>
                                            <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" x1="16.511" x2="22" y1="16.511"
                                                y2="22"></line>
                                        </svg>
                                    </a>
                                </div>

                                <div class="lg:tooltip lg:tooltip-bottom " data-tip="Add Post">
                                    <a href="{{ route('posts.create') }}"
                                        class="btn btn-circle btn-outline border-none hover:bg-transparent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 512.000000 512.000000">
                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                fill="url(#grad1)" stroke="none" class="gradient-fill">
                                                <defs>
                                                    <linearGradient id="grad1" x1="0%" y1="75%"
                                                        x2="100%" y2="0%">
                                                        <stop offset="0%" style="stop-color:#5aecff;stop-opacity:1" />
                                                        <stop offset="50%" style="stop-color:#2ebeff;stop-opacity:1" />
                                                        <stop offset="100%" style="stop-color:#228dff;stop-opacity:1" />
                                                    </linearGradient>
                                                </defs>
                                                <path
                                                    d="M595 5103 c-290 -62 -519 -294 -579 -585 -14 -69 -16 -283 -16 -1958 0 -2057 -3 -1953 57 -2095 75 -178 230 -333 409 -408 141 -60 38 -57 2094 -57 2033 0 1947 -2 2084 51 172 68 333 223 412 398 63 140 58 -25 62 2076 2 1718 1 1918 -13 1989 -60 297 -291 529 -587 590 -69 14 -276 16 -1965 15 -1637 -1 -1897 -3 -1958 -16z m3867 -294 c171 -36 310 -175 347 -347 16 -75 16 -3728 0 -3804 -16 -74 -62 -162 -115 -218 -52 -55 -155 -113 -232 -129 -76 -16 -3730 -16 -3804 0 -172 37 -310 175 -347 347 -16 75 -16 3728 0 3804 18 87 58 158 123 223 64 64 127 100 211 121 68 17 3736 20 3817 3z" />
                                                <path
                                                    d="M2410 3160 l0 -450 -450 0 -450 0 0 -150 0 -150 450 0 450 0 0 -450 0 -450 150 0 150 0 0 450 0 450 450 0 450 0 0 150 0 150 -450 0 -450 0 0 450 0 450 -150 0 -150 0 0 -450z" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>

                                <div class="lg:tooltip lg:tooltip-bottom " data-tip="Notifications">
                                    <a href="#" class="btn btn-circle btn-outline border-none hover:bg-base-200">
                                        <svg class="{{ request()->is('notifications') ? '1' : 'stroke-gray-400 fill-gray-400' }}"
                                            height="20px" width="20px" viewBox="0 0 24 24">
                                            <path
                                                d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"
                                                stroke-width="0">
                                            </path>
                                        </svg>
                                    </a>
                                </div>


                                <div class="lg:tooltip lg:tooltip-bottom " data-tip="Inbox">
                                    <a href="{{ route('inbox.index') }}"
                                        class="btn btn-circle btn-outline border-none hover:bg-base-200">
                                        <svg class="{{ request()->is('inbox') || request()->is('inbox/*') ? 'fill-base-content stroke-base-content' : 'fill-gray-400 stroke-gray-400' }}"
                                            height="20" viewBox="0 0 1792 1792" width="20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1664 1504v-768q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5-102.5 24.5h-2q-48 0-102.5-24.5t-86.5-48.5-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5h-1472q-13 0-22.5 9.5t-9.5 22.5q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5 50.5 27.5 43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5t46.5-131.5zm128-37v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z" />
                                        </svg>
                                        {{-- <svg class=" {{ request()->is('inbox') || request()->is('inbox/*') ? 'fill-base-content stroke-base-content' : 'fill-gray-400 stroke-gray-400' }}"
                                                height="20" role="img" viewBox="0 0 24 24" width="20">
                                                <line stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218"
                                                    y1="3" y2="10.083"></line>
                                                <polygon fill="none"
                                                    points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                                    stroke-linejoin="round" stroke-width="2">
                                                </polygon>
                                            </svg> --}}
                                    </a>
                                </div>
                            </div>
                            {{-- @endif --}}
                        @endauth
                    </div>

                    @auth
                        <div class="flex-none ml-11">
                            @if (request()->is('profile') || request()->is('inbox', 'inbox/*'))
                                <label for="my-drawer-2" class="btn btn-outline btn-sm drawer-button lg:hidden">
                                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current md:h-6 md:w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </label>
                            @endif

                            <div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-9 rounded-full">
                                        @if (auth()->user()->getFirstMediaUrl('profile', 'avatar'))
                                            {{-- {{ auth()->user()->getFirstMedia('profile')->img('avatar') }} --}}
                                            <img src="{{ auth()->user()->getFirstMediaUrl('profile', 'avatar') }}"
                                                alt="Profile picture">
                                        @else
                                            <img src="https://placeimg.com/192/192/people" />
                                        @endif
                                    </div>
                                </label>
                                <ul tabindex="0"
                                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                                    <li>
                                        <a href="{{ route('viewprofile.index', auth()->user()) }}"
                                            class="justify-between">
                                            Profile
                                        </a>
                                    </li>
                                    <li><a href="{{ route('profile.edit') }}">Settings</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                            @csrf
                                            <button type="submit" class="w-full text-left">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>

            <x-mobile-nav />

            {{-- content --}}
            @yield('content')

            <footer class="fixed bottom-0 w-full justify-between items-center p-4 bg-base-100 hidden md:flex z-50">
                <span class="items-center flex">
                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        fill-rule="evenodd" clip-rule="evenodd" class="fill-info">
                        <path
                            d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                        </path>
                    </svg>
                    <p class="text-info text-sm">Made by: Omer Šahmanović</p>
                </span>
                <span class="flex gap-2 md:place-self-center md:justify-self-end">
                    <a href="https://www.linkedin.com/in/omer-sahmanovic-2a9a37225/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                            class="fill-info">
                            <g transform="translate(0.000000,30.000000) scale(0.004724,-0.005556)" class="fill-info">
                                <path
                                    d="M283 5386 c-136 -43 -247 -167 -273 -307 -14 -70 -14 -4647 0 -4718 23 -121 113 -235 227 -289 l58 -27 2390 0 2390 0 58 27 c114 54 204 168 227 289 14 72 14 4648 0 4720 -23 120 -113 233 -227 287 l-58 27 -2375 2 c-1944 1 -2383 -1 -2417 -11z m1109 -778 c94 -47 176 -130 221 -225 30 -64 32 -74 32 -184 0 -113 -1 -116 -38 -191 -202 -410 -791 -317 -857 135 -24 165 69 357 216 443 90 53 139 65 250 62 93 -3 107 -6 176 -40z m2384 -1169 c446 -49 681 -286 759 -764 27 -162 35 -472 28 -1162 l-6 -673 -388 0 -388 0 -3 768 c-4 750 -4 769 -25 844 -42 147 -101 226 -206 274 -57 27 -71 29 -182 29 -139 0 -205 -16 -281 -68 -91 -62 -143 -153 -181 -312 -14 -61 -17 -165 -20 -802 l-4 -733 -390 0 -389 0 0 1270 0 1270 375 0 375 0 0 -170 c0 -181 7 -202 43 -141 36 61 110 142 180 197 197 154 409 206 703 173z m-2186 -1329 l0 -1270 -390 0 -390 0 0 1270 0 1270 390 0 390 0 0 -1270z" />
                                <path
                                    d="M5863 726 c-65 -21 -128 -62 -167 -107 -146 -171 -115 -429 67 -553 271 -183 628 44 576 366 -20 124 -95 223 -209 276 -67 31 -199 40 -267 18z m205 -51 c69 -21 147 -86 186 -155 28 -50 31 -63 31 -145 0 -75 -4 -98 -24 -139 -76 -155 -261 -224 -413 -154 -197 91 -251 339 -109 501 82 93 207 128 329 92z" />
                                <path
                                    d="M5840 370 l0 -200 30 0 30 0 0 85 0 85 33 0 c29 0 36 -7 85 -85 51 -81 55 -85 89 -85 43 0 42 3 -27 105 -48 71 -49 75 -27 75 13 0 35 13 50 28 22 22 27 38 27 76 0 95 -33 116 -185 116 l-105 0 0 -200z m211 121 c24 -30 24 -46 -1 -71 -16 -16 -33 -20 -85 -20 l-65 0 0 61 0 61 66 -4 c55 -3 70 -8 85 -27z" />
                            </g>
                        </svg>
                    </a>
                    <a href="https://github.com/Omchooo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                            class="fill-info">
                            <g transform="translate(0.000000,30.000000) scale(0.012500,-0.012500)" class="fill-info">
                                <path
                                    d="M1040 2319 c-153 -20 -357 -99 -491 -190 -77 -52 -207 -175 -264 -249 -106 -139 -191 -329 -220 -497 -20 -112 -19 -318 1 -423 71 -375 324 -690 680 -845 89 -39 133 -44 157 -17 14 15 17 41 17 141 0 119 -1 122 -20 116 -38 -12 -174 -9 -221 4 -69 19 -114 62 -155 146 -36 74 -83 132 -138 171 -37 25 -28 44 21 44 51 0 99 -26 141 -77 125 -151 156 -169 267 -161 82 7 107 23 122 80 7 25 24 59 38 76 l26 31 -38 6 c-284 49 -416 157 -469 382 -41 177 -10 361 79 460 17 20 18 27 8 67 -16 63 -14 140 6 209 l16 59 46 -7 c57 -9 147 -44 213 -85 l51 -32 86 18 c111 22 289 22 406 0 l90 -17 60 35 c75 45 159 77 209 79 39 2 40 1 54 -43 16 -52 19 -193 5 -230 -8 -20 -5 -32 24 -72 55 -76 75 -140 80 -253 8 -176 -34 -311 -128 -410 -79 -83 -175 -126 -366 -161 -22 -4 -22 -5 10 -56 l32 -51 5 -227 c6 -250 8 -260 65 -260 55 0 200 68 325 153 60 41 192 168 245 237 106 138 191 329 220 497 20 112 19 318 -1 423 -31 165 -106 338 -205 471 -60 81 -195 212 -274 266 -235 159 -531 229 -815 192z" />
                            </g>
                        </svg>
                    </a>
    
                </span>
            </footer>
        </div>

        

        <x-scroll-up />

        @unless (request()->is('inbox', 'inbox/*'))
            @auth
                <livewire:message-notification-box wire:key="msgnotification.uniqid()">
                @endauth
            @endunless

    </div>

    {{-- <script src="{{ asset('resources\js\app.js') }}"></script> --}}
    @stack('scripts')
    @livewireScripts
</body>

</html>
