<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($cart_items as $row)
                <div class="card flex-row flex-wrap">
                    <div class="card-header border-0">
                        <img src="{{asset('storage/'.$row->image_filepath)}}" class="img-thumbnail" width="200" height="200" alt="">
                    </div>
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$row->title}}</h4>
                        <p class="card-text">{{$row->description}}</p>
                        <br /><br />
                        <h4 class="card-title">Rs.{{$row->price*$row->quantity}}</h4>
                    </div>
                    <div class="w-100"></div>
                    <div class="card-footer w-100 text-muted">
                        <a href="#" class="btn btn-danger float-right">Remove</a>
                        <a href="#" class="btn btn-muted float-right mr-5">QTY: <span>{{$row->quantity}}</span></a>
                    </div>
                    @endforeach

                    <div class="alert alert-success container">
                        <form action="{{url('/checkout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary float-right">Place Order</button>
                        </form>
                        <a href="#" class="btn btn-muted float-right mr-5">Total: <span>{{$total}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
