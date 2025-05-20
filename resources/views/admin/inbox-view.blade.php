@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="account-dashboard">
                <h2 class="page-title">Inbox Message</h2>

                <div class="mb-4 border-dashed pb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <strong>From:</strong>
                            <span class="text-muted">{{ $message->name }}</span>
                        </div>
                        <div class="text-muted fs-7">
                            <strong>Sent on:</strong> {{ $message->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong>
                        <a href="mailto:{{ $message->email }}" class="account-link">{{ $message->email }}</a>
                    </div>
                    <div>
                            <strong>Subject:</strong>
                            <span class="text-muted">{{ $message->subject }}</span>
                        </div>

                    <div class="mb-3">
                        <strong>Message:</strong>
                        <div class="mt-2 p-3 bg-light border rounded" style="white-space: pre-wrap;">
                            {{ $message->message }}
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.messages.index')}}" class="btn btn-outline-light">← Back to Inbox</a>

                    @if ($message->is_read == false)
                        
                            <a href="{{ route('admin.inbox.read', $message->id )}}" class="btn btn-success">Mark as Read</a>
                    @else
                        <span class="badge bg-success text-dark py-2 px-3">Already Read</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
