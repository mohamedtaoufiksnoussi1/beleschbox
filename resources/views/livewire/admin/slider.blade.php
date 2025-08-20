@section('title',$title)
<div class="wrapper">
    @livewire('admin.includes.left-menu')
    <div class="main">
        @livewire('admin.includes.header')
        <main class="content">
            <div class="container-fluid p-0">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createSlider"
                   class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New Slider</a>
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                </div>
                <div class="row">
                    @isset($sliders)
                        @foreach($sliders as $slider)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset('storage/'.$slider->image) }}"
                                         alt="{{$slider->altTag}}" title="{{$slider->titleTag}}">
                                    <div class="card-header px-4 pt-4">
                                        <div class="card-actions float-end">
                                            <div class="dropdown position-relative">
                                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                                   {{-- <i class="align-middle" data-feather="more-horizontal"></i>--}}
                                                    <span class="align-middle fa fa-caret-square-down" style="font-size: 25px; color: #222e3c"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editSlider" wire:click="editSlider({{$slider->id}})">Edit</a>
                                                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteSlider" wire:click="editSlider({{$slider->id}})">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title mb-0">{{$slider->heading}}</h5>
                                        @if($slider->status =='0')
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
                    {{ $sliders->links() }}
                </div>
            </div>
        </main>
        <!-- BEGIN Add new slider -->
        <div class="modal fade" wire:ignore.self id="createSlider" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="uploadSlider">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label w-100">choose Image </label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           wire:model="image" required>
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Heading"
                                           wire:model.debounce.1000ms="heading">
                                    @error('heading') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Title</label>
                                    <input type="text" name="titlee" class="form-control" placeholder="Title"
                                           wire:model.debounce.1000ms="titlee">
                                    @error('titlee') <span class="text-danger">{{$message}}</span> @enderror
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
        <!-- END add slider -->


        <!-- BEGIN Edit new slider -->
        <div class="modal fade" wire:ignore.self id="editSlider" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateSlider">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="{{asset('storage/'.$showImage)}}" alt="" height="60px" align="right">
                                    <label class="form-label w-100">choose Image </label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                           wire:model="image">
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Heading"
                                           wire:model.debounce.1000ms="heading" >
                                    @error('heading') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slider Title</label>
                                    <input type="text" name="titlee" class="form-control" placeholder="Title"
                                           wire:model.debounce.1000ms="titlee">
                                    @error('titlee') <span class="text-danger">{{$message}}</span> @enderror
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
                                    <label class="form-label">Slider Status</label>
                                    <select name="status" class="form-control" wire:model="status">
                                        <option value="">Select Status</option>
                                        <option value="1" @if($status =='1') selected @endif>Active</option>
                                        <option value="0"  @if($status =='0') selected @endif>Inactive</option>
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
        <!-- END Edit slider -->

        <!-- Start Delete Slider Modal -->
        <div wire:ignore.self class="modal fade" id="deleteSlider" tabindex="-1" aria-labelledby="deleteSlider"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroySlider">
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
        <!-- End Delete Slider Modal -->
        @livewire('admin.includes.footer')
    </div>
</div>

@section('extraJs')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteSlider').modal('hide');
        })
    </script>
@endsection
