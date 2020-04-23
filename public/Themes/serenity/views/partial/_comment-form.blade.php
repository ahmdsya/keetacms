			       <div class="reply-form">
                  @if(session('sukses'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 20px;">
                      {{session('sukses')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="{{route('frontend.comment.post')}}" method="POST">
                  @csrf
                  <input type="hidden" name="parent" value="0">
                  <input type="hidden" name="post_id" value="{{$singlePost->id}}">
                  <input type="hidden" name="publikasi" value="0">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="nama" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="content" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>