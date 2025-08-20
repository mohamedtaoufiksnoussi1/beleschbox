@section('title',$title)
<main class="d-flex w-100 h-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome to, {{env('APP_NAME')}}</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>
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

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{asset('admin/img/avatars/avatar.jpg')}}" alt="Charles Hall"
                                         class="img-fluid rounded-circle" width="132" height="132"/>
                                </div>
                                <form autocomplete="off" wire:submit.prevent="submit">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg"
                                               wire:model.debounce.1000ms="username" type="text" name="username"
                                               placeholder="Enter your Username / email"/>
                                        @error('username') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg"
                                               wire:model.debounce.1000ms="password" type="password" name="password"
                                               placeholder="Enter your password"/>
                                        @error('username') <span class="text-danger">{{$message}}</span> @enderror
                                        <small>
                                            <a href="#">Forgot password?</a>
                                        </small>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
