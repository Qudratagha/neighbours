@extends('layouts.app')
@section('body-class', 'app sidebar-mini rtl')
@section('nav')
<div class="page" xmlns="">
    <div class="page-main">
        <!--app-header-->
        <div class="app-header  header hor-topheader d-flex">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="{{route('dashboard')}}">
                        <img src="{{asset('assets/images/brand/NFMS.png')}}" class="header-brand-img main-logo" alt="Hogo logo">
                     </a><!-- logo-->
{{--                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href=""></a>--}}
                    <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>

                    <div class="d-flex order-lg-2 ml-auto header-rightmenu">

                        <div class="dropdown">
                            <ul class="nav header-nav">
                                <li class="nav-item dropdown header-option m-2">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-user mr-2"></i>
                                            {{ Auth::user()->name }}
                                        <i class="mr-2"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fe fe-log-out mr-2"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- logout -->
                        <div class="dropdown">
                            <a  class="nav-link icon full-screen-link" id="fullscreen-button" data-toggle="fullscreen-button" data-placement="bottom" title="FullScreen">
                                <i class="fe fe-maximize-2"></i>
                            </a>
                        </div><!-- full-screen -->
                    </div>
                </div>
            </div>
        </div>
        <!--app-header end-->

        <!-- Horizontal-menu -->
        <div class="horizontal-main hor-menu clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <nav class="horizontalMenu clearfix">
                    <ul class="horizontalMenu-list">
                        {{--                            Dashboard   --}}
                        @canany('dashboard-read')
                        <li aria-haspopup="true"><a href="{{route('dashboard')}}" class="sub-icon @if(request()->route()->action['as'] == 'dashboard') active @endif"><i class="typcn typcn-device-desktop hor-icon"></i> Dashboard</a></li>
                        @endcanany

                        {{--                            Cow     --}}
                        @canany('cow-read')
                        <li aria-haspopup="true"><a href="{{route('cattle.index','cow')}}" class="sub-icon @if(request()->route()->action['as'] == "cattle.index" && request()->route()->parameters['cattle_type'] == 'cow' || request()->route()->action['as'] == 'cattle_daily.show' || request()->route()->action['as'] == 'cow_sale.index' || request()->route()->action['as'] == 'milk_sale.index') active @endif"><i class="typcn typcn-th-large-outline hor-icon"></i> Cows <i class="fa fa-angle-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="{{route('milk_sale.index')}}"  class="sub-icon ">Milk Sale</a></li>
                                <li aria-haspopup="true"><a href="{{route('cow_sale.index')}}"  class="sub-icon ">Cow Sale</a></li>
                            </ul>
                        </li>
                        @endcanany

                        {{--                            Goat/Sheep  --}}
                        @canany('goat-read')
                        <li aria-haspopup="true"><a href="{{route('cattle.index','goat')}}" class="sub-icon @if(request()->route()->action['as'] == 'cattle.index' && request()->route()->parameters['cattle_type'] == 'goat' || request()->route()->action['as'] == 'goat_daily.show' || request()->route()->action['as'] == 'goat_sale.index') active @endif"><i class="typcn typcn-th-large-outline hor-icon"></i> Goats/Sheeps <i class="fa fa-angle-down horizontal-icon"></i>                                                                  </a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="{{route('goat_sale.index')}}"  class="sub-icon ">Goat Sale</a></li>
                            </ul>
                        </li>
                        @endcanany

                        {{--                            Poultry  --}}
                        @canany('poultry-read')
                        <li aria-haspopup="true"><a href="{{route('poultry.index')}}" class="sub-icon @if(request()->route()->action['as'] == 'poultry.index') active @endif ||@if(request()->route()->action['as'] == 'poultry_daily.indexDaily') active @endif  "><i class="typcn typcn-arrow-move-outline"></i> Poultry <i class="fa fa-angle-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
{{--                                <li aria-haspopup="true"><a href="{{route('poultry.index')}}"  class="sub-icon @if(request()->route()->action['as'] == 'poultry.index') active @endif">Poultry</a></li>--}}
                                <li aria-haspopup="true"><a href="{{route('poultry_daily.indexDaily')}}"  class="sub-icon @if(request()->route()->action['as'] == 'poultry_daily.indexDaily') active @endif">Poultry Daily</a></li>
                            </ul>
                        </li>
                        @endcanany

                        {{--                            Cultivation  --}}
                        @canany('cultivation-read')
                            <li aria-haspopup="true"><a href="{{route('cultivation.index')}}" class="sub-icon @if(request()->route()->action['as'] == 'cultivation.index') active @endif"><i class="typcn typcn-th-large-outline hor-icon"></i> Cultivation <i class="fa fa-angle-down horizontal-icon"></i>                                                                  </a>
                                <ul class="sub-menu">
                                    <li aria-haspopup="true"><a href="{{route('cultivation.collectCultivation')}}"  class="sub-icon @if(request()->route()->action['as'] == 'cultivation.collectCultivation') active @endif">Cultivation Collect</a></li>
                                    <li aria-haspopup="true"><a href="{{route('cultivation.saleCultivation')}}"  class="sub-icon @if(request()->route()->action['as'] == 'cultivation.saleCultivation') active @endif">Cultivation Sale</a></li>
                                </ul>
                            </li>
                        @endcanany

                        {{--                            rates  --}}
                        @canany('rate-read')
                        <li aria-haspopup="true"><a href="{{route('rates.index')}}" class="sub-icon @if(request()->route()->action['as'] == 'rates.index') active @endif"><i class="typcn typcn-arrow-move-outline"></i> Rates </a></li>
                        @endcanany

                    </ul>
                </nav>
                <!--Nav end -->
            </div>
        </div>
        <!-- Horizontal-menu end -->
    </div>
</div
@endsection
