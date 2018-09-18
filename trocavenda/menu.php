<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item <?=$active=='home' ? 'active' : '';?>">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item <?=$active=='cadastrar' ? 'active' : '';?>">
            <a class="nav-link" href="/cadastrar/">Cadastrar</a>
        </li>
        <li class="nav-item <?=$active=='membros' ? 'active' : '';?>">
            <a class="nav-link" href="/membros/">Membros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login/logout.php">Logout</a>
        </li>
    </ul>
    <span class="navbar-text">
        <a class="nav-link" href="/login/logout.php">Logout</a>
    </span>
</nav>
