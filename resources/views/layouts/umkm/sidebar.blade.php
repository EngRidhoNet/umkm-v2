<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('umkm.index') }}">
                <i class="bi bi-grid"></i> <!-- Dashboard icon -->
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('umkm.artikel.index') }}">
                <i class="bi bi-file-earmark-text"></i> <!-- Article icon -->
                <span>Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="bi bi-briefcase"></i> <!-- Job Application icon -->
                <span>Lamaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="bi bi-chat-dots"></i> <!-- Chat icon -->
                <span>Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('umkm.pekerjaan.index') }}">
                <i class="bi bi-kanban"></i> <!-- Project icon -->
                <span>Project</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('umkm.konsultasi.index') }}">
                <i class="bi bi-person-lines-fill"></i> <!-- Consultation icon -->
                <span>Konsultasi</span>
            </a>
        </li>
    </ul>
</aside>
