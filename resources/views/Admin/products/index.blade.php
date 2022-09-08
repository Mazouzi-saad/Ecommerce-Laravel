@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th></th>
                        <th>Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{Str::limit($product->description,50)}}</td>
                        <td>{{$product->inStock}}</td>
                        <td>{{$product->price}} DH</td> 
                        <td>
                            <img src="{{$product->image}}" 
                                alt="{{$product->title}}"
                                width="50"
                                height="50"
                                class="img-fluid rounded">
                        </td>
                        <td>
                            <form id="{{$product->id}}" method="post" action="{{ route("orders.destroy",$product->slug)}}">
                                @csrf
                                @method("DELETE")
                                <button
                                onclick="event.preventDefault()
                                    if (confirm('Voulez vous vraiment supprimer le produit'{{ $product->title}} ?'))
                                     document.getElementById({{$product->id}}).submit()
                                "
                                class="btn btn-sm btn-Danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form> 
                        </td>
                        <td>
                            @if ($product->inStock>0)
                                <i class="fa fa-check text-succes"></i>
                            @else 
                                <i class="fa fa-times text-succes"></i>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
