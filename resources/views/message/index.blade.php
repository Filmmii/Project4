@extends('layout')

@section('title', 'Messages')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Messages</h2>

    @if ($messages->isEmpty())
        <p class="text-muted">No messages to display.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->sender->member_firstname }} {{ $message->sender->member_lastname }}</td>
                        <td>{{ $message->receiver->member_firstname }} {{ $message->receiver->member_lastname }}</td>
                        <td>{{ $message->content }}</td>
                        <td>{{ $message->timestamp->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection