<?php
    $routeName = \Request::route()->getName();
    $explodeRouteName = explode('.', $routeName);
    $breadcrumbList = \App\Helpers\DataProvider::getBreadcrumbList(
        $explodeRouteName[0] ?? '',
        $explodeRouteName[1] ?? ''
    );
?>

<!-- BEGIN: Breadcrumbs-->
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">@yield('mainTitle')</h5>
                <ol class="breadcrumbs mb-0">
                    @if(!empty($breadcrumbList))
                        @foreach($breadcrumbList as $breadcrumb)
                            @if(!isset($breadcrumb['url']))
                                <li class="breadcrumb-item active">
                                    {{ $breadcrumb['label'] }}
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- END: Breadcrumbs-->
