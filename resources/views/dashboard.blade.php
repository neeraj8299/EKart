<x-app-layout>
    <x-slot name="header">
        @if($is_admin == 'no')
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="1000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1564466809058-bf4114d55352?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" width="10%" height="10%" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1564466809058-bf4114d55352?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1564466809058-bf4114d55352?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 container">
                    @foreach($products as $key => $value)
                    <div class="alert alert-info">
                        {{ $key }}
                        <a href="" class="btn-sm btn-info text-decoration-none float-right">View More</a>
                    </div>
                    <div class="row mb-5">
                        @foreach($value as $data)
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{asset('storage/'.$data->image_filepath)}}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{$data->description}}</p>
                                </div>

                                <div class="card-body bg-warning">
                                    <p class="card-text text-center text-dark">Rs. {{$data->price}}</p>
                                </div>
                                <div class="card-footer justify-center">
                                    @if($is_admin == 'no')
                                    <form action="{{url('/cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$data->id}}">
                                        <button type="submit" class="btn btn-primary float-left">
                                            {{__('Add To Cart')}}
                                        </button>
                                    </form>

                                    <a href="{{url('/checkout')}}" class="btn btn-primary float-right">
                                        {{__('Order Now')}}
                                    </a>
                                    @else
                                    <a href="{{url('/cart')}}" class="btn btn-primary float-left">
                                        {{__('Edit')}}
                                    </a>

                                    <a href="{{url('/checkout')}}" class="btn btn-primary float-right">
                                        {{__('Details')}}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
