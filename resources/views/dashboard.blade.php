<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <style>
            :root {
                --primary-purple: #7C3AED;
                --dark-purple: #5B21B6;
                --light-purple: #8B5CF6;
                --lighter-purple: #A78BFA;
                --dark-bg: #0F0F23;
                --darker-bg: #070711;
                --nav-bg: #1A1A2E;
                --content-bg: #0F0F23;
                --card-bg: #1A1A2E;
                --text-light: #E2E8F0;
                --text-gray: #94A3B8;
                --text-lighter: #F1F5F9;
                --success-green: #10B981;
                --warning-orange: #F59E0B;
                --info-blue: #3B82F6;
                --error-red: #EF4444;
                --border-color: rgba(124, 58, 237, 0.2);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Instrument Sans', sans-serif;
                background: var(--dark-bg);
                color: var(--text-light);
                min-height: 100vh;
            }

            /* Navigation Styles */
            .navigation {
                background: var(--nav-bg);
                border-bottom: 1px solid var(--border-color);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                position: sticky;
                top: 0;
                z-index: 1000;
                backdrop-filter: blur(10px);
            }

            .nav-container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 0 1rem;
                height: 64px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            /* Logo Section */
            .logo-section {
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .logo-link {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                text-decoration: none;
                transition: transform 0.3s ease;
            }

            .logo-link:hover {
                transform: translateX(-3px);
            }

            .logo-icon {
                width: 36px;
                height: 36px;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.1rem;
                box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
            }

            .logo-text {
                font-size: 1.25rem;
                font-weight: 700;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            /* Desktop Navigation */
            .desktop-nav {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .nav-item {
                position: relative;
            }

            .nav-link {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.625rem 1rem;
                color: var(--text-gray);
                text-decoration: none;
                border-radius: 10px;
                font-size: 0.95rem;
                font-weight: 500;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .nav-link:hover {
                color: var(--text-light);
                background: rgba(124, 58, 237, 0.1);
                transform: translateY(-1px);
            }

            .nav-link.active {
                color: var(--text-light);
                background: linear-gradient(90deg, rgba(124, 58, 237, 0.2), transparent);
                border-left: 3px solid var(--primary-purple);
            }

            .nav-link.active::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 2px;
                background: linear-gradient(90deg, var(--primary-purple), var(--light-purple));
                opacity: 0.5;
            }

            .nav-link i {
                font-size: 1rem;
                width: 20px;
                text-align: center;
            }

            /* User Dropdown */
            .user-dropdown {
                position: relative;
            }

            .dropdown-trigger {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.5rem 1rem;
                background: rgba(124, 58, 237, 0.1);
                border: 1px solid var(--border-color);
                border-radius: 12px;
                color: var(--text-light);
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .dropdown-trigger:hover {
                background: rgba(124, 58, 237, 0.2);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(124, 58, 237, 0.1);
            }

            .user-avatar {
                width: 36px;
                height: 36px;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                color: white;
                font-size: 0.9rem;
            }

            .user-info {
                display: flex;
                flex-direction: column;
            }

            .user-name {
                font-size: 0.95rem;
                font-weight: 600;
                margin-bottom: 0.125rem;
            }

            .user-role {
                font-size: 0.75rem;
                color: var(--text-gray);
                display: flex;
                align-items: center;
                gap: 0.25rem;
            }

            .role-badge {
                background: var(--primary-purple);
                color: white;
                font-size: 0.7rem;
                padding: 0.125rem 0.5rem;
                border-radius: 10px;
            }

            .dropdown-arrow {
                transition: transform 0.3s ease;
            }

            .user-dropdown.open .dropdown-arrow {
                transform: rotate(180deg);
            }

            .dropdown-content {
                position: absolute;
                top: calc(100% + 10px);
                right: 0;
                width: 240px;
                background: var(--nav-bg);
                border: 1px solid var(--border-color);
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all 0.3s ease;
                z-index: 1000;
            }

            .user-dropdown.open .dropdown-content {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .dropdown-content::before {
                content: '';
                position: absolute;
                top: -6px;
                right: 20px;
                width: 12px;
                height: 12px;
                background: var(--nav-bg);
                border-left: 1px solid var(--border-color);
                border-top: 1px solid var(--border-color);
                transform: rotate(45deg);
            }

            .dropdown-header {
                padding: 1rem;
                border-bottom: 1px solid var(--border-color);
            }

            .dropdown-email {
                font-size: 0.85rem;
                color: var(--text-gray);
            }

            .dropdown-items {
                padding: 0.5rem;
            }

            .dropdown-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.75rem 1rem;
                color: var(--text-gray);
                text-decoration: none;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            .dropdown-item:hover {
                background: rgba(124, 58, 237, 0.1);
                color: var(--text-light);
                transform: translateX(5px);
            }

            .dropdown-item i {
                width: 20px;
                text-align: center;
                font-size: 1rem;
            }

            .dropdown-item.logout {
                color: #EF4444;
                background: rgba(239, 68, 68, 0.1);
            }

            .dropdown-item.logout:hover {
                background: rgba(239, 68, 68, 0.2);
            }

            /* Mobile Menu Button */
            .mobile-menu-btn {
                display: none;
                width: 40px;
                height: 40px;
                background: rgba(124, 58, 237, 0.1);
                border: 1px solid var(--border-color);
                border-radius: 10px;
                color: var(--text-light);
                font-size: 1.2rem;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .mobile-menu-btn:hover {
                background: rgba(124, 58, 237, 0.2);
                transform: scale(1.05);
            }

            .mobile-menu-btn .close-icon {
                display: none;
            }

            .mobile-menu-btn.open .close-icon {
                display: block;
            }

            .mobile-menu-btn.open .menu-icon {
                display: none;
            }

            /* Mobile Navigation */
            .mobile-nav {
                position: fixed;
                top: 64px;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--nav-bg);
                border-top: 1px solid var(--border-color);
                padding: 1rem;
                transform: translateX(100%);
                transition: transform 0.3s ease;
                z-index: 999;
                overflow-y: auto;
            }

            .mobile-nav.open {
                transform: translateX(0);
            }

            .mobile-nav-items {
                margin-bottom: 1rem;
            }

            .mobile-nav-item {
                margin-bottom: 0.5rem;
            }

            .mobile-nav-link {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.875rem 1rem;
                color: var(--text-gray);
                text-decoration: none;
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .mobile-nav-link:hover,
            .mobile-nav-link.active {
                background: rgba(124, 58, 237, 0.1);
                color: var(--text-light);
            }

            .mobile-nav-link.active {
                border-left: 3px solid var(--primary-purple);
            }

            .mobile-nav-link i {
                width: 20px;
                text-align: center;
                font-size: 1rem;
            }

            .mobile-user-info {
                padding: 1rem;
                background: rgba(124, 58, 237, 0.1);
                border-radius: 12px;
                margin-bottom: 1rem;
            }

            .mobile-user-header {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 0.75rem;
            }

            .mobile-user-email {
                font-size: 0.85rem;
                color: var(--text-gray);
                margin-bottom: 1rem;
            }

            .mobile-dropdown-items {
                background: rgba(15, 15, 35, 0.7);
                border: 1px solid var(--border-color);
                border-radius: 12px;
                padding: 0.5rem;
            }

            /* Admin Badge for Nav Items */
            .nav-badge {
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                color: white;
                font-size: 0.7rem;
                padding: 0.125rem 0.5rem;
                border-radius: 10px;
                margin-left: 0.5rem;
                font-weight: 600;
            }

            /* Dashboard Container */
            .dashboard-container {
                min-height: 100vh;
            }

            /* Main Content */
            .dashboard-content {
                max-width: 1280px;
                margin: 0 auto;
                padding: 2rem;
                padding-top: 2rem;
            }

            /* Welcome Card */
            .welcome-card {
                background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(91, 33, 182, 0.1));
                border: 1px solid var(--border-color);
                border-radius: 16px;
                padding: 2.5rem;
                margin-bottom: 2rem;
                position: relative;
                overflow: hidden;
            }

            .welcome-card::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(124, 58, 237, 0.05) 0%, transparent 70%);
                border-radius: 50%;
            }

            .welcome-header {
                display: flex;
                align-items: center;
                gap: 1rem;
                margin-bottom: 1rem;
            }

            .welcome-icon {
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
            }

            .welcome-text h2 {
                font-size: 1.75rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .welcome-text p {
                color: var(--text-gray);
                font-size: 1rem;
                max-width: 600px;
            }

            .user-stats {
                display: flex;
                gap: 2rem;
                margin-top: 2rem;
            }

            .stat-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                background: rgba(124, 58, 237, 0.1);
                border: 1px solid var(--border-color);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--lighter-purple);
            }

            .stat-info h4 {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 0.25rem;
                font-feature-settings: "tnum";
            }

            .stat-info p {
                font-size: 0.85rem;
                color: var(--text-gray);
            }

            /* Komik Scraping Card */
            .feature-card {
                background: var(--card-bg);
                border: 1px solid var(--border-color);
                border-radius: 16px;
                padding: 2rem;
                margin-bottom: 2rem;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                border-color: var(--primary-purple);
            }

            .feature-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary-purple), var(--light-purple));
            }

            .feature-header {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                margin-bottom: 1.5rem;
            }

            .feature-title {
                font-size: 1.25rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                color: var(--text-light);
            }

            .feature-subtitle {
                color: var(--text-gray);
                font-size: 0.95rem;
                max-width: 600px;
                line-height: 1.6;
            }

            .feature-icon {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.2));
                border: 1px solid rgba(59, 130, 246, 0.3);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                color: var(--info-blue);
            }

            .feature-actions {
                margin-top: 2rem;
            }

            .feature-button {
                display: inline-flex;
                align-items: center;
                gap: 0.75rem;
                padding: 1rem 2rem;
                background: linear-gradient(135deg, var(--primary-purple), var(--dark-purple));
                border: none;
                border-radius: 12px;
                color: white;
                font-family: 'Instrument Sans', sans-serif;
                font-size: 1rem;
                font-weight: 600;
                text-decoration: none;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .feature-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
                background: linear-gradient(135deg, var(--light-purple), var(--primary-purple));
            }

            .feature-button:active {
                transform: translateY(0);
            }

            /* Stats Grid */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2rem;
            }

            .mini-stat-card {
                background: var(--card-bg);
                border: 1px solid var(--border-color);
                border-radius: 12px;
                padding: 1.5rem;
                transition: all 0.3s ease;
            }

            .mini-stat-card:hover {
                transform: translateY(-3px);
                border-color: var(--primary-purple);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            .mini-stat-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1rem;
            }

            .mini-stat-title {
                font-size: 0.95rem;
                color: var(--text-gray);
                font-weight: 500;
            }

            .mini-stat-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
            }

            .mini-stat-icon.komik {
                background: rgba(16, 185, 129, 0.1);
                color: var(--success-green);
            }

            .mini-stat-icon.views {
                background: rgba(245, 158, 11, 0.1);
                color: var(--warning-orange);
            }

            .mini-stat-icon.users {
                background: rgba(59, 130, 246, 0.1);
                color: var(--info-blue);
            }

            .mini-stat-icon.security {
                background: rgba(124, 58, 237, 0.1);
                color: var(--primary-purple);
            }

            .mini-stat-value {
                font-size: 1.75rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                font-feature-settings: "tnum";
            }

            .mini-stat-change {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.9rem;
            }

            .mini-stat-change.positive {
                color: var(--success-green);
            }

            /* Quick Links */
            .quick-links {
                background: var(--card-bg);
                border: 1px solid var(--border-color);
                border-radius: 16px;
                padding: 2rem;
            }

            .section-title {
                font-size: 1.25rem;
                font-weight: 700;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.75rem;
                color: var(--text-light);
            }

            .section-title i {
                color: var(--primary-purple);
            }

            .links-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .link-card {
                background: rgba(15, 15, 35, 0.7);
                border: 1px solid var(--border-color);
                border-radius: 12px;
                padding: 1.5rem;
                transition: all 0.3s ease;
                text-decoration: none;
                color: var(--text-light);
            }

            .link-card:hover {
                background: rgba(124, 58, 237, 0.1);
                border-color: var(--primary-purple);
                transform: translateY(-3px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            .link-icon {
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .link-content h4 {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .link-content p {
                font-size: 0.85rem;
                color: var(--text-gray);
            }

            /* Floating Elements */
            .floating-element {
                position: fixed;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(124, 58, 237, 0.05) 0%, transparent 70%);
                z-index: -1;
                animation: float 20s infinite ease-in-out;
            }

            .floating-element:nth-child(1) {
                width: 300px;
                height: 300px;
                top: 10%;
                right: 5%;
                animation-delay: 0s;
            }

            .floating-element:nth-child(2) {
                width: 200px;
                height: 200px;
                bottom: 10%;
                left: 30%;
                animation-delay: -10s;
            }

            /* Loading Animation */
            .loading-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--dark-bg);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                transition: opacity 0.5s ease;
            }

            .loading-spinner {
                width: 60px;
                height: 60px;
                border: 3px solid rgba(124, 58, 237, 0.1);
                border-top: 3px solid var(--primary-purple);
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            @keyframes float {
                0%, 100% {
                    transform: translateY(0) scale(1);
                }
                50% {
                    transform: translateY(-20px) scale(1.05);
                }
            }

            /* Animation for nav items */
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .desktop-nav .nav-item {
                animation: slideIn 0.3s ease forwards;
                opacity: 0;
            }

            .desktop-nav .nav-item:nth-child(1) { animation-delay: 0.1s; }
            .desktop-nav .nav-item:nth-child(2) { animation-delay: 0.2s; }
            .desktop-nav .nav-item:nth-child(3) { animation-delay: 0.3s; }
            .desktop-nav .nav-item:nth-child(4) { animation-delay: 0.4s; }
            .desktop-nav .nav-item:nth-child(5) { animation-delay: 0.5s; }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .desktop-nav {
                    display: none;
                }

                .mobile-menu-btn {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .nav-container {
                    padding: 0 0.75rem;
                }

                .dashboard-content {
                    padding: 1.5rem;
                }
                
                .welcome-card {
                    padding: 2rem;
                }
                
                .user-stats {
                    flex-direction: column;
                    gap: 1rem;
                }
            }

            @media (max-width: 768px) {
                .nav-container {
                    height: 56px;
                }

                .logo-text {
                    font-size: 1.1rem;
                }

                .logo-icon {
                    width: 32px;
                    height: 32px;
                    font-size: 1rem;
                }

                .mobile-nav {
                    top: 56px;
                }
                
                .dashboard-content {
                    padding: 1rem;
                }
                
                .welcome-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }
                
                .feature-header {
                    flex-direction: column;
                    gap: 1rem;
                }
                
                .feature-icon {
                    align-self: flex-start;
                }
                
                .stats-grid {
                    grid-template-columns: 1fr;
                }
                
                .links-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 480px) {
                .welcome-card {
                    padding: 1.5rem;
                }
                
                .feature-card {
                    padding: 1.5rem;
                }
                
                .quick-links {
                    padding: 1.5rem;
                }
                
                .feature-button {
                    width: 100%;
                    justify-content: center;
                }
            }
        </style>
    </head>
    <body>
        <!-- Floating Background Elements -->
        <div class="floating-element"></div>
        <div class="floating-element"></div>

        <!-- Loading Overlay -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>

        <!-- Navigation -->
        <nav class="navigation">
            <div class="nav-container">
                <!-- Logo Section -->
                <div class="logo-section">
                    <a href="{{ route('dashboard') }}" class="logo-link">
                        <div class="logo-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <span class="logo-text">SecureAuth</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="desktop-nav">
                    <!-- Dashboard Link - Always visible -->
                    <div class="nav-item">
                        <a href="{{ route('dashboard') }}" 
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </div>

                    <!-- Anime & Admin Dashboard - For Admin & Super Admin -->
                    @auth
                        @if (auth()->user()->isAdminOrSuperAdmin())
                            <div class="nav-item">
                                <a href="{{ route('anime.index') }}" 
                                   class="nav-link {{ request()->routeIs('anime.*') ? 'active' : '' }}">
                                    <i class="fas fa-film"></i>
                                    {{ __('Anime') }}
                                    <span class="nav-badge">ADMIN</span>
                                </a>
                            </div>

                            <div class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" 
                                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                    <i class="fas fa-crown"></i>
                                    {{ __('Admin Dashboard') }}
                                    <span class="nav-badge">ADMIN</span>
                                </a>
                            </div>
                        @endif

                        <!-- User Management - For Super Admin Only -->
                        @if (auth()->user()->isSuperAdmin())
                            <div class="nav-item">
                                <a href="{{ route('admin.users.index') }}" 
                                   class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                    <i class="fas fa-users-cog"></i>
                                    {{ __('Manajemen User') }}
                                    <span class="nav-badge">SUPER</span>
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>

                <!-- User Dropdown & Mobile Menu -->
                <div class="nav-right">
                    <!-- User Dropdown (Desktop) -->
                    <div class="user-dropdown" id="userDropdown">
                        <button class="dropdown-trigger" onclick="toggleDropdown()">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="user-info">
                                <div class="user-name">{{ Auth::user()->name }}</div>
                                <div class="user-role">
                                    <i class="fas fa-user-shield"></i>
                                    @if(auth()->user()->isSuperAdmin())
                                        Super Admin
                                        <span class="role-badge">PRO</span>
                                    @elseif(auth()->user()->isAdmin())
                                        Admin
                                    @else
                                        User
                                    @endif
                                </div>
                            </div>
                            <div class="dropdown-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </button>

                        <div class="dropdown-content">
                            <div class="dropdown-header">
                                <div class="user-name">{{ Auth::user()->name }}</div>
                                <div class="dropdown-email">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="dropdown-items">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    <i class="fas fa-user-circle"></i>
                                    {{ __('Profile') }}
                                </a>
                                
                                <!-- Google Authenticator Setup -->
                                <a href="{{ route('2fa.setup') }}" class="dropdown-item">
                                    <i class="fas fa-mobile-alt"></i>
                                    {{ __('Setup Google Authenticator') }}
                                </a>
                                
                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                    @csrf
                                    <a href="#" 
                                       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                                       class="dropdown-item logout">
                                        <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="mobile-menu-btn" id="mobileMenuBtn" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars menu-icon"></i>
                        <i class="fas fa-times close-icon"></i>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Mobile Navigation -->
        <div class="mobile-nav" id="mobileNav">
            <!-- User Info -->
            <div class="mobile-user-info">
                <div class="mobile-user-header">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">
                            @if(auth()->user()->isSuperAdmin())
                                <span class="role-badge">Super Admin</span>
                            @elseif(auth()->user()->isAdmin())
                                <span class="role-badge">Admin</span>
                            @else
                                <span class="role-badge">User</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mobile-user-email">{{ Auth::user()->email }}</div>
            </div>

            <!-- Mobile Navigation Links -->
            <div class="mobile-nav-items">
                <!-- Dashboard -->
                <div class="mobile-nav-item">
                    <a href="{{ route('dashboard') }}" 
                       class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        {{ __('Dashboard') }}
                    </a>
                </div>

                <!-- Anime & Admin Dashboard - For Admin & Super Admin -->
                @auth
                    @if (auth()->user()->isAdminOrSuperAdmin())
                        <div class="mobile-nav-item">
                            <a href="{{ route('anime.index') }}" 
                               class="mobile-nav-link {{ request()->routeIs('anime.*') ? 'active' : '' }}">
                                <i class="fas fa-film"></i>
                                {{ __('Anime') }}
                                <span class="nav-badge">ADMIN</span>
                            </a>
                        </div>

                        <div class="mobile-nav-item">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="mobile-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="fas fa-crown"></i>
                                {{ __('Admin Dashboard') }}
                                <span class="nav-badge">ADMIN</span>
                            </a>
                        </div>
                    @endif

                    <!-- User Management - For Super Admin Only -->
                    @if (auth()->user()->isSuperAdmin())
                        <div class="mobile-nav-item">
                            <a href="{{ route('admin.users.index') }}" 
                               class="mobile-nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <i class="fas fa-users-cog"></i>
                                {{ __('Manajemen User') }}
                                <span class="nav-badge">SUPER</span>
                            </a>
                        </div>
                    @endif
                @endauth
            </div>

            <!-- Mobile Dropdown Items -->
            <div class="mobile-dropdown-items">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user-circle"></i>
                    {{ __('Profile') }}
                </a>
                
                <!-- Google Authenticator Setup -->
                <a href="{{ route('2fa.setup') }}" class="dropdown-item">
                    <i class="fas fa-mobile-alt"></i>
                    {{ __('Setup Google Authenticator') }}
                </a>
                
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" id="logoutFormMobile">
                    @csrf
                    <a href="#" 
                       onclick="event.preventDefault(); document.getElementById('logoutFormMobile').submit();"
                       class="dropdown-item logout">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-container">
            <main class="dashboard-content">
                <!-- Welcome Card -->
                <div class="welcome-card">
                    <div class="welcome-header">
                        <div class="welcome-icon">
                            <i class="fas fa-hand-wave"></i>
                        </div>
                        <div class="welcome-text">
                            <h2>Selamat datang di Dashboard! 🎉</h2>
                            <p>Anda telah berhasil login ke sistem. Di sini Anda dapat mengakses berbagai fitur dan data yang tersedia untuk Anda.</p>
                        </div>
                    </div>
                    
                    <div class="user-stats">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-info">
                                <h4>{{ date('d M Y') }}</h4>
                                <p>Hari ini</p>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-info">
                                <h4 id="currentTime">00:00:00</h4>
                                <p>Waktu terkini</p>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="stat-info">
                                <h4>Terautentikasi</h4>
                                <p>Akun Anda aman</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="mini-stat-card">
                        <div class="mini-stat-header">
                            <div class="mini-stat-title">Total Komik</div>
                            <div class="mini-stat-icon komik">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                        <div class="mini-stat-value">1,248</div>
                        <div class="mini-stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>124 baru bulan ini</span>
                        </div>
                    </div>

                    <div class="mini-stat-card">
                        <div class="mini-stat-header">
                            <div class="mini-stat-title">Total Views</div>
                            <div class="mini-stat-icon views">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                        <div class="mini-stat-value">42.5K</div>
                        <div class="mini-stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>24% peningkatan</span>
                        </div>
                    </div>

                    <div class="mini-stat-card">
                        <div class="mini-stat-header">
                            <div class="mini-stat-title">Pengguna Aktif</div>
                            <div class="mini-stat-icon users">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="mini-stat-value">856</div>
                        <div class="mini-stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>12 pengguna baru</span>
                        </div>
                    </div>

                    <div class="mini-stat-card">
                        <div class="mini-stat-header">
                            <div class="mini-stat-title">Keamanan Sistem</div>
                            <div class="mini-stat-icon security">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                        </div>
                        <div class="mini-stat-value">100%</div>
                        <div class="mini-stat-change positive">
                            <i class="fas fa-check-circle"></i>
                            <span>Semua sistem aman</span>
                        </div>
                    </div>
                </div>

                <!-- Komik Scraping Feature -->
                <div class="feature-card">
                    <div class="feature-header">
                        <div>
                            <h3 class="feature-title">Baca Komik 📚</h3>
                            <p class="feature-subtitle">
                                Akses koleksi komik terlengkap yang diambil dengan teknik scraping canggih. 
                                Jelajahi berbagai genre dan judul komik populer dari berbagai sumber.
                            </p>
                        </div>
                        <div class="feature-icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                    </div>
                    
                    <div class="feature-actions">
                        <a href="{{ route('komik.scrap.index') }}" class="feature-button">
                            <i class="fas fa-external-link-alt"></i>
                            Lihat Daftar Komik
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="quick-links">
                    <h3 class="section-title">
                        <i class="fas fa-bolt"></i>
                        Akses Cepat
                    </h3>
                    
                    <div class="links-grid">
                        <a href="{{ route('komik.scrap.index') }}" class="link-card">
                            <div class="link-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="link-content">
                                <h4>Daftar Komik</h4>
                                <p>Jelajahi koleksi komik lengkap</p>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="link-card">
                            <div class="link-icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <div class="link-content">
                                <h4>Profil Saya</h4>
                                <p>Kelola informasi akun Anda</p>
                            </div>
                        </a>

                        <a href="{{ route('2fa.setup') }}" class="link-card">
                            <div class="link-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="link-content">
                                <h4>Google Authenticator</h4>
                                <p>Setup keamanan dua faktor</p>
                            </div>
                        </a>

                        <!-- Additional Feature Placeholder -->
                        <div class="link-card" onclick="showComingSoon()">
                            <div class="link-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="link-content">
                                <h4>Fitur Baru</h4>
                                <p>Segera hadir - Stay tuned!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            // Toggle User Dropdown
            function toggleDropdown() {
                const dropdown = document.getElementById('userDropdown');
                dropdown.classList.toggle('open');
            }

            // Toggle Mobile Menu
            function toggleMobileMenu() {
                const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                const mobileNav = document.getElementById('mobileNav');
                
                mobileMenuBtn.classList.toggle('open');
                mobileNav.classList.toggle('open');
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                const dropdown = document.getElementById('userDropdown');
                const dropdownTrigger = dropdown.querySelector('.dropdown-trigger');
                
                if (!dropdown.contains(event.target) && dropdown.classList.contains('open')) {
                    dropdown.classList.remove('open');
                }
            });

            // Close mobile menu when clicking on a link
            const mobileLinks = document.querySelectorAll('.mobile-nav-link, .dropdown-item');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                    const mobileNav = document.getElementById('mobileNav');
                    
                    mobileMenuBtn.classList.remove('open');
                    mobileNav.classList.remove('open');
                });
            });

            // Hide loading overlay
            window.addEventListener('load', () => {
                const loadingOverlay = document.getElementById('loadingOverlay');
                setTimeout(() => {
                    loadingOverlay.style.opacity = '0';
                    setTimeout(() => {
                        loadingOverlay.style.display = 'none';
                    }, 500);
                }, 1000);
            });

            // Real-time clock
            function updateClock() {
                const now = new Date();
                const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
                const currentTime = now.toLocaleTimeString('en-US', timeOptions);
                document.getElementById('currentTime').textContent = currentTime;
            }

            // Update clock every second
            updateClock();
            setInterval(updateClock, 1000);

            // Add active state to current page
            document.addEventListener('DOMContentLoaded', () => {
                // Highlight current page
                const currentPath = window.location.pathname;
                const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
                
                navLinks.forEach(link => {
                    if (link.getAttribute('href') === currentPath) {
                        link.classList.add('active');
                    }
                });

                // Add animation to desktop nav items
                const desktopNavItems = document.querySelectorAll('.desktop-nav .nav-item');
                desktopNavItems.forEach((item, index) => {
                    item.style.animationDelay = `${0.1 + (index * 0.1)}s`;
                });
            });

            // Handle window resize
            window.addEventListener('resize', () => {
                const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                const mobileNav = document.getElementById('mobileNav');
                
                if (window.innerWidth > 1024) {
                    mobileMenuBtn.classList.remove('open');
                    mobileNav.classList.remove('open');
                }
            });

            // Coming soon feature
            function showComingSoon() {
                alert('Fitur ini akan segera hadir! 🚀\n\nKami sedang mengembangkan fitur baru untuk pengalaman yang lebih baik.');
            }

            // Add parallax effect to floating elements
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const floatingElements = document.querySelectorAll('.floating-element');
                
                floatingElements.forEach((element, index) => {
                    const speed = 0.5 + (index * 0.1);
                    const yPos = -(scrolled * speed);
                    element.style.transform = `translateY(${yPos}px) scale(1)`;
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Hover effects for feature cards
            const featureCards = document.querySelectorAll('.feature-card, .mini-stat-card, .link-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    if (card.querySelector('.feature-icon')) {
                        card.querySelector('.feature-icon').style.transform = 'scale(1.1) rotate(5deg)';
                    }
                    if (card.querySelector('.link-icon')) {
                        card.querySelector('.link-icon').style.transform = 'scale(1.1)';
                    }
                });
                
                card.addEventListener('mouseleave', () => {
                    if (card.querySelector('.feature-icon')) {
                        card.querySelector('.feature-icon').style.transform = 'scale(1) rotate(0)';
                    }
                    if (card.querySelector('.link-icon')) {
                        card.querySelector('.link-icon').style.transform = 'scale(1)';
                    }
                });
            });
        </script>
    </body>
</html>