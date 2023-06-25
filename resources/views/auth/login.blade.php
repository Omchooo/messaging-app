@extends('layouts.auth')

@section('title', 'Login • InstaByte')

@section('content')
    <div class="container mx-auto max-w-3xl md:my-9 flex items-center justify-around">
        <div class="card flex-row w-full justify-center bg-base-100 md:shadow-lg rounded my-4">

            {{-- <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col mx-3 items-center">

                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="text" name="email" value="{{ old('email') }}"
                            class="input input-bordered w-full max-w-xs bg-base-100" required autocomplete="email"
                            autofocus />
                    </div>

                    <div class="form-control w-full max-w-xs mt-3">
                        <label class="label pt-0">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full max-w-xs bg-base-100"
                            required autocomplete="password" />
                    </div>

                </div>
                <div class="block mt-4 ml-9">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded bg-base-100 border-gray-300 dark:border-gray-700  shadow-sm focus:ring-accent-500 dark:focus:ring-accent-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                </div>
                <div class="divider my-0"></div>
                <div class="mx-9 mt-2 mb-3">
                    <button type="submit" class="btn btn-outline btn-sm btn-accent h-9 w-full ">Login</button>
                </div>
            </form>
            <livewire:fast-login /> --}}

            <div class="flex flex-col items-center justify-center py-20 px-8 w-full relative gap-5">
                <div class="absolute top-5 md:left-5">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="106"
                        height="33" class="fill-base-content">
                        <g transform="matrix(0.17320262 0 0 0.17320262 -0 0.43790907)">
                            <g transform="matrix(0.1 0 -0 -0.1 0 188)">
                                <path
                                    d="M2086 1804C 2073 1792 2070 1766 2070 1684L2070 1684L2070 1580L1986 1580C 1889 1580 1877 1572 1876 1507L1876 1507L1875 1465L1966 1462L2058 1459L2054 1208L2050 956L2022 921C 1994 884 1929 820 1919 820C 1916 820 1914 853 1914 893C 1915 995 1888 1039 1765 1131L1765 1131L1671 1202L1694 1234C 1733 1286 1750 1327 1750 1369C 1750 1417 1732 1430 1667 1430C 1610 1430 1562 1398 1533 1340C 1505 1285 1504 1235 1530 1192L1530 1192L1551 1158L1515 1093C 1439 958 1371 854 1346 836C 1298 800 1295 815 1295 1100C 1295 1356 1295 1359 1272 1383C 1236 1421 1177 1444 1136 1436C 1062 1422 997 1334 930 1159L930 1159L891 1055L888 1230L885 1405L857 1418C 812 1440 759 1445 749 1429C 736 1408 738 760 751 721C 757 704 770 685 780 680C 803 668 860 667 878 679C 886 683 898 723 906 766C 923 867 984 1058 1022 1135C 1060 1210 1119 1300 1131 1300C 1135 1300 1138 1184 1137 1043C 1135 796 1136 783 1157 738C 1170 710 1189 685 1204 679C 1281 643 1376 724 1510 940C 1559 1020 1602 1090 1604 1095C 1609 1109 1737 982 1755 944C 1780 891 1775 843 1740 808C 1705 773 1680 775 1617 816C 1568 848 1542 844 1512 800C 1479 751 1486 729 1545 700C 1590 677 1607 675 1720 675C 1835 675 1850 677 1903 702C 1941 720 1983 752 2021 792C 2059 832 2080 848 2080 837C 2080 805 2129 722 2161 699C 2249 637 2361 677 2441 800L2441 800L2457 825L2478 785C 2550 644 2693 630 2811 751L2811 751L2869 809L2875 780C 2890 713 2980 660 3057 675C 3115 685 3186 765 3249 889C 3290 971 3298 995 3290 1011C 3279 1031 3263 1035 3242 1022C 3235 1017 3204 967 3172 910C 3106 791 3074 760 3035 778C 2990 799 2986 826 2988 1104C 2989 1278 2986 1368 2978 1377C 2963 1395 2892 1413 2864 1406C 2846 1401 2840 1393 2840 1373L2840 1373L2840 1346L2808 1377C 2762 1420 2738 1430 2683 1430C 2537 1429 2431 1244 2430 988C 2430 901 2325 757 2276 776C 2255 784 2231 851 2223 919C 2220 951 2221 1083 2225 1214L2225 1214L2232 1450L2335 1450C 2446 1450 2453 1453 2464 1507C 2474 1551 2453 1560 2336 1560L2336 1560L2240 1560L2240 1669L2240 1778L2198 1793C 2126 1819 2103 1821 2086 1804zM2787 1288C 2819 1252 2833 1193 2833 1090C 2834 945 2801 836 2744 791C 2709 763 2674 764 2646 795C 2563 884 2579 1203 2671 1288C 2702 1318 2760 1318 2787 1288z"
                                    stroke="none"></path>
                                <path
                                    d="M3578 1806C 3470 1775 3396 1722 3336 1630C 3259 1514 3226 1390 3250 1304C 3266 1247 3338 1166 3386 1150C 3442 1131 3449 1148 3414 1217C 3389 1267 3385 1286 3385 1355C 3386 1483 3449 1647 3510 1680L3510 1680L3531 1691L3523 1458C 3519 1330 3515 1128 3515 1010C 3515 779 3518 762 3572 714C 3608 681 3655 670 3759 670C 3961 670 4091 736 4160 872C 4236 1025 4166 1188 4000 1247C 3972 1257 3950 1267 3950 1270C 3951 1273 3977 1292 4010 1312C 4136 1391 4176 1547 4099 1663C 4063 1718 4011 1755 3923 1788C 3840 1819 3656 1828 3578 1806zM3834 1706C 3904 1685 3947 1651 3975 1596C 4002 1541 4005 1514 3989 1457C 3967 1375 3888 1318 3779 1305C 3677 1292 3680 1287 3680 1469C 3680 1556 3683 1648 3686 1674L3686 1674L3693 1720L3740 1720C 3766 1720 3808 1714 3834 1706zM3924 1177C 4009 1112 4041 1008 4006 915C 3982 852 3913 794 3845 779C 3788 766 3708 774 3691 793C 3678 810 3672 1198 3685 1205C 3691 1207 3738 1208 3791 1207C 3879 1205 3890 1203 3924 1177z"
                                    stroke="none"></path>
                                <path
                                    d="M4926 1804C 4913 1792 4910 1766 4910 1684L4910 1684L4910 1580L4826 1580C 4729 1580 4717 1572 4716 1507L4716 1507L4715 1465L4806 1462L4898 1459L4894 1213L4890 968L4839 904C 4811 869 4786 840 4783 840C 4779 840 4779 962 4783 1110L4783 1110L4788 1380L4752 1396C 4732 1404 4697 1410 4675 1408L4675 1408L4635 1405L4630 1195L4625 985L4590 916C 4553 842 4493 770 4468 770C 4442 770 4419 795 4410 835C 4397 891 4399 1103 4413 1244C 4422 1325 4422 1366 4415 1376C 4390 1409 4292 1422 4270 1395C 4252 1373 4262 874 4282 802C 4328 642 4500 627 4597 774L4597 774L4627 820L4632 768L4637 716L4561 646C 4364 465 4315 392 4322 292C 4327 219 4349 188 4418 154C 4462 132 4480 128 4524 133C 4618 143 4702 203 4737 288C 4763 350 4780 469 4780 586L4780 586L4780 700L4841 775C 4903 850 4920 863 4920 835C 4920 805 4970 721 5001 699C 5019 687 5053 675 5080 672C 5157 665 5223 708 5287 811L5287 811L5316 858L5340 814C 5427 648 5653 625 5794 766C 5872 846 5949 982 5929 1006C 5905 1035 5883 1021 5837 948C 5759 822 5702 780 5614 780C 5536 780 5500 806 5471 886C 5442 961 5444 967 5490 975C 5559 987 5647 1037 5685 1088C 5751 1173 5769 1316 5722 1379C 5676 1442 5571 1457 5484 1412C 5376 1356 5300 1209 5300 1056C 5300 1007 5294 986 5263 931C 5206 828 5181 794 5155 782C 5120 766 5104 775 5086 822C 5061 883 5057 958 5065 1214L5065 1214L5072 1450L5175 1450C 5286 1450 5293 1453 5304 1507C 5314 1551 5293 1560 5176 1560L5176 1560L5080 1560L5080 1669L5080 1778L5038 1793C 4966 1819 4943 1821 4926 1804zM5651 1328C 5676 1282 5641 1162 5588 1113C 5559 1086 5499 1060 5465 1060C 5436 1060 5433 1081 5450 1171C 5472 1287 5525 1350 5602 1350C 5630 1350 5642 1345 5651 1328zM4631 372C 4626 337 4612 289 4600 266C 4568 198 4500 179 4455 225C 4398 281 4442 394 4578 541L4578 541L4635 603L4638 519C 4640 473 4636 407 4631 372z"
                                    stroke="none"></path>
                                <path
                                    d="M445 1788C 423 1777 376 1737 340 1701C 236 1596 168 1433 184 1328C 193 1269 239 1198 287 1166C 373 1111 398 1126 356 1208C 310 1300 313 1423 365 1553C 388 1612 445 1695 468 1704C 479 1709 481 1615 478 1187C 475 728 472 659 457 615C 434 548 435 540 467 540C 485 540 509 556 545 592C 589 636 602 658 621 720C 644 794 645 800 645 1280L645 1280L645 1764L611 1787C 567 1817 500 1817 445 1788z"
                                    stroke="none"></path>
                            </g>
                        </g>
                    </svg>
                </div>

                <span class="flex flex-col items-center w-full my-2">
                    <p class="text-lg font-semibold">Welcome back</p>
                    <p class="text-sm">Catch up to latest the posts</p>
                </span>

                <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="w-full max-w-xs">
                    @csrf
                    <div class="flex flex-col mx-3 items-center">
                        <div class="form-control w-full max-w-xs mt-3">
                            <label class="label pt-0">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="input-sm border-b-base-content focus:ring-info @error('email') focus:ring-error @enderror focus:border-none border-x-0 border-t-0 rounded-none w-full max-w-xs bg-base-100"
                                required autocomplete="email" autofocus />
                            @error('email')
                                <span class="label-text text-error mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-control w-full max-w-xs mt-3">
                            <label class="label pt-0">
                                <span class="label-text">Password</span>
                            </label>
                            <input type="password" name="password"
                                class="input-sm border-b-base-content focus:ring-info @error('password') focus:ring-error @enderror focus:border-none border-x-0 border-t-0 rounded-none w-full max-w-xs bg-base-100"
                                required autocomplete="password" />
                            @error('password')
                                <span class="label-text text-error mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="block mt-4 ml-3">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded bg-base-100 border-gray-300 dark:border-gray-700 shadow-sm checked:focus:bg-info checked:bg-info dark:focus:ring-info focus:ring-offset-info-content"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                        </label>
                    </div>
                    {{-- <div class="divider my-0"></div> --}}
                    <div class="mx-9 mt-8">
                        <button type="submit" class="btn btn-sm btn-info h-9 w-full dark:text-white">Login</button>
                    </div>
                </form>
                <livewire:fast-login />

                <span class="flex gap-2 justify-center w-full my-2 text-sm">
                    Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-info">Sign up</a>
                </span>
            </div>

            <div class="hidden md:block max-w-sm">
                <img src="{{ asset('storage/auth-images/auth-img-' . rand(2, 24) . '.jpg') }}" alt="Image"
                    class="h-full aspect-9/16">
            </div>

        </div>

        {{-- <div class="mockup-code">
            <pre data-prefix="$"><code>welcome to instabyte</code></pre>
            <pre data-prefix=">" class="text-warning"><code>application is still under development</code></pre>
            <pre data-prefix=">" class="text-warning"><code>real-time events are currently down</code></pre>
            <pre data-prefix=">" class="text-success"><code>fast login: no registration needed</code></pre>
            <x-input-error :messages="$errors" />
            <br />
            <pre data-prefix=">" class="text-info"><code><a href="{{ url('/register') }}">don't have an account?</a></code></pre>
        </div> --}}
    </div>
@endsection
