<?php $__env->startPush('styles'); ?>
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/api/placeholder/1200/600') center/cover no-repeat;
            color: white;
            padding: 100px 0;
            margin-bottom: 40px;
        }

        .feature-box {
            padding: 30px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 1.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?php echo e(Vite::asset('resources/images/hris-logo-white.png')); ?>" alt="" class="me-2" style="width: 45px; height: 45px; object-fit: contain;">
                Personal Data Sheet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="<?php echo e(url(route('login'))); ?>" wire:navigate.hover>Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Manage Your Personal Data Efficiently</h1>
            <p class="lead mb-5">A secure, user-friendly system for organizing and managing all your personal
                information in one place.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="<?php echo e(url(route('register'))); ?>" class="btn btn-primary btn-lg px-4" wire:navigate.hover><i
                        class="bi bi-person-plus me-2"></i>Get Started</a>
                <a href="<?php echo e(url(route('login'))); ?>" class="btn btn-outline-light btn-lg px-4" wire:navigate.hover><i
                        class="bi bi-box-arrow-in-right me-2"></i>Login</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container mb-5" id="features">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose Personal Data Sheet?</h2>
            <p class="lead text-muted">Our system offers everything you need for personal data management</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-box bg-primary bg-opacity-10 h-100">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-3"
                        style="width: 50px; height: 50px;">
                        <i class="bi bi-shield-lock text-white feature-icon"></i>
                    </div>
                    <h4>Secure Storage</h4>
                    <p>Your personal data is encrypted and stored with the highest security standards.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box bg-primary bg-opacity-10 h-100">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-3"
                        style="width: 50px; height: 50px;">
                        <i class="bi bi-search text-white feature-icon"></i>
                    </div>
                    <h4>Easy Access</h4>
                    <p>Find and update your information quickly with our intuitive search and filter tools.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box bg-primary bg-opacity-10 h-100">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-3"
                        style="width: 50px; height: 50px;">
                        <i class="bi bi-folder-fill text-white feature-icon"></i>
                    </div>
                    <h4>Organized Templates</h4>
                    <p>Pre-designed templates help you organize information systematically and thoroughly.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshot Section -->
    <section class="bg-light py-5 mb-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-3">Streamlined Personal Data Management</h2>
                    <p class="mb-4">The Personal Data Sheet system provides an intuitive interface for managing all
                        aspects of your personal information. Our system helps you organize, update, and access your
                        information whenever you need it.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <div class="d-flex align-items-center">
                                <div class="text-primary me-2">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <span>Customizable data categories</span>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex align-items-center">
                                <div class="text-primary me-2">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <span>Export data in multiple formats</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="text-primary me-2">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <span>Automated data verification</span>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <a href="<?php echo e(url(route('register'))); ?>" class="btn btn-primary" wire:navigate.hover><i
                                class="bi bi-arrow-right-circle me-2"></i>Get
                            Started Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/data_sheet.jpg" alt="Personal Data Sheet Dashboard" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container mb-5 text-center" id="contact">
        <div class="bg-dark text-white rounded p-5">
            <h2 class="fw-bold mb-3">Ready to organize your personal data?</h2>
            <p class="lead mb-4">Join thousands of users who trust Personal Data Sheet for their information management
                needs.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="<?php echo e(url(route('register'))); ?>" class="btn btn-primary btn-lg px-4" wire:navigate.hover><i
                        class="bi bi-person-plus me-2"></i>Get Started</a>
                <a href="<?php echo e(url(route('login'))); ?>" class="btn btn-outline-light btn-lg px-4" wire:navigate.hover><i
                        class="bi bi-box-arrow-in-right me-2"></i>Login</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5><i class="bi bi-database me-2"></i>Personal Data Sheet</h5>
                    <p class="text-light">Your secure data management solution</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-decoration-none text-light"><i
                                    class="bi bi-house me-2"></i>Home</a></li>
                        <li><a href="#features" class="text-decoration-none text-light"><i
                                    class="bi bi-gear me-2"></i>Features</a></li>
                        <li><a href="#about" class="text-decoration-none text-light"><i
                                    class="bi bi-info-circle me-2"></i>About</a></li>
                        <li><a href="#contact" class="text-decoration-none text-light"><i
                                    class="bi bi-envelope me-2"></i>Contact</a></li>
                    </ul>
                </div>
                
            </div>
            <hr class="my-4">
            <div class="text-center text-light">
                <small><i class="bi bi-c-circle me-1"></i>Diana bebecakes🫶🫶🫶</small>
            </div>
        </div>
    </footer>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/welcome.blade.php ENDPATH**/ ?>