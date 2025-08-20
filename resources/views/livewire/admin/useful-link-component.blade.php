@section('title',$title)
<div class="wrapper">
    @livewire('admin.includes.left-menu')
    <div class="main">
        @livewire('admin.includes.header')
        <main class="content">
            <div class="container-fluid p-0">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createUrl"
                   class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Add New</a>

                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                </div>
                <div class="row justify-content-center">

                    <div class="col-md-8">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title">Manage {{$title}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Url</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($usefulls as $useful)
                                            <tr>
                                                <td>{{$useful->id}}.</td>
                                                <td>{{$useful['name']}}</td>
                                                <td>{{$useful->fullUrl}}</td>
                                                <td>@if($useful['status'] =='1') Active @else Inactive @endif</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSocial" wire:click="editSocial({{$useful->id}})"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger" style="margin-left: 10px"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#deleteProduct"
                                                       wire:click="editSocial({{$useful->id}})"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- BEGIN Add useful Link -->
        <div class="modal fade" wire:ignore.self id="createUrl" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add {{$title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="addUsefulLink">
                        <div class="card">

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           wire:model.debounce.1000ms="name" >
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control" placeholder="Url"
                                           wire:model.debounce.1000ms="fullUrl">
                                    @error('fullUrl') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
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
        <!-- END Edit Useful Link -->

        <!-- BEGIN Edit Social Media -->
        <div class="modal fade" wire:ignore.self id="editSocial" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update {{$title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateSocial">
                        <div class="card">

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           wire:model.debounce.1000ms="name" >
                                    @error('name1') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control" placeholder="Url"
                                           wire:model.debounce.1000ms="fullUrl">
                                    @error('fullUrl') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Status </label>
                                    <select name="status" class="form-control" wire:model="status">
                                        <option value="">Select Status</option>
                                        <option value="1" @if($this->status =='1') selected @endif>Active</option>
                                        <option value="0"  @if($this->status =='0') selected @endif>Inactive</option>
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
        <!-- END Edit Social Media -->
        <!-- Start Delete Useful Link Modal -->
        <div wire:ignore.self class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteSlider"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyLink">
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
        <!-- End Delete useful link Modal -->
        @livewire('admin.includes.footer')
    </div>
</div>
