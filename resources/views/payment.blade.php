<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - KostManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #667EEA;
            --primary-light: #8EA1FF;
            --primary-dark: #5A67D8;
            --secondary: #8B5CF6;
            --accent: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --dark: #1F2937;
            --gray-800: #374151;
            --gray-700: #4B5563;
            --gray-600: #6B7280;
            --gray-500: #9CA3AF;
            --gray-400: #D1D5DB;
            --gray-300: #E5E7EB;
            --gray-200: #F3F4F6;
            --gray-100: #F9FAFB;
            --white: #FFFFFF;
            --sidebar-width: 280px;
            --border-radius-lg: 20px;
            --border-radius-md: 12px;
            --border-radius-sm: 8px;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: var(--gray-100);
            color: var(--dark);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar dengan desain baru */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--white);
            color: var(--gray-700);
            position: fixed;
            height: 100vh;
            transition: var(--transition);
            z-index: 1000;
            border-right: 1px solid var(--gray-300);
            padding: 24px 0;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 0 24px 24px;
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: 24px;
        }
        
        .app-logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--primary);
        }
        
        .app-logo i {
            font-size: 2.2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .sidebar-menu {
            flex: 1;
            padding: 0 16px;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            color: var(--gray-700);
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: var(--transition);
            text-decoration: none;
            border-radius: var(--border-radius-md);
            font-weight: 500;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--primary);
            background-color: var(--gray-100);
        }
        
        .nav-link.active {
            color: var(--white);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }
        
        .nav-link i {
            font-size: 1.3rem;
            width: 24px;
            text-align: center;
            transition: var(--transition);
        }
        
        .sidebar-footer {
            padding: 24px;
            border-top: 1px solid var(--gray-200);
            margin-top: auto;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            background-color: var(--gray-100);
        }
        
        /* Top Navbar */
        .top-navbar {
            background-color: var(--white);
            padding: 20px 32px;
            box-shadow: var(--shadow-sm);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--gray-300);
        }
        
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        
        .menu-toggle {
            background: none;
            border: none;
            color: var(--gray-600);
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .menu-toggle:hover {
            background-color: var(--gray-100);
            color: var(--primary);
        }
        
        .search-box {
            width: 320px;
        }
        
        .search-box .input-group {
            border-radius: var(--border-radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-300);
        }
        
        .search-box .input-group-text {
            background-color: var(--white);
            border: none;
            color: var(--gray-500);
        }
        
        .search-box input {
            border: none;
            padding: 12px 15px;
            font-size: 0.95rem;
            background-color: var(--white);
        }
        
        .search-box input:focus {
            box-shadow: none;
            outline: none;
        }
        
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .notification-badge {
            position: relative;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .notification-badge i {
            font-size: 1.4rem;
            color: var(--gray-600);
            transition: var(--transition);
        }
        
        .notification-badge:hover i {
            color: var(--primary);
        }
        
        .badge-count {
            position: absolute;
            top: -6px;
            right: -6px;
            background: linear-gradient(135deg, var(--danger), #F87171);
            color: var(--white);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid var(--white);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }
        
        .user-avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
        }
        
        /* Content Area */
        .content-area {
            padding: 32px;
        }
        
        /* Header Section */
        .header-section {
            margin-bottom: 32px;
        }
        
        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .header-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 36px;
        }
        
        .stat-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: var(--white);
        }
        
        .icon-total { 
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .icon-lunas { 
            background: linear-gradient(135deg, var(--accent), #34D399);
        }
        
        .icon-pending { 
            background: linear-gradient(135deg, var(--warning), #FBBF24);
        }
        
        .icon-overdue { 
            background: linear-gradient(135deg, var(--danger), #F87171);
        }
        
        .stat-trend {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            background-color: var(--gray-100);
        }
        
        .trend-up {
            color: var(--accent);
        }
        
        .trend-down {
            color: var(--danger);
        }
        
        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
            font-family: 'Poppins', sans-serif;
        }
        
        .stat-label {
            color: var(--gray-600);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 12px;
        }
        
        .stat-footer {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-500);
            font-size: 0.85rem;
        }
        
        /* Alert Messages */
        .alert-container {
            margin-bottom: 24px;
        }
        
        .alert {
            border-radius: var(--border-radius-md);
            border: none;
            box-shadow: var(--shadow-sm);
        }
        
        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            border-left: 4px solid var(--accent);
            color: var(--accent);
        }
        
        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 4px solid var(--danger);
            color: var(--danger);
        }
        
        /* Action Bar */
        .action-bar {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 20px 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
        }
        
        .action-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }
        
        .filters {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .filter-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray-700);
        }
        
        /* Table */
        .table-container {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }
        
        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-header h5 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .table-content {
            overflow-x: auto;
        }
        
        .table {
            margin: 0;
            min-width: 1000px;
        }
        
        .table thead th {
            background-color: var(--gray-100);
            border-bottom: 1px solid var(--gray-300);
            padding: 16px 20px;
            font-weight: 600;
            color: var(--gray-700);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid var(--gray-200);
        }
        
        .table tbody tr:hover {
            background-color: var(--gray-50);
        }
        
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .status-lunas {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .status-menunggu {
            background-color: rgba(102, 126, 234, 0.1);
            color: var(--primary);
        }
        
        .status-tertunda {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .status-dibatalkan {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 36px;
        }
        
        .action-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            border: 1px solid var(--gray-200);
            text-align: center;
            cursor: pointer;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.8rem;
            color: var(--white);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        .action-card h6 {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .action-card p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }
        
        /* Modal Custom */
        .modal-content {
            border-radius: var(--border-radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
        }
        
        .modal-header {
            background-color: var(--gray-100);
            border-bottom: 1px solid var(--gray-300);
            padding: 24px;
            border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
        }
        
        .modal-footer {
            border-top: 1px solid var(--gray-300);
            padding: 20px 24px;
        }
        
        /* Pagination */
        .pagination-container {
            padding: 20px 24px;
            border-top: 1px solid var(--gray-200);
            background-color: var(--white);
        }
        
        .pagination .page-link {
            border: none;
            color: var(--gray-700);
            border-radius: var(--border-radius-sm);
            margin: 0 2px;
        }
        
        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .search-box {
                width: 250px;
            }
            
            .action-bar-content {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .filters {
                width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .search-box {
                display: none;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .top-navbar {
                padding: 16px 20px;
            }
            
            .content-area {
                padding: 20px;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--gray-200);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
        }
        
        /* Date Display */
        .date-display {
            background-color: var(--gray-100);
            padding: 8px 16px;
            border-radius: var(--border-radius-md);
            font-weight: 500;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }
        
        /* Form Controls */
        .form-control, .form-select {
            border-radius: var(--border-radius-md);
            border: 1px solid var(--gray-300);
            padding: 10px 14px;
            font-size: 0.95rem;
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* Buttons */
        .btn {
            border-radius: var(--border-radius-md);
            padding: 10px 20px;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 20px;
        }
        
        .empty-state h4 {
            color: var(--gray-600);
            margin-bottom: 10px;
        }
        
        .empty-state p {
            color: var(--gray-500);
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="app-logo">
                    <i class="bi bi-buildings"></i>
                    <span>KostManage</span>
                </div>
            </div>
            
            <nav class="sidebar-menu">
                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link">
                        <i class="bi bi-door-closed"></i>
                        <span>Kamar</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('penyewas.index') }}" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span>Penyewa</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link active">
                        <i class="bi bi-cash-coin"></i>
                        <span>Pembayaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Laporan</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <span>Pengaturan</span>
                    </a>
                </div>
                <div class="nav-item mt-4">
                    <a href="#" class="nav-link">
                        <i class="bi bi-question-circle"></i>
                        <span>Bantuan</span>
                    </a>
                </div>
            </nav>
            
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="user-profile" onclick="this.closest('form').submit()" style="cursor: pointer;">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <small class="text-muted">Logout</small>
                        </div>
                    </div>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navbar -->
            <nav class="top-navbar">
                <div class="navbar-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="search-box d-none d-md-block">
                        <form method="GET" action="{{ route('payments.index') }}">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control" placeholder="Cari pembayaran..." value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>
                    <div class="date-display d-none d-lg-flex">
                        <i class="bi bi-calendar3"></i>
                        <span id="currentDate"></span>
                    </div>
                </div>
                
                <div class="navbar-right">
                    <div class="notification-badge">
                        <i class="bi bi-bell"></i>
                        @php
                            $pendingCount = \App\Models\Payment::whereHas('penyewa', function($query) {
                                $query->where('user_id', Auth::id());
                            })->where('status', 'menunggu')->count();
                        @endphp
                        @if($pendingCount > 0)
                        <span class="badge-count">{{ $pendingCount }}</span>
                        @endif
                    </div>
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <small class="text-muted">Admin</small>
                        </div>
                        <i class="bi bi-chevron-down d-none d-md-block"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                        <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a>
                        <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                        <a class="dropdown-item" href="#"><i class="bi bi-shield-check me-2"></i> Keamanan</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            
            <!-- Content Area -->
            <div class="content-area">
                <!-- Alert Messages -->
                <div class="alert-container">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                </div>
                
                <!-- Header -->
                <div class="header-section">
                    <h1 class="header-title">Manajemen Pembayaran</h1>
                    <p class="header-subtitle">Kelola pembayaran sewa kamar dan tagihan penyewa dengan mudah</p>
                </div>
                
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card fade-in">
                        <div class="stat-header">
                            <div class="stat-icon icon-total">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                15%
                            </div>
                        </div>
                        <div class="stat-value">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</div>
                        <div class="stat-label">Total Pembayaran</div>
                        <div class="stat-footer">
                            <i class="bi bi-graph-up"></i>
                            <span>Total semua pembayaran</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-lunas">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                10%
                            </div>
                        </div>
                        <div class="stat-value">Rp {{ number_format($totalLunas, 0, ',', '.') }}</div>
                        <div class="stat-label">Pembayaran Lunas</div>
                        <div class="stat-footer">
                            <i class="bi bi-check-circle"></i>
                            <span>Pembayaran yang sudah lunas</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-pending">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="stat-trend trend-down">
                                <i class="bi bi-arrow-down"></i>
                                2 baru
                            </div>
                        </div>
                        <div class="stat-value">Rp {{ number_format($totalMenunggu, 0, ',', '.') }}</div>
                        <div class="stat-label">Menunggu Verifikasi</div>
                        <div class="stat-footer">
                            <i class="bi bi-hourglass-split"></i>
                            <span>Butuh konfirmasi pembayaran</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-overdue">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="stat-trend trend-down">
                                <i class="bi bi-exclamation-triangle"></i>
                                Perhatian
                            </div>
                        </div>
                        <div class="stat-value">Rp {{ number_format($totalTertunda, 0, ',', '.') }}</div>
                        <div class="stat-label">Pembayaran Tertunda</div>
                        <div class="stat-footer">
                            <i class="bi bi-clock"></i>
                            <span>Butuh penagihan</span>
                        </div>
                    </div>
                </div>
                
                <!-- Action Bar -->
                <div class="action-bar fade-in">
                    <div class="action-bar-content">
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Pembayaran
                            </button>
                            <a href="{{ route('payments.index') }}" class="btn btn-outline-primary ms-2">
                                <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
                            </a>
                        </div>
                        
                        <form method="GET" action="{{ route('payments.index') }}" class="filters">
                            <div class="filter-group">
                                <div class="filter-label">Status</div>
                                <select name="status" class="form-select form-select-sm" style="width: 150px;" onchange="this.form.submit()">
                                    <option value="">Semua Status</option>
                                    <option value="lunas" {{ request('status') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="tertunda" {{ request('status') == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
                                    <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-label">Bulan</div>
                                <input type="month" name="bulan_pembayaran" class="form-control form-control-sm" style="width: 150px;" 
                                       value="{{ request('bulan_pembayaran') }}" onchange="this.form.submit()">
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-label">&nbsp;</div>
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-filter me-1"></i>Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Payment Table -->
                <div class="table-container fade-in">
                    <div class="table-header">
                        <h5><i class="bi bi-list-check"></i> Daftar Pembayaran</h5>
                        <div class="text-muted">Total {{ $payments->total() }} pembayaran</div>
                    </div>
                    
                    <div class="table-content">
                        @if($payments->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Penyewa</th>
                                    <th>Kamar</th>
                                    <th>Bulan</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Metode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 40px; height: 40px;">
                                                <span class="text-primary fw-bold">
                                                    {{ strtoupper(substr($payment->penyewa->nama, 0, 2)) }}
                                                </span>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $payment->penyewa->nama }}</div>
                                                <small class="text-muted">{{ $payment->penyewa->no_ktp }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($payment->room)
                                        <span class="badge bg-light text-dark">{{ $payment->room->nomor_kamar }}</span>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $payment->bulan_indonesia }}</span>
                                    </td>
                                    <td class="fw-bold text-success">
                                        Rp {{ number_format($payment->jumlah, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($payment->status === 'lunas')
                                        <span class="status-badge status-lunas">
                                            <i class="bi bi-check-circle"></i> Lunas
                                        </span>
                                        @elseif($payment->status === 'menunggu')
                                        <span class="status-badge status-menunggu">
                                            <i class="bi bi-clock-history"></i> Menunggu
                                        </span>
                                        @elseif($payment->status === 'tertunda')
                                        <span class="status-badge status-tertunda">
                                            <i class="bi bi-exclamation-triangle"></i> Tertunda
                                        </span>
                                        @elseif($payment->status === 'dibatalkan')
                                        <span class="status-badge status-dibatalkan">
                                            <i class="bi bi-x-circle"></i> Dibatalkan
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->tanggal_pembayaran)
                                        {{ \Carbon\Carbon::parse($payment->tanggal_pembayaran)->format('d M Y') }}
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->metode_pembayaran)
                                        <span class="badge bg-light text-dark">
                                            {{ ucfirst($payment->metode_pembayaran) }}
                                        </span>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editPaymentModal"
                                                    onclick="editPayment({{ $payment->id }})">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <h4>Tidak ada data pembayaran</h4>
                            <p>Tambahkan pembayaran baru untuk melihat data di sini</p>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Pagination -->
                    @if($payments->hasPages())
                    <div class="pagination-container">
                        {{ $payments->links() }}
                    </div>
                    @endif
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-card fade-in" onclick="window.location='{{ route('penyewas.index') }}'">
                        <div class="action-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h6>Kelola Penyewa</h6>
                        <p>Lihat dan kelola data penyewa</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.1s;" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-arrow-down"></i>
                        </div>
                        <h6>Ekspor Laporan</h6>
                        <p>Ekspor data pembayaran</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.2s;" data-bs-toggle="modal" data-bs-target="#reminderModal">
                        <div class="action-icon">
                            <i class="bi bi-bell"></i>
                        </div>
                        <h6>Kirim Pengingat</h6>
                        <p>Kirim pengingat pembayaran</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.3s;" onclick="window.location='{{ route('dashboard') }}'">
                        <div class="action-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h6>Dashboard</h6>
                        <p>Kembali ke dashboard</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Pembayaran Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Penyewa <span class="text-danger">*</span></label>
                                <select name="penyewa_id" class="form-select" required onchange="updatePaymentAmount(this)">
                                    <option value="">Pilih Penyewa</option>
                                    @foreach($penyewas as $penyewa)
                                    <option value="{{ $penyewa->id }}" 
                                            data-room="{{ $penyewa->room ? $penyewa->room->harga_sewa : 0 }}">
                                        {{ $penyewa->nama }} - {{ $penyewa->room ? 'Kamar ' . $penyewa->room->nomor_kamar : 'Tidak ada kamar' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Bulan Pembayaran <span class="text-danger">*</span></label>
                                <input type="month" name="bulan_pembayaran" class="form-control" 
                                       value="{{ date('Y-m') }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Jumlah Pembayaran <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="jumlah" class="form-control" 
                                           step="0.01" min="0" required placeholder="0">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="menunggu">Menunggu Verifikasi</option>
                                    <option value="lunas">Lunas</option>
                                    <option value="tertunda">Tertunda</option>
                                    <option value="dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Pembayaran</label>
                                <input type="date" name="tanggal_pembayaran" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="form-select">
                                    <option value="">Pilih Metode</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="tunai">Tunai</option>
                                    <option value="cek">Cek</option>
                                    <option value="giro">Giro</option>
                                </select>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label fw-bold">No. Referensi</label>
                                <input type="text" name="no_referensi" class="form-control" 
                                       placeholder="No rekening, no cek, dll">
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label fw-bold">Keterangan (Opsional)</label>
                                <textarea name="keterangan" class="form-control" rows="3" 
                                          placeholder="Catatan pembayaran..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Simpan Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Edit Payment Modal -->
    <div class="modal fade" id="editPaymentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editPaymentForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Bulan Pembayaran <span class="text-danger">*</span></label>
                                <input type="month" id="editBulanPembayaran" name="bulan_pembayaran" 
                                       class="form-control" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Jumlah Pembayaran <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" id="editJumlah" name="jumlah" 
                                           class="form-control" step="0.01" min="0" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                <select id="editStatus" name="status" class="form-select" required>
                                    <option value="menunggu">Menunggu Verifikasi</option>
                                    <option value="lunas">Lunas</option>
                                    <option value="tertunda">Tertunda</option>
                                    <option value="dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Pembayaran</label>
                                <input type="date" id="editTanggalPembayaran" name="tanggal_pembayaran" 
                                       class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Metode Pembayaran</label>
                                <select id="editMetode" name="metode_pembayaran" class="form-select">
                                    <option value="">Pilih Metode</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="tunai">Tunai</option>
                                    <option value="cek">Cek</option>
                                    <option value="giro">Giro</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">No. Referensi</label>
                                <input type="text" id="editNoReferensi" name="no_referensi" 
                                       class="form-control">
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label fw-bold">Keterangan (Opsional)</label>
                                <textarea id="editKeterangan" name="keterangan" class="form-control" 
                                          rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Perbarui Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Ekspor Laporan Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('payments.index') }}" method="GET" target="_blank">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Dari Tanggal</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sampai Tanggal</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label fw-bold">Format</label>
                                <select name="format" class="form-select">
                                    <option value="pdf">PDF</option>
                                    <option value="excel">Excel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-download me-2"></i>Ekspor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Reminder Modal -->
    <div class="modal fade" id="reminderModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Kirim Pengingat Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="reminderForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Untuk Penyewa</label>
                                <select class="form-select" multiple>
                                    @foreach($penyewas as $penyewa)
                                    <option value="{{ $penyewa->id }}">{{ $penyewa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label fw-bold">Pesan</label>
                                <textarea class="form-control" rows="4">
Hai [Nama Penyewa], 
Ini adalah pengingat untuk pembayaran sewa kamar bulan ini. 
Silakan lakukan pembayaran sebelum tanggal jatuh tempo.

Terima kasih.
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="sendReminder()">
                            <i class="bi bi-send me-2"></i>Kirim Pengingat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set current date
        function updateCurrentDate() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('currentDate').textContent = now.toLocaleDateString('id-ID', options);
        }
        updateCurrentDate();
        setInterval(updateCurrentDate, 60000);
        
        // Toggle sidebar on mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Auto-close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menuToggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Add hover effect to action cards
        const actionCards = document.querySelectorAll('.action-card');
        actionCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Auto update payment amount based on selected tenant
        function updatePaymentAmount(select) {
            const selectedOption = select.options[select.selectedIndex];
            const roomPrice = selectedOption.getAttribute('data-room');
            const amountInput = document.querySelector('input[name="jumlah"]');
            
            if (roomPrice && roomPrice > 0) {
                amountInput.value = roomPrice;
            }
        }
        
        // Edit payment function
        async function editPayment(paymentId) {
            try {
                const response = await fetch(`/payments/${paymentId}/edit-data`);
                const payment = await response.json();
                
                // Update form action
                document.getElementById('editPaymentForm').action = `/payments/${paymentId}`;
                
                // Fill form data
                document.getElementById('editBulanPembayaran').value = payment.bulan_pembayaran;
                document.getElementById('editJumlah').value = payment.jumlah;
                document.getElementById('editStatus').value = payment.status;
                document.getElementById('editTanggalPembayaran').value = payment.tanggal_pembayaran || '';
                document.getElementById('editMetode').value = payment.metode_pembayaran || '';
                document.getElementById('editNoReferensi').value = payment.no_referensi || '';
                document.getElementById('editKeterangan').value = payment.keterangan || '';
            } catch (error) {
                console.error('Error fetching payment data:', error);
                alert('Gagal memuat data pembayaran');
            }
        }
        
        // Send reminder function
        function sendReminder() {
            const modal = bootstrap.Modal.getInstance(document.getElementById('reminderModal'));
            modal.hide();
            
            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show';
            alertDiv.innerHTML = `
                <i class="bi bi-check-circle me-2"></i>
                Pengingat berhasil dikirim ke penyewa terpilih
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.querySelector('.alert-container').prepend(alertDiv);
        }
        
        // Initialize dropdowns
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>