<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KostManage</title>
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
        
        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-bottom: 36px;
        }
        
        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
        
        .chart-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .chart-header h5 {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .chart-header h5 i {
            color: var(--primary);
        }
        
        /* Recent Activity */
        .activity-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
        }
        
        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .activity-header h5 {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-header h5 i {
            color: var(--primary);
        }
        
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 16px;
            border-radius: var(--border-radius-md);
            transition: var(--transition);
            border: 1px solid transparent;
        }
        
        .activity-item:hover {
            background-color: var(--gray-50);
            border-color: var(--gray-200);
        }
        
        .activity-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-size: 1.2rem;
            flex-shrink: 0;
            color: var(--white);
        }
        
        .icon-payment { 
            background: linear-gradient(135deg, var(--accent), #34D399);
        }
        
        .icon-warning { 
            background: linear-gradient(135deg, var(--warning), #FBBF24);
        }
        
        .icon-new { 
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .icon-maintenance { 
            background: linear-gradient(135deg, #8B5CF6, #A78BFA);
        }
        
        .activity-content {
            flex-grow: 1;
        }
        
        .activity-content h6 {
            font-weight: 600;
            margin-bottom: 4px;
            color: var(--dark);
        }
        
        .activity-content p {
            color: var(--gray-600);
            font-size: 0.9rem;
            margin-bottom: 4px;
        }
        
        .activity-content small {
            color: var(--gray-500);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .activity-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            background-color: var(--gray-100);
            color: var(--gray-700);
        }
        
        .badge-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .badge-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .badge-info {
            background-color: rgba(102, 126, 234, 0.1);
            color: var(--primary);
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
            
            .charts-section {
                grid-template-columns: 1fr;
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
                    <a href="#" class="nav-link active">
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-door-closed"></i>
                        <span>Kamar</span>
                        <span class="badge bg-primary ms-auto" style="background: linear-gradient(135deg, var(--primary), var(--secondary))!important;">12</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span>Penyewa</span>
                        <span class="badge bg-success ms-auto">8</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
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
                <div class="user-profile">
                    <div class="user-avatar">
                        AK
                    </div>
                    <div>
                        <div class="fw-bold">Admin Kost</div>
                        <small class="text-muted">admin@kostmanage.com</small>
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
                            <input type="text" class="form-control" placeholder="Cari...">
                        </div>
                    </div>
                    <div class="date-display d-none d-lg-flex">
                        <i class="bi bi-calendar3"></i>
                        <span id="currentDate">Senin, 5 November 2023</span>
                    </div>
                </div>
                
                <div class="navbar-right">
                    <div class="notification-badge">
                        <i class="bi bi-bell"></i>
                        <span class="badge-count">3</span>
                    </div>
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            AK
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-bold">Admin Kost</div>
                            <small class="text-muted">Admin</small>
                        </div>
                        <i class="bi bi-chevron-down d-none d-md-block"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                        <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a>
                        <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                        <a class="dropdown-item" href="#"><i class="bi bi-shield-check me-2"></i> Keamanan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </nav>
            
            <!-- Content Area -->
            <div class="content-area">
                <!-- Header -->
                <div class="header-section">
                    <h1 class="header-title">Dashboard</h1>
                    <p class="header-subtitle">Selamat datang kembali! Berikut ringkasan aktivitas kost Anda.</p>
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
                                2 baru
                            </div>
                        </div>
                        <div class="stat-value">12</div>
                        <div class="stat-label">Total Kamar</div>
                        <div class="stat-footer">
                            <i class="bi bi-info-circle"></i>
                            <span>2 kamar baru bulan ini</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-penyewa">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                80%
                            </div>
                        </div>
                        <div class="stat-value">8</div>
                        <div class="stat-label">Penyewa Aktif</div>
                        <div class="stat-footer">
                            <i class="bi bi-check-circle"></i>
                            <span>Kapasitas optimal</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-pendapatan">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                15%
                            </div>
                        </div>
                        <div class="stat-value">Rp 8.4 JT</div>
                        <div class="stat-label">Pendapatan Bulan Ini</div>
                        <div class="stat-footer">
                            <i class="bi bi-graph-up"></i>
                            <span>Naik dari bulan lalu</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-kosong">
                                <i class="bi bi-house-x"></i>
                            </div>
                            <div class="stat-trend trend-down">
                                <i class="bi bi-exclamation-triangle"></i>
                                Perhatian
                            </div>
                        </div>
                        <div class="stat-value">4</div>
                        <div class="stat-label">Kamar Kosong</div>
                        <div class="stat-footer">
                            <i class="bi bi-clock"></i>
                            <span>Butuh perhatian</span>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Section -->
                <div class="charts-section">
                    <div class="chart-card fade-in">
                        <div class="chart-header">
                            <h5><i class="bi bi-graph-up"></i> Pendapatan 6 Bulan Terakhir</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-filter"></i> Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">6 Bulan Terakhir</a></li>
                                    <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                                    <li><a class="dropdown-item" href="#">Tahun Lalu</a></li>
                                </ul>
                            </div>
                        </div>
                        <canvas id="revenueChart" height="250"></canvas>
                    </div>
                    
                    <div class="chart-card fade-in">
                        <div class="chart-header">
                            <h5><i class="bi bi-pie-chart"></i> Status Kamar</h5>
                            <div class="text-muted">Total: 12 Kamar</div>
                        </div>
                        <canvas id="roomStatusChart" height="250"></canvas>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="activity-card fade-in">
                    <div class="activity-header">
                        <h5><i class="bi bi-clock-history"></i> Aktivitas Terbaru</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Lihat Semua <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon icon-payment">
                                <i class="bi bi-cash"></i>
                            </div>
                            <div class="activity-content">
                                <h6 class="mb-1">Pembayaran diterima</h6>
                                <p class="mb-0 text-muted">Budi Santoso membayar kamar A1 untuk bulan November</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i>
                                    2 jam yang lalu
                                </small>
                            </div>
                            <span class="activity-badge badge-success">Rp 1.200.000</span>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon icon-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="activity-content">
                                <h6 class="mb-1">Pembayaran terlambat</h6>
                                <p class="mb-0 text-muted">Siti Rahayu belum membayar kamar B3 (jatuh tempo 5 Nov)</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i>
                                    1 hari yang lalu
                                </small>
                            </div>
                            <span class="activity-badge badge-warning">Tertunda</span>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon icon-new">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <div class="activity-content">
                                <h6 class="mb-1">Penyewa baru</h6>
                                <p class="mb-0 text-muted">Rina Melati mendaftar sebagai penyewa kamar C2</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i>
                                    3 hari yang lalu
                                </small>
                            </div>
                            <span class="activity-badge badge-info">Baru</span>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon icon-maintenance">
                                <i class="bi bi-tools"></i>
                            </div>
                            <div class="activity-content">
                                <h6 class="mb-1">Maintenance selesai</h6>
                                <p class="mb-0 text-muted">Perbaikan AC di kamar A3 telah selesai dilakukan</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i>
                                    1 minggu yang lalu
                                </small>
                            </div>
                            <span class="activity-badge badge-info">Selesai</span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-card fade-in">
                        <div class="action-icon">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                        <h6>Tambah Penyewa</h6>
                        <p>Tambah penyewa baru ke sistem</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.1s;">
                        <div class="action-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h6>Catat Pembayaran</h6>
                        <p>Catat pembayaran dari penyewa</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.2s;">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h6>Generate Laporan</h6>
                        <p>Buat laporan bulanan</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.3s;">
                        <div class="action-icon">
                            <i class="bi bi-gear"></i>
                        </div>
                        <h6>Pengaturan</h6>
                        <p>Kelola pengaturan sistem</p>
                    </div>
                </div>
            </div>
        </main>
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
        
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                datasets: [{
                    label: 'Pendapatan (Juta)',
                    data: [7.2, 7.5, 8.0, 7.8, 8.2, 8.4],
                    borderColor: '#667EEA',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#667EEA',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Inter'
                            },
                            padding: 20,
                            color: '#1F2937'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        titleColor: '#1F2937',
                        bodyColor: '#4B5563',
                        borderColor: '#E5E7EB',
                        borderWidth: 1,
                        titleFont: {
                            size: 14,
                            weight: '600'
                        },
                        bodyFont: {
                            size: 14
                        },
                        padding: 12,
                        cornerRadius: 8,
                        boxShadow: '0 4px 6px rgba(0, 0, 0, 0.07)',
                        callbacks: {
                            label: function(context) {
                                return `Rp ${context.parsed.y} JT`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value + 'JT';
                            },
                            font: {
                                size: 12
                            },
                            color: '#6B7280'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6B7280'
                        }
                    }
                }
            }
        });
        
        // Room Status Chart
        const roomCtx = document.getElementById('roomStatusChart').getContext('2d');
        const roomChart = new Chart(roomCtx, {
            type: 'doughnut',
            data: {
                labels: ['Terisi', 'Kosong', 'Maintenance'],
                datasets: [{
                    data: [8, 3, 1],
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
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        padding: 12,
                        cornerRadius: 8,
                        borderColor: '#E5E7EB',
                        borderWidth: 1,
                        boxShadow: '0 4px 6px rgba(0, 0, 0, 0.07)',
                        titleColor: '#1F2937',
                        bodyColor: '#4B5563',
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed + ' kamar';
                                return label;
                            }
                        }
                    }
                },
                cutout: '70%'
            }
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