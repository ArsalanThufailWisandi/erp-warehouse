@extends('layouts.main')
@section('container')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item active">{{ ucwords($title) }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ strtoupper($menu) }}</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('receive.update', Crypt::encryptString($item->id)) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="my-2 pb-1">Kode Receive</label>
                                            <input type="text" class="form-control" name="kode_receive" disabled
                                                value="{{ $item->kode_receive }}" placeholder="Kode Receive" />
                                            {!! $errors->first('kode_receive', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="my-2 pb-1">Tgl Receive</label>
                                            <input type="date" class="form-control" name="tgl_receive" disabled
                                                value="{{ $item->tgl_receive }}" placeholder="Kode Receive" />
                                            {!! $errors->first('tgl_receive', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="my-2 py-1">Vendor</label>
                                            <div>
                                                <select class="select2 form-control mb-3 custom-select" name="id_vendor"
                                                    disabled>
                                                    <option value="">--Pilih Vendor--</option>
                                                    @foreach ($vendor as $vendor)
                                                        <option value="{{ $vendor->id }}"
                                                            {{ $item->id_vendor == $vendor->id ? 'selected' : '' }}>
                                                            {{ $vendor->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('id_vendor', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="my-2 py-1">Keterangan</label>
                                            <div>
                                                <textarea name="keterangan" class="form-control" rows="5" disabled placeholder="Keterangan">{{ $item->keterangan }}</textarea>
                                                {!! $errors->first('keterangan', '<div class="invalid-validasi">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-toggle="modal" data-target="#myModal">Penempatan</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item</th>
                                                <th>Type</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $detail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $detail->items->nama }}</td>
                                                    <td>{{ $detail->type }}</td>
                                                    <td>{{ $detail->qty }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <a class="btn btn-secondary waves-effect m-l-5"
                                        href="{{ route('receive.index') }}">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('receive_detail.store') }}" method="POST">
                    @csrf
                    <input type="text" name="id_receive" id="idReceive" value="{{ $item->id }}">
                    <div class="modal-body">
                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Type</label>
                            <div>
                                <select class="select2 form-control mb-3 custom-select type" name="type" id="type" required>
                                    <option value="">--Pilih Type--</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->type }}">
                                            {{ $type->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Item</label>
                            <div>
                                <select class="select2 form-control mb-3 custom-select item" name="item" required>
                                    <option value="">--Pilih Item--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Rak</label>
                            <div>
                                <select class="select2 form-control mb-3 custom-select rak" name="rak" required>
                                    <option value="">--Pilih Rak--</option>
                                    @foreach ($raks as $rak)
                                        <option value="{{ $rak->id }}">
                                            {{ $rak->no_rak }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="my-2 pb-1">Tgl Expired</label>
                            <input type="date" class="form-control" name="tgl_expired" placeholder="Tgl Expired"
                                required />
                        </div>
                        <div class="form-group mb-0">
                            <label class="my-2 pb-1">Qty</label>
                            <input type="number" class="form-control" name="qty" placeholder="Qty" required />
                        </div>
                        <div class="form-group mb-0">
                            <label class="my-2 py-1">&nbsp;</label>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Simpan
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/alert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".type").change(function() {
                let type = $(this).val();
                let idReceive = document.getElementById("idReceive").value;
                $(".item option").remove();
                $.ajax({
                    type: "POST",
                    url: '{{ route('item.dropdown_receive') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        type,
                        idReceive
                    },
                    success: response => {
                        $('.item').append(`<option value="">-- Pilih Item --</option>`)
                        $.each(response, function(i, item) {
                            $('.item').append(
                                `<option value="${item.id}">${item.nama}</option>`
                            )
                        })
                    },
                    error: (err) => {
                        console.log(err);
                    },
                });
            });
        });
        $('.delete_confirm').on('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus Data',
                text: 'Ingin menghapus data?',
                icon: 'question',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: "Batal",
                focusConfirm: false,
            }).then((value) => {
                if (value.isConfirmed) {
                    $(this).closest("form").submit()
                }
            });
        });
    </script>
@endsection
