@extends('layouts.app')

@section('content')

    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Create New Purchase Order</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">         
                                        <a class="btn btn-sm btn-primary" href="{{ route('products.index') }}">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <form method="POST" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
                            @csrf
                            @if(isset($product))
                                @method('PUT')
                            @endif
                                <div class="card-body general-info">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 mb-4">
                                            <label for="name" class="fw-semibold">Client Name</label>
                                            <div class="input-group">
                                                <select name="customer_id" id="customer_id" class="form-control customer_id">
                                                    <option value="">Select Customer</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->first_name }}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('customer_id')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label for="invoice" class="fw-semibold">Invoice #</label>
                                            <div class="input-group">
                                                <input type="text" name="invoice" placeholder="Invoice" class="form-control"  id="invoice"  value="{{ old('invoice', $newInvoiceNumber ?? '') }}" readonly>
                                            </div>
                                            @error('invoice')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label for="status" class="fw-semibold">Status</label>
                                            <div class="input-group">
                                                <select name="status" id="status" class="form-select">
                                                    <option value="draft">Draft</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                            @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 mb-4">
                                            <label for="po_revision_and_date" class="fw-semibold">PO Revision & Date</label>
                                            <div class="input-group">
                                                <input type="date" name="po_revision_and_date" class="form-control"  id="po_revision_and_date"  value="{{ old('po_revision_and_date') }}">
                                            </div>
                                            @error('po_revision_and_date')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label for="reason_of_revision" class="fw-semibold">Reason of Revision</label>
                                            <div class="input-group">
                                                <input type="text" name="reason_of_revision" class="form-control" placeholder="Reason of Revision" id="reason_of_revision"  value="{{ old('reason_of_revision') }}">
                                            </div>
                                            @error('reason_of_revision')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label for="quotation_ref_no" class="fw-semibold">Quotation Ref No</label>
                                            <div class="input-group">
                                                <input type="text" name="quotation_ref_no" class="form-control" placeholder="Quotation Ref No" id="quotation_ref_no"  value="{{ old('quotation_ref_no') }}">
                                            </div>
                                            @error('quotation_ref_no')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 mb-4">
                                            <label for="remarks" class="fw-semibold">Remarks</label>
                                            <div class="input-group">
                                                <input type="text" name="remarks" class="form-control" placeholder="Remarks" id="remarks"  value="{{ old('remarks') }}">
                                            </div>
                                            @error('remarks')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label for="prno" class="fw-semibold">P.R. No</label>
                                            <div class="input-group">
                                                <input type="text" name="prno" class="form-control" placeholder="P.R. No" id="prno"  value="{{ old('prno') }}">
                                            </div>
                                            @error('prno')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label for="pr_date" class="fw-semibold">P.R. Date</label>
                                            <div class="input-group">
                                                <input type="text" name="pr_date" class="form-control" placeholder="P.R. Date" id="pr_date"  value="{{ old('pr_date') }}">
                                            </div>
                                            @error('pr_date')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 mb-4">
                                            <label for="address" class="fw-semibold">Address</label>
                                            <div class="input-group">
                                                <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                                            </div>
                                            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label for="note" class="fw-semibold">Note</label>
                                            <div class="input-group">
                                                <textarea name="note" id="note" class="form-control">{{ old('note') }}</textarea>
                                            </div>
                                            @error('note')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-primary mt-2 mb-3">
                                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
    
@endsection

@push('scripts')
<script>
    function initSelect2(scope) {
        (scope || $(document)).find('.customer_id').select2({
            placeholder: "Search or select customer",
            allowClear: true,
            width: '100%',
            theme: "bootstrap-5"
        });
    }

    $(document).ready(function() {
        initSelect2(); 
    });
</script>
@endpush
