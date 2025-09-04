@extends('layouts.app')

@section('content')

<div class="nxl-container">
    <div class="nxl-content">   
        <div class="main-content">
            <div class="row">
                <div class="row mb-3">
                    @php
                    $i = ($spare_parts->currentPage() - 1) * $spare_parts->perPage();
                    @endphp
                    <!-- [Leads] start -->
                    <div class="col-xxl-8">
                        @session('success')
                            <div class="alert alert-success" role="alert"> 
                                {{ session('success') }}
                            </div>
                        @endsession
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Parts</h5>
                                <div class="card-header-action">                      
                                    @can('part-create')
                                        <a class="btn btn-success btn-sm" href="{{ route('spareParts.create') }}">
                                            <i class="fa fa-plus"></i> Add New Part
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="border-b">
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Size</th>
                                                <th>Weight</th>
                                                <th>Unit</th>
                                                <th>Qty</th>
                                                <th>Minimum Qty</th>
                                                <th>Rate</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($spare_parts as $spare_part)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $spare_part->name }}</td>
                                                    <td>{{ $spare_part->type }}</td>
                                                    <td>{{ $spare_part->size }}</td>
                                                    <td>{{ $spare_part->weight }}</td>
                                                    <td>{{ $spare_part->unit }}</td>
                                                    <td>{{ $spare_part->qty }}</td>
                                                    <td>{{ $spare_part->minimum_qty }}</td>
                                                    <td>{{ $spare_part->rate }}</td>
                                                    <td class="d-flex">
                                                        @can('part-list')
                                                            <a class="btn btn-info btn-sm me-2" href="{{ route('spareParts.show', $spare_part->id) }}">
                                                                <i class="fa-solid fa-list"></i>
                                                            </a>
                                                        @endcan
                                                        @can('part-edit')
                                                            <a class="btn btn-primary btn-sm me-2" href="{{ route('spareParts.edit', $spare_part->id) }}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        @endcan
                                                        @can('part-delete')
                                                            <form method="POST" action="{{ route('spareParts.destroy', $spare_part->id) }}" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger btn-sm me-2">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    Showing {{ $spare_parts->firstItem() }} to {{ $spare_parts->lastItem() }} of {{ $spare_parts->total() }} Parts
                                </div>
                                <div>
                                    {!! $spare_parts->links() !!}
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