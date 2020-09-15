<?php

use App\Helpers\CommonFunction;

$allEntityPermissions = \Request::get('permissionDetails')['allEntityPermissions'];
$entityList = array_flip(CommonFunction::getEntityList());
?>
<!-- BEGIN: SideNav-->
<aside id="side-menu" class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ route('dashboard') }}">
                <img src="https://materializecss.com/res/materialize.svg" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">Aapli Society</span>
            </a>
            <a class="navbar-toggler">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>

    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        @if(!empty(\Session::get('user.society_id')))
            <li class="bold">
                <a class="waves-effect waves-cyan" href="{{ route('dashboard') }}">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="bold">
                <a class="collapsible-header waves-effect waves-cyan ">
                    <i class="nav-icon fa fa-users"></i>
                    <span class="menu-title">Members</span>
                </a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        @if(array_key_exists('member', $entityList) && $allEntityPermissions[$entityList['member']]['view'])
                            <li>
                                <a class="collapsible-body" href="{{ route('members.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Members</span>
                                </a>
                            </li>
                            @if($allEntityPermissions[$entityList['member']]['add'])
                                <li>
                                    <a class="collapsible-body" href="{{ route('members.create') }}">
                                        <i class="material-icons">radio_button_unchecked</i>
                                        <span>Create Member</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </li>

            @if(array_key_exists('wing', $entityList) && $allEntityPermissions[$entityList['wing']]['view'])
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan ">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <span class="menu-title">Flats</span>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-body" href="{{ route('flats.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Flats</span>
                                </a>
                            </li>
                            @if($allEntityPermissions[$entityList['wing']]['add'])
                                <li>
                                    <a class="collapsible-body" href="{{ route('flats.create') }}">
                                        <i class="material-icons">radio_button_unchecked</i>
                                        <span>Create Flat</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            @if(array_key_exists('charge', $entityList) && !empty($allEntityPermissions[$entityList['charge']]['view']))
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan ">
                        <i class="nav-icon fa fa-money" aria-hidden="true"></i>
                        <span class="menu-title">Charges</span>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-body" href="{{ route('charges.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Charges</span>
                                </a>
                            </li>
                            @if($allEntityPermissions[$entityList['charge']]['add'])
                                <li>
                                    <a class="collapsible-body" href="{{ route('charges.create') }}">
                                        <i class="material-icons">radio_button_unchecked</i>
                                        <span>Create Charge</span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a class="collapsible-body" href="{{ route('charges.bill_group.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Manage Bill Groups</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if(array_key_exists('expense', $entityList) && !empty($allEntityPermissions[$entityList['expense']]['view']))
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan">
                        <i class="nav-icon fa fa-money" aria-hidden="true"></i>
                        <span class="menu-title">Expenses</span>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-body" href="{{ route('expenses.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Expenses</span>
                                </a>
                            </li>
                            <li>
                                <a class="collapsible-body" href="{{ route('expenses.category.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Expense Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if(array_key_exists('income', $entityList) && !empty($allEntityPermissions[$entityList['income']]['view']))
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan ">
                        <i class="nav-icon fa fa-money" aria-hidden="true"></i>
                        <span class="menu-title">Incomes</span>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-body" href="{{ route('incomes.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Incomes</span>
                                </a>
                            </li>
                            <li>
                                <a class="collapsible-body" href="{{ route('incomes.category.index') }}">
                                    <i class="material-icons">radio_button_unchecked</i>
                                    <span>Income Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if(array_key_exists('service', $entityList) && !empty($allEntityPermissions[$entityList['service']]['view']))
                <li class="bold">
                    <a class="waves-effect waves-cyan" href="{{ route('services.index') }}">
                        <i class="icon icon-service"></i>
                        <span class="menu-title">Services</span>
                    </a>
                </li>
            @endif

            @if(array_key_exists('notice', $entityList) && !empty($allEntityPermissions[$entityList['notice']]['view']))
                <li class="bold">
                    <a class="waves-effect waves-cyan" href="{{ route('notices.index') }}">
                        <i class="icon icon-notice"></i>
                        <span class="menu-title">Notices</span>
                    </a>
                </li>
            @endif
        @endif
     </ul>
</aside>
