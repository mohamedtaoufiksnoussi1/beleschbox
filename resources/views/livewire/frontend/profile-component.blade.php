<div>
    <section class="faq myaccount-info-wrapper pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" id="accordion" wire:ignore>
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
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="fa fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>Success! </strong> {{session('success')}}
                            </div>
                        </div>
                    @endif
                    <div class="accordion-item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#collapse3">
                            <a class="accordion__title" href="#">Edit Profile</a>
                        </div>
                        <div id="collapse3" class="collapse show" data-parent="#accordion">
                            <div class="accordion__body">
                                <form class="w-100" autocomplete="off" wire:submit.prevent="submit">
                                    <div id="basket-form">
                                        <div class="col-md-12 " id="iAm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="form-label">Vorname Der
                                                        Versicherte</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           wire:model.debounce.1000ms="first_name">
                                                    @error('first_name') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="last_name" class="form-label">Nachname Der
                                                        Versicherte</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           wire:model.debounce.1000ms="last_name">
                                                    @error('last_name') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="streetno" class="form-label">Strasse</label>
                                                    <input type="text" class="form-control" id="streetno"
                                                           wire:model.debounce.1000ms="streetno">
                                                    @error('streetno') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="houseno" class="form-label">Hausnummer</label>
                                                    <input type="text" class="form-control" id="houseno"
                                                           wire:model.debounce.1000ms="houseno">
                                                    @error('houseno') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="zip" class="form-label">PLZ</label>
                                                    <input type="text" class="form-control" id="zip"
                                                           wire:model.debounce.1000ms="zip">
                                                    @error('zip') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="city" class="form-label">Ort</label>
                                                    <input type="text" class="form-control" id="city"
                                                           wire:model.debounce.1000ms="city">
                                                    @error('city') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="dob" class="form-label">Gaburtadatum</label>
                                                    <input type="text" class="form-control" id="dob"
                                                           wire:model.debounce.1000ms="dob">
                                                    @error('dob') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="mt-50 ">Kontakt Daten</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="telno" class="form-label">telefunnummer</label>
                                                    <input type="text" class="form-control" id="telno"
                                                           wire:model.debounce.1000ms="telno">
                                                    @error('telno') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email2" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="email2"
                                                           wire:model.debounce.1000ms="email">
                                                    @error('email') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-right">
                                                <button class="btn btn__primary btn__rounded mb-3 mt-3">Weiter im
                                                    Antrag
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#collapse1">
                            <a class="accordion__title" href="#">Change Delivery Address</a>
                        </div>
                        <div id="collapse1" class="collapse" data-parent="#accordion" wire:ignore>
                            <div class="accordion__body">
                                <div class="">
                                    <form class="w-100" autocomplete="off" wire:submit.prevent="deliverySubmit">
                                        <div id="basket-form">
                                            <div class="col-md-12 " id="iAm">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="d_recipientName"
                                                               class="form-label">Empfängername</label>
                                                        <input type="text" class="form-control" id="d_recipientName"
                                                               wire:model.debounce.1000ms="d_recipientName">
                                                        @error('d_recipientName') <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="d_street" class="form-label">Strasse</label>
                                                        <input type="text" class="form-control" id="d_street"
                                                               wire:model.debounce.1000ms="d_street">
                                                        @error('d_street') <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="d_houseNo" class="form-label">Hausnummer</label>
                                                        <input type="text" class="form-control" id="d_houseNo"
                                                               wire:model.debounce.1000ms="d_houseNo">
                                                        @error('d_houseNo') <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="d_pincode" class="form-label">PLZ</label>
                                                        <input type="text" class="form-control" id="d_pincode"
                                                               wire:model.debounce.1000ms="d_pincode">
                                                        @error('d_pincode') <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="d_city" class="form-label">Ort</label>
                                                        <input type="text" class="form-control" id="d_city"
                                                               wire:model.debounce.1000ms="d_city">
                                                        @error('d_city') <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>


                                                </div>

                                                <div class="col-md-12 text-right">
                                                    <button class="btn btn__primary btn__rounded mb-3 mt-3"
                                                            type="submit">Weiter im Antrag
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#collapse2">
                            <a class="accordion__title" href="#">
                                <i class="fas fa-shopping-bag me-2"></i>
                                Meine Bestellungen
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" data-parent="#accordion">
                            <div class="accordion__body">
                                @livewire('frontend.user-orders-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
