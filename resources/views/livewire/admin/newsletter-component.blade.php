<div>
    <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="cta-heading text-center">
                        <h3 class="cta-title text-white">Get The Latest Deals</h3>
                        <p class="cta-desc text-white">and receive <span class="font-weight-normal">Discount</span> for first service</p>
                        <a role="button" href="#" data-toggle="modal" class="btn btn-lg btn-round btn-primary" data-target="#myModal" role="button">Subscribe</a>
                    </div>
                    <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-small" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h2 class="modal-title" id="myModalLabel">Subscribe to our Newsletter.</h2>
                                </div>
                                <div class="modal-body py-2 px-8">
                                    <div class="container">
                                        <form class="row mb-2 mt-2 px-3" action="/sendNewsletter" method="POST">
                                            <div class="col form-group">
                                                <input type="text" name="names" id="names" class="form-control" placeholder="Name" required>
                                                @error('names')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col form-group">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Subscribe">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>