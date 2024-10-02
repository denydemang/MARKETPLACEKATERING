@extends('template')
@section('content')
    <section class="content">
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-body">
                    <table class="table-sm table">
                        <thead>
                            <th>ID</th>
                            <th>customer id</th>
                            <th>merchant id</th>
                            <th>order date</th>
                            <th>total price</th>
                            <th>...</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->customer_id }}</td>
                                    <td>{{ $item->merchant_id }}</td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ intval($item->total_price) }}</td>
                                    <td> <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                                class="fa fa-eye"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Menu Name</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
