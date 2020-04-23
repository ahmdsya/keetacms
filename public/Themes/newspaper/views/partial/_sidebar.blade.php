                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">

                            <!-- Single Featured Post -->
                            @foreach(latePost(6) as $latePost)
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">
                                    <a href="{{route('frontend.single.post', [$latePost->id, $latePost->slug])}}"><img src="{{ asset($latePost->gambar) }}" alt="" style="height: 90px;"></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{route('frontend.category.post', $latePost->kslug)}}" class="post-catagory">{{$latePost->nama}}</a>
                                    <div class="post-meta">
                                        <a href="{{route('frontend.single.post', [$latePost->id, $latePost->slug])}}" class="post-title">
                                            <h6>{{$latePost->judul}}</h6>
                                        </a>
                                        <p class="post-date"><span>{{ date('F d, Y' , strtotime($latePost->created_at)) }}</span></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        <!-- Popular News Widget -->
                        <div class="popular-news-widget mb-50">
                            <h3>Popular Post</h3>

                            <!-- Single Popular Blog -->
                            @foreach(popularPost(4) as $popularPost => $popular)
                            <div class="single-popular-post">
                                <a href="{{route('frontend.single.post', [$popular->id, $popular->slug])}}">
                                    <h6><span>{{$popularPost+1}}.</span>{{$popular->judul}}</h6>
                                </a>
                                <p>{{ date('F d, Y' , strtotime($popular->created_at)) }}</p>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>