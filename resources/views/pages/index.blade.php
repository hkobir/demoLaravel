@extends('common')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
            @foreach($post as $row)
            <div class="post-preview">
                <a href="{{url('/view/post/'.$row->id)}}">
                    
                    <img src="{{URL::to($row->image)}}" style="height:300px"/>
                    <h2 class="post-title">
                        {{$row->title}}
                    </h2>
                </a>
                <p class="post-meta">Category
                    <a href="#">{{$row->name}}</a>
                     on Slug {{$row->slug}} </p>
            </div>
            <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
               {{$post->links()}}   <!--auto pagination links within all row of $post object after paginate query limit 3-->
            </div>
        </div>
    </div>
</div>
@endsection