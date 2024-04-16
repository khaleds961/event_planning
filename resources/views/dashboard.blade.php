@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="mt-4">
            <div class="d-flex justify-content-end">
                <div class="bg-primary text-white rounded p-1 my-2">
                    <span class="mx-2">
                        {{ Auth::user()->fullname }}
                    </span>
                    <a href="{{ route('logout') }}" class="text-white">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h3>Competitors DataTable</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="clients_table" class="table border table-striped table-bordered display text-nowrap">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase">ID#</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase">date</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase">fullname</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase">phone</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase">email</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase">nationality</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0 text-uppercase"> answers</h6>
                                    </th>

                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                <!-- start row -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="answersModal" tabindex="-1" role="dialog" aria-labelledby="answersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-titles" id="answersModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div role="status" class="loading text-center"></div>
                    <ul class="clientsAnswers"></ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var table = $('#clients_table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     responsive: true,
        //     ajax: "{{ route('home') }}",
        //     columns: [{
        //             data: 'fullname',
        //             name: 'fullname',
        //         },
        //         {
        //             data: 'phone',
        //             name: 'phone'
        //         },
        //         {
        //             data: 'email',
        //             name: 'email',
        //         },
        //         {
        //             data: 'nationality',
        //             name: 'nationality'
        //         },
        //         {
        //             data: 'answers',
        //             name: 'answers',
        //             searchable: false,
        //             orderable: false,
        //             className: 'text-center'
        //         }
        //     ],
        //     order: [0, 'desc'],
        // });

        var table = $('#clients_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('home') }}",
            columns: [
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'client_date',
                    name:'client_date'
                },
                {
                    data: 'fullname',
                    name: 'fullname'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'nationality',
                    name: 'nationality'
                },
                {
                    data: 'answers',
                    name: 'answers',
                    searchable: false,
                    orderable: false,
                    className: 'text-center'
                }
            ],
            order: [0, 'desc'],
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                className: 'buttons-html5 btn btn-success',
                text: 'Export to Excel',
                exportOptions: {
                    columns: [0, 1, 2, 3,4,5] // Exclude the 'answers' column (column indexes are zero-based)
                }
            }]
        });


        $(document).on('click', '.show_answers', function() {
            $('.clientsAnswers').empty();
            $('.loading').addClass('spinner-border text-primary')
            var client_id = $(this).data('id');
            var client_name = $(this).data('fullname');
            $('.modal-titles').text(client_name);
            if (client_id) {
                $.ajax({
                    url: "{{ route('getAnswers') }}",
                    data: {
                        client_id: client_id
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.success) {
                            $('.loading').removeClass('spinner-border text-primary')
                            var array = data.data;
                            array.forEach(element => {
                                $('.clientsAnswers').append(`<li>${element}</li>`)
                            });
                        }
                    }
                })
            }
        })
    </script>
@endpush
