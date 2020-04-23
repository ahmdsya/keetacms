                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">
                            <h5 class="title">{{count($komentar)}} Komentar</h5>

                            <ol>
                                <!-- Single Comment Area -->
                                @foreach(commentsItems($singlePost->id) as $comments => $comment)
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="{{asset('backend/img/comment-user.png')}}" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="{{'http://'.$comment['website']}}" class="post-author">{{$comment['nama']}}</a>
                                            <a href="#" class="post-date">{{ date('F d, Y' , strtotime($comment['created_at'])) }}</a>
                                            <p>{{$comment['content']}}</p>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#balasKomentar-{{$comment['id']}}">Balas</button>
                                        </div>
                                    </div>
                                    @if(array_key_exists('child',$comment))
                                    <ol class="children">
                                        <li class="single_comment_area">
                                            @foreach($comment['child'] as $subcomments)
                                                @include('partial._subcomment', $subcomments)
                                            @endforeach
                                        </li>
                                    </ol>
                                    @endif
                                </li>
                                <!-- Modal -->
                                <div class="modal fade" id="balasKomentar-{{$comment['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Balas Komentar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="{{route('frontend.reply.comment.post')}}">
                                            @csrf
                                        <div class="contact-form-area">
                                            <input type="hidden" name="parent" value="{{$comment['id']}}">
                                            <input type="hidden" name="post_id" value="{{$singlePost->id}}">
                                            <input type="hidden" name="publikasi" value="0">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap*" required>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <input type="email" class="form-control" name="email" placeholder="Email*" required>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="website" placeholder="Website*" required>
                                                </div>
                                                <div class="col-12">
                                                    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Komentar" required></textarea>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Kirim Komentar</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Modal -->
                                @endforeach
                            </ol>
                        </div>

                        @include('partial._comment-form')