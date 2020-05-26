<div class="bg-primary">
    <div id="footer-info" class="container">
        <div class="row justify-content-center text-white ml-0 mr-0 pt-1">
            <div class="col-md-5 m-auto">
                <h4>{{ __('Contact us:') }}</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Eger, Deák Ferenc út 26.</li>
                    <li><i class="fas fa-envelope"></i> info@ticket-booker.com</li>
                    <li><i class="fas fa-phone"></i> +36 20 659 45 24</li>
                </ul>
            </div>
            <div class="col-md-3 m-auto">
                <h4>{{ __('Follow us:') }}</h4>
                <ul>
                    <li><a href="//facebook.com" target="_blank" class="text-white"><i
                                class="fab fa-facebook">&nbsp;</i>Facebook</a></li>
                    <li><a href="//twitter.com" target="_blank" class="text-white"><i
                                class="fab fa-twitter">&nbsp;</i>Twitter</a></li>
                    <li><a href="//instagram.com" target="_blank" class="text-white"><i
                                class="fab fa-instagram">&nbsp;</i>Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<footer id="footer-main" class="bg-dark">
    <p>&copy; {{ now()->year }} - Ticket Booker - {{ __('All rights reserved') }}</p>
</footer>