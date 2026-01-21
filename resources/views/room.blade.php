<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar - KostManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css">
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
        
        .icon-kamar { 
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .icon-penyewa { 
            background: linear-gradient(135deg, var(--accent), #34D399);
        }
        
        .icon-pendapatan { 
            background: linear-gradient(135deg, var(--warning), #FBBF24);
        }
        
        .icon-kosong { 
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
        
        /* Table Styles */
        .table-container {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            margin-bottom: 36px;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .table-header h5 {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .table-header h5 i {
            color: var(--primary);
        }
        
        .table-responsive {
            border-radius: var(--border-radius-md);
            overflow: hidden;
            border: 1px solid var(--gray-300);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead {
            background-color: var(--gray-100);
        }
        
        .table th {
            font-weight: 600;
            color: var(--gray-700);
            border-bottom: 2px solid var(--gray-300);
            padding: 16px;
        }
        
        .table td {
            padding: 16px;
            vertical-align: middle;
            border-color: var(--gray-300);
        }
        
        .table tbody tr {
            transition: var(--transition);
        }
        
        .table tbody tr:hover {
            background-color: var(--gray-50);
        }
        
        /* Status Badges */
        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            border: none;
        }
        
        .badge-kosong {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .badge-terisi {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .badge-maintenance {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        /* Room Type Badges */
        .badge-type {
            padding: 6px 12px;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            font-size: 0.8rem;
            border: none;
        }
        
        .badge-standard {
            background-color: rgba(102, 126, 234, 0.1);
            color: var(--primary);
        }
        
        .badge-deluxe {
            background-color: rgba(139, 92, 246, 0.1);
            color: var(--secondary);
        }
        
        .badge-suite {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .badge-premium {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        /* Action Buttons */
        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 2px;
            transition: var(--transition);
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
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
        
        /* Responsive */
        @media (max-width: 992px) {
            .search-box {
                width: 250px;
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
        
        /* Modal Styles */
        .modal-content {
            border-radius: var(--border-radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
        }
        
        .modal-header {
            background-color: var(--gray-100);
            border-bottom: 1px solid var(--gray-300);
            border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
            padding: 20px 24px;
        }
        
        .modal-footer {
            background-color: var(--gray-100);
            border-top: 1px solid var(--gray-300);
            border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg);
            padding: 20px 24px;
        }
        
        /* Form Styles */
        .form-control, .form-select {
            border-radius: var(--border-radius-md);
            border: 2px solid var(--gray-300);
            padding: 12px 16px;
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* Alert Styles */
        .alert-custom {
            border-radius: var(--border-radius-md);
            border: none;
            box-shadow: var(--shadow-sm);
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
                    <a href="{{ route('rooms.index') }}" class="nav-link active">
                        <i class="bi bi-door-closed"></i>
                        <span>Kamar</span>
                        @if(($totalRooms ?? 0) > 0)
                        <span class="badge bg-primary ms-auto" style="background: linear-gradient(135deg, var(--primary), var(--secondary))!important;">
                            {{ $totalRooms ?? 0 }}
                        </span>
                        @endif
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('penyewas.index') }}" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span>Penyewa</span>
                        <span class="badge bg-success ms-auto">0</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link">
                        <i class="bi bi-cash-coin"></i>
                        <span>Pembayaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
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
                <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div>
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">{{ Auth::user()->role }}</small>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                    <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a>
                    <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
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
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari kamar..." id="searchInput">
                        </div>
                    </div>
                    <div class="date-display d-none d-lg-flex">
                        <i class="bi bi-calendar3"></i>
                        <span id="currentDate">Loading...</span>
                    </div>
                </div>
                
                <div class="navbar-right">
                    <div class="notification-badge">
                        <i class="bi bi-bell"></i>
                        <span class="badge-count">0</span>
                    </div>
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <small class="text-muted">{{ Auth::user()->role }}</small>
                        </div>
                        <i class="bi bi-chevron-down d-none d-md-block"></i>
                    </div>
                </div>
            </nav>
            
            <!-- Content Area -->
            <div class="content-area">
                <!-- Header -->
                <div class="header-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="header-title">Manajemen Kamar</h1>
                            <p class="header-subtitle">Kelola data kamar kost Anda dengan mudah</p>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Kamar
                        </button>
                    </div>
                </div>
                
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card fade-in">
                        <div class="stat-header">
                            <div class="stat-icon icon-kamar">
                                <i class="bi bi-door-closed"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                {{ $totalRooms > 0 ? round(($occupiedRooms/$totalRooms)*100, 0) : 0 }}% terisi
                            </div>
                        </div>
                        <div class="stat-value">{{ $totalRooms }}</div>
                        <div class="stat-label">Total Kamar</div>
                        <div class="stat-footer">
                            <i class="bi bi-grid-3x3-gap"></i>
                            <span>Semua kamar terdaftar</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-penyewa">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                {{ $occupiedRooms }} kamar
                            </div>
                        </div>
                        <div class="stat-value">{{ $occupiedRooms }}</div>
                        <div class="stat-label">Kamar Terisi</div>
                        <div class="stat-footer">
                            <i class="bi bi-currency-dollar"></i>
                            <span>Pendapatan aktif</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-kosong">
                                <i class="bi bi-house-x"></i>
                            </div>
                            <div class="stat-trend trend-down">
                                <i class="bi bi-exclamation-triangle"></i>
                                Perhatian
                            </div>
                        </div>
                        <div class="stat-value">{{ $vacantRooms }}</div>
                        <div class="stat-label">Kamar Kosong</div>
                        <div class="stat-footer">
                            <i class="bi bi-clock"></i>
                            <span>Butuh penyewa</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s;">
                        <div class="stat-header">
                            <div class="stat-icon" style="background: linear-gradient(135deg, #8B5CF6, #A78BFA);">
                                <i class="bi bi-tools"></i>
                            </div>
                            <div class="stat-trend">
                                <i class="bi bi-info-circle"></i>
                                Perbaikan
                            </div>
                        </div>
                        <div class="stat-value">{{ $maintenanceRooms }}</div>
                        <div class="stat-label">Dalam Perbaikan</div>
                        <div class="stat-footer">
                            <i class="bi bi-wrench"></i>
                            <span>Butuh perhatian</span>
                        </div>
                    </div>
                </div>
                
                <!-- Filter Section -->
                <div class="table-container fade-in">
                    <div class="table-header">
                        <h5><i class="bi bi-funnel"></i> Daftar Kamar</h5>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm" style="width: auto;" id="statusFilter">
                                <option value="">Semua Status</option>
                                <option value="kosong">Kosong</option>
                                <option value="terisi">Terisi</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                            <select class="form-select form-select-sm" style="width: auto;" id="typeFilter">
                                <option value="">Semua Tipe</option>
                                <option value="standard">Standard</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="suite">Suite</option>
                                <option value="premium">Premium</option>
                            </select>
                        </div>
                    </div>
                    
                    @if(session('success'))
                    <div class="alert alert-success alert-custom fade show mb-3" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-custom fade show mb-3" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="roomsTable">
                            <thead>
                                <tr>
                                    <th>No. Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Harga Sewa</th>
                                    <th>Status</th>
                                    <th>Penyewa</th>
                                    <th>Fasilitas</th>
                                    <th>Luas</th>
                                    <th>Lantai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rooms as $room)
                                <tr data-status="{{ $room->status }}" data-type="{{ $room->tipe_kamar }}">
                                    <td class="fw-bold">{{ $room->nomor_kamar }}</td>
                                    <td>
                                        <span class="badge badge-type badge-{{ $room->tipe_kamar }}">
                                            {{ ucfirst($room->tipe_kamar) }}
                                        </span>
                                    </td>
                                    <td class="fw-bold">Rp {{ number_format($room->harga_sewa, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge badge-status badge-{{ $room->status }}">
                                            {{ ucfirst($room->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($room->penyewa)
                                            <div class="fw-bold">{{ $room->penyewa->nama }}</div>
                                            <small class="text-muted">{{ $room->penyewa->no_hp }}</small>
                                            <div class="mt-1">
                                                <button class="btn btn-sm btn-outline-danger btn-sm vacate-room" 
                                                        data-id="{{ $room->id }}"
                                                        data-nama="{{ $room->penyewa->nama }}"
                                                        title="Kosongkan Kamar">
                                                    <i class="bi bi-house-x"></i>
                                                </button>
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($room->fasilitas)
                                            <small>{{ Str::limit($room->fasilitas, 50) }}</small>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $room->luas_kamar ?? '-' }}</td>
                                    <td>{{ $room->lantai ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-action btn-outline-primary edit-room" 
                                                    data-id="{{ $room->id }}"
                                                    data-nomor="{{ $room->nomor_kamar }}"
                                                    data-tipe="{{ $room->tipe_kamar }}"
                                                    data-harga="{{ $room->harga_sewa }}"
                                                    data-status="{{ $room->status }}"
                                                    data-fasilitas="{{ $room->fasilitas }}"
                                                    data-luas="{{ $room->luas_kamar }}"
                                                    data-lantai="{{ $room->lantai }}"
                                                    title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-action btn-outline-danger delete-room" 
                                                    data-id="{{ $room->id }}"
                                                    data-nomor="{{ $room->nomor_kamar }}"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-door-closed display-4"></i>
                                            <p class="mt-3">Belum ada data kamar</p>
                                            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Kamar Pertama
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    @if($rooms->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Menampilkan {{ $rooms->firstItem() }} - {{ $rooms->lastItem() }} dari {{ $rooms->total() }} kamar
                        </div>
                        <div>
                            {{ $rooms->links() }}
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-card fade-in" onclick="window.location.href='{{ route('rooms.index') }}'">
                        <div class="action-icon">
                            <i class="bi bi-list-ul"></i>
                        </div>
                        <h6>Lihat Semua Kamar</h6>
                        <p>Tampilkan semua data kamar</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.1s;" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                        <div class="action-icon">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                        <h6>Tambah Kamar</h6>
                        <p>Tambah kamar baru ke sistem</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.2s;" onclick="filterByStatus('kosong')">
                        <div class="action-icon">
                            <i class="bi bi-house-x"></i>
                        </div>
                        <h6>Kamar Kosong</h6>
                        <p>Lihat kamar yang tersedia</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.3s;" onclick="window.print()">
                        <div class="action-icon">
                            <i class="bi bi-printer"></i>
                        </div>
                        <h6>Cetak Laporan</h6>
                        <p>Cetak daftar kamar</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Add Room Modal -->
    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kamar Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('rooms.store') }}" method="POST" id="addRoomForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nomor Kamar *</label>
                                <input type="text" name="nomor_kamar" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tipe Kamar *</label>
                                <select name="tipe_kamar" class="form-select" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="standard">Standard</option>
                                    <option value="deluxe">Deluxe</option>
                                    <option value="suite">Suite</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Harga Sewa (per bulan) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga_sewa" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="kosong">Kosong</option>
                                    <option value="terisi">Terisi</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Luas Kamar</label>
                                <input type="text" name="luas_kamar" class="form-control" placeholder="Contoh: 3x4 m">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Lantai</label>
                                <input type="text" name="lantai" class="form-control" placeholder="Contoh: Lantai 2">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Fasilitas</label>
                                <textarea name="fasilitas" class="form-control" rows="3" placeholder="AC, Kamar Mandi Dalam, WiFi, Lemari, Kasur, Meja, Kursi"></textarea>
                                <div class="form-text">Pisahkan dengan koma</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Kamar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Edit Room Modal -->
    <div class="modal fade" id="editRoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="" method="POST" id="editRoomForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nomor Kamar *</label>
                                <input type="text" name="nomor_kamar" id="edit_nomor_kamar" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tipe Kamar *</label>
                                <select name="tipe_kamar" id="edit_tipe_kamar" class="form-select" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="standard">Standard</option>
                                    <option value="deluxe">Deluxe</option>
                                    <option value="suite">Suite</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Harga Sewa (per bulan) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga_sewa" id="edit_harga_sewa" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" id="edit_status" class="form-select" required>
                                    <option value="kosong">Kosong</option>
                                    <option value="terisi">Terisi</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Luas Kamar</label>
                                <input type="text" name="luas_kamar" id="edit_luas_kamar" class="form-control" placeholder="Contoh: 3x4 m">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Lantai</label>
                                <input type="text" name="lantai" id="edit_lantai" class="form-control" placeholder="Contoh: Lantai 2">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Fasilitas</label>
                                <textarea name="fasilitas" id="edit_fasilitas" class="form-control" rows="3" placeholder="AC, Kamar Mandi Dalam, WiFi, Lemari, Kasur, Meja, Kursi"></textarea>
                                <div class="form-text">Pisahkan dengan koma</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Kamar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kamar <strong id="roomName"></strong>?</p>
                    <p class="text-danger"><small>Data yang dihapus tidak dapat dikembalikan.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Set current date
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('currentDate').textContent = now.toLocaleDateString('id-ID', options);
        
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
        
        // Update time every minute
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            const dateString = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            document.getElementById('currentDate').textContent = `${dateString} • ${timeString}`;
        }
        
        setInterval(updateTime, 60000);
        updateTime();
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#roomsTable tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Filter functionality
        document.getElementById('statusFilter').addEventListener('change', filterTable);
        document.getElementById('typeFilter').addEventListener('change', filterTable);
        
        function filterTable() {
            const statusFilter = document.getElementById('statusFilter').value;
            const typeFilter = document.getElementById('typeFilter').value;
            const rows = document.querySelectorAll('#roomsTable tbody tr');
            
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                const type = row.getAttribute('data-type');
                
                const statusMatch = !statusFilter || status === statusFilter;
                const typeMatch = !typeFilter || type === typeFilter;
                
                row.style.display = statusMatch && typeMatch ? '' : 'none';
            });
        }
        
        function filterByStatus(status) {
            document.getElementById('statusFilter').value = status;
            filterTable();
        }
        
        // Edit room functionality
        document.querySelectorAll('.edit-room').forEach(button => {
            button.addEventListener('click', function() {
                const roomId = this.getAttribute('data-id');
                const form = document.getElementById('editRoomForm');
                form.action = `/rooms/${roomId}`;
                
                // Fill form with data
                document.getElementById('edit_nomor_kamar').value = this.getAttribute('data-nomor');
                document.getElementById('edit_tipe_kamar').value = this.getAttribute('data-tipe');
                document.getElementById('edit_harga_sewa').value = this.getAttribute('data-harga');
                document.getElementById('edit_status').value = this.getAttribute('data-status');
                document.getElementById('edit_fasilitas').value = this.getAttribute('data-fasilitas') || '';
                document.getElementById('edit_luas_kamar').value = this.getAttribute('data-luas') || '';
                document.getElementById('edit_lantai').value = this.getAttribute('data-lantai') || '';
                
                // Show modal
                const editModal = new bootstrap.Modal(document.getElementById('editRoomModal'));
                editModal.show();
            });
        });
        
        // Delete room functionality
        document.querySelectorAll('.delete-room').forEach(button => {
            button.addEventListener('click', function() {
                const roomId = this.getAttribute('data-id');
                const roomName = this.getAttribute('data-nomor');
                
                document.getElementById('roomName').textContent = roomName;
                document.getElementById('deleteForm').action = `/rooms/${roomId}`;
                
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });
        
        // Vacate room functionality
        document.querySelectorAll('.vacate-room').forEach(button => {
            button.addEventListener('click', function() {
                const roomId = this.getAttribute('data-id');
                const penyewaNama = this.getAttribute('data-nama');
                
                if (confirm(`Kosongkan kamar dari ${penyewaNama}?`)) {
                    fetch(`/rooms/${roomId}/vacate`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ _method: 'DELETE' })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showAlert('success', data.message);
                            setTimeout(() => location.reload(), 1000);
                        }
                    })
                    .catch(error => {
                        showAlert('error', 'Gagal mengosongkan kamar');
                    });
                }
            });
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
        
        // Add hover effect to stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Initialize dropdowns
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        // Room Status Chart (if we want to add it later)
        function initializeRoomStatusChart() {
            const roomCtx = document.getElementById('roomStatusChart')?.getContext('2d');
            if (roomCtx) {
                new Chart(roomCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Terisi', 'Kosong', 'Maintenance'],
                        datasets: [{
                            data: [{{ $occupiedRooms }}, {{ $vacantRooms }}, {{ $maintenanceRooms }}],
                            backgroundColor: [
                                '#10B981',
                                '#EF4444',
                                '#F59E0B'
                            ],
                            borderWidth: 3,
                            borderColor: '#FFFFFF',
                            hoverOffset: 15
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    font: {
                                        size: 13,
                                        family: 'Inter'
                                    },
                                    padding: 20,
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    color: '#4B5563'
                                }
                            }
                        },
                        cutout: '70%'
                    }
                });
            }
        }
        
        // Show alert function
        function showAlert(type, message) {
            const alert = `
                <div class="alert alert-${type} alert-dismissible fade show position-fixed" 
                     style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                    <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', alert);
            
            setTimeout(() => {
                const alertElement = document.querySelector('.alert.position-fixed');
                if (alertElement) {
                    alertElement.remove();
                }
            }, 5000);
        }
        
        // Auto dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>