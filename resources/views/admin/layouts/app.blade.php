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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="{{asset('admin/img/icons/icon-48x48.png')}}"/>

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('admin/css/light.css')}}" rel="stylesheet">
    @yield('extraCss')

    <style>
        /* ===== MODERN ADMIN INTERFACE STYLES ===== */
        
        /* CSS Variables for consistent theming */
        :root {
            --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* ===== MODERN CARDS ===== */
        .card {
            border: none !important;
            border-radius: var(--border-radius) !important;
            box-shadow: var(--card-shadow) !important;
            transition: var(--transition) !important;
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px) !important;
            overflow: hidden !important;
        }
        
        .card:hover {
            box-shadow: var(--card-shadow-hover) !important;
            transform: translateY(-2px) !important;
        }
        
        .card-header {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            padding: 1.25rem !important;
            font-weight: 600 !important;
        }
        
        .card-body {
            padding: 1.5rem !important;
        }
        
        /* ===== MODERN BUTTONS ===== */
        .btn {
            border-radius: 8px !important;
            font-weight: 500 !important;
            transition: var(--transition) !important;
            border: none !important;
            position: relative !important;
            overflow: hidden !important;
            padding: 0.5rem 1.25rem !important;
        }
        
        .btn-primary {
            background: var(--primary-gradient) !important;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4) !important;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6) !important;
        }
        
        .btn-success {
            background: var(--success-gradient) !important;
            box-shadow: 0 4px 15px rgba(17, 153, 142, 0.4) !important;
        }
        
        .btn-success:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 20px rgba(17, 153, 142, 0.6) !important;
        }
        
        .btn-warning {
            background: var(--warning-gradient) !important;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.4) !important;
        }
        
        .btn-warning:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 20px rgba(240, 147, 251, 0.6) !important;
        }
        
        /* ===== MODERN FORMS ===== */
        .form-control, .form-select {
            border-radius: 8px !important;
            border: 2px solid #e9ecef !important;
            transition: var(--transition) !important;
            padding: 0.75rem 1rem !important;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #4facfe !important;
            box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25) !important;
        }
        
        .form-label {
            font-weight: 600 !important;
            color: #2c3e50 !important;
            margin-bottom: 0.5rem !important;
        }
        
        /* ===== MODERN TABLES ===== */
        .table {
            border-radius: var(--border-radius) !important;
            overflow: hidden !important;
            box-shadow: var(--card-shadow) !important;
        }
        
        .table thead th {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            font-weight: 600 !important;
            padding: 1rem !important;
        }
        
        .table tbody tr {
            transition: var(--transition) !important;
        }
        
        .table tbody tr:hover {
            background: rgba(79, 172, 254, 0.05) !important;
            transform: scale(1.01) !important;
        }
        
        .table tbody td {
            padding: 1rem !important;
            border-color: #f8f9fa !important;
        }
        
        /* ===== MODERN ALERTS ===== */
        .alert {
            border: none !important;
            border-radius: var(--border-radius) !important;
            box-shadow: var(--card-shadow) !important;
            padding: 1rem 1.25rem !important;
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(17, 153, 142, 0.1) 0%, rgba(56, 239, 125, 0.1) 100%) !important;
            color: #11998e !important;
            border-left: 4px solid #11998e !important;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(240, 147, 251, 0.1) 0%, rgba(245, 87, 108, 0.1) 100%) !important;
            color: #f5576c !important;
            border-left: 4px solid #f5576c !important;
        }
        
        .alert-warning {
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 140, 0, 0.1) 100%) !important;
            color: #ff8c00 !important;
            border-left: 4px solid #ff8c00 !important;
        }
        
        .alert-info {
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.1) 0%, rgba(0, 242, 254, 0.1) 100%) !important;
            color: #4facfe !important;
            border-left: 4px solid #4facfe !important;
        }
        
        /* ===== MODERN BADGES ===== */
        .badge {
            border-radius: 20px !important;
            padding: 0.5rem 0.75rem !important;
            font-weight: 600 !important;
            font-size: 0.75rem !important;
        }
        
        .badge-primary {
            background: var(--primary-gradient) !important;
        }
        
        .badge-success {
            background: var(--success-gradient) !important;
        }
        
        .badge-warning {
            background: var(--warning-gradient) !important;
        }
        
        /* ===== MODERN NAVIGATION ===== */
        .nav-pills .nav-link {
            border-radius: 8px !important;
            transition: var(--transition) !important;
            margin: 0 0.25rem !important;
        }
        
        .nav-pills .nav-link.active {
            background: var(--primary-gradient) !important;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4) !important;
        }
        
        /* ===== MODERN PAGINATION ===== */
        .pagination .page-link {
            border-radius: 8px !important;
            margin: 0 0.25rem !important;
            border: none !important;
            transition: var(--transition) !important;
        }
        
        .pagination .page-item.active .page-link {
            background: var(--primary-gradient) !important;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4) !important;
        }
        
        /* ===== MODERN MODALS ===== */
        .modal-content {
            border: none !important;
            border-radius: var(--border-radius) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25) !important;
        }
        
        .modal-header {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
        }
        
        /* ===== HEADER ADJUSTMENTS ===== */
        .navbar-breadcrumb {
            margin-left: 20px;
        }
        
        .navbar-breadcrumb .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }
        
        .navbar-breadcrumb .breadcrumb-item {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .navbar-breadcrumb .breadcrumb-item.active {
            color: #4facfe;
        }
        
        /* Right side adjustments */
        .navbar-right {
            margin-right: 20px;
        }
        
        .navbar-nav .nav-item {
            margin: 0 8px;
        }
        
        .nav-icon {
            color: #6c757d;
            font-size: 20px;
            transition: all 0.3s ease;
            padding: 8px;
            border-radius: 8px;
        }
        
        .nav-icon:hover {
            color: #4facfe;
            background: rgba(79, 172, 254, 0.1);
            transform: scale(1.1);
        }
        
        .notification-icon {
            position: relative;
        }
        
        .notification-badge {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border-radius: 50%;
            padding: 3px 7px;
            font-size: 11px;
            font-weight: 600;
            position: absolute;
            top: 2px;
            right: 2px;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.3);
        }
        
        .user-badge {
            background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .user-info {
            margin-left: 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .user-info .user-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 15px;
            margin: 0;
            line-height: 1.2;
        }
        
        .user-info .user-role {
            color: #6c757d;
            font-size: 12px;
            margin: 0;
            line-height: 1.2;
        }
        
        .user-avatar-wrapper {
            display: flex;
            align-items: center;
        }
        
        .user-avatar-wrapper .avatar {
            width: 40px;
            height: 40px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .user-avatar-wrapper:hover .avatar {
            border-color: #4facfe;
            transform: scale(1.05);
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* ===== DASHBOARD SPECIFIC STYLES ===== */
        .dashboard-header {
            margin-bottom: 2rem;
        }
        
        .dashboard-title {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .dashboard-title i {
            color: #4facfe;
        }
        
        .dashboard-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            margin: 0;
        }
        
        /* ===== STATS CARDS TEXT IMPROVEMENTS ===== */
        .card .card-title {
            color: #2c3e50 !important;
            font-weight: 700 !important;
            font-size: 1rem !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) !important;
            margin-bottom: 0.75rem !important;
            letter-spacing: 0.5px !important;
        }
        
        .card h1 {
            color: #1a252f !important;
            font-weight: 800 !important;
            font-size: 2.5rem !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
            margin: 0.5rem 0 !important;
            line-height: 1.2 !important;
        }
        
        .card .stat {
            background: rgba(79, 172, 254, 0.1) !important;
            border-radius: 50% !important;
            width: 50px !important;
            height: 50px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.2) !important;
        }
        
        .card .stat i {
            color: #4facfe !important;
            font-size: 1.25rem !important;
            font-weight: 600 !important;
        }
        
        /* Enhanced card contrast */
        .card {
            background: rgba(255, 255, 255, 0.98) !important;
            border: 1px solid rgba(79, 172, 254, 0.1) !important;
        }
        
        .card:hover {
            background: rgba(255, 255, 255, 1) !important;
            border-color: rgba(79, 172, 254, 0.2) !important;
        }
        
        /* Stats Cards */
        .stats-card {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .stats-info {
            padding: 0.5rem 0;
        }
        
        .stats-title {
            color: #6c757d;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        
        .stats-number {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
            line-height: 1;
        }
        
        .stats-trend {
            font-size: 0.75rem;
            margin-top: 0.5rem;
        }
        
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .stats-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 100%);
        }
        
        .stats-icon.bg-primary {
            background: var(--primary-gradient);
        }
        
        .stats-icon.bg-success {
            background: var(--success-gradient);
        }
        
        .stats-icon.bg-warning {
            background: var(--warning-gradient);
        }
        
        .stats-icon.bg-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }
        
        /* Products Table */
        .products-table-card {
            margin-top: 2rem;
        }
        
        .card-subtitle {
            color: #ffffff !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            opacity: 0.9 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) !important;
        }
        
        .card-title {
            color: #ffffff !important;
            font-weight: 700 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) !important;
        }
        
        .card-title i {
            color: #ffffff !important;
            opacity: 0.9 !important;
        }
        
        .card-actions .btn {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        /* Enhanced Table Styles */
        .table tbody tr {
            border-bottom: 1px solid #f8f9fa;
        }
        
        .table tbody tr:last-child {
            border-bottom: none;
        }
        
        .table tbody tr:hover {
            background: rgba(79, 172, 254, 0.02);
        }
        
        /* Product Image Styling */
        .table .bg-light {
            background: #f8f9fa !important;
            border-radius: 8px;
            padding: 0.5rem;
        }
        
        .table img {
            border-radius: 6px;
            transition: transform 0.3s ease;
        }
        
        .table tbody tr:hover img {
            transform: scale(1.05);
        }
        
        /* Status Buttons */
        .btn-outline-success,
        .btn-outline-danger {
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* ===== SIDEBAR MODERNIZATION - FORCE BLUE GRADIENT ===== */
        .sidebar,
        .sidebar *,
        .sidebar::before,
        .sidebar::after {
            background: var(--primary-gradient) !important;
            background-color: transparent !important;
        }
        
        .sidebar {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1) !important;
        }
        
        /* Force override any dark backgrounds */
        .sidebar[style*="background"],
        .sidebar[style*="background-color"],
        .sidebar *[style*="background"],
        .sidebar *[style*="background-color"] {
            background: var(--primary-gradient) !important;
            background-color: transparent !important;
        }
        
        .sidebar-header {
            background: rgba(255, 255, 255, 0.1) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
        }
        
        .sidebar-brand {
            color: white !important;
        }
        
        .sidebar-brand:hover {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        
        .sidebar-nav {
            background: transparent !important;
        }
        
        .sidebar-nav .sidebar-item {
            background: transparent !important;
            border-radius: 8px !important;
            margin: 0.25rem 0 !important;
            transition: all 0.3s ease !important;
        }
        
        .sidebar-nav .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            transform: translateX(5px) !important;
        }
        
        .sidebar-nav .sidebar-item.active {
            background: rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1) !important;
        }
        
        .sidebar-nav .sidebar-link {
            color: white !important;
            padding: 0.75rem 1rem !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
        }
        
        .sidebar-nav .sidebar-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.1) !important;
        }
        
        .sidebar-nav .sidebar-link.active {
            color: white !important;
            background: rgba(255, 255, 255, 0.2) !important;
            font-weight: 600 !important;
        }
        
        .sidebar-nav .sidebar-link-icon {
            color: rgba(255, 255, 255, 0.8) !important;
            margin-right: 0.75rem !important;
            width: 20px !important;
            text-align: center !important;
        }
        
        .sidebar-nav .sidebar-link-text {
            color: white !important;
            font-weight: 500 !important;
        }
        
        .sidebar-nav .sidebar-link-arrow {
            color: rgba(255, 255, 255, 0.6) !important;
        }
        
        /* User Section in Sidebar */
        .sidebar-user {
            background: rgba(255, 255, 255, 0.1) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.2) !important;
            margin-top: auto !important;
        }
        
        .sidebar-user-info {
            color: white !important;
            padding: 1rem !important;
        }
        
        .sidebar-user-info .user-name {
            color: white !important;
            font-weight: 600 !important;
        }
        
        .sidebar-user-info .user-role {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        
        .sidebar-user-info .avatar {
            border: 2px solid rgba(255, 255, 255, 0.3) !important;
        }
        
        /* Navigation Headers */
        .sidebar-nav .nav-header {
            color: rgba(255, 255, 255, 0.7) !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            margin: 1.5rem 0 0.5rem 0 !important;
            padding: 0 1rem !important;
        }
        
        /* Dropdown in Sidebar */
        .sidebar-dropdown {
            background: rgba(255, 255, 255, 0.05) !important;
            border-radius: 8px !important;
            margin: 0.25rem 0 !important;
        }
        
        .sidebar-dropdown .sidebar-item {
            background: transparent !important;
        }
        
        .sidebar-dropdown .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1) !important;
        }
        
        /* User Dropdown in Sidebar */
        .sidebar-user-info .dropdown-menu {
            background: white !important;
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
            padding: 0.5rem 0 !important;
            margin-top: 0.5rem !important;
            min-width: 200px !important;
        }
        
        .sidebar-user-info .dropdown-item {
            color: #2c3e50 !important;
            padding: 0.75rem 1rem !important;
            border-radius: 0 !important;
            transition: all 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
        }
        
        .sidebar-user-info .dropdown-item:hover {
            background: rgba(79, 172, 254, 0.1) !important;
            color: #4facfe !important;
            transform: translateX(5px) !important;
        }
        
        .sidebar-user-info .dropdown-item i {
            margin-right: 0.75rem !important;
            width: 16px !important;
            text-align: center !important;
        }
        
        .sidebar-user-info .dropdown-divider {
            margin: 0.5rem 0 !important;
            border-color: #e9ecef !important;
        }
        
        .sidebar-user-info .dropdown-toggle {
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }
        
        .sidebar-user-info .dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            border-radius: 8px !important;
        }
        
        .sidebar-user-info .dropdown-arrow {
            transition: transform 0.3s ease !important;
        }
        
        .sidebar-user-info.show .dropdown-arrow {
            transform: rotate(180deg) !important;
        }
        
        /* Override any dark backgrounds - ULTRA AGGRESSIVE */
        .sidebar * {
            color: white !important;
        }
        
        .sidebar .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        .sidebar .bg-dark,
        .sidebar .bg-secondary,
        .sidebar .bg-primary,
        .sidebar .bg-black,
        .sidebar .bg-gray,
        .sidebar .bg-gray-900,
        .sidebar .bg-gray-800,
        .sidebar .bg-gray-700,
        .sidebar .bg-gray-600,
        .sidebar .bg-dark-mode,
        .sidebar .dark,
        .sidebar .navbar-dark,
        .sidebar .sidebar-dark {
            background: transparent !important;
            background-color: transparent !important;
        }
        
        /* Force all possible dark elements to be transparent */
        .sidebar div,
        .sidebar nav,
        .sidebar ul,
        .sidebar li,
        .sidebar a,
        .sidebar span,
        .sidebar section,
        .sidebar article,
        .sidebar aside {
            background: transparent !important;
            background-color: transparent !important;
        }
        
        /* Specific AdminKit overrides */
        .sidebar[data-theme="dark"],
        .sidebar.theme-dark,
        .sidebar.dark-theme,
        .sidebar .theme-dark,
        .sidebar .dark-theme {
            background: var(--primary-gradient) !important;
            background-color: transparent !important;
        }
        
        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            .navbar-breadcrumb {
                margin-left: 10px;
            }
            
            .search-box {
                margin: 0 10px;
            }
            
            .navbar-right {
                margin-right: 10px;
            }
            
            .card {
                margin-bottom: 1rem;
            }
            
            .table-responsive {
                border-radius: var(--border-radius);
            }
            
            .dashboard-title {
                font-size: 1.5rem;
            }
            
            .stats-number {
                font-size: 2rem;
            }
            
            .stats-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
            
            .sidebar {
                box-shadow: none !important;
            }
        }
    </style>
    
    @livewireStyles
</head>
<body class="antialiased">
@yield('content')

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

    // ===== MODERN ADMIN INTERACTIONS =====
    $(document).ready(function() {
        // Force sidebar to blue gradient
        function forceSidebarBlue() {
            $('.sidebar').css({
                'background': 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important',
                'background-color': 'transparent !important'
            });
            
            $('.sidebar *').each(function() {
                if ($(this).css('background-color') === 'rgb(0, 0, 0)' || 
                    $(this).css('background-color') === 'black' ||
                    $(this).attr('class') && $(this).attr('class').includes('dark')) {
                    $(this).css({
                        'background': 'transparent !important',
                        'background-color': 'transparent !important'
                    });
                }
            });
        }
        
        // Apply immediately and on window load
        forceSidebarBlue();
        $(window).on('load', forceSidebarBlue);
        
        // Apply every 500ms to override any dynamic changes
        setInterval(forceSidebarBlue, 500);
        
        // Add fade-in animation to cards
        $('.card').addClass('fade-in-up');
        
        // Enhanced table interactions
        $('.table tbody tr').hover(
            function() {
                $(this).addClass('shadow-sm');
            },
            function() {
                $(this).removeClass('shadow-sm');
            }
        );
        
        // Modern button ripple effect
        $('.btn').on('click', function(e) {
            var $btn = $(this);
            var $ripple = $('<span class="ripple"></span>');
            var rect = this.getBoundingClientRect();
            var size = Math.max(rect.width, rect.height);
            var x = e.clientX - rect.left - size / 2;
            var y = e.clientY - rect.top - size / 2;
            
            $ripple.css({
                width: size,
                height: size,
                left: x,
                top: y
            });
            
            $btn.append($ripple);
            
            setTimeout(function() {
                $ripple.remove();
            }, 600);
        });
        
        // Enhanced form interactions
        $('.form-control, .form-select').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
        });
        
        
        
        // Modern loading states
        $('form').on('submit', function() {
            var $submitBtn = $(this).find('button[type="submit"]');
            $submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Loading...');
        });
        
        // Enhanced modal interactions
        $('.modal').on('show.bs.modal', function() {
            $(this).find('.modal-content').addClass('fade-in-up');
        });
        
        // Auto-hide alerts with animation
        $('.alert').each(function() {
            var $alert = $(this);
            setTimeout(function() {
                $alert.fadeOut(500, function() {
                    $(this).remove();
                });
            }, 5000);
        });
        
        // Modern pagination
        $('.pagination .page-link').on('click', function(e) {
            var $link = $(this);
            $link.addClass('loading');
            setTimeout(function() {
                $link.removeClass('loading');
            }, 300);
        });
        
        // Enhanced dropdown interactions for sidebar - Force Bootstrap collapse
        $('.sidebar-link[data-bs-toggle="collapse"]').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var $this = $(this);
            var target = $this.attr('data-bs-target');
            var $target = $(target);
            var $arrow = $this.find('.sidebar-link-arrow i');
            
            console.log('Clicked on:', $this.text().trim(), 'Target:', target, 'Element found:', $target.length);
            
            // Close other sidebar dropdowns first
            $('.sidebar-dropdown').not($target).removeClass('show').hide();
            $('.sidebar-link-arrow i').not($arrow).removeClass('fa-chevron-down').addClass('fa-chevron-right');
            
            // Force toggle the current dropdown
            if ($target.hasClass('show')) {
                $target.removeClass('show').hide();
                $arrow.removeClass('fa-chevron-down').addClass('fa-chevron-right');
                console.log('Closed:', target);
            } else {
                $target.addClass('show').show();
                $arrow.removeClass('fa-chevron-right').addClass('fa-chevron-down');
                console.log('Opened:', target);
            }
        });
        
        // Also handle Bootstrap collapse events
        $('.sidebar-dropdown').on('show.bs.collapse', function() {
            var target = $(this).attr('id');
            $('[data-bs-target="#' + target + '"] .sidebar-link-arrow i').removeClass('fa-chevron-right').addClass('fa-chevron-down');
        });
        
        $('.sidebar-dropdown').on('hide.bs.collapse', function() {
            var target = $(this).attr('id');
            $('[data-bs-target="#' + target + '"] .sidebar-link-arrow i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
        });
        
        // Enhanced dropdown interactions for user menu
        $('.dropdown-toggle').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var $dropdown = $(this).next('.dropdown-menu');
            var $parent = $(this).closest('.dropdown');
            
            // Close other dropdowns
            $('.dropdown-menu').not($dropdown).removeClass('show').hide();
            $('.dropdown').not($parent).removeClass('show');
            
            // Toggle current dropdown
            $dropdown.toggleClass('show');
            $parent.toggleClass('show');
            
            if ($dropdown.hasClass('show')) {
                $dropdown.show().addClass('fade-in-up');
            } else {
                $dropdown.removeClass('fade-in-up').hide();
            }
        });
        
        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show').hide();
                $('.dropdown').removeClass('show');
            }
            
            // Close sidebar dropdowns when clicking outside
            if (!$(e.target).closest('.sidebar-nav').length) {
                $('.sidebar-dropdown').removeClass('show').hide();
                $('.sidebar-link-arrow i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
            }
        });
        
        // Prevent dropdown from closing when clicking inside
        $('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
        
        // Modern tooltips
        $('[data-bs-toggle="tooltip"]').tooltip({
            animation: true,
            delay: { show: 500, hide: 100 }
        });
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        });
        
        // Modern card hover effects
        $('.card').hover(
            function() {
                $(this).find('.card-header').addClass('glow');
            },
            function() {
                $(this).find('.card-header').removeClass('glow');
            }
        );
        
        // Enhanced badge animations
        $('.badge').each(function() {
            $(this).addClass('pulse');
        });
        
        // Modern table sorting indicators
        $('.table th[data-sort]').on('click', function() {
            $(this).addClass('sorting');
            setTimeout(() => {
                $(this).removeClass('sorting');
            }, 300);
        });
    });
    
    // ===== ADDITIONAL CSS FOR INTERACTIONS =====
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .focused .form-control,
            .focused .form-select {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(79, 172, 254, 0.15);
            }
            
            .searching {
                background: rgba(79, 172, 254, 0.05);
                border-color: #4facfe !important;
            }
            
            .loading {
                opacity: 0.7;
                pointer-events: none;
            }
            
            .glow {
                box-shadow: 0 0 20px rgba(79, 172, 254, 0.3);
            }
            
            .pulse {
                animation: pulse 2s infinite;
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
            
            .sorting {
                background: rgba(79, 172, 254, 0.1) !important;
                transform: scale(1.02);
            }
            
            .dropdown-menu {
                border: none;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                border-radius: 12px;
                padding: 0.5rem;
            }
            
            .dropdown-item {
                border-radius: 8px;
                margin: 0.25rem 0;
                transition: all 0.3s ease;
            }
            
            .dropdown-item:hover {
                background: rgba(79, 172, 254, 0.1);
                transform: translateX(5px);
            }
        `)
        .appendTo('head');
</script>

@yield('extraJs')

</body>
</html>
