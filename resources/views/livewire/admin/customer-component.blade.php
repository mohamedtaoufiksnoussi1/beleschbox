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
                                    <th class="sort" wire:click="sortOrder('firstName')">Name {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('email')">Email {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('telephone')">Telephone {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('insuranceName')">Insurance Name {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('insuranceNumber')">Insurance Number {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('status')">Status {!! $sortLink !!}</th>
                                    <th class="d-none d-xl-table-cell">Action</th>
                                </tr>
                                </thead>
                                <tbody class="row_position1">
                                @isset($customers)
                                    @foreach($customers as $key=>$customer)
                                        <tr id="{{$customer->id}}">
                                            <td> {{ucfirst($customer->firstName)}} {{ucfirst($customer->lastName)}}</td>
                                            <td>{{ucfirst($customer->email)}}</td>
                                            <td>{{ucfirst($customer->telephone)}}</td>
                                            <td>{{$customer->insuranceName}}</td>
                                            <td>{{$customer->healthInsuranceNo}}</td>
                                            <td>
                                                @if($customer->status =='1')
                                                    <button class="btn btn-outline-success">Active</button>
                                                @else
                                                    <button class="btn btn-outline-danger">Inactive</button>
                                                @endif

                                            </td>
                                            <td class="d-none d-xl-table-cell">
                                                <div class="btn-group btn-group-md">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"> Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#editCustomer"
                                                           wire:click="editCustomer({{$customer->id}})">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#deleteCustomer"
                                                           wire:click="editCustomer({{$customer->id}})">Delete</a>
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
                        {{ $customers->links() }}
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
                        <h5 class="modal-title">Update Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateCustomer">
                        <div class="card">

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="First name"
                                           wire:model.debounce.1000ms="firstName">
                                    @error('firstName') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Last name"
                                           wire:model.debounce.1000ms="lastName">
                                    @error('lastName') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">email</label>
                                    <input type="text" name="email" class="form-control" placeholder="email"
                                           wire:model.debounce.1000ms="email">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">street</label>
                                    <input type="text" name="street" class="form-control" placeholder="street name"
                                           wire:model.debounce.1000ms="street">
                                    @error('street') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">houseNo</label>
                                    <input type="text" name="houseNo" class="form-control" placeholder="House Number"
                                           wire:model.debounce.1000ms="houseNo">
                                    @error('houseNo') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">zipcode</label>
                                    <input type="text" name="zipcode" class="form-control" placeholder="zipcode"
                                           wire:model.debounce.1000ms="zipcode">
                                    @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">city</label>
                                    <input type="text" name="city" class="form-control" placeholder="city"
                                           wire:model.debounce.1000ms="city">
                                    @error('city') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Dob</label>
                                    <input type="text" name="dob" class="form-control" placeholder="DOB"
                                           wire:model.debounce.1000ms="dob">
                                    @error('dob') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">telephone</label>
                                    <input type="text" name="telephone" class="form-control" placeholder="Telephone"
                                           wire:model.debounce.1000ms="telephone">
                                    @error('telephone') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Insurance Name</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="Insurance name"
                                           wire:model.debounce.1000ms="insuranceName">
                                    @error('insuranceName') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">insuranceNumber</label>
                                    <input type="text" name="insuranceNumber" class="form-control" placeholder="insurance Number"
                                           wire:model.debounce.1000ms="insuranceNumber">
                                    @error('insuranceNumber') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Health Insurance Number</label>
                                    <input type="text" name="healthInsuranceNo" class="form-control" placeholder="Health insurance Number"
                                           wire:model.debounce.1000ms="healthInsuranceNo">
                                    @error('healthInsuranceNo') <span class="text-danger">{{$message}}</span> @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Team Status</label>
                                    <select name="status" class="form-control" wire:model="status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{$message}}</span> @enderror
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
        <!-- END Update team -->

        <!-- Start Delete Team Modal -->
        <div wire:ignore.self class="modal fade" id="deleteCustomer" tabindex="-1" aria-labelledby="deleteCustomer"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyCustomer">
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this data ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary">Yes! Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete Team Modal -->

    </div>
</div>

@section('extraJs')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteCustomer').modal('hide');
        })
    </script>
@endsection
