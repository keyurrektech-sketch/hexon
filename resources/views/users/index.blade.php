@extends('layouts.app')

@section('content')

<div class="nxl-container">
    <div class="nxl-content">   
        <div class="main-content">
            <div class="row">
                <div class="row mb-3">
                    <!-- [Leads] start -->
                    <div class="col-xxl-8">
                        @session('success')
                            <div class="alert alert-success" role="alert"> 
                                {{ $value }}
                            </div>
                        @endsession
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Users</h5>
                                <div class="card-header-action">                      
                                    @can('user-create')
                                        <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">
                                            <i class="fa fa-plus"></i> Create New User
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    {{ $dataTable->table() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Leads] end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush