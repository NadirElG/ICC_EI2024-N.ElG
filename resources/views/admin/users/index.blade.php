@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Manage Users</h1>
    </div>

    <div class="section-body">
        <table id="usersTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Le statut devient un lien cliquable -->
                        <a href="{{ route('admin.users.updateStatus', $user->id) }}" 
                           onclick="event.preventDefault(); document.getElementById('status-form-{{ $user->id }}').submit();">
                            {{ $user->status }}
                        </a>

                        <form id="status-form-{{ $user->id }}" action="{{ route('admin.users.updateStatus', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- Initialisation de DataTables -->
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            "order": [[0, "asc"]] // Tri par défaut sur la première colonne (Name)
        });
    });
</script>

@endsection
