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
                                <h5 class="card-title">Manage Company Profile</h5>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="updateProfile">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" wire:model.debounce.1000ms="name"
                                               placeholder="Name">
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" wire:model.debounce.1000ms="email"
                                               placeholder="email">
                                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="telephone" class="form-control" wire:model.debounce.1000ms="telephone"
                                               placeholder="Phone">
                                        @error('telephone') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Open Day (From)</label>
                                        <input type="text" name="openDayFrom" class="form-control" wire:model.debounce.1000ms="openDayFrom"
                                               placeholder="Day Name">
                                        @error('openDayFrom') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">Close Day (To)</label>
                                        <input type="text" name="closeDayTo" class="form-control" wire:model.debounce.1000ms="closeDayTo"
                                               placeholder="Day Name">
                                        @error('closeDayTo') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Open Time</label>
                                        <input type="text" name="openTimeFrom" class="form-control" wire:model.debounce.1000ms="openTimeFrom"
                                               placeholder="10:00 AM">
                                        @error('openTimeFrom') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Close Time</label>
                                        <input type="text" name="closeTimeTo" class="form-control" wire:model.debounce.1000ms="closeTimeTo"
                                               placeholder="22:00 PM">
                                        @error('closeTimeTo') <span class="text-danger">{{$message}}</span> @enderror
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
