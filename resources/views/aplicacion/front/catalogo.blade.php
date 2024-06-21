<section class="container py-5">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-md-4 p-5 mt-3 text-center">
                <a href="#"><img class="img-fluid rounded" src="{{ asset('crud/images/' . $product->image) }}" alt="deportivas"></a>
                <h5 class="h5 mt-3 mb-3">{{ $product->name }}</h5>
                <h4 class="h4 mt-2 mb-2">{{ $product->price }}</h4>
                <p><a class="btn btn-success">Go Shop</a></p>
            </div>
        @endforeach
    </div>
</section>