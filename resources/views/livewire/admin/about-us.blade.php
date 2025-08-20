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
            <div class="container-fluid p-0">
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Manage AboutUs Data</h5>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="updateAboutUs">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Heading</label>
                                        <input type="text" name="header_heading" class="form-control" wire:model.debounce.1000ms="header_heading" value="{{$header_heading}}"
                                               placeholder="Banner Heading">
                                        @error('header_heading') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Banner Content</label>
                                        <input type="text" name="header_content" class="form-control" wire:model.debounce.1000ms="header_content"
                                               placeholder="Banner Content">
                                        @error('header_content') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <img src="{{asset('storage/'.$header_image1)}}" alt="" height="100px"><br>
                                        <label class="form-label">Banner Image</label>
                                        <input type="file" name="banner_image" class="form-control" wire:model="header_image"  accept="image/*">
                                        @error('header_image') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">AboutUs Heading</label>
                                        <input type="text" name="about_heading" class="form-control" wire:model.debounce.1000ms="about_heading"
                                               placeholder="AboutUs Heading">
                                        @error('about_heading') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">AboutUs Title</label>
                                        <input type="text" name="about_title" class="form-control" wire:model.debounce.1000ms="about_title"
                                               placeholder="AboutUs Title">
                                        @error('about_title') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">AboutUs Details</label>
                                        <textarea class="form-control" name="about_contents" id="editor" rows="6" wire:model.defer.1000ms="about_contents"
                                                  placeholder="AboutUs Details">{{$about_contents}}</textarea>
                                        @error('about_contents') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Video Url (youtube video link)</label>
                                        <input type="text" name="video" class="form-control" wire:model.debounce.1000ms="video"
                                               placeholder="Video Url (youtube video link)">
                                        @error('video') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <img src="{{asset('storage/'.$video_cover1)}}" alt="" height="100px"><br>
                                        <label class="form-label w-100">Video Cover Image</label>
                                        <input type="file" name="video_cover" class="form-control" wire:model="video_cover"  accept="image/*">
                                        @error('video_cover') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        @livewire('admin.includes.footer')
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
            @this.set('about_contents', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
