<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
          content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="{{asset('admin/img/icons/icon-48x48.png')}}"/>

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('admin/css/light.css')}}" rel="stylesheet">
    @yield('extraCss')

    @livewireStyles
</head>
<body class="antialiased">
@yield('content')

<script>
// IMMEDIATE FIX - Execute before jQuery loads
(function() {
    function immediateFix() {
        // Remove any text nodes containing index.html
        var walker = document.createTreeWalker(
            document.body,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );
        
        var textNodes = [];
        var node;
        while (node = walker.nextNode()) {
            if (node.textContent.includes('index.html')) {
                textNodes.push(node);
            }
        }
        
        textNodes.forEach(function(textNode) {
            textNode.remove();
        });
        
        console.log('Immediate fix executed, removed', textNodes.length, 'text nodes');
    }
    
    // Run immediately
    immediateFix();
    
    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', immediateFix);
    } else {
        immediateFix();
    }
})();
</script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@livewireScripts
@stack('scriptBottom')

<script>
    // Vérifier que Livewire est chargé
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Livewire === 'undefined') {
            console.error('Livewire n\'est pas chargé correctement');
            // Recharger les scripts Livewire
            var script = document.createElement('script');
            script.src = '/vendor/livewire/livewire.js';
            document.head.appendChild(script);
        } else {
            console.log('Livewire chargé correctement');
        }
    });
</script>

<script>

    $(document).ready(function () {
        $("#componentFrontend,#componentBackend,#createModel,#createController,#alterTable,#createTable").modal({
            show: false,
            backdrop: 'static'
        });
    });

    $(function () {
        $('.noSpacesField').bind('input', function () {
            $(this).val(function (_, v) {
                return v.replace(/\s+/g, '');
            });
        });
    });

    function toastMessage(message, type) {
        var message = message;
        var type = type;
        var duration = 5000;
        var ripple = '';
        var dismissible = '';
        var positionX = 'center';
        var positionY = 'bottom';
        window.notyf.open({
            type,
            message,
            duration,
            ripple,
            dismissible,
            position: {
                x: positionX,
                y: positionY
            }
        });
    }

    // Modern UI Enhancements
    $(document).ready(function() {
        // Smooth sidebar toggle
        $('.js-sidebar-toggle').on('click', function() {
            $('.sidebar').toggleClass('collapsed');
            $('.main').toggleClass('sidebar-collapsed');
        });

        // Search functionality
        $('.search-input').on('input', function() {
            var query = $(this).val().toLowerCase();
            
            if (query.length > 0) {
                // Hide all sidebar items
                $('.sidebar-nav .sidebar-item').hide();
                $('.sidebar-dropdown .sidebar-item').hide();
                $('.sidebar-header').hide();
                
                // Show matching items
                $('.sidebar-nav .sidebar-item').each(function() {
                    var text = $(this).text().toLowerCase();
                    if (text.includes(query)) {
                        $(this).show();
                        // Show parent header if exists
                        $(this).closest('.sidebar-nav').find('.sidebar-header').show();
                    }
                });
                
                $('.sidebar-dropdown .sidebar-item').each(function() {
                    var text = $(this).text().toLowerCase();
                    if (text.includes(query)) {
                        $(this).show();
                        // Show parent dropdown
                        $(this).closest('.sidebar-dropdown').show();
                        $(this).closest('.sidebar-dropdown').prev('.sidebar-item').show();
                        // Show parent header
                        $(this).closest('.sidebar-nav').find('.sidebar-header').show();
                    }
                });
                
                // Show headers that contain the search term
                $('.sidebar-header').each(function() {
                    var text = $(this).text().toLowerCase();
                    if (text.includes(query)) {
                        $(this).show();
                    }
                });
                
            } else {
                // Show all items when search is empty
                $('.sidebar-nav .sidebar-item').show();
                $('.sidebar-dropdown .sidebar-item').show();
                $('.sidebar-header').show();
            }
        });

        // Keyboard shortcuts
        $(document).on('keydown', function(e) {
            // Ctrl+K for search
            if (e.ctrlKey && e.key === 'k') {
                e.preventDefault();
                $('.search-input').focus();
            }
            
            // Escape to close dropdowns
            if (e.key === 'Escape') {
                $('.dropdown-menu').removeClass('show');
            }
        });

        // Add loading states to buttons
        $('.btn').on('click', function() {
            var $btn = $(this);
            if (!$btn.hasClass('loading')) {
                $btn.addClass('loading');
                setTimeout(function() {
                    $btn.removeClass('loading');
                }, 2000);
            }
        });

        // Animate cards on scroll
        $(window).on('scroll', function() {
            $('.card').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                
                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animate-in');
                }
            });
        });

        // Modern tooltips
        $('[data-bs-toggle="tooltip"]').tooltip({
            trigger: 'hover',
            placement: 'top',
            animation: true
        });

        // Notification click handler
        $('.notification-item').on('click', function() {
            $(this).addClass('read');
            var badge = $('.notification-badge');
            var count = parseInt(badge.text());
            if (count > 1) {
                badge.text(count - 1);
            } else {
                badge.hide();
            }
        });

        // Auto-hide alerts
        $('.alert').each(function() {
            var $alert = $(this);
            setTimeout(function() {
                $alert.fadeOut();
            }, 5000);
        });

        // Form validation enhancement
        $('.form-control').on('blur', function() {
            var $input = $(this);
            if ($input.val().length > 0) {
                $input.addClass('has-value');
            } else {
                $input.removeClass('has-value');
            }
        });

        // Table row selection
        $('.table tbody tr').on('click', function() {
            $(this).toggleClass('selected');
        });

        // Modern dropdown animations
        $('.dropdown-toggle').on('click', function() {
            var $dropdown = $(this).next('.dropdown-menu');
            $dropdown.toggleClass('show');
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    });
</script>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
        --border-radius: 12px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Modern card styles */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .card:hover {
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-2px);
        }

        /* Modern button styles */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: var(--transition);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--primary-gradient);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-success {
            background: var(--success-gradient);
            box-shadow: 0 4px 15px rgba(17, 153, 142, 0.4);
        }

        .btn-success:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(17, 153, 142, 0.6);
        }

        /* Modern sidebar */
        .sidebar {
            background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
            box-shadow: 4px 0 20px rgba(79, 172, 254, 0.2) !important;
        }

        .sidebar-brand {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            margin: 1rem;
            padding: 1rem;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-brand:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.02);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Modern navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Modern form elements */
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: rgba(255, 255, 255, 1);
        }

        /* Modern table */
        .table {
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .table thead th {
            background: var(--primary-gradient);
            color: white;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        /* Modern stats cards */
        .stat {
            background: var(--secondary-gradient);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
        }

        /* Smooth animations */
        * {
            transition: var(--transition);
        }

        /* Loading states */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        /* Modern scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }

        span svg {
            touch-action: none;
            width: 15px;
        }

        /* Modern dropdown */
        .dropdown-menu {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .dropdown-item {
            transition: var(--transition);
            border-radius: 6px;
            margin: 2px 8px;
        }

        .dropdown-item:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateX(4px);
        }

        /* Modern Sidebar Styles */
        .sidebar-brand-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand-icon {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        .sidebar-user-content {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 1rem;
            margin: 1rem;
            background: rgba(255, 255, 255, 0.15);
            border-radius: var(--border-radius);
            backdrop-filter: blur(10px);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-user-content:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .sidebar-user-avatar {
            position: relative;
        }

        .status-indicator {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .status-indicator.online {
            background: #10b981;
        }

        .sidebar-user-info {
            flex: 1;
        }

        .sidebar-user-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .user-name {
            font-size: 0.9rem;
        }

        .dropdown-arrow {
            font-size: 0.7rem;
            transition: var(--transition);
        }

        .sidebar-user-title[aria-expanded="true"] .dropdown-arrow {
            transform: rotate(180deg);
        }

        .user-role {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
        }

        .sidebar-header {
            padding: 1rem 1.5rem 0.5rem;
            position: relative;
        }

        .header-text {
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-line {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin-top: 0.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            position: relative;
            border-radius: 0 25px 25px 0;
            margin-right: 1rem;
        }

        .sidebar-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
        }

        .sidebar-item.active .sidebar-link {
            color: white;
            background: rgba(255, 255, 255, 0.15);
        }

        .sidebar-link-icon {
            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .sidebar-link-text {
            flex: 1;
            font-weight: 500;
        }

        .sidebar-link-arrow {
            transition: var(--transition);
        }

        .sidebar-link[aria-expanded="true"] .sidebar-link-arrow {
            transform: rotate(90deg);
        }

        .sidebar-link-indicator {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: white;
            border-radius: 0 2px 2px 0;
            transition: var(--transition);
        }

        .sidebar-item.active .sidebar-link-indicator {
            height: 20px;
        }

        .sidebar-dropdown {
            margin-left: 2rem;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-dropdown .sidebar-link {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .sidebar-dropdown .sidebar-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }

        /* FontAwesome Icons */
        .fas, .far, .fab {
            font-family: "Font Awesome 5 Free" !important;
        }

        /* Force Sidebar Colors - Override AdminKit */
        .sidebar.js-sidebar {
            background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
        }

        .sidebar-content {
            background: transparent !important;
        }

        /* Override any dark sidebar styles */
        body .sidebar,
        .wrapper .sidebar,
        .sidebar.js-sidebar {
            background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
        }

        /* Fix dark elements in sidebar */
        .sidebar-header {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }

        .sidebar-nav .sidebar-item {
            background: rgba(255, 255, 255, 0.1) !important;
            margin: 2px 8px !important;
            border-radius: 8px !important;
        }

        .sidebar-nav .sidebar-item.active {
            background: rgba(255, 255, 255, 0.25) !important;
        }

        .sidebar-nav .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.2) !important;
        }

        /* Fix dropdown menus */
        .sidebar-dropdown {
            background: rgba(255, 255, 255, 0.05) !important;
        }

        .sidebar-dropdown .sidebar-item {
            background: rgba(255, 255, 255, 0.1) !important;
            margin: 2px 8px !important;
            border-radius: 6px !important;
        }

        .sidebar-dropdown .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.2) !important;
        }

        /* Force all sidebar items to have light background */
        .sidebar-nav li,
        .sidebar-nav .sidebar-item,
        .sidebar-dropdown li,
        .sidebar-dropdown .sidebar-item {
            background: rgba(255, 255, 255, 0.1) !important;
        }

        .sidebar-nav li:hover,
        .sidebar-nav .sidebar-item:hover,
        .sidebar-dropdown li:hover,
        .sidebar-dropdown .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.2) !important;
        }

        /* Force ALL sidebar elements to use light colors - Override AdminKit completely */
        .sidebar .sidebar-header,
        .sidebar .sidebar-nav .sidebar-item,
        .sidebar .sidebar-dropdown .sidebar-item,
        .sidebar .sidebar-nav li,
        .sidebar .sidebar-dropdown li {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }

        .sidebar .sidebar-header:hover,
        .sidebar .sidebar-nav .sidebar-item:hover,
        .sidebar .sidebar-dropdown .sidebar-item:hover,
        .sidebar .sidebar-nav li:hover,
        .sidebar .sidebar-dropdown li:hover {
            background: rgba(255, 255, 255, 0.2) !important;
        }

        /* Override any dark backgrounds from AdminKit CSS */
        .sidebar *[class*="dark"],
        .sidebar *[class*="bg-"],
        .sidebar .bg-dark,
        .sidebar .bg-secondary,
        .sidebar .bg-primary {
            background: rgba(255, 255, 255, 0.1) !important;
        }

        /* Force specific elements that might have dark backgrounds */
        .sidebar .sidebar-nav .sidebar-item:not(.active),
        .sidebar .sidebar-dropdown .sidebar-item:not(.active) {
            background: rgba(255, 255, 255, 0.1) !important;
        }

        /* Fix any remaining dark backgrounds */
        .sidebar * {
            color: white !important;
        }

        .sidebar .text-muted {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Improve text visibility and contrast */
        .sidebar .sidebar-link-text,
        .sidebar .sidebar-user-title,
        .sidebar .user-name,
        .sidebar .brand-title,
        .sidebar .header-text {
            color: #ffffff !important;
            font-weight: 600 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        .sidebar .brand-subtitle,
        .sidebar .user-role,
        .sidebar .sidebar-user-subtitle {
            color: rgba(255, 255, 255, 0.95) !important;
            font-weight: 500 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) !important;
        }

        .sidebar .sidebar-link {
            color: #ffffff !important;
            font-weight: 500 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        .sidebar .sidebar-link:hover {
            color: #ffffff !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
        }

        /* Make icons more visible */
        .sidebar .fas,
        .sidebar .far,
        .sidebar .fab,
        .sidebar i {
            color: #ffffff !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        /* NUCLEAR OPTION - Force override ALL possible dark elements */
        .sidebar .sidebar-header,
        .sidebar .sidebar-nav .sidebar-item,
        .sidebar .sidebar-dropdown .sidebar-item,
        .sidebar .sidebar-nav li,
        .sidebar .sidebar-dropdown li,
        .sidebar .sidebar-nav .sidebar-item:not(.active),
        .sidebar .sidebar-dropdown .sidebar-item:not(.active),
        .sidebar .sidebar-nav .sidebar-item.collapsed,
        .sidebar .sidebar-dropdown .sidebar-item.collapsed {
            background: rgba(255, 255, 255, 0.05) !important;
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Override any inline styles or computed styles */
        .sidebar * {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        .sidebar .sidebar-header,
        .sidebar .sidebar-nav .sidebar-item,
        .sidebar .sidebar-dropdown .sidebar-item {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Make text more visible without heavy background */
        .sidebar .sidebar-link-text,
        .sidebar .sidebar-user-title,
        .sidebar .user-name,
        .sidebar .brand-title,
        .sidebar .header-text {
            color: #ffffff !important;
            font-weight: 700 !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5) !important;
            background: none !important;
        }

        .sidebar .brand-subtitle,
        .sidebar .user-role,
        .sidebar .sidebar-user-subtitle {
            color: rgba(255, 255, 255, 0.98) !important;
            font-weight: 600 !important;
            text-shadow: 0 2px 3px rgba(0, 0, 0, 0.4) !important;
            background: none !important;
        }

        .sidebar .sidebar-link {
            color: #ffffff !important;
            font-weight: 600 !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5) !important;
            background: none !important;
        }

        .sidebar .sidebar-link:hover {
            color: #ffffff !important;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.6) !important;
            background: rgba(255, 255, 255, 0.1) !important;
        }

        /* Modern Header Styles */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-center {
            flex: 1;
            max-width: 400px;
            margin: 0 2rem;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .hamburger {
            display: flex;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: var(--transition);
        }

        .hamburger:hover {
            background: rgba(102, 126, 234, 0.1);
        }

        .hamburger span {
            width: 20px;
            height: 2px;
            background: #667eea;
            border-radius: 2px;
            transition: var(--transition);
        }

        .navbar-breadcrumb .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        .navbar-breadcrumb .breadcrumb-item {
            color: #6c757d;
        }

        .navbar-breadcrumb .breadcrumb-item.active {
            color: #667eea;
            font-weight: 500;
        }

        .search-box {
            position: relative;
        }

        .search-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            color: #6c757d;
            z-index: 2;
        }

        .search-input {
            padding-left: 40px;
            padding-right: 80px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.9);
            transition: var(--transition);
        }

        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }

        .search-shortcut {
            position: absolute;
            right: 12px;
            background: #f8f9fa;
            color: #6c757d;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .nav-icon {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            color: #6c757d;
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-icon:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .notification-dropdown {
            width: 320px;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: var(--transition);
        }

        .notification-item:hover {
            background: rgba(102, 126, 234, 0.05);
        }

        .notification-icon-wrapper {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .notification-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin: 2px 0;
        }

        .notification-time {
            color: #adb5bd;
            font-size: 0.75rem;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-super-admin {
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            color: #333;
        }

        .badge-admin {
            background: var(--primary-gradient);
            color: white;
        }

        .badge-user {
            background: #e9ecef;
            color: #6c757d;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .user-dropdown:hover {
            background: rgba(102, 126, 234, 0.1);
        }

        .user-avatar-wrapper {
            position: relative;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-info .user-name {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .user-info .user-role {
            color: #6c757d;
            font-size: 0.75rem;
        }

        .user-menu {
            width: 280px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
        }

        .user-details {
            flex: 1;
        }

        .user-details .user-name {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .user-details .user-email {
            color: #6c757d;
            font-size: 0.8rem;
        }

        /* Modern Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200px 0;
            }
            100% {
                background-position: calc(200px + 100%) 0;
            }
        }

        /* Page Load Animation */
        .content {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Card Hover Effects */
        .card {
            animation: fadeInUp 0.4s ease-out;
        }

        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }

        /* Sidebar Animation */
        .sidebar {
            animation: slideInLeft 0.5s ease-out;
        }

        /* Loading States */
        .loading-shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200px 100%;
            animation: shimmer 1.5s infinite;
        }

        /* Button Ripple Effect */
        .btn {
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:active::before {
            width: 300px;
            height: 300px;
        }

        /* Table Row Animation */
        .table tbody tr {
            animation: fadeInUp 0.3s ease-out;
        }

        .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .table tbody tr:nth-child(2) { animation-delay: 0.15s; }
        .table tbody tr:nth-child(3) { animation-delay: 0.2s; }
        .table tbody tr:nth-child(4) { animation-delay: 0.25s; }
        .table tbody tr:nth-child(5) { animation-delay: 0.3s; }

        /* Notification Animation */
        .notification-badge {
            animation: pulse 2s infinite;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Focus States */
        .form-control:focus,
        .btn:focus,
        .sidebar-link:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Micro-interactions */
        .stat {
            transition: var(--transition);
        }

        .stat:hover {
            animation: pulse 0.6s ease-in-out;
        }

        /* Progress Bars */
        .progress {
            height: 8px;
            border-radius: 4px;
            background: rgba(102, 126, 234, 0.1);
            overflow: hidden;
        }

        .progress-bar {
            background: var(--primary-gradient);
            transition: width 0.6s ease;
        }

        /* Tooltips */
        .tooltip {
            font-size: 0.8rem;
        }

        .tooltip-inner {
            background: rgba(0, 0, 0, 0.9);
            border-radius: 6px;
            padding: 8px 12px;
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar-content::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-content::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }

        .sidebar-content::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            :root {
                --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.4);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-center {
                display: none;
            }
            
            .navbar-right .user-badge {
                display: none;
            }

            .card {
                margin-bottom: 1rem;
            }

            .sidebar-link {
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.5rem 1rem;
            }

            .search-input {
                padding-right: 60px;
            }

            .search-shortcut {
                display: none;
            }
        }

        /* Force hide ../index.html */
        .breadcrumb-item:contains("../index.html") {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            height: 0 !important;
            width: 0 !important;
            overflow: hidden !important;
        }

        /* Hide any element with index.html text */
        *:contains("../index.html"),
        *:contains("..index.html"),
        *:contains("index.html") {
            display: none !important;
        }

        /* Modern Card Styles */
        .card {
            border: none !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transition: all 0.3s ease !important;
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px) !important;
        }

        .card:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        /* Modern Button Styles */
        .btn {
            border-radius: 0.5rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            border: none !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            color: white !important;
        }

        .btn-primary:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        /* Modern Form Controls */
        .form-control {
            border-radius: 0.5rem !important;
            border: 2px solid #e9ecef !important;
            transition: all 0.3s ease !important;
            background: rgba(255, 255, 255, 0.9) !important;
        }

        .form-control:focus {
            border-color: #4facfe !important;
            box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25) !important;
            background: white !important;
        }

        /* Modern Table Styles */
        .table {
            border-radius: 0.5rem !important;
            overflow: hidden !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .table thead th {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            color: white !important;
            border: none !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            font-size: 0.875rem !important;
            letter-spacing: 0.5px !important;
        }

        .table tbody tr {
            transition: all 0.15s ease !important;
        }

        .table tbody tr:hover {
            background: rgba(79, 172, 254, 0.05) !important;
            transform: scale(1.01) !important;
        }

        /* Sidebar Modern Styles */
        .sidebar {
            background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
            box-shadow: 4px 0 20px rgba(79, 172, 254, 0.2) !important;
        }

        .sidebar .sidebar-header,
        .sidebar .sidebar-nav .sidebar-item,
        .sidebar .sidebar-dropdown .sidebar-item,
        .sidebar .sidebar-nav li,
        .sidebar .sidebar-dropdown li {
            background: rgba(255, 255, 255, 0.05) !important;
            color: white !important;
        }

        .sidebar .sidebar-header:hover,
        .sidebar .sidebar-nav .sidebar-item:hover,
        .sidebar .sidebar-dropdown .sidebar-item:hover,
        .sidebar .sidebar-nav li:hover,
        .sidebar .sidebar-dropdown li:hover {
            background: rgba(255, 255, 255, 0.1) !important;
        }

        .sidebar .sidebar-link-text,
        .sidebar .sidebar-user-title,
        .sidebar .user-name,
        .sidebar .brand-title,
        .sidebar .header-text {
            color: #ffffff !important;
            font-weight: 700 !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5) !important;
            background: none !important;
        }

        .sidebar .brand-subtitle,
        .sidebar .user-role,
        .sidebar .sidebar-user-subtitle {
            color: rgba(255, 255, 255, 0.98) !important;
            font-weight: 600 !important;
            text-shadow: 0 2px 3px rgba(0, 0, 0, 0.4) !important;
            background: none !important;
        }

        .sidebar .sidebar-link {
            color: #ffffff !important;
            font-weight: 600 !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5) !important;
            background: none !important;
        }

        .sidebar .sidebar-link:hover {
            color: #ffffff !important;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.6) !important;
            background: rgba(255, 255, 255, 0.1) !important;
        }

        .sidebar .fas,
        .sidebar .far,
        .sidebar .fab,
        .sidebar i {
            color: #ffffff !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        /* Sidebar dropdown styles */
        .sidebar .dropdown-menu {
            background: rgba(255, 255, 255, 0.95) !important;
            border: none !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
            backdrop-filter: blur(10px) !important;
            margin-top: 8px !important;
            min-width: 200px !important;
        }

        .sidebar .dropdown-item {
            color: #333 !important;
            padding: 8px 16px !important;
            border-radius: 4px !important;
            margin: 2px 8px !important;
            transition: all 0.2s ease !important;
        }

        .sidebar .dropdown-item:hover {
            background: rgba(79, 172, 254, 0.1) !important;
            color: #4facfe !important;
            transform: translateX(4px) !important;
        }

        .sidebar .dropdown-divider {
            border-color: rgba(0, 0, 0, 0.1) !important;
            margin: 4px 0 !important;
        }

        .sidebar .dropdown-item i {
            color: #4facfe !important;
            width: 16px !important;
        }

        /* Hide dropdown by default */
        .sidebar .dropdown-menu {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateY(-10px) !important;
            transition: all 0.3s ease !important;
        }

        .sidebar .dropdown.show .dropdown-menu {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
        }
    </style>

<script>
$(document).ready(function() {
    // ULTRA AGGRESSIVE fix for index.html
    function removeIndexHtml() {
        // Method 1: Remove by text content (all variations)
        $('.breadcrumb-item').each(function() {
            var text = $(this).text().trim();
            if (text.includes('index.html') || text.includes('..index.html') || text.includes('../index.html')) {
                $(this).remove();
            }
        });
        
        // Method 2: Remove any element containing the text
        $('*').each(function() {
            var text = $(this).text();
            if (text.includes('index.html') || text.includes('..index.html') || text.includes('../index.html')) {
                $(this).remove();
            }
        });
        
        // Method 3: Hide with CSS
        $('*').each(function() {
            var text = $(this).text();
            if (text.includes('index.html')) {
                $(this).css('display', 'none');
            }
        });
        
        // Method 4: Replace text content
        $('*').each(function() {
            var text = $(this).text();
            if (text.includes('index.html')) {
                $(this).text(text.replace(/\.\.?index\.html/g, ''));
            }
        });
        
        // Method 5: Remove text nodes directly
        $('*').contents().filter(function() {
            return this.nodeType === 3 && this.textContent.includes('index.html');
        }).remove();
    }
    
    // Run multiple times to catch it
    removeIndexHtml();
    setTimeout(removeIndexHtml, 100);
    setTimeout(removeIndexHtml, 500);
    setTimeout(removeIndexHtml, 1000);
    
    // Run every 2 seconds to catch it if it reappears
    setInterval(removeIndexHtml, 2000);
});
</script>
</head>
<body class="antialiased">
@yield('content')

@yield('extraJs')

</body>
</html>
