@extends('layouts.app')

@section('content')

<div class="nxl-container">
    <div class="nxl-content">   
        <div class="main-content">
            <div class="row">
                <div class="row mb-3">
                    @php
                    $i = ($products->currentPage() - 1) * $products->perPage();
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
                                <h5 class="card-title">Products</h5>
                                <div class="card-header-action">                      
                                    @can('product-create')
                                        <a class="btn btn-success btn-sm" href="{{ route('products.create') }}">
                                            <i class="fa fa-plus"></i> Add New Product
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
                                                <th>Product Name</th>
                                                <th>Valve Type</th>
                                                <th>Sku code</th>
                                                <th>Pressure Rating</th>
                                                <th>Actuation</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->valve_type }}</td>
                                                    <td>{{ $product->sku_code }}</td>
                                                    <td>{{ $product->pressure_rating }}</td>
                                                    <td>{{ $product->actuation }}</td>
                                                    <td class="d-flex">
                                                        @can('product-list')
                                                            <a class="btn btn-info btn-sm me-2" href="{{ route('products.show', $product->id) }}">
                                                                <i class="fa-solid fa-list"></i>
                                                            </a>
                                                        @endcan
                                                        @can('product-edit')
                                                            <a class="btn btn-primary btn-sm me-2" href="{{ route('products.edit', $product->id) }}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        @endcan
                                                        @can('product-delete')
                                                            <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display:inline">
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
                                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} Parts
                                </div>
                                <div>
                                    {!! $products->links() !!}
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