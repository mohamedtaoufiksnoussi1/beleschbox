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
    if (typeof window.Livewire === 'undefined') {
        console.log('Livewire not loaded, loading fallback...');
        // Recharger les scripts Livewire
        var script = document.createElement('script');
        script.src = '/vendor/livewire/livewire.js';
        document.head.appendChild(script);
    } else {
        console.log('Livewire loaded successfully');
    }
</script>

<style>
    /* CSS Variables for consistent theming */
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --light-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        
        --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        --shadow-xl: 0 2rem 4rem rgba(0, 0, 0, 0.2);
        
        --border-radius: 0.5rem;
        --border-radius-lg: 0.75rem;
        --border-radius-xl: 1rem;
        
        --transition: all 0.3s ease;
        --transition-fast: all 0.15s ease;
    }

    /* Modern Card Styles */
    .card {
        border: none !important;
        border-radius: var(--border-radius-lg) !important;
        box-shadow: var(--shadow) !important;
        transition: var(--transition) !important;
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px) !important;
    }

    .card:hover {
        transform: translateY(-2px) !important;
        box-shadow: var(--shadow-lg) !important;
    }

    /* Modern Button Styles */
    .btn {
        border-radius: var(--border-radius) !important;
        font-weight: 600 !important;
        transition: var(--transition) !important;
        border: none !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .btn-primary {
        background: var(--primary-gradient) !important;
        color: white !important;
    }

    .btn-primary:hover {
        transform: translateY(-1px) !important;
        box-shadow: var(--shadow-lg) !important;
    }

    .btn-success {
        background: var(--success-gradient) !important;
        color: white !important;
    }

    .btn-warning {
        background: var(--warning-gradient) !important;
        color: white !important;
    }

    .btn-danger {
        background: var(--danger-gradient) !important;
        color: white !important;
    }

    .btn-info {
        background: var(--info-gradient) !important;
        color: white !important;
    }

    /* Modern Form Controls */
    .form-control {
        border-radius: var(--border-radius) !important;
        border: 2px solid #e9ecef !important;
        transition: var(--transition) !important;
        background: rgba(255, 255, 255, 0.9) !important;
    }

    .form-control:focus {
        border-color: #4facfe !important;
        box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25) !important;
        background: white !important;
    }

    /* Modern Table Styles */
    .table {
        border-radius: var(--border-radius) !important;
        overflow: hidden !important;
        box-shadow: var(--shadow-sm) !important;
    }

    .table thead th {
        background: var(--primary-gradient) !important;
        color: white !important;
        border: none !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        font-size: 0.875rem !important;
        letter-spacing: 0.5px !important;
    }

    .table tbody tr {
        transition: var(--transition-fast) !important;
    }

    .table tbody tr:hover {
        background: rgba(79, 172, 254, 0.05) !important;
        transform: scale(1.01) !important;
    }

    /* Modern Dropdown Styles */
    .dropdown-menu {
        border: none !important;
        border-radius: var(--border-radius-lg) !important;
        box-shadow: var(--shadow-lg) !important;
        backdrop-filter: blur(10px) !important;
        background: rgba(255, 255, 255, 0.95) !important;
        animation: fadeInUp 0.3s ease !important;
    }

    .dropdown-item {
        transition: var(--transition-fast) !important;
        border-radius: var(--border-radius) !important;
        margin: 2px 8px !important;
    }

    .dropdown-item:hover {
        background: var(--primary-gradient) !important;
        color: white !important;
        transform: translateX(4px) !important;
    }

    /* Modern Stat Cards */
    .stat {
        background: var(--primary-gradient) !important;
        color: white !important;
        border-radius: var(--border-radius-lg) !important;
        padding: 1.5rem !important;
        text-align: center !important;
        transition: var(--transition) !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .stat::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 100%) !important;
        pointer-events: none !important;
    }

    .stat:hover {
        transform: translateY(-4px) !important;
        box-shadow: var(--shadow-xl) !important;
    }

    /* Animations */
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

    /* Apply animations */
    .content {
        animation: fadeInUp 0.6s ease !important;
    }

    .card {
        animation: slideInLeft 0.6s ease !important;
    }

    .sidebar {
        animation: slideInLeft 0.8s ease !important;
    }

    .notification-badge {
        animation: pulse 2s infinite !important;
    }

    .table tbody tr {
        animation: fadeInUp 0.4s ease !important;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .card {
            margin-bottom: 1rem !important;
        }
        
        .btn {
            width: 100% !important;
            margin-bottom: 0.5rem !important;
        }
        
        .table-responsive {
            border-radius: var(--border-radius) !important;
        }
    }

    /* Sidebar Modern Styles */
    .sidebar {
        background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
        box-shadow: 4px 0 20px rgba(79, 172, 254, 0.2) !important;
    }

    .sidebar.js-sidebar {
        background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
    }

    .sidebar-content {
        background: transparent !important;
    }

    body .sidebar,
    .wrapper .sidebar,
    .sidebar.js-sidebar {
        background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%) !important;
    }

    /* Force ALL sidebar elements to use light colors */
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

    /* Override any dark backgrounds from AdminKit CSS */
    .sidebar *[class*="dark"],
    .sidebar *[class*="bg-"],
    .sidebar .bg-dark,
    .sidebar .bg-secondary,
    .sidebar .bg-primary {
        background: rgba(255, 255, 255, 0.05) !important;
    }

    /* Force specific elements that might have dark backgrounds */
    .sidebar .sidebar-nav .sidebar-item:not(.active),
    .sidebar .sidebar-dropdown .sidebar-item:not(.active) {
        background: rgba(255, 255, 255, 0.05) !important;
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

    /* Make icons more visible */
    .sidebar .fas,
    .sidebar .far,
    .sidebar .fab,
    .sidebar i {
        color: #ffffff !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
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

    /* Breadcrumb styles */
    .navbar-breadcrumb .breadcrumb {
        background: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .navbar-breadcrumb .breadcrumb-item {
        color: #6c757d !important;
        font-size: 14px !important;
    }

    .navbar-breadcrumb .breadcrumb-item a {
        color: #4facfe !important;
        text-decoration: none !important;
        transition: color 0.2s ease !important;
    }

    .navbar-breadcrumb .breadcrumb-item a:hover {
        color: #00f2fe !important;
    }

    .navbar-breadcrumb .breadcrumb-item.active {
        color: #495057 !important;
        font-weight: 600 !important;
    }

    /* Search input focus styles */
    .search-input:focus {
        border-color: #4facfe !important;
        box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25) !important;
    }

    /* Nuclear CSS: Hide ANY element containing index.html */
    *:contains("../index.html"),
    *:contains("index.html"),
    [href*="index.html"],
    [src*="index.html"] {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        height: 0 !important;
        width: 0 !important;
        overflow: hidden !important;
    }

    /* Force hide breadcrumb items with index.html */
    .breadcrumb-item:contains("../index.html"),
    .breadcrumb-item:contains("index.html"),
    .breadcrumb-item[href*="index.html"] {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        height: 0 !important;
        width: 0 !important;
        overflow: hidden !important;
        position: absolute !important;
        left: -9999px !important;
    }

    /* Hide dropdown by default - MUST be first */
    .sidebar .dropdown-menu {
        display: none !important;
        opacity: 0 !important;
        visibility: hidden !important;
        transform: translateY(-10px) !important;
        transition: all 0.3s ease !important;
    }

    /* Ensure dropdown is hidden when parent doesn't have show class */
    .sidebar .dropdown:not(.show) .dropdown-menu {
        display: none !important;
        opacity: 0 !important;
        visibility: hidden !important;
        transform: translateY(-10px) !important;
    }

    /* Show dropdown when parent has 'show' class */
    .sidebar .dropdown.show .dropdown-menu {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
    }

    /* Force show when jQuery show() is called AND parent has show class */
    .sidebar .dropdown.show .dropdown-menu:not([style*="display: none"]) {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .search-shortcut {
            display: none;
        }
    }
</style>

<script>
$(document).ready(function() {
    // Hide all dropdowns on page load
    $('.sidebar .dropdown').removeClass('show');
    $('.sidebar .dropdown-menu').hide();
    
    // Force dropdown toggle for sidebar
    $('.sidebar .dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var $this = $(this);
        var $dropdown = $this.closest('.dropdown');
        var $menu = $dropdown.find('.dropdown-menu');
        
        console.log('Dropdown element found:', $dropdown.length);
        console.log('Menu element found:', $menu.length);
        console.log('Current show class:', $dropdown.hasClass('show'));
        
        // Close all other dropdowns first
        $('.sidebar .dropdown').not($dropdown).removeClass('show');
        $('.sidebar .dropdown-menu').not($menu).hide();
        
        // Force toggle current dropdown
        if ($dropdown.hasClass('show')) {
            $dropdown.removeClass('show');
            $menu.hide();
            console.log('Dropdown closed');
        } else {
            $dropdown.addClass('show');
            $menu.show();
            console.log('Dropdown opened');
        }
        
        console.log('Final show class:', $dropdown.hasClass('show'));
        console.log('Final menu visible:', $menu.is(':visible'));
    });
    
    // Close dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.sidebar .dropdown').length) {
            $('.sidebar .dropdown').removeClass('show');
            $('.sidebar .dropdown-menu').hide();
        }
    });
    
    // Keyboard shortcut for search (Ctrl+K)
    $(document).on('keydown', function(e) {
        // Check if Ctrl+K is pressed
        if (e.ctrlKey && e.keyCode === 75) {
            e.preventDefault();
            $('.search-input').focus();
            console.log('Search focused with Ctrl+K');
        }
        
        // Close dropdowns with Escape key
        if (e.keyCode === 27) { // Escape key
            $('.dropdown').removeClass('show');
            $('.dropdown-menu').hide();
        }
    });
    
    // Simple breadcrumb fix
    function fixBreadcrumb() {
        // Simple removal of index.html text
        $('.breadcrumb-item').each(function() {
            var text = $(this).text().trim();
            if (text.includes('index.html')) {
                $(this).remove();
            }
        });
        console.log('Breadcrumb fixed');
    }
    
    // Fix breadcrumb on page load only
    fixBreadcrumb();
});
</script>

@yield('extraJs')


</body>
</html>
