@extends('admin.main')
@section('content')
<h1>List product </h1>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method="get" action="{{ route('search.result') }}" class="form-inline mr-auto">
              <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control col-sm-8"  placeholder="Search events or blog posts..." aria-label="Search">
              <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
            </form>
            <br>
            @if(isset($searchResults))
                @if ($searchResults-> isEmpty())
                    <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
                @else
                    <h2>There are {{ $searchResults->count() }} results for the term <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    <h2>{{ $type }}</h2>

                    @foreach($modelSearchResults as $searchResult)
                        <ul>
                            <!-- Biến $url được cấu hình trong file model-->
                            <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                        </ul>
                    @endforeach
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>

<button type="button" class="btn btn-light"><a href="{{route('admin.products.create')}}">Add Product</a></button>
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th colspan="3" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td><a href="{{route('admin.products.detail',$product->id)}}"
        data-id="{{$product->id}}"
        data-name="{{$product->name}}"
        data-price="{{$product->price}}">
        {{$product->name}}
        </a></td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td><div >
            
                @foreach($product->images as $key=>$img)
                    @if($key ===0)
            <img style=" height: 80px;width: 80px;" 
            src="/{{$img->path}}" alt="">
                @endif
            @endforeach
               

           </div>
        
        </td>
        <td><a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-dark" role="button">Edit</a></td>
        <td>
            <form action="{{route('admin.products.delete',$product->id)}}" method="post">
                {{@csrf_field()}}
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        </td>
        <td> <form action="{{ url('admin/file') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <input type="file" name="filesTest" required="true">
            <br/>
            <input type="submit" value="upload">
        </form></td>
    </tr>
    @endforeach
    
    </tbody>
</table>
{{ $products->links() }}
@endsection