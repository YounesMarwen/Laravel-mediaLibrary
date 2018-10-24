@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <br>
                <div class="card">

                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('media.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="custom-file">
                                    <input name="media" type="file" class="custom-file-input" id="inputGroupFile01"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success btn-sm form-control"
                                        id="inputGroupFileAddon02">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class=" justify-content-center">
            <br>
            <br>
            <div class="card-columns">
                @foreach($media as $med)
                    <div class="card">
                        <img class="card-img-top" src="{{$med->getMedia('media')[0]->getUrl('card')}}"
                             alt="{{$med->getFirstMediaUrl('media')}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$med->name}}</h5>
                            <p class="card-text">{{$med->description}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{date('d-m-Y', strtotime($med->created_at))  }}</small>
                            <a href="{{route('media.destroy', ['id' => $med->id])}}" class="btn btn-outline-danger btn-sm" style="float:right">DELETE</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
