@extends('template')
@section('content')
    <section class="content">
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master Menu</h4>
                </div>
                <div class="card-body">
                    @if ($state == 'New')
                        <form action="{{ route('admin.storemastermenu') }}" enctype="multipart/form-data" method="post">
                        @else
                            <form action="{{ route('admin.editmastermenu') }}" enctype="multipart/form-data" method="post">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label>ID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="id" readonly
                                value="{{ $state == 'Update' ? $menusUpdate->id : old('id') }}" />
                        </div>
                        @error('id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name"
                                value="{{ $state == 'Update' ? $menusUpdate->name : old('name') }}" />

                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="description" data-mask
                                value="{{ $state == 'Update' ? $menusUpdate->description : old('description') }}" />
                        </div>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <div class="input-group">
                            <input type="number" class="form-control" data-inputmask-alias="datetime" name="price"
                                data-mask value="{{ $state == 'Update' ? intval($menusUpdate->price) : old('price') }}" />
                        </div>
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="photo" data-mask />
                        </div>
                        @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    @if ($state == 'New')
                        <button type="submit" class="btn btn-success">ADD NEW</button>
                    @else
                        <button type="submit" class="btn btn-success">UPDATE</button>
                    @endif
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table-sm table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ intval($item->price) }}</td>
                                    <td><img src="{{ asset('uploads/' . $item->photo) }}" width="50" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.mastermenuedit') }}/{{ $item->id }}"> <button
                                                class="btn btn-sm btn-primary">EDIT</button></a>
                                        <a href="{{ route('admin.deletemastermenu', ['id' => $item->id]) }}"> <button
                                                class="btn btn-sm btn-danger">DELETE</button></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
