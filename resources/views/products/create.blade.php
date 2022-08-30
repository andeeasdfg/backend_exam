@extends('layouts.authenticated')

@section('title', 'Create Product')
@section('content-header', 'Create Product')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    placeholder="Name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description" placeholder="description">{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category"
                    placeholder="Category" value="{{ old('category') }}">
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_and_date">Time and Date Format (MM-DD-YYY)</label>
                <div class="input-group">
                  {{-- <input type="text" name="expiration" class="form-control @error('expiration') is-invalid @enderror"
                id="expiration" placeholder="Expiration Date" value="{{ old('expiration') }}" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask> --}}
                    <input type="date" name="time_and_date" class="form-control" id="time_and_date" value="{{old('time_and_date')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask />

                @error('time_and_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <!-- /.input group -->
              </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
        </div>
    </div>
    @endsection

    @section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
    @endsection
