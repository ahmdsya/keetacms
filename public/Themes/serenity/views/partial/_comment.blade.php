			<div class="blog-comments">

              <h4 class="comments-count">{{commentCount($singlePost->id)}} Comments</h4>

              @foreach(commentsItems($singlePost->id) as $comments => $comment)
              <div id="comment-2" class="comment clearfix">
                <img src="{{asset('backend/img/comment-user.png')}}" class="comment-img  float-left" alt="">
                <h5><a href="{{'http://'.$comment['website']}}">{{$comment['nama']}}</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">{{ date('F d, Y' , strtotime($comment['created_at'])) }}</time>
                <p>
                  {{$comment['content']}}
                </p>

                @if(array_key_exists('child',$comment))
                	@foreach($comment['child'] as $subcomments)
                        @include('partial._subcomment', $subcomments)
                    @endforeach
                @endif

              </div>
              @endforeach

              @include('partial._comment-form')

            </div><!-- End blog comments -->