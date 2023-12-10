<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>index.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>pages/users/show.php">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Gestion des utilisateurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>pages/courses/show.php">
                    <i class="mdi mdi-book-open-variant menu-icon"></i>
                    <span class="menu-title">Gestion des cours</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>pages/quizzes/show.php">
                    <i class="mdi mdi-comment-question-outline menu-icon"></i>
                    <span class="menu-title">Gestion des quiz</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'student') : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>index.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>pages/courses/student_courses.php">
                    <i class="mdi mdi-book-open-variant menu-icon"></i>
                    <span class="menu-title">Mes cours</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE; ?>pages/quizzes/student_quizzes.php">
                    <i class="mdi mdi-comment-question-outline menu-icon"></i>
                    <span class="menu-title">Mes quiz</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>