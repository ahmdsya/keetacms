                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Tinggalkan Komentar</h4>
                            
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                @if(session('sukses'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  {{session('sukses')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                @endif
                                <form action="{{route('frontend.comment.post')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="parent" value="0">
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
                                </form>
                            </div>
                        </div>