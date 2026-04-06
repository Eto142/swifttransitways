<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Logistics Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #0B3D91;
            --primary-dark: #062060;
            --secondary: #6c757d;
            --success: #16A34A;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fb;
            color: #333;
            font-size: 0.95rem;
        }

        /* Enhanced Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0;
            white-space: nowrap;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-header h3 {
            opacity: 0;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .admin-profile {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .admin-info {
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .admin-info {
            opacity: 0;
        }

        .admin-info h6 {
            margin: 0;
            font-weight: 600;
        }

        .admin-info small {
            opacity: 0.8;
            font-size: 0.8rem;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin: 2px 10px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.2s;
            position: relative;
        }

        .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(3px);
        }

        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            font-weight: 500;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: white;
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
            flex-shrink: 0;
        }

        .nav-text {
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Hamburger Button */
        .hamburger-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 28px;
            height: 20px;
            flex-shrink: 0;
        }
        .hamburger-btn span {
            display: block;
            width: 100%;
            height: 2px;
            background: rgba(255,255,255,0.85);
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        .hamburger-btn.is-open span:nth-child(1) { transform: translateY(9px) rotate(45deg); }
        .hamburger-btn.is-open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .hamburger-btn.is-open span:nth-child(3) { transform: translateY(-9px) rotate(-45deg); }

        /* Mobile-only top bar */
        .admin-mobile-topbar {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 56px;
            background: var(--primary);
            z-index: 1050;
            align-items: center;
            padding: 0 16px;
            gap: 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }
        .admin-mobile-topbar .mobile-logo {
            font-weight: 700;
            color: white;
            font-size: 1rem;
            letter-spacing: .3px;
        }

        /* Sidebar backdrop (mobile) */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
        }
        .sidebar-overlay.active { display: block; }

        /* Main Content */
        .main-content {
            margin-left: calc(var(--sidebar-width) + 20px);
            padding: 25px;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh;
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: calc(var(--sidebar-collapsed) + 20px);
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
        }

        .page-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 1.2rem;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-icon.shipments { background: rgba(13, 95, 184, 0.1); color: var(--primary); }
        .stat-icon.transit { background: rgba(255, 193, 7, 0.1); color: var(--warning); }
        .stat-icon.delivered { background: rgba(0, 64, 128, 0.1); color: var(--success); }
        .stat-icon.pending { background: rgba(220, 53, 69, 0.1); color: var(--danger); }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1;
        }

        .stat-content p {
            color: var(--secondary);
            margin: 5px 0 0 0;
            font-size: 0.9rem;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            margin-top: 8px;
        }

        .trend-up { color: var(--success); }
        .trend-down { color: var(--danger); }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h5 {
            font-weight: 600;
            margin: 0;
        }

        /* Recent Shipments Table */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }

        .table-header {
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h5 {
            font-weight: 600;
            margin: 0;
        }

        .table-actions {
            display: flex;
            gap: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        .table {
            margin: 0;
        }

        .table thead th {
            background: #f8f9fa;
            color: var(--dark);
            font-weight: 600;
            padding: 15px;
            border-bottom: 2px solid #eaeaea;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #eaeaea;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-pending { background: #f1f5f9; color: #475569; }
        .status-processing { background: #dbeafe; color: #1e40af; }
        .status-transit { background: #eff6ff; color: #3b82f6; }
        .status-delivered { background: #003366; color: #ffffff; }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
            margin-bottom: 30px;
        }

        .quick-actions h5 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 15px;
            background: #f8f9fa;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            border-color: var(--primary);
        }

        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-mobile-topbar { display: flex; }
            .sidebar {
                left: -280px;
                z-index: 1100;
            }
            .sidebar.mobile-open {
                left: 0;
            }
            .sidebar.collapsed {
                left: -280px;
                width: var(--sidebar-width);
            }
            .main-content {
                margin-left: 0 !important;
                padding-top: 76px;
            }
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body>

    <!-- Mobile Top Bar -->
    <div class="admin-mobile-topbar" id="admin-mobile-topbar">
        <button class="hamburger-btn" id="mobile-hamburger-btn" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>
        <span class="mobile-logo">Swifttransitways Admin</span>
    </div>

    <!-- Sidebar backdrop -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <button class="hamburger-btn" id="hamburger-btn" aria-label="Toggle navigation">
                <span></span><span></span><span></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{ asset('wp-content/uploads/2022/04/Screenshot_20231009_092214-150x150.png') }}" alt="Swifttransitways Logistics" width="50px">
            </a>
        </div>

        <div class="admin-profile">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->guard('admin')->user()->name, 0, 1)) }}
            </div>
            <div class="admin-info">
                <h6>{{ auth()->guard('admin')->user()->name }}</h6>
                <small>Super Admin</small>
            </div>
        </div>

        <div class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="bi bi-speedometer2 nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>


             <div class="nav-item">
                <a href="{{ route('admin.book') }}" class="nav-link">
                    <i class="bi bi-box-seam nav-icon"></i>
                    <span class="nav-text">Create Package</span>
                    {{-- <span class="badge bg-danger ms-auto">5</span> --}}
                </a>
            </div>


            <div class="nav-item">
                <a href="{{ route('admin.shipments') }}" class="nav-link">
                    <i class="bi bi-box-seam nav-icon"></i>
                    <span class="nav-text">Shipments</span>
                    {{-- <span class="badge bg-danger ms-auto">5</span> --}}
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.send.email') }}" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <span class="nav-text">Send Email</span>
                </a>
            </div>
            {{-- <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-bar-chart nav-icon"></i>
                    <span class="nav-text">Analytics</span>
                </a>
            </div> --}}
            <div class="nav-item">
                <a href="{{ route('admin.change.password') }}" class="nav-link">
                    <i class="bi bi-gear nav-icon"></i>
                    <span class="nav-text">Change Password</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ url('/') }}" class="nav-link" target="_blank">
                    <i class="bi bi-globe nav-icon"></i>
                    <span class="nav-text">Visit Website</span>
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="nav-text">Logout</span>
                </button>
            </form>
        </div>
    </div>