<div>
    <div>
        @section('title',$title)

        <div class="wrapper">
            @livewire('admin.includes.left-menu')
            <div class="main">
                @livewire('admin.includes.header')
                <main class="content">
                    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
                    <style>
                        .ck-editor__editable_inline {
                            min-height: 200px;
                        }
                    </style>
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
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createProduct"
                           class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> Add New</a>
                        <div class="mb-3">
                            <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Latest Products</h5>
                                    </div>
                                    <table class="table table-striped dataTable no-footer dtr-inline" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Name</th>
                                            <th>Position Number</th>
                                            <th>Type</th>
                                            <th>price</th>
                                            <th>Status</th>
                                            <th class="d-none d-xl-table-cell">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="row_position1">
                                        @isset($products)
                                            @foreach($products as $key=>$product)
                                                <tr id="{{$product->id}}">
                                                    <td>{{$key+1}}.</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <div class="bg-light rounded-2">
                                                                    <img class="p-2"
                                                                         src="{{asset('storage/'.$product->image)}}"
                                                                         width="70px" alt="{{$product->altTag}}"
                                                                         title="{{$product->titleTag}}">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <strong>{{$product->name}}</strong>
                                                                <div class="text-muted">
                                                                   <small>{{$product->product_title}}</small>
                                                                </div>
                                                                <div class="text-muted">
                                                                   <small><strong>{{$product->size_availability}}</strong></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-muted">{{$product->positionNumber}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-muted">{{$product->measurement}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-muted">{{$product->price}}</div>
                                                    </td>
                                                    <td>
                                                        @if($product->status =='1')
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
                                                                   data-bs-toggle="modal" data-bs-target="#EditProduct"
                                                                   wire:click="editProduct({{$product->id}})">Edit</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="javascript:;"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#deleteProduct"
                                                                   wire:click="editProduct({{$product->id}})">Delete</a>
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
                            {{-- {{ $galleries->links() }}--}}
                        </div>
                    </div>
                </main>
                @livewire('admin.includes.footer')
            </div>
        </div>
        <!-- BEGIN Add new product -->
        <div class="modal fade" wire:ignore.self id="createProduct" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="uploadProduct">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label w-100">choose Image </label>
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
                                    <label class="form-label">Position (Rank)</label>
                                    <input type="text" name="rank" class="form-control" placeholder="Rank"
                                           wire:model.debounce.1000ms="rank">
                                    @error('rank') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product name"
                                           wire:model.debounce.1000ms="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" name="product_title" class="form-control" placeholder="Product title"
                                           wire:model.debounce.1000ms="product_title">
                                    @error('product_title') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="00.00"
                                           wire:model.debounce.1000ms="price">
                                    @error('price') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Product Description</label>
                                    <textarea name="contents" wire:model.defer.1000ms="contents" id="editor"
                                              class="form-control" rows="4"></textarea>
                                    @error('contents') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Measurement Type</label>
                                    <select name="measurement" class="form-control" wire:model="measurement">
                                        <option value="">Select Measurement Type</option>
                                        <option value="ml">ml</option>
                                        <option value="gm">gm</option>
                                        <option value="pieces">pieces</option>
                                    </select>
                                    @error('measurement') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Size Available</label>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="S" wire:model.defer="size_availability">
                                            <span class="form-check-label">
												S
											</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="M" wire:model.defer="size_availability">
                                            <span class="form-check-label">
												M
											</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="L"  wire:model.defer="size_availability">
                                            <span class="form-check-label">
												L
											</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="XL" wire:model.defer="size_availability" >
                                            <span class="form-check-label">
												XL
											</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Status</label>
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
        <!-- END add product -->

        <!-- BEGIN Edit new product -->
        <div class="modal fade" wire:ignore.self id="EditProduct" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateProduct">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="{{asset('storage/'.$showImage)}}" alt="{{$altTag}}" width="100px">
                                    <label class="form-label w-100">choose Image </label>
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
                                    <label class="form-label">Position Number</label>
                                    <input type="text" name="rank" class="form-control" placeholder="position Number"
                                           wire:model.debounce.1000ms="positionNumber" readonly>
                                    @error('positionNumber') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Position (Rank)</label>
                                    <input type="text" name="rank" class="form-control" placeholder="Rank"
                                           wire:model.debounce.1000ms="rank">
                                    @error('rank') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product name"
                                           wire:model.debounce.1000ms="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" name="product_title" class="form-control" placeholder="Product title"
                                           wire:model.debounce.1000ms="product_title">
                                    @error('product_title') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="00.00"
                                           wire:model.debounce.1000ms="price">
                                    @error('price') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Product Description </label>
                                    <textarea name="contents" wire:model.defer="contents" id="description"
                                              class="form-control" rows="4"></textarea>
                                    @error('contents') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Measurement Type</label>
                                    <select name="measurement" class="form-control" wire:model="measurement">
                                        <option value="">Select Measurement Type</option>
                                        <option value="ml">ml</option>
                                        <option value="gm">gm</option>
                                        <option value="pieces">pieces</option>
                                    </select>
                                    @error('measurement') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Size Available</label>

                                    <div>
                                        <label class="form-check form-check-inline" >
                                            <input class="form-check-input"type="checkbox" value="S" wire:model.defer="size_availability">
                                            <span class="form-check-label">
												S
											</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="M" wire:model.defer="size_availability">
                                            <span class="form-check-label">
												M
											</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="L"  wire:model.defer="size_availability">
                                            <span class="form-check-label">
												L
											</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="XL" wire:model.defer="size_availability" >
                                            <span class="form-check-label">
												XL
											</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Status</label>
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
        <!-- END Edit product -->


        <!-- Start Delete product Modal -->
        <div wire:ignore.self class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteSlider"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyProduct">
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
        <!-- End Delete product Modal -->
    </div>
</div>

@push('scriptBottom')
    <script>
        Livewire.on('initializeEditor', (data) => {
            $('.ck-rounded-corners').remove();
            ClassicEditor .create(document.querySelector('#description'))
             .then(editor => {
                    //console.log(data.contents);
                    editor.setData(data.contents);
                    editor.model.document.on('change:data', () => {
                    @this.set('contents', editor.getData());
                    })
                })
        });
    </script>
@endpush
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {

            editor.model.document.on('change:data', () => {

            @this.set('contents', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });

</script>

<script>
    window.addEventListener('close-modal', event => {
        $('#deleteTeam').modal('hide');
    })

</script>

{{--<script src="{{asset('admin/js/app.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(".row_position1").sortable({
        delay: 150,
        stop: function () {
            var selectedData = new Array();
            $('.row_position1>tr').each(function () {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });

    function updateOrder(data) {
        $.ajax({
            url: "{{route('admin.productSequence')}}",
            type: 'post',
            data: "position=" + data + '&_token=<?= csrf_token()?>',
            success: function (data) {
                toastMessage('Your Change Successfully Saved.', 'success');
            }
        })
    }
</script>
