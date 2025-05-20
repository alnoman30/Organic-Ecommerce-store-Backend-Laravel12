@extends('layouts.panel')
@section('content')
                            <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Inbox</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('dashboard')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Inbox</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <div class="wg-table table-all-user">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sender</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Sent on</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($messages as $message )
                                                       <tr>
                                                        <td>
                                                            {{$message->name}}
                                                        </td>
                                                        <td>{{$message->email}}</td>
                                                        <td>{{$message->subject}}</td>
                                                        <td>{{ $message->created_at->format('l, F j, Y, g:i A') }}</td>
                                                        <td>
                                                           @if ($message->is_read == false)
                                                                <a href="{{ route('admin.inbox.read', $message->id) }}" style="color: red;">Mark as Read</a> 
                                                            @else
                                                                <p>Viewed</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="list-icon-function">
                                                            <a href="{{ route('admin.messages.show', $message->id )}}" target="">
                                                                <div class="item eye">
                                                                    <i class="icon-eye"></i>
                                                                </div>
                                                            </a>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                                    </div>
                                </div>
                            </div>
                        </div>
@endsection