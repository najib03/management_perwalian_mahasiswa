@extends('layouts.app')
@section('title', 'Halaman MD Ajaran')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('MD Tahun Ajaran') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tahun Ajaran</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <button class="btn btn-primary btn-sm mb-3" onclick="addForm()">
                <i class="fa fa-plus-circle"></i>
              </button>
              <div class="card-text">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="tbl_list">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tampilan Modal untuk tambah dan edit data --}}
  <div class="modal fade" id="modal-add" data-backdrop="static" data-keyboard="false" tabindex="-1"
       aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" enctype="multipart/form-data" id="modalForm">
          @csrf
          <input type="hidden" name="id" id="id" class="form-control">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Tahun Ajaran</label>
              <input type="text" class="form-control" id="nama"
                     name="nama">
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script type="text/javascript">
    $(function () {
      bsCustomFileInput.init()
      var table = $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaran.index') }}",
        order: [
          [0, 'desc']
        ],
        columns: [
          {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            width: "10%"
          },
          {
            data: 'nama',
            name: 'nama',
            width: "70%"
          },

          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: "25%"
          },
        ]
      });

      // Proses simpan data
      $('#modalForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
          data: formData,
          url: "{{ route('ajaran.store') }}",
          type: "POST",
          dataType: 'json',
          contentType: false,
          processData: false,
          success: function (data) {
            $('#modal-add').modal('hide');
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Data berhasil disimpan.'
            });
            table.draw();
          },
          error: function (xhr, status, error) {
            if (xhr.responseJSON && xhr.responseJSON.errors) {
              var errors = xhr.responseJSON.errors;
              $.each(errors, function (key, value) {
                $('#' + key).addClass('is-invalid').after(
                  '<span class="invalid-feedback">' + value[0] +
                  '</span>');
              });
            } else if (xhr.responseText.includes('Tahun ajaran sudah ada')) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tahun ajaran sudah ada!'
              });
            } else {
              console.error('Error occurred:', error);
            }
          }
        });
      });

      // Update dan edit data
      $('body').on('click', '.editStory', function () {
        var id = $(this).data('id');
        $.get("{{ route('ajaran.index') }}" + '/' + id + '/edit', function (data) {
          $('#modal-title').text('Edit Tahun Ajaran');
          $('#modal-add').modal('show');
          $('#id').val(data.id);
          $('#nama').val(data.nama);
        })
      });

      // Delete data
      $('body').on('click', '.deleteStory', function () {
        var id = $(this).data("id");
        Swal.fire({
          title: 'Yakin anda menghapusnya?',
          text: "Anda tidak akan bisa mengembalikannya!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "DELETE",
              url: "{{ route('ajaran.store') }}" + '/' + id,
              data: {
                _token: "{{ csrf_token() }}"
              },
              success: function (data) {
                $('#tbl_list').DataTable().draw();
                Swal.fire(
                  'Hapus!',
                  'Data berhasil dihapus.',
                  'success'
                );
              },
              error: function (data) {
                console.log('Error:', data);
              }
            });
          }
        });
      });
    });

    function addForm() {
      $('#modal-add').modal('show');
      $('#modalForm')[0].reset();
      $('#id').val('');
      $('#modal-title').text(' Tambah Tahun Ajaran');
      $('#nama').focus();
    }
  </script>
@endpush

