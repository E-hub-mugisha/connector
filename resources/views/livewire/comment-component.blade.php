<div>
    <div class="comments">
        <h3 class="title">3 Comments</h3><!-- End .title -->

        <ul>
            <li>
                <div class="comment">
                    <figure class="comment-media">
                        <a href="#">
                            <img src="assets/images/blog/comments/1.jpg" alt="User name">
                        </a>
                    </figure>

                    <div class="comment-body">
                        <a href="#" class="comment-reply">Reply</a>
                        <div class="comment-user">
                            <h4><a href="#">Jimmy Pearson</a></h4>
                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                        </div><!-- End .comment-user -->

                        <div class="comment-content">
                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. </p>
                        </div><!-- End .comment-content -->
                    </div><!-- End .comment-body -->
                </div><!-- End .comment -->

                <ul>
                    <li>
                        <div class="comment">
                            <figure class="comment-media">
                                <a href="#">
                                    <img src="assets/images/blog/comments/2.jpg" alt="User name">
                                </a>
                            </figure>

                            <div class="comment-body">
                                <a href="#" class="comment-reply">Reply</a>
                                <div class="comment-user">
                                    <h4><a href="#">Lena Knight</a></h4>
                                    <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                </div><!-- End .comment-user -->

                                <div class="comment-content">
                                    <p>Morbi interdum mollis sapien. Sed ac risus.</p>
                                </div><!-- End .comment-content -->
                            </div><!-- End .comment-body -->
                        </div><!-- End .comment -->
                    </li>
                </ul>
            </li>

            <li>
                <div class="comment">
                    <figure class="comment-media">
                        <a href="#">
                            <img src="assets/images/blog/comments/3.jpg" alt="User name">
                        </a>
                    </figure>

                    <div class="comment-body">
                        <a href="#" class="comment-reply">Reply</a>
                        <div class="comment-user">
                            <h4><a href="#">Johnathan Castillo</a></h4>
                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                        </div><!-- End .comment-user -->

                        <div class="comment-content">
                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                        </div><!-- End .comment-content -->
                    </div><!-- End .comment-body -->
                </div><!-- End .comment -->
            </li>
        </ul>
    </div><!-- End .comments -->
    <div class="reply">
        <div class="heading">
            <h3 class="title">Leave A Reply</h3><!-- End .title -->
            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
        </div><!-- End .heading -->

        <form wire:submit.prevent="sendComment">
            @csrf
            <label for="reply-message" class="sr-only">Comment</label>
            <textarea wire:model="comment_body" name="comment_body" id="comment_body" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

            <div class="row">

                <div class="col-md-6">
                    <input wire:model="blog_id" type="text" class="form-control" id="blog_id" name="blog_id" required>
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->

            <button type="submit" class="btn btn-outline-primary-2">
                <span>POST COMMENT</span>
                <i class="icon-long-arrow-right"></i>
            </button>
        </form>
    </div><!-- End .reply -->
</div>