<div>
    @section('title',$title)
    <div class="wrapper">
        @livewire('admin.includes.left-menu')
        <div class="main">
            @livewire('admin.includes.header')
            <main class="content">
                <div class="container-fluid p-0">
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createTestimonial"
                       class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Add New</a>
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
                                        <th>Status</th>
                                        <th class="d-none d-xl-table-cell">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="row_position1">
                                    @isset($testimonials)
                                        @foreach($testimonials as $key=>$testimonial)
                                            <tr id="{{$testimonial->id}}">
                                                <td>{{$key+1}}</td>
                                                <td><img src="{{asset('storage/'.$testimonial->image)}}" width="100px">
                                                </td>
                                                <td>{{ucfirst($testimonial->name)}}</td>
                                                <td>{{$testimonial->designation}}</td>
                                                <td>
                                                    @if($testimonial->status =='1')
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
                                                               data-bs-toggle="modal" data-bs-target="#editTestimonial"
                                                               wire:click="editTestimonial({{$testimonial->id}})">Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="javascript:;"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#deleteTestimonial"
                                                               wire:click="editTestimonial({{$testimonial->id}})">Delete</a>
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
                    </div>
                    <div class="text-center">
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </main>
            @livewire('admin.includes.footer')
        </div>
    </div>

    <!-- BEGIN Add new testimonial -->
    <div class="modal fade" wire:ignore.self id="createTestimonial" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="uploadTestimonial">
                    <div class="card">

                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label w-100">choose Profile Image </label>
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
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name"
                                       wire:model.debounce.1000ms="name">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="Designation"
                                       wire:model.debounce.1000ms="designation">
                                @error('designation') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" rows="4"
                                          wire:model.debounce.1000ms="message"></textarea>
                                @error('message') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- END add testimonial -->

    <!-- BEGIN Edit new testimonial -->
    <div class="modal fade" wire:ignore.self id="editTestimonial" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="updateTestimonial">
                    <div class="card">

                        <div class="card-body">
                            <div class="mb-3">
                                <img src="{{asset('storage/'.$showImage)}}" height="100px">
                                <label class="form-label w-100">choose Profile Image </label>
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
                                <input type="text" name="titleTag" class="form-control" placeholder="Title Tag"
                                       wire:model.debounce.1000ms="titleTag">
                                @error('titleTag') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name"
                                       wire:model.debounce.1000ms="name">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="Designation"
                                       wire:model.debounce.1000ms="designation">
                                @error('designation') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" rows="4"
                                          wire:model.debounce.1000ms="message"></textarea>
                                @error('message') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- END Edit testimonial -->

    <!-- Start Delete testimonial Modal -->
    <div wire:ignore.self class="modal fade" id="deleteTestimonial" tabindex="-1" aria-labelledby="deleteSlider"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                            aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyTestimonial">
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
    <!-- End Delete testimonial Modal -->

    @section('extraJs')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteTeam').modal('hide');
            })
        </script>
    @endsection
</div>
