<section class="jumbotron d-flex justify-content-between">
    <div class="container text-center">
        <h1 class="jumbotron-heading">Ads board</h1>
        <p class="lead text-muted">Almost OLX board</p>
        <p>
            @if(\Illuminate\Support\Facades\Auth::user())
                @if(\Illuminate\Support\Facades\Request::url() === url('/ads'))
                    <a href="{{route('getUserAds', \Illuminate\Support\Facades\Auth::id())}}" class="btn btn-sm btn-primary">Your ads</a>
                @else
                    <a href="{{route('getAds')}}" class="btn btn-sm btn-primary">All ads</a>
                @endif
            @endif
            <a href="#" class="btn btn-sm btn-secondary">Some action</a>
        </p>
    </div>
    @guest
        <a href="{{route('login')}}" class="btn btn-light btn-sm mr-2 small-button">{{ __('Login') }}</a>
        <a href="{{route('register')}}" class="btn btn-light btn-sm small-button">{{ __('Register') }}</a>
    @else
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light btn-sm small-button">Logout</button>
        </form>
    @endguest

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/" method="post">
                        <div class="form-group">
                            <label for="loginEmail"></label>
                            <input class="form-control" type="email" id="loginEmail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword"></label>
                            <input class="form-control" type="password" id="loginPassword" name="password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{url('/login')}}" type="button" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalTitle">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/" method="post">
                        <div class="form-group">
                            <label for="registerEmail"></label>
                            <input class="form-control" type="email" id="registerEmail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword"></label>
                            <input class="form-control" type="password" id="registerPassword" name="password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</section>
