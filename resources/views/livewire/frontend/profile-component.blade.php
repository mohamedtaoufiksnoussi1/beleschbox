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
                            <a class="accordion__title" href="#">Order History</a>
                        </div>
                        <div id="collapse2" class="collapse" data-parent="#accordion">
                            <div class="accordion__body">
                                <div class="myaccount-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Order-Id</th>
                                            <th>Date</th>
                                            <th>Order Type</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($orders))
                                            @foreach($orders as $key=>$order)
                                                <tr>
                                                    <td>{{$order[0]->orderId}}</td>
                                                    <td>{{$order[0]->created_at}}</td>
                                                    <td>
                                                        @if($order[0]->orderType =='0') Product @else Package @endif
                                                    </td>
                                                    <td>
                                                        @if($order[0]->deliveryStatus =='0')
                                                            <button class="btn btn-outline-warning">Pending</button>
                                                        @elseif($order[0]->deliveryStatus =='1')
                                                            <button class="btn btn-outline-primary">Accepted</button>
                                                        @elseif($order[0]->deliveryStatus =='2')
                                                            <button class="btn btn-outline-warning">On Transit</button>
                                                        @elseif($order[0]->deliveryStatus =='3')
                                                            <button class="btn btn-outline-success">Delivered</button>
                                                        @else
                                                            <button class="btn btn-outline-danger">Rejected</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if($order[0]->deliveryStatus !='3')
                                                    <a href="{{url('update-order?orderId='.$order[0]->orderId)}}" class="btn btn-info">Update Order</a> &nbsp;&nbsp;
                                                     @endif   
                                                    <a href="javascript;" data-toggle="modal"
                                                           data-target="#exampleModal{{$order[0]->orderId}}" class="btn btn-success">View
                                                            Details</a>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$order[0]->orderId}}"
                                                     tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Order
                                                                    Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @php
                                                                    $orderDetails =  getorderDetails($order[0]->orderId, $order[0]->orderType);
                                                                @endphp
                                                                @if($order[0]->orderType =='0')
                                                                    <div class="row">
                                                                        <div class="col-md-3">Product Image</div>
                                                                        <div class="col-md-3">Name</div>
                                                                        <div class="col-md-3">Title</div>
                                                                        <div class="col-md-3">Quantity</div>
                                                                    </div>
                                                                    @foreach ($orderDetails as $od)
                                                                        <div class="row">
                                                                            <div class="col-md-3"><img class="p-2"
                                                                                                       src="{{asset('storage/'.$od->getProduct->image)}}"
                                                                                                       width="70px"
                                                                                                       alt="{{$od->getProduct->altTag}}"
                                                                                                       title="{{$od->getProduct->titleTag}}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-3">{{$od->getProduct->name}}</div>
                                                                            <div
                                                                                class="col-md-3">{{$od->getProduct->product_title}}</div>
                                                                            <div class="col-md-3">{{$od->qty}}</div>

                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="row">
                                                                        <div class="col-md-3">Product Image</div>
                                                                        <div class="col-md-3">Name</div>
                                                                        <div class="col-md-3">Title</div>
                                                                        <div class="col-md-3">Quantity</div>
                                                                    </div>
                                                                    @isset($orderDetails[0])
                                                                        @foreach ($orderDetails[0]->getPerPageDetails as $od)
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <img class="p-2"
                                                                                         src="{{asset('storage/'.getProductDetailsById($od->productId)->image)}}"
                                                                                         width="70px"
                                                                                         alt="{{getProductDetailsById($od->productId)->altTag}}"
                                                                                         title="{{getProductDetailsById($od->productId)->titleTag}}">
                                                                                </div>
                                                                                <div
                                                                                    class="col-md-3">{{getProductDetailsById($od->productId)->name}}</div>
                                                                                <div
                                                                                    class="col-md-3">{{getProductDetailsById($od->productId)->product_title}}</div>
                                                                                <div class="col-md-3">{{$od->qty}}</div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endisset
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
