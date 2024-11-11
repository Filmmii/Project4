@extends('layout')

@section('title', 'My Team')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">My Team</h2>

    @if ($teams->isEmpty())
        <p class="text-muted">You are not part of any team.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Team ID</th>
                    <th>Team Name</th>
                    <th>Project ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->team_id }}</td>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->project_project_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection