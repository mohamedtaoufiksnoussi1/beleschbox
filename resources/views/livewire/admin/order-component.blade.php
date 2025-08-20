@section('title',$title)
<div class="wrapper">
    @livewire('admin.includes.left-menu')
    <div class="main">
        @livewire('admin.includes.header')
        <style type="text/css">
            .sort:hover{
                cursor: pointer;
            }
        </style>
        <main class="content">
            <div class="container-fluid p-0">
                {{--<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createTeam"
                   class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New Team</a>--}}
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card flex-fill">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="search" class="form-control float-end mt-2 mr-2" placeholder="Search" style="width: 250px;" wire:model="searchTerm" >
                                </div>
                            </div>
                            <table class="table table-striped dataTable no-footer dtr-inline" width="100%">
                                <thead>
                                <tr>
                                    <th class="sort" wire:click="sortOrder('orderId')">Order Id {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('orderType')">Type {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('created_at')">Order Date {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('deliveryStatus')">Delivery Status {!! $sortLink !!}</th>
                                    <th>Customer Name</th>
                                    <th>Insurance Id</th>
                                    <th>Insurance Name</th>
                                    <th class="d-none d-xl-table-cell">Action</th>
                                </tr>
                                </thead>
                                <tbody class="row_position1">
                                @isset($orders)
                                    @foreach($orders as $key=>$order)
                                        <tr id="{{$order[0]->id}}">
                                            <td>{{$order[0]->orderId}}</td>
                                            <td>
                                                @if($order[0]->orderType =='1')
                                                    <button class="btn btn-outline-warning">Package</button>
                                                @else
                                                    <button class="btn btn-outline-primary">Custom product</button>
                                                @endif
                                            </td>
                                            <td>{{$order[0]->created_at}}</td>
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
                                            <td>{{ucfirst(customerDetails($order[0]->customerId)->firstName)}} {{ucfirst(customerDetails($order[0]->customerId)->lastName)}}</td>
                                            <td>{{customerDetails($order[0]->customerId)->insuranceNumber}}</td>
                                            <td>{{customerDetails($order[0]->customerId)->insuranceName}}</td>
                                            <td class="d-none d-xl-table-cell">
                                                <div class="btn-group btn-group-md">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"> Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#editCustomer"
                                                           wire:click="editCustomer({{$order[0]->orderId}},{{$order[0]->orderType}})">View Details</a>
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#changeDeliveryStatus"
                                                           wire:click="editCustomer({{$order[0]->orderId}},{{$order[0]->orderType}})">Change Delivery Status</a>

                                                           <a class="dropdown-item" href="{{url('update-order?orderId='.$order[0]->orderId)}}" target="_blank">Edit Order</a>

                                                        <div class="dropdown-divider"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
{{--                        {{ $customers->links() }}--}}
                    </div>
                </div>
            </div>
        </main>

        @livewire('admin.includes.footer')
        <!-- BEGIN Update new team -->
        <div class="modal fade" wire:ignore.self id="editCustomer" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Product Image</div>
                                    <div class="col-md-3">Name</div>
                                    <div class="col-md-3">Title</div>
                                    <div class="col-md-3">Quantity</div>
                                </div>
                                @if(count($orderss)>0)
                                    @foreach($orderss as $od)
                                    <div class="row">
                                    <div class="col-md-3"><img class="p-2"
                                                               src="{{asset('storage/'.$od['image'])}}"
                                                               width="70px" alt="{{$od['altTag']}}"
                                                               title="{{$od['titleTag']}}"></div>
                                    <div class="col-md-3">{{$od['name']}}</div>
                                    <div class="col-md-3">{{$od['title']}}</div>
                                    <div class="col-md-3">{{$od['qty']}}</div>
                                    </div>
                                    @endforeach
                                 @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                </div>
            </div>
        </div>
        <!-- END Update team -->

        <!-- BEGIN Update Delivery Status -->
        <div class="modal fade" wire:ignore.self id="changeDeliveryStatus" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Delivery Stats</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateDelivery">
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label class="form-label">Select Delivery Status</label>
                                        <select name="status" class="form-control" wire:model="deliveryStatus">
                                            <option value="">Select Status</option>
                                            <option value="1">Accepted</option>
                                            <option value="0">Pending</option>
                                            <option value="2">On Transit</option>
                                            <option value="3">Delivered</option>
                                            <option value="4">Rejected</option>
                                        </select>
                                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                             </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END Update Delivery Status -->


    </div>
</div>

@section('extraJs')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteCustomer').modal('hide');
        })
    </script>
@endsection
