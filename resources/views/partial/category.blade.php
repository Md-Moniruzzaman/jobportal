<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5">Popular Categories</h2>
            </div>
        </div>
        <div class="row">
            @foreach(\App\Category::all() as $cat)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                <a href="{{route('Category.index',[$cat->id])}}" class="h-100 feature-item">
                    <span class="d-block icon flaticon-calculator mb-3 text-primary"></span>
                    <h2>{{$cat->name}}</h2>
                    <span class="counting">20</span>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>
