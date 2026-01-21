<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - KostManage</title>
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
        
        .icon-pendapatan { 
            background: linear-gradient(135deg, var(--accent), #34D399);
        }
        
        .icon-kamar { 
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .icon-penyewa { 
            background: linear-gradient(135deg, var(--warning), #FBBF24);
        }
        
        .icon-laporan { 
            background: linear-gradient(135deg, var(--secondary), #A78BFA);
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
        
        /* Report Cards */
        .report-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 36px;
        }
        
        .report-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
        }
        
        .report-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }
        
        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--gray-200);
        }
        
        .report-header h5 {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .report-header h5 i {
            color: var(--primary);
        }
        
        .chart-container {
            height: 250px;
            margin-top: 20px;
        }
        
        /* Report Table */
        .report-table-container {
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
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--gray-200);
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
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid var(--gray-300);
            padding: 16px 12px;
            background-color: var(--gray-50);
        }
        
        .table td {
            padding: 16px 12px;
            vertical-align: middle;
            border-bottom: 1px solid var(--gray-200);
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
        }
        
        .badge-lunas {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .badge-menunggu {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .badge-tertunda {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .badge-aktif {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .badge-nonaktif {
            background-color: rgba(107, 114, 128, 0.1);
            color: var(--gray-600);
        }
        
        .badge-menunggak {
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
        
        /* Filter Section */
        .filter-section {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            margin-bottom: 24px;
        }
        
        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .filter-header h6 {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .filter-header h6 i {
            color: var(--primary);
        }
        
        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
        
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
            
            .report-cards {
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
        
        /* Print Button */
        .print-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius-md);
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .print-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        /* Pagination */
        .pagination-container {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 16px 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            margin-top: 24px;
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
                    <a href="{{ route('payments.index') }}" class="nav-link">
                        <i class="bi bi-cash-coin"></i>
                        <span>Pembayaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link active">
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
                <div class="user-profile">
                    <div class="user-avatar">
                        @if(auth()->check())
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        @else
                            AK
                        @endif
                    </div>
                    <div>
                        <div class="fw-bold">
                            @if(auth()->check())
                                {{ auth()->user()->name }}
                            @else
                                Admin Kost
                            @endif
                        </div>
                        <small class="text-muted">
                            @if(auth()->check())
                                {{ auth()->user()->email }}
                            @else
                                admin@kostmanage.com
                            @endif
                        </small>
                    </div>
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
                            <input type="text" class="form-control" placeholder="Cari laporan...">
                        </div>
                    </div>
                    <div class="date-display d-none d-lg-flex">
                        <i class="bi bi-calendar3"></i>
                        <span id="currentDate">{{ now()->translatedFormat('l, d F Y') }}</span>
                    </div>
                </div>
                
                <div class="navbar-right">
                    <div class="notification-badge">
                        <i class="bi bi-bell"></i>
                        <span class="badge-count">{{ $menunggakPenyewa ?? 0 }}</span>
                    </div>
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            @if(auth()->check())
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            @else
                                AK
                            @endif
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-bold">
                                @if(auth()->check())
                                    {{ auth()->user()->name }}
                                @else
                                    Admin Kost
                                @endif
                            </div>
                            <small class="text-muted">
                                @if(auth()->check())
                                    {{ ucfirst(auth()->user()->role) }}
                                @else
                                    Admin
                                @endif
                            </small>
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
                <!-- Header -->
                <div class="header-section">
                    <h1 class="header-title">Laporan</h1>
                    <p class="header-subtitle">Analisis dan ringkasan data kost Anda. Filter dan generate laporan sesuai kebutuhan.</p>
                </div>
                
                <!-- Filter Section (untuk halaman detail) -->
                @if(isset($showFilter) && $showFilter)
                <div class="filter-section fade-in">
                    <div class="filter-header">
                        <h6><i class="bi bi-funnel"></i> Filter Data</h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="applyFilters()">
                            <i class="bi bi-filter"></i> Terapkan Filter
                        </button>
                    </div>
                    <div class="filter-form">
                        @if(isset($filterType) && $filterType == 'pendapatan')
                        <div>
                            <label class="form-label">Periode</label>
                            <select class="form-select" id="filterPeriod">
                                <option value="monthly" {{ ($filter ?? 'monthly') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                                <option value="yearly" {{ ($filter ?? '') == 'yearly' ? 'selected' : '' }}>Tahunan</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Bulan</label>
                            <select class="form-select" id="filterMonth">
                                @foreach(['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'] as $key => $value)
                                <option value="{{ $key }}" {{ ($month ?? date('m')) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Tahun</label>
                            <select class="form-select" id="filterYear">
                                @for($y = date('Y'); $y >= date('Y')-5; $y--)
                                <option value="{{ $y }}" {{ ($year ?? date('Y')) == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                        @elseif(isset($filterType) && $filterType == 'kamar')
                        <div>
                            <label class="form-label">Status Kamar</label>
                            <select class="form-select" id="filterStatus">
                                <option value="all" {{ ($status ?? 'all') == 'all' ? 'selected' : '' }}>Semua Status</option>
                                <option value="terisi" {{ ($status ?? '') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                                <option value="kosong" {{ ($status ?? '') == 'kosong' ? 'selected' : '' }}>Kosong</option>
                                <option value="maintenance" {{ ($status ?? '') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>
                        @elseif(isset($filterType) && $filterType == 'penyewa')
                        <div>
                            <label class="form-label">Status Penyewa</label>
                            <select class="form-select" id="filterStatus">
                                <option value="all" {{ ($status ?? 'all') == 'all' ? 'selected' : '' }}>Semua Status</option>
                                <option value="aktif" {{ ($status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ ($status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                <option value="menunggak" {{ ($status ?? '') == 'menunggak' ? 'selected' : '' }}>Menunggak</option>
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                
                <!-- Stats Grid (untuk halaman utama) -->
                @if(!isset($showFilter) || !$showFilter)
                <div class="stats-grid">
                    <div class="stat-card fade-in">
                        <div class="stat-header">
                            <div class="stat-icon icon-pendapatan">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                {{ number_format(($monthlyRevenue ?? 0) / 1000000, 1) }} JT
                            </div>
                        </div>
                        <div class="stat-value">Rp {{ number_format(($monthlyRevenue ?? 0) / 1000000, 1) }} JT</div>
                        <div class="stat-label">Pendapatan Bulan Ini</div>
                        <div class="stat-footer">
                            <i class="bi bi-calendar"></i>
                            <span>Periode: {{ $currentMonth ?? now()->translatedFormat('F Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-pendapatan">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                {{ number_format(($yearlyRevenue ?? 0) / 1000000, 1) }} JT
                            </div>
                        </div>
                        <div class="stat-value">Rp {{ number_format(($yearlyRevenue ?? 0) / 1000000, 1) }} JT</div>
                        <div class="stat-label">Pendapatan Tahun Ini</div>
                        <div class="stat-footer">
                            <i class="bi bi-calendar"></i>
                            <span>Tahun: {{ $currentYear ?? now()->format('Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-kamar">
                                <i class="bi bi-door-closed"></i>
                            </div>
                            <div class="stat-trend {{ ($occupiedRooms ?? 0) > 0 ? 'trend-up' : 'trend-down' }}">
                                <i class="bi bi-arrow-{{ ($occupiedRooms ?? 0) > 0 ? 'up' : 'down' }}"></i>
                                {{ $occupiedRooms ?? 0 }} terisi
                            </div>
                        </div>
                        <div class="stat-value">{{ $totalRooms ?? 0 }}</div>
                        <div class="stat-label">Total Kamar</div>
                        <div class="stat-footer">
                            <i class="bi bi-percent"></i>
                            <span>Okupasi: {{ ($totalRooms ?? 0) > 0 ? round((($occupiedRooms ?? 0) / ($totalRooms ?? 1)) * 100) : 0 }}%</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-penyewa">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="stat-trend {{ ($aktifPenyewa ?? 0) > 0 ? 'trend-up' : 'trend-down' }}">
                                <i class="bi bi-arrow-{{ ($aktifPenyewa ?? 0) > 0 ? 'up' : 'down' }}"></i>
                                {{ $aktifPenyewa ?? 0 }} aktif
                            </div>
                        </div>
                        <div class="stat-value">{{ $aktifPenyewa ?? 0 }}</div>
                        <div class="stat-label">Penyewa Aktif</div>
                        <div class="stat-footer">
                            <i class="bi bi-exclamation-triangle"></i>
                            <span>{{ $menunggakPenyewa ?? 0 }} menunggak</span>
                        </div>
                    </div>
                </div>
                
                <!-- Report Cards (untuk halaman utama) -->
                <div class="report-cards">
                    <div class="report-card fade-in">
                        <div class="report-header">
                            <h5><i class="bi bi-graph-up"></i> Pendapatan Tahunan</h5>
                        </div>
                        <div class="chart-container">
                            <canvas id="yearlyRevenueChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="report-card fade-in">
                        <div class="report-header">
                            <h5><i class="bi bi-pie-chart"></i> Status Kamar</h5>
                        </div>
                        <div class="chart-container">
                            <canvas id="roomStatusChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="report-card fade-in">
                        <div class="report-header">
                            <h5><i class="bi bi-pie-chart"></i> Status Penyewa</h5>
                        </div>
                        <div class="chart-container">
                            <canvas id="tenantStatusChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Payments Table (untuk halaman utama) -->
                <div class="report-table-container fade-in">
                    <div class="table-header">
                        <h5><i class="bi bi-clock-history"></i> Pembayaran Terbaru</h5>
                        <a href="{{ route('laporan.pendapatan') }}" class="btn btn-sm btn-outline-primary">
                            Lihat Semua <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penyewa</th>
                                    <th>Kamar</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $recentPayments = $recentPayments ?? [];
                                @endphp
                                
                                @forelse($recentPayments as $index => $payment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $payment->penyewa->nama ?? 'N/A' }}</div>
                                            <small class="text-muted">{{ $payment->penyewa->no_hp ?? '' }}</small>
                                        </td>
                                        <td>
                                            @if($payment->room ?? false)
                                                <span class="badge bg-light text-dark">{{ $payment->room->nomor_kamar }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="fw-bold">Rp {{ number_format($payment->jumlah ?? 0, 0, ',', '.') }}</td>
                                        <td>
                                            {{ $payment->tanggal_pembayaran ? \Carbon\Carbon::parse($payment->tanggal_pembayaran)->format('d/m/Y') : '-' }}
                                            <br>
                                            <small class="text-muted">{{ $payment->bulan_pembayaran ?? '' }}</small>
                                        </td>
                                        <td>
                                            <span class="badge-status badge-{{ $payment->status ?? 'menunggu' }}">
                                                {{ ucfirst($payment->status ?? 'menunggu') }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <i class="bi bi-inbox display-4 text-muted"></i>
                                            <p class="mt-2 text-muted">Belum ada data pembayaran</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                
                <!-- Content untuk halaman detail -->
                @if(isset($showFilter) && $showFilter)
                    <!-- Table untuk Pendapatan -->
                    @if($filterType == 'pendapatan')
                    <div class="report-table-container fade-in">
                        <div class="table-header">
                            <h5><i class="bi bi-cash-stack"></i> Laporan Pendapatan - {{ $period ?? 'Periode' }}</h5>
                            <button class="print-btn" onclick="printReport()">
                                <i class="bi bi-printer"></i> Cetak
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Penyewa</th>
                                        <th>Kamar</th>
                                        <th>Jumlah</th>
                                        <th>Metode</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $payments = $payments ?? [];
                                    @endphp
                                    
                                    @forelse($payments as $index => $payment)
                                        <tr>
                                            <td>{{ ($payments->currentPage() - 1) * $payments->perPage() + $index + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($payment->tanggal_pembayaran)->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="fw-bold">{{ $payment->penyewa->nama }}</div>
                                                <small class="text-muted">{{ $payment->penyewa->no_hp }}</small>
                                            </td>
                                            <td>
                                                @if($payment->room)
                                                    <span class="badge bg-light text-dark">{{ $payment->room->nomor_kamar }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="fw-bold">Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                                            <td>{{ $payment->metode_pembayaran ?? 'Transfer' }}</td>
                                            <td>
                                                <span class="badge-status badge-{{ $payment->status }}">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <i class="bi bi-inbox display-4 text-muted"></i>
                                                <p class="mt-2 text-muted">Tidak ada data pembayaran untuk periode ini</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Total Summary -->
                        @if(count($payments) > 0)
                        <div class="mt-4 p-3 bg-light rounded">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Total Pendapatan:</span>
                                        <span class="fw-bold text-success">Rp {{ number_format($totalAmount ?? 0, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Jumlah Transaksi:</span>
                                        <span class="fw-bold">{{ count($payments) }} transaksi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Pagination -->
                        @if($payments instanceof \Illuminate\Pagination\LengthAwarePaginator && $payments->hasPages())
                        <div class="pagination-container mt-4">
                            {{ $payments->links() }}
                        </div>
                        @endif
                    </div>
                    
                    <!-- Chart untuk Pendapatan -->
                    <div class="report-card fade-in mt-4">
                        <div class="report-header">
                            <h5><i class="bi bi-bar-chart"></i> Grafik Pendapatan {{ $filter == 'monthly' ? 'Per Hari' : 'Per Bulan' }}</h5>
                        </div>
                        <div class="chart-container">
                            <canvas id="paymentChart"></canvas>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Table untuk Kamar -->
                    @if($filterType == 'kamar')
                    <div class="report-table-container fade-in">
                        <div class="table-header">
                            <h5><i class="bi bi-door-closed"></i> Laporan Kamar</h5>
                            <div>
                                <button class="print-btn me-2" onclick="printReport()">
                                    <i class="bi bi-printer"></i> Cetak
                                </button>
                                <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-plus"></i> Tambah Kamar
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Kamar</th>
                                        <th>Tipe</th>
                                        <th>Harga Sewa</th>
                                        <th>Status</th>
                                        <th>Penyewa</th>
                                        <th>Fasilitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rooms = $rooms ?? [];
                                    @endphp
                                    
                                    @forelse($rooms as $index => $room)
                                        <tr>
                                            <td>{{ ($rooms->currentPage() - 1) * $rooms->perPage() + $index + 1 }}</td>
                                            <td>
                                                <span class="fw-bold">{{ $room->nomor_kamar }}</span>
                                            </td>
                                            <td>{{ ucfirst($room->tipe_kamar) }}</td>
                                            <td class="fw-bold">Rp {{ number_format($room->harga_sewa, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge-status badge-{{ $room->status == 'terisi' ? 'aktif' : ($room->status == 'maintenance' ? 'tertunda' : 'nonaktif') }}">
                                                    {{ ucfirst($room->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($room->penyewa)
                                                    <div class="fw-bold">{{ $room->penyewa->nama }}</div>
                                                    <small class="text-muted">{{ $room->penyewa->no_hp }}</small>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <small>{{ $room->fasilitas ?? 'Standard' }}</small>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <i class="bi bi-inbox display-4 text-muted"></i>
                                                <p class="mt-2 text-muted">Tidak ada data kamar</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Summary Stats -->
                        @if(isset($roomStats))
                        <div class="mt-4 p-3 bg-light rounded">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-primary">{{ $roomStats['total'] ?? 0 }}</div>
                                        <small>Total Kamar</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-success">{{ $roomStats['terisi'] ?? 0 }}</div>
                                        <small>Terisi</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-danger">{{ $roomStats['kosong'] ?? 0 }}</div>
                                        <small>Kosong</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-warning">{{ $roomStats['maintenance'] ?? 0 }}</div>
                                        <small>Maintenance</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Pagination -->
                        @if($rooms instanceof \Illuminate\Pagination\LengthAwarePaginator && $rooms->hasPages())
                        <div class="pagination-container mt-4">
                            {{ $rooms->links() }}
                        </div>
                        @endif
                    </div>
                    @endif
                    
                    <!-- Table untuk Penyewa -->
                    @if($filterType == 'penyewa')
                    <div class="report-table-container fade-in">
                        <div class="table-header">
                            <h5><i class="bi bi-people"></i> Laporan Penyewa</h5>
                            <div>
                                <button class="print-btn me-2" onclick="printReport()">
                                    <i class="bi bi-printer"></i> Cetak
                                </button>
                                <a href="{{ route('penyewas.create') }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-plus"></i> Tambah Penyewa
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No. KTP</th>
                                        <th>No. HP</th>
                                        <th>Kamar</th>
                                        <th>Status</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Pekerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $penyewas = $penyewas ?? [];
                                    @endphp
                                    
                                    @forelse($penyewas as $index => $penyewa)
                                        <tr>
                                            <td>{{ ($penyewas->currentPage() - 1) * $penyewas->perPage() + $index + 1 }}</td>
                                            <td>
                                                <div class="fw-bold">{{ $penyewa->nama }}</div>
                                                <small class="text-muted">{{ $penyewa->email ?? '-' }}</small>
                                            </td>
                                            <td>{{ $penyewa->no_ktp }}</td>
                                            <td>{{ $penyewa->no_hp }}</td>
                                            <td>
                                                @if($penyewa->room)
                                                    <span class="badge bg-light text-dark">{{ $penyewa->room->nomor_kamar }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge-status badge-{{ $penyewa->status }}">
                                                    {{ ucfirst($penyewa->status) }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($penyewa->tanggal_masuk)->format('d/m/Y') }}</td>
                                            <td>
                                                <small>{{ $penyewa->pekerjaan ?? '-' }}</small>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4">
                                                <i class="bi bi-inbox display-4 text-muted"></i>
                                                <p class="mt-2 text-muted">Tidak ada data penyewa</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Summary Stats -->
                        @if(isset($tenantStats))
                        <div class="mt-4 p-3 bg-light rounded">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-primary">{{ $tenantStats['total'] ?? 0 }}</div>
                                        <small>Total Penyewa</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-success">{{ $tenantStats['aktif'] ?? 0 }}</div>
                                        <small>Aktif</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-danger">{{ $tenantStats['menunggak'] ?? 0 }}</div>
                                        <small>Menunggak</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-warning">{{ $tenantStats['nonaktif'] ?? 0 }}</div>
                                        <small>Nonaktif</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Pagination -->
                        @if($penyewas instanceof \Illuminate\Pagination\LengthAwarePaginator && $penyewas->hasPages())
                        <div class="pagination-container mt-4">
                            {{ $penyewas->links() }}
                        </div>
                        @endif
                    </div>
                    @endif
                @endif
                
                <!-- Quick Actions (untuk halaman utama) -->
                @if(!isset($showFilter) || !$showFilter)
                <div class="quick-actions">
                    <div class="action-card fade-in" onclick="window.location.href='{{ route('laporan.pendapatan') }}'">
                        <div class="action-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h6>Laporan Pendapatan</h6>
                        <p>Lihat detail pendapatan kost</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.1s;" onclick="window.location.href='{{ route('laporan.kamar') }}'">
                        <div class="action-icon">
                            <i class="bi bi-door-closed"></i>
                        </div>
                        <h6>Laporan Kamar</h6>
                        <p>Analisis status dan okupasi kamar</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.2s;" onclick="window.location.href='{{ route('laporan.penyewa') }}'">
                        <div class="action-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h6>Laporan Penyewa</h6>
                        <p>Data lengkap penyewa kost</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.3s;" onclick="showGenerateModal()">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>
                        <h6>Generate Laporan</h6>
                        <p>Buat laporan PDF untuk dicetak</p>
                    </div>
                </div>
                @endif
            </div>
        </main>
    </div>
    
    <!-- Generate Report Modal -->
    <div class="modal fade" id="generateReportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-file-earmark-pdf me-2"></i> Generate Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('laporan.generate') }}" method="POST" target="_blank">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Laporan</label>
                                <select class="form-select" name="type" required>
                                    <option value="pendapatan">Laporan Pendapatan</option>
                                    <option value="kamar">Laporan Kamar</option>
                                    <option value="penyewa">Laporan Penyewa</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Format</label>
                                <select class="form-select" name="format" required>
                                    <option value="pdf">PDF</option>
                                    <option value="excel" disabled>Excel (Segera Hadir)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Kosongkan tanggal untuk mengambil semua data
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-download me-2"></i> Generate & Download
                        </button>
                    </div>
                </form>
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
        
        // Data untuk charts dari PHP (hanya untuk halaman utama)
        @if(!isset($showFilter) || !$showFilter)
        <?php
            $yearlyLabels = isset($yearlyRevenueData['labels']) ? json_encode($yearlyRevenueData['labels']) : json_encode(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']);
            $yearlyData = isset($yearlyRevenueData['data']) ? json_encode($yearlyRevenueData['data']) : json_encode([8.2, 8.5, 8.3, 8.0, 8.4, 8.6, 8.8, 8.7, 8.9, 9.0, 8.8, 9.2]);
            
            $roomStatusData = isset($roomStatusData) ? $roomStatusData : ['terisi' => 8, 'kosong' => 4, 'maintenance' => 0];
            $tenantStatusData = isset($tenantStatusData) ? $tenantStatusData : ['aktif' => 8, 'nonaktif' => 2, 'menunggak' => 1];
        ?>
        
        const yearlyLabels = <?php echo $yearlyLabels; ?>;
        const yearlyData = <?php echo $yearlyData; ?>;
        
        const roomStatusData = {
            labels: ['Terisi', 'Kosong', 'Maintenance'],
            datasets: [{
                data: [<?php echo $roomStatusData['terisi']; ?>, <?php echo $roomStatusData['kosong']; ?>, <?php echo $roomStatusData['maintenance']; ?>],
                backgroundColor: ['#10B981', '#EF4444', '#F59E0B']
            }]
        };
        
        const tenantStatusData = {
            labels: ['Aktif', 'Nonaktif', 'Menunggak'],
            datasets: [{
                data: [<?php echo $tenantStatusData['aktif']; ?>, <?php echo $tenantStatusData['nonaktif']; ?>, <?php echo $tenantStatusData['menunggak']; ?>],
                backgroundColor: ['#10B981', '#6B7280', '#EF4444']
            }]
        };
        
        // Yearly Revenue Chart
        if (document.getElementById('yearlyRevenueChart')) {
            const yearlyRevenueCtx = document.getElementById('yearlyRevenueChart').getContext('2d');
            const yearlyRevenueChart = new Chart(yearlyRevenueCtx, {
                type: 'bar',
                data: {
                    labels: yearlyLabels,
                    datasets: [{
                        label: 'Pendapatan (Juta)',
                        data: yearlyData,
                        backgroundColor: 'rgba(102, 126, 234, 0.7)',
                        borderColor: '#667EEA',
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `Rp ${context.parsed.y.toFixed(1)} JT`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value.toFixed(0) + 'JT';
                                }
                            }
                        }
                    }
                }
            });
        }
        
        // Room Status Chart
        if (document.getElementById('roomStatusChart')) {
            const roomStatusCtx = document.getElementById('roomStatusChart').getContext('2d');
            const roomStatusChart = new Chart(roomStatusCtx, {
                type: 'doughnut',
                data: roomStatusData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    cutout: '70%'
                }
            });
        }
        
        // Tenant Status Chart
        if (document.getElementById('tenantStatusChart')) {
            const tenantStatusCtx = document.getElementById('tenantStatusChart').getContext('2d');
            const tenantStatusChart = new Chart(tenantStatusCtx, {
                type: 'doughnut',
                data: tenantStatusData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    cutout: '70%'
                }
            });
        }
        @endif
        
        // Payment Chart untuk halaman detail pendapatan
        @if(isset($chartData) && isset($filterType) && $filterType == 'pendapatan')
        <?php
            $chartLabels = isset($chartData['labels']) ? json_encode($chartData['labels']) : json_encode([]);
            $chartValues = isset($chartData['data']) ? json_encode($chartData['data']) : json_encode([]);
            $chartType = $chartData['type'] ?? 'daily';
        ?>
        
        if (document.getElementById('paymentChart')) {
            const paymentCtx = document.getElementById('paymentChart').getContext('2d');
            const paymentLabels = <?php echo $chartLabels; ?>;
            const paymentData = <?php echo $chartValues; ?>;
            const isDaily = '<?php echo $chartType; ?>' === 'daily';
            
            const paymentChart = new Chart(paymentCtx, {
                type: 'bar',
                data: {
                    labels: paymentLabels,
                    datasets: [{
                        label: isDaily ? 'Pendapatan Harian (Rp)' : 'Pendapatan Bulanan (Juta Rp)',
                        data: paymentData,
                        backgroundColor: 'rgba(16, 185, 129, 0.7)',
                        borderColor: '#10B981',
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    if (isDaily) {
                                        return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    } else {
                                        return 'Rp ' + context.parsed.y.toFixed(1) + ' JT';
                                    }
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    if (isDaily) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                    } else {
                                        return 'Rp ' + value.toFixed(0) + 'JT';
                                    }
                                }
                            }
                        }
                    }
                }
            });
        }
        @endif
        
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
        
        // Show generate modal
        function showGenerateModal() {
            const modal = new bootstrap.Modal(document.getElementById('generateReportModal'));
            modal.show();
        }
        
        // Apply filters untuk halaman detail
        function applyFilters() {
            @if(isset($filterType) && $filterType == 'pendapatan')
            const filter = document.getElementById('filterPeriod').value;
            const month = document.getElementById('filterMonth').value;
            const year = document.getElementById('filterYear').value;
            
            let url = '{{ route("laporan.pendapatan") }}?filter=' + filter + '&month=' + month + '&year=' + year;
            window.location.href = url;
            @elseif(isset($filterType) && ($filterType == 'kamar' || $filterType == 'penyewa'))
            const status = document.getElementById('filterStatus').value;
            let url = '';
            
            @if($filterType == 'kamar')
            url = '{{ route("laporan.kamar") }}?status=' + status;
            @else
            url = '{{ route("laporan.penyewa") }}?status=' + status;
            @endif
            
            window.location.href = url;
            @endif
        }
        
        // Print report
        function printReport() {
            window.print();
        }
        
        // Set default dates in modal
        document.addEventListener('DOMContentLoaded', function() {
            const modalStartDate = document.querySelector('input[name="start_date"]');
            const modalEndDate = document.querySelector('input[name="end_date"]');
            
            if (modalStartDate && modalEndDate) {
                const today = new Date();
                const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
                
                modalStartDate.value = firstDay.toISOString().split('T')[0];
                modalEndDate.value = today.toISOString().split('T')[0];
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
        
        // Initialize dropdowns
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    </script>
</body>
</html>