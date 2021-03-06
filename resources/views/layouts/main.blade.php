<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}" sizes="32x32">

    <title>@yield('page-title')</title>

@yield('page-specific-css')

<!-- uikit -->
    <link rel="stylesheet" href="{{ url('bower_components/uikit/css/uikit.almost-flat.css') }}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="{{ url('assets/css/themes/themes_combined.min.css') }}" media="all">

    <style> .disabled { cursor: not-allowed; } </style> <!-- Force disabled elements to use this cursor -->
</head>
<body class="header_full">

<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">
            <div class="main_logo_top">
                <a href="{{ url('/') }}" style="padding-left: 25px">
                    <img src="{{ url('assets/img/newsim_logo.jpg') }}" alt="newsim_logo">
                </a>
            </div>

            <!-- secondary sidebar switch -->
            <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                <span class="sSwitchIcon"></span>
            </a>

            <div class="uk-navbar-flip uk-float-left">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="{{ route('documents.create') }}" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE145;</i></a></li>
                    <li><a href="{{ route('categories.index') }}" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE2C7;</i></a></li>
                    <li><a href="{{ route('documents.index') }}" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE241;</i></a></li>
                </ul>
            </div>

            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i
                                    class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                    <li><a href="#" id="main_search_btn" class="user_action_icon"><i
                                    class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span
                                    class="uk-badge">@if($expiring_documents) {{ count($expiring_documents) }} @else 0 @endif</span></a>
                        <div class="uk-dropdown uk-dropdown-xlarge">
                            <div class="md-card-content">
                                <ul class="uk-tab uk-tab-grid"
                                    data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                    <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Expiring Docs
                                            ( @if($expiring_documents) {{ count($expiring_documents) }} @else 0 @endif )</a></li>
                                    <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts
                                            (4)</a></li>
                                </ul>
                                <ul id="header_alerts" class="uk-switcher uk-margin">
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            @if($expiring_documents)
                                                @foreach(cache()->get('expiring_documents') as $expiring)
                                                    <li style="cursor: pointer;" onclick="show_expiring_document({{ $expiring->id }})">
                                                        <div class="md-list-addon-element">
                                                            <span class="md-user-letters md-bg-red">EXP</span>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span class="md-list-heading"><a href="pages_mailbox.html">{{ $expiring->category->departments }}</a></span>
                                                            <span class="uk-text-small uk-text-muted">A document under <strong>{{ $expiring->category->name }}</strong> is about to expire. Click this notification to view document.</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    Hurray!<br/>No documents are currently expiring!
                                                </li>
                                            @endif
                                        </ul>
                                        @if($expiring_documents)
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html"
                                                   class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        @endif
                                    </li>
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-warning"><i class="material-icons">&#xE002;</i></i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Dolorum mollitia.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Laboriosam est fuga quo laboriosam ut numquam ut ut.</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image"
                                                                   src="{{ url('assets/img/avatars/avatar_11_tn.png') }}"/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="page_user_profile.html">My profile</a></li>
                                <li><a href="page_settings.html">Settings</a></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form action="{{ url('search-results') }}" method="get">
            <input type="text" class="header_main_search_input" name="keyword"/>
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i>
            </button>
        </form>
    </div>
</header><!-- main header end -->

<div id="page_content">
    <div id="page_heading" data-uk-sticky="{ top: 48, media: 960 }">
        <h1><strong>@yield('page-title-heading')</strong></h1>
        <span class="uk-text-muted uk-text-upper uk-text-small">@yield('page-description')</span>
    </div>

    <div id="page_content_inner">

        @yield('content')

    </div>
</div>

@yield('modals')

<!-- common functions -->
<script src="{{ url('assets/js/common.js') }}"></script>

<!-- uikit functions -->
<script src="{{ url('assets/js/uikit_custom.js') }}"></script>

<!-- altair common functions/helpers -->
<script src="{{ url('assets/js/altair_admin_common.js') }}"></script>

<!--  notifications functions -->
<script src="{{ url('assets/js/pages/components_notifications.js') }}"></script>

<!-- vuejs -->
<script src="https://unpkg.com/vue@2.3.3"></script>

<!-- axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@yield('scripts')
<script>
    function show_expiring_document(document_id) {
        window.location = "{{ url('documents') }}/" + document_id
    }
</script>

@yield('vuejs-scripts')

</body>
</html>