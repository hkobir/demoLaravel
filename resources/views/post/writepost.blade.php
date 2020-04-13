@extends('common')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <a href="{{route('all.post')}}" class="btn btn-info">All Posts</a>
     
            <br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>
            
            <!-- to pass image within a form,  need to use enctype="multipart/form-data" -->
            <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post Title</label>
                        <input type="text" class="form-control" placeholder="Post Title" name="title" required>

                    </div>
                </div>

                <br />
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <br />
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Post Image</label>
                        <input type="file" class="form-control" placeholder="Post Image" name="image">

                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post details</label>
                        <textarea rows="5" class="form-control" placeholder="Details" name="details" required></textarea>

                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection