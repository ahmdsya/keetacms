    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>@yield('breadcrumb_tittle')</h2>
            <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{route('frontend.home')}}">Home</a></li>
          @if(Request::segment(1) == 'category')
          <li>Category</li>
          @elseif(Request::segment(1) == 'search')
          <li>Search</li>
          @elseif(Request::segment(1) == 'post')
          <li>Post</li>
          @elseif(Request::segment(1) == 'page')
          <li>Page</li>
          @endif
          <li>@yield('breadcrumb_map')</li>
        </ol>
      </div>
    </section>