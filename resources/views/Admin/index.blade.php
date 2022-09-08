@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <a href="{{route("admin.products")}}">
                    <div class="card bg-primary text-white">
                        <div class="card-card d-flex flex-column justify-content-center align-items-center">
                            <h3>Produits</h3>
                            <span class="font-weight-bold">
                                {{$products->count()}}
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <a href="{{route("admin.orders")}}" style="text-decoration:none">
                    <div class="card bg-danger text-white">
                        <div class="card-card d-flex flex-column justify-content-center align-items-center">
                            <h3>Commandes</h3>
                            <span class="font-weight-bold">
                                {{$orders->count()}}
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
