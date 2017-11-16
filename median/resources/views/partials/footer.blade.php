<!-- Footer -->
<footer id="footer-container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="about" id="about">
                    <h4 class="text-light">ABOUT</h4>
                    <p>
                        <small class="text-light">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit tenetur consequuntur architecto nesciunt unde alias cumque magni vitae laboriosam aut.
                        </small>
                    </p>
                </div>
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <br>

                <div class="news-letter">
                    <form method="post" action="/newsletter">
                        {{csrf_field()}}
                        <div class="mb-2">
                            <label for="email_newsletter" class="text-light">Subscribe to our newsletter</label><br>
                            <input type="email" class="form-control-sm" id="email_newsletter" name="email_newsletter" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <button type="submit" class="news_letter_btn btn btn-outline-secondary btn-sm">Submit</button>
                        <a role="button" class="news_letter_btn btn btn-outline-primary btn-sm" href="{{'/register'}}">Get started</a>
                    </form>
                </div>

            </div> {{-- .col-12 col-sm-5 --}}
            <div class="col-12 col-sm-6">
                <br>
                <div class="embed-responsive embed-responsive-16by9" id="google_maps_container">
                  <iframe class="embed-responsive-item" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.4110870342492!2d121.0179819146054!3d14.518462789854837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cecdb24090a1%3A0xc6c0d38bf41ec8c1!2sNewport+Mall!5e0!3m2!1sen!2sph!4v1509699302982" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p class="copyright text-muted">
                    Lester Jan Artienda &copy; 2017 &middot; <a href="#" class="copyright text-muted">Privacy</a> &middot; <a href="#" class="copyright text-muted">Terms</a>
                </p>
            </div>
        </div>
    </div>

</footer>
