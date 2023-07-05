@extends('superadmin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">List Admin</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Special title treatment</h6>

                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{ route('superadmin.list-admin') }}" class="btn btn-primary">List Admin</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">List Member</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">View all members</h6>

                        <p class="card-text">Browse and manage the list of members.</p>
                        <a href="{{ route('superadmin.list-member') }}" class="btn btn-primary">View List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Group Chat History</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">View the history of group chats</h6>

                        <p class="card-text">Check past conversations and messages.</p>
                        <a href="{{ route('superadmin.history-groupchat') }}" class="btn btn-primary">View History</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Payment History</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">View payment history</h6>

                        <p class="card-text">Browse and track payment records.</p>
                        <a href="{{ route('superadmin.history-pembayaran') }}" class="btn btn-primary">View History</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Shipping History</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">View shipping history</h6>

                        <p class="card-text">Track the delivery status of items.</p>
                        <a href="{{ route('superadmin.history-pengiriman') }}" class="btn btn-primary">View History</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Winner History</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">View winner history</h6>

                        <p class="card-text">See the list of past winners.</p>
                        <a href="{{ route('superadmin.history-pemenang') }}" class="btn btn-primary">View History</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
