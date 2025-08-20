<div>
    <div>
        @section('title',$title)
        <div class="wrapper">
            @livewire('admin.includes.left-menu')
            <div class="main">
                @livewire('admin.includes.header')
                <main class="content">
                    <div class="container-fluid p-0">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createGallery"
                           class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Add New</a>
                        <div class="mb-3">
                            <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                        </div>
                        <div class="row">
                            @isset($galleries)
                                @foreach($galleries as $gallery)
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset('storage/'.$gallery->image) }}"
                                                 alt="{{$gallery->altTag}}" title="{{$gallery->titleTag}}">
                                            <div class="card-header px-4 pt-4">
                                                <div class="card-actions float-end">
                                                    <div class="dropdown position-relative">
                                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                                            {{--<i class="align-middle" data-feather="more-horizontal"></i>--}}
                                                            <span class="align-middle fa fa-caret-square-down" style="font-size: 25px; color: #222e3c"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editGallery" wire:click="editGallery({{$gallery->id}})">Edit</a>
                                                            <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteGallery" wire:click="editGallery({{$gallery->id}})">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="card-title mb-0">{{$gallery->name}}</h5>
                                                @if($gallery->status =='0')
                                                    <div class="badge bg-danger my-2">Inactive</div>
                                                @else
                                                    <div class="badge bg-success my-2">Active</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            @endisset
                        </div>
                        <div class="text-center">
                            {{ $galleries->links() }}
                        </div>
                    </div>
                </main>
                @livewire('admin.includes.footer')
            </div>
        </div>
        <!-- BEGIN Add new gallery -->
        <div class="modal fade" wire:ignore.self id="createGallery" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Gallery Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="uploadGallery">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label w-100">choose Image </label>
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
                                    <input type="text" name="titleTag" class="form-control" placeholder="Title Tag"
                                           wire:model.debounce.1000ms="titleTag">
                                    @error('titleTag') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           wire:model.debounce.1000ms="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Status</label>
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
        <!-- END add gallery -->

        <!-- BEGIN Edit new gallery -->
        <div class="modal fade" wire:ignore.self id="editGallery" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Gallery Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateGallery">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="{{asset('storage/'.$showImage)}}" height="100px">
                                    <label class="form-label w-100">choose Image </label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           wire:model="image" >
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
                                    <input type="text" name="titleTag" class="form-control" placeholder="Title Tag"
                                           wire:model.debounce.1000ms="titleTag">
                                    @error('titleTag') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           wire:model.debounce.1000ms="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Status</label>
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
        <!-- END Edit gallery -->

        <!-- Start Delete gallery Modal -->
        <div wire:ignore.self class="modal fade" id="deleteGallery" tabindex="-1" aria-labelledby="deleteSlider"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Gallery Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyGallery">
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this data ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                    data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Yes! Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete gallery Modal -->

        @section('extraJs')
            <script>
                window.addEventListener('close-modal', event => {
                    $('#deleteTeam').modal('hide');
                })
            </script>
        @endsection
    </div>
</div>
