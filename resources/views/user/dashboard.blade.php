@extends('layouts.app')

@section('content')
<style>
  .nav-pills .nav-link.active {
    background-color: var(--bs-primary);
    color: #fff;
    border-radius: 0.375rem;
  }
  .nav-pills .nav-link:hover {
    background-color: rgba(107, 178, 82, 0.1);
    color: var(--bs-primary);
  }
</style>

<section class="my-account-page container">
  <h2 class="page-title">My Account</h2>
  <div class="row">
    <!-- Sidebar Navigation -->
    <div class="col-lg-3">
      <ul class="account-sidebar-nav">
        <li><a href="my-account.html" class="sidebar-link">Dashboard</a></li>
        <li><a href="account-orders.html" class="sidebar-link">Orders</a></li>
        <li><a href="account-address.html" class="sidebar-link">Addresses</a></li>
        <li><a href="account-details.html" class="sidebar-link">Account Details</a></li>
        <li><a href="account-wishlist.html" class="sidebar-link">Wishlist</a></li>
        <li>
          <form action="{{ route('user.logout')}}" method="POST" class="logout-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="sidebar-link">Logout</button>
          </form>
        </li>
      </ul>
    </div>
    
    <!-- Main Content -->
    <div class="col-lg-9">
      <div class="page-content account-dashboard">
        <p>Hello <strong>{{Auth::user()->name}}</strong></p>
        <p>From your account dashboard you can view your <a class="account-link" href="account_orders.html">recent orders</a>, manage your <a class="account-link" href="account_edit_address.html">shipping addresses</a>, and <a class="account-link" href="account_edit.html">edit your password and account details.</a></p>
      </div>
    </div>
  </div>
</section>


@endsection
