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
                                    <a class="btn btn-sm btn-primary" href="{{ route('spareParts.index') }}">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Name</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->name ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Type</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->type ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Size</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->size ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Weight</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->weight ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Quantity</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->qty ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Minimum Quantity</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->minimum_qty ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Rate</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->rate ?? '' }}</a></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 fw-medium">Unit</div>
                            <div class="col-lg-10"><a href="javascript:void(0);">{{ $sparePart->unit ?? '' }}</a></div>
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