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
                                <form wire:submit.prevent="updateSetting">
                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">(Terms & Conditions)</label>
                                        <b><small>Minimum 50 character required *</small></b>
                                        <textarea class="form-control" name="terms_conditions" id="terms_conditions" rows="6" wire:model.defer.1000ms="terms_conditions"
                                                  placeholder="AboutUs Details">{{$terms_conditions}}</textarea>
                                        @error('terms_conditions') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">Privacy Policy</label>
                                        <b><small>(Minimum 50 character required *)</small></b>
                                        <textarea class="form-control" name="privacy" id="privacy" rows="6" wire:model.defer.1000ms="privacy"
                                                  placeholder="Privacy Policy">{{$privacy}}</textarea>
                                        @error('privacy') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="mb-3" wire:ignore>
                                        <label class="form-label">Cookies</label>
                                        <b><small>(Minimum 50 character required *)</small></b>
                                        <textarea class="form-control" name="cookies" id="cookies" rows="6" wire:model.defer.1000ms="cookies"
                                                  placeholder="Cookies">{{$cookies}}</textarea>
                                        @error('cookies') <span class="text-danger">{{$message}}</span> @enderror
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
        .create(document.querySelector('#terms_conditions'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
            @this.set('terms_conditions', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#privacy'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
            @this.set('privacy', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#cookies'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
            @this.set('cookies', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
