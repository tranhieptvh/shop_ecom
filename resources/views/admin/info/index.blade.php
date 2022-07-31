@extends('layouts.admin.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Thông tin shop</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Thông tin shop</li>
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
        @endif
        <div class="card">
            <form class="form theme-form" method="POST" action="{{ route('admin.info.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Số điện thoại <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone', $info->phone) }}">
                                    @if ($errors->has('phone'))
                                        <div class="invalid-feedback validated">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Địa chỉ <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="address" value="{{ old('address', $info->address) }}">
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback validated">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="email" value="{{ old('email', $info->email) }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback validated">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Zalo QR code <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="d-none" type="file" name="zalo_qr" id="zalo_qr" value="{{ old('zalo_qr') }}" onchange="previewQrCode(frame_zalo)">
                                    <button class="btn btn-primary m-b-5" type="button" onclick=" document.getElementById('zalo_qr').click()">Chọn ảnh</button>
                                    @if ($errors->has('zalo_qr'))
                                        <div class="invalid-feedback validated">{{ $errors->first('zalo_qr') }}</div>
                                    @endif
                                    <div>
                                        <img id="frame_zalo" src="{{ !empty($info->zalo_qr) ? asset($info->zalo_qr) : '' }}" style="width: 40%;"
                                             class="{{ !empty($info->zalo_qr) ? '' : 'hidden' }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Ngân hàng <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="bank" value="{{ old('bank', $info->bank) }}">
                                    @if ($errors->has('bank'))
                                        <div class="invalid-feedback validated">{{ $errors->first('bank') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Banking QR code <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="d-none" type="file" name="bank_qr" id="bank_qr" value="{{ old('bank_qr') }}" onchange="previewQrCode(frame_bank)">
                                    <button class="btn btn-primary m-b-5" type="button" onclick=" document.getElementById('bank_qr').click()">Chọn ảnh</button>
                                    @if ($errors->has('bank_qr'))
                                        <div class="invalid-feedback validated">{{ $errors->first('bank_qr') }}</div>
                                    @endif
                                    <div>
                                        <img id="frame_bank" src="{{ !empty($info->bank_qr) ? asset($info->bank_qr) : '' }}" style="width: 50%;"
                                             class="{{ !empty($info->bank_qr) ? '' : 'hidden' }}"/>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">VAT (%) <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="vat" value="{{ old('vat', $info->vat) }}">
                                    @if ($errors->has('vat'))
                                        <div class="invalid-feedback validated">{{ $errors->first('vat') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center col-sm-12">
                    <button class="btn btn-success btn-lg" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
