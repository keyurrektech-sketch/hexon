@extends('layouts.app')

@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                    <div class="card card-body lead-info">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h5 class="fw-bold mb-0">
                                <span class="d-block mb-2">Show Part</span>
                            </h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">         
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.index') }}">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Part Name</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->name ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Valve Type</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->valve_type ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Product Code</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->product_code ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Actuation</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->actuation ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Pressure Rating</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->pressure_rating ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Valve Size</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->valve_size ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Size</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->valve_size_rate ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Media</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->media ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Flow</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->flow ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">SKU Code</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->sku_code ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">MRP</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->mrp ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Media Temperature</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->media_temperature ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Temp Rate</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->media_temperature_rate ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Body Material</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->body_material ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">HSN Code</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->hsn_code ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Primary Material Of Construction</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $product->primary_material_of_construction ?? '' }}</a></div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</main>

@endsection