		<div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{url('/search')}}" method="get">
                  <input type="text" name="get">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
              	@foreach(latePost(6) as $latepost)
                <div class="post-item clearfix">
                  <img src="{{asset($latepost->gambar)}}" height="75" alt="">
                  <h4><a href="{{route('frontend.single.post', [$latepost->id,$latepost->slug])}}">{{$latepost->judul}}</a></h4>
                  <time datetime="2020-01-01">{{ date('F d, Y' , strtotime($latepost->created_at)) }}</time>
                </div>
                @endforeach

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  @foreach(category() as $category)
                  <li><a href="{{route('frontend.category.post', $category->slug)}}">{{$category->nama}} <span>({{$category->post_count}})</span></a></li>
                  @endforeach
                </ul>

              </div>

            </div>

          </div>