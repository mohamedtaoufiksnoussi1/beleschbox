<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a href="{{url('/admin/dashboard')}}" target="_blank" class="text-muted"><strong>Belesh-Box Admin</strong></a> &copy;
                </p>
            </div>
            {{--<div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Terms</a>
                    </li>
                </ul>
            </div>--}}
        </div>
    </div>
    <!-- BEGIN Create Table (Migration) -->
    <div class="modal fade" wire:ignore.self id="createTable" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Table (Migration)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="createMigration">
                    <div class="modal-body m-3 card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Enter Table Name</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" wire:model.debounce.1000ms="tableName" class="form-control noSpacesField"
                                   onkeypress="return /[a-zA-Z]/i.test(event.key)" placeholder="Table Name">
                            @error('tableName') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- END Create Table (Migration) -->

    <!-- BEGIN Alter Table (Migration) -->
    <div class="modal fade" wire:ignore.self id="alterTable" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Column (Migration)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="alterTable" enctype="multipart/form-data">
                    <div class="modal-body m-3 card">

                    {{-----
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Table</label>
                            <select name="tableName" wire:model="tableName" class="form-control">
                                <option value=""></option>
                                @foreach($tables as $table)
                                    <option value="{{$table->Tables_in_adminmaster}}">{{$table->Tables_in_adminmaster}}</option>
                                @endforeach
                            </select>
                            @error('tableName') <small class="text-danger ">{{$message}}</small> @enderror
                        </div>
                        ------}}

                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Table Column Name</label>
                            <input type="text" wire:model.debounce.1000ms="columnName"
                                   class="form-control noSpacesField" onkeypress="return /[a-zA-Z]/i.test(event.key)"
                                   placeholder="Table Column Name">
                            @error('columnName') <small class="text-danger ">{{$message}}</small> @enderror
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
    <!-- END Alter Table (Migration) -->

    <!-- BEGIN CREATE CONTROLLER -->
    <div class="modal fade" wire:ignore.self id="createController" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Controller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="saveController">
                    <div class="modal-body m-3 card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Enter Controller Name</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" wire:model.debounce.1000ms="controllerName"
                                   class="form-control noSpacesField" onkeypress="return /[a-zA-Z]/i.test(event.key)"
                                   placeholder="Controller Name">
                            @error('controllerName') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- END CREATE CONTROLLER -->

    <!-- BEGIN CREATE MODEL -->
    <div class="modal fade" wire:ignore.self id="createModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="saveModel">
                    <div class="modal-body m-3 card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Enter Model Name</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" wire:model.debounce.1000ms="modelName" class="form-control noSpacesField"
                                   onkeypress="return /[a-zA-Z]/i.test(event.key)" placeholder="Model Name">
                            @error('modelName') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- END CREATE MODEL -->

    <!-- BEGIN CREATE All -->
    <div class="modal fade" wire:ignore.self id="createAll" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Model + Controller + Migration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="createAll">
                    <div class="modal-body m-3 card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Enter Model Name</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" wire:model.debounce.1000ms="modelName" class="form-control noSpacesField"
                                   onkeypress="return /[a-zA-Z]/i.test(event.key)" placeholder="Model Name">
                            @error('modelName') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- END CREATE All -->
</footer>

@section('extraJs')
    <script>
        @if(session()->has('message'))
        toastMessage('<?= session('message')?>', 'danger')
        @endif

        @if(session()->has('success'))
        toastMessage('<?= session('success')?>', 'success')
        @endif
    </script>

@endsection




