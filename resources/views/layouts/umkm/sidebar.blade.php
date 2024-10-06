<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('umkm.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('umkm.artikel.index') }}">
            <i class="bi bi-file-earmark-text"></i>
            <span>Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">
            <i class="bi bi-briefcase"></i>
            <span>Lamaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">
            <i class="bi bi-chat-dots"></i>
            <span>Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('umkm.pekerjaan.index') }}">
            <i class="bi bi-chat-dots"></i>
            <span>Project</span>
            </a>
        </li>
    </ul>
</aside>
