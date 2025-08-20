<div>
    <!-- ========================  About Layout 1 =========================== -->
    <div class="login-register-area pt-90 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 ml-auto mr-auto">
                    @if(session()->has('message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>Oops! </strong> {{session('message')}}
                            </div>
                        </div>
                    @endif
                    <div class="login-register-wrapper">
                        <h2 class="text-center">LOGIN</h2>
                        <form class="contact-panel__form" wire:submit.prevent="submit">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="email" class="form-control" placeholder="Email Id" wire:model.debounce.1000ms="email">
                                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="password" class="form-control" placeholder="Password" wire:model.debounce.1000ms="password">
                                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Login</span> <i class="icon-arrow-right"></i>
                                    </button>

                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
