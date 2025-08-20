@section('title',$title)
<div class="wrapper">
    @livewire('admin.includes.left-menu')
    <div class="main">
        @livewire('admin.includes.header')
        <main class="content">
            <div class="container-fluid p-2 card">
                <form wire:submit.prevent="updateDynamic">
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Home page product section</h1>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="heading" class="p-2">Heading</label>
                                <input type="text" name="heading" id="heading" class="form-control" placeholder="Enter heading here.." wire:model.defer.1000ms="heading" value="{{$heading}}">
                                @error('heading') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="contents" class="p-2">Contents</label>
                                <textarea name="contents" id="contents" rows="3" class="form-control" placeholder="Enter descriptions here..." wire:model.defer.1000ms="contents1">{{$contents1}}</textarea>
                                @error('contents1') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container-fluid p-0">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createTeam"
                   class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New Team</a>
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card flex-fill">
                            <table class="table table-striped dataTable no-footer dtr-inline" width="100%">
                                <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>phone</th>
                                    <th>Status</th>
                                    <th class="d-none d-xl-table-cell">Action</th>
                                </tr>
                                </thead>
                                <tbody class="row_position1">
                                @isset($teams)
                                    @foreach($teams as $key=>$team)
                                        <tr id="{{$team->id}}">
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{asset('storage/'.$team->image)}}" width="100px"></td>
                                            <td>{{ucfirst($team->name)}}</td>
                                            <td>{{ucfirst($team->heading)}}</td>
                                            <td>{{$team->mobile}}</td>
                                            <td>
                                                @if($team->status =='1')
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
                                                           data-bs-toggle="modal" data-bs-target="#editTeam"
                                                           wire:click="editTeam({{$team->id}})">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#deleteTeam"
                                                           wire:click="editTeam({{$team->id}})">Delete</a>
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
                        {{ $teams->links() }}
                    </div>
                </div>
            </div>
        </main>

        <!-- BEGIN Add new team -->
        <div class="modal fade" wire:ignore.self id="createTeam" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="uploadTeam">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label w-100">Choose Profile Image </label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           wire:model="image" required>
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image Alt Tag</label>
                                    <input type="text" name="altTag" class="form-control" placeholder="Alt Tag"
                                           wire:model.debounce.1000ms="altTag">
                                    @error('altTag') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image Title Tag</label>
                                    <input type="text" name="titleTag" class="form-control"
                                           placeholder="Image Title Tag"
                                           wire:model.debounce.1000ms="titleTag">
                                    @error('titleTag') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Profile Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Profile Name"
                                           wire:model.debounce.1000ms="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Designation"
                                           wire:model.debounce.1000ms="heading">
                                    @error('heading') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="description" rows="4" class="form-control"
                                              placeholder="Short Description"
                                              wire:model.debounce.1000ms="description"></textarea>
                                    @error('description') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Facebook Url</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook Url"
                                           wire:model.debounce.1000ms="facebook">
                                    @error('facebook') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Twitter Url</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter Url"
                                           wire:model.debounce.1000ms="twitter">
                                    @error('twitter') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Phone"
                                           wire:model.debounce.1000ms="mobile">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
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
        <!-- END add team -->

        <!-- BEGIN Update new team -->
        <div class="modal fade" wire:ignore.self id="editTeam" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateTeam">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="{{asset('storage/'.$showImage)}}" height="80px">
                                    <label class="form-label w-100">Choose Profile Image </label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           wire:model="image">
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image Alt Tag</label>
                                    <input type="text" name="altTag" class="form-control" placeholder="Alt Tag"
                                           wire:model.debounce.1000ms="altTag">
                                    @error('altTag') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image Title Tag</label>
                                    <input type="text" name="titleTag" class="form-control"
                                           placeholder="Image Title Tag"
                                           wire:model.debounce.1000ms="titleTag">
                                    @error('titleTag') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Profile Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Profile Name"
                                           wire:model.debounce.1000ms="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Designation"
                                           wire:model.debounce.1000ms="heading">
                                    @error('heading') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="description" rows="4" class="form-control"
                                              placeholder="Short Description"
                                              wire:model.debounce.1000ms="description"></textarea>
                                    @error('description') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Facebook Url</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook Url"
                                           wire:model.debounce.1000ms="facebook">
                                    @error('facebook') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Twitter Url</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter Url"
                                           wire:model.debounce.1000ms="twitter">
                                    @error('twitter') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Phone"
                                           wire:model.debounce.1000ms="mobile">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
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
        <div wire:ignore.self class="modal fade" id="deleteTeam" tabindex="-1" aria-labelledby="deleteTeam"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyTeam">
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
        @livewire('admin.includes.footer')
    </div>
</div>

@section('extraJs')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteTeam').modal('hide');
        })
    </script>
@endsection
