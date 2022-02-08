@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Contract</div>
                <div class="card-body">
                    <form action="{{ route('contracts.store') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Period</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="contractPeriod">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Out Of Date</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="outOfDate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Room Contract</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="contractRoom">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

