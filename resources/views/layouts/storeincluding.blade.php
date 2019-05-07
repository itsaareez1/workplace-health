
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center">Ecommerce Store</h2>
          </div>
        </div>
        <div class="row">

          @foreach ($products as $product)

          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <img style="max-height: 200px" src="{{asset('storage/'.$product->img.'')}}" alt="Image" class="img-fluid">
              <hr>
              <h2 class="h5">{{ $product->name }}</h2>
              <p>{{ str_limit($product->description, 50, '...') }}</p>
              <p>Price = {{ $product->price }}</p>
              <p><a href="{{url('viewItem').'/'.$product->id}}" class="btn btn-primary text-white px-4"><span class="caption">View</span></a></p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
