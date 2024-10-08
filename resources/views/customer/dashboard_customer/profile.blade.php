@extends('customer.layouts.mainlayout')

@section('content')

    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profile</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="{{ route('customer.profile.update') }}">
                            @csrf
                        
                            <input type="hidden" name="id" value="{{ $profile_customer->id }}">

                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <hr />
                        
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ old('nama', $profile_customer->nama) }}" placeholder="Nama Lengkap ..."
                                        required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email', $profile_customer->email) }}" placeholder="Email..."
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                    
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="New Password (leave blank to keep existing)"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
