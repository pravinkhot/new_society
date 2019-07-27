<!-- BEGIN: SideNav-->
<aside id="side-menu" class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="index.html">
                <img src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">Aapli Society</span>
            </a>
            <a class="navbar-toggler">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold">
            <a class="waves-effect waves-cyan" href="{{ route('dashboard') }}">
                <i class="material-icons">settings_input_svideo</i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan ">
                <i class="material-icons">cast</i><span class="menu-title">Members</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a class="collapsible-body" href="{{ route('members.index') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span>Members</span>
                        </a>
                    </li>
                    <li>
                        <a class="collapsible-body" href="{{ route('members.create') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span>Create Member</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
     </ul>
</aside>