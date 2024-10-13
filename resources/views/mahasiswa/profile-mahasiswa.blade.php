<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Profile Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 40px;
        }

        .profile-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 40px;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid #f0f2f5;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-card h2 {
            margin: 10px 0 5px 0;
            font-size: 28px;
            color: #2c3e50;
        }

        .profile-card p {
            color: #7f8c8d;
            margin: 5px 0 25px 0;
            font-size: 18px;
        }

        .profile-card .edit-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .profile-card .edit-btn:hover {
            background-color: #2980b9;
        }

        .project-section {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .project-section h3 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #2c3e50;
            text-align: center;
        }

        .project-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .project-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            width: calc(25% - 20px);
            min-width: 200px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .project-card img {
            width: 100%;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .project-card h4 {
            margin: 10px 0;
            font-size: 18px;
            color: #34495e;
        }

        .project-card p {
            margin: 5px 0;
            color: #7f8c8d;
            font-size: 14px;
        }

        .project-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }

        .status-active {
            background-color: #2ecc71;
            color: white;
        }

        .status-completed {
            background-color: #3498db;
            color: white;
        }

        @media (max-width: 768px) {
            .project-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .project-card {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <div class="container">
        <!-- Profile Card -->
        <div class="profile-card">
            <img src="{{ asset('uploads/mahasiswa/' . $mahasiswa->foto_profil) }}" alt="Profile Image">
            <h2>{{ $mahasiswa->nama_mahasiswa }}</h2>
            <p>{{ $mahasiswa->universitas }}</p>
            <a href="{{ route('mahasiswa.profile.edit', $mahasiswa->id) }}">
            <button class="edit-btn">Edit Profile</button>
            </a>
        </div>

        <!-- Active Projects Section -->
        <div class="project-section">
            <h3>Active Projects</h3>
            <div class="project-cards">
                @php
                    $activeProjects = $mahasiswa->user->apply()->where('status', 'active')->whereHas('project', function($query) {
                        $query->where('status', 'active');
                    })->with('project')->get();
                @endphp

                @forelse($activeProjects as $apply)
                    <div class="project-card">
                        <img src="{{ asset('images/complete.png') }}" alt="Active Project">
                        <h4>{{ $apply->project->posisi }}</h4>
                        <p>{{ $apply->project->tempat_bekerja }}</p>
                        <span class="project-status status-active">Active</span>
                    </div>
                @empty
                    <p>No active projects at the moment.</p>
                @endforelse
            </div>
        </div>

        <!-- Completed Projects Section -->
        <div class="project-section">
            <h3>Completed Projects</h3>
            <div class="project-cards">
                @php
                    $completedProjects = $mahasiswa->user->apply()->where('status', 'completed')->whereHas('project', function($query) {
                        $query->where('status', 'completed');
                    })->with('project')->get();
                @endphp

                @forelse($completedProjects as $apply)
                    <div class="project-card">
                        <img src="{{ asset('images/complete.png') }}" alt="Completed Project">
                        <h4>{{ $apply->project->posisi }}</h4>
                        <p>{{ $apply->project->tempat_bekerja }}</p>
                        <span class="project-status status-completed">Completed</span>
                    </div>
                @empty
                    <p>No completed projects yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>

</html>
