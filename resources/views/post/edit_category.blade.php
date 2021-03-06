@extends('common')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <hr />
            <br />
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <form action="{{url('update/category/'.$cat->id)}}" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Category Name</label>
                        <input type="text" class="form-control" value="{{$cat->name}}" name="name" >

                    </div>
                </div>


                <br />

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Slug Name</label>
                        <input type="text" class="form-control" value="{{$cat->slug}}" name="slug" >

                    </div>
                </div>



                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection