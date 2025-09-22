@section('title',$title)
<div class="wrapper">
    @livewire('admin.includes.left-menu')
    <div class="main">
        @livewire('admin.includes.header')
        <style type="text/css">
            .sort:hover{
                cursor: pointer;
            }
        </style>
        <main class="content">
            <div class="container-fluid p-0">
                {{--<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#createTeam"
                   class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New Team</a>--}}
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">{{$title}}</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card flex-fill">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="search" class="form-control float-end mt-2 mr-2" placeholder="Search" style="width: 250px;" wire:model="searchTerm" >
                                </div>
                            </div>
                            <table class="table table-striped dataTable no-footer dtr-inline" width="100%">
                                <thead>
                                <tr>
                                    <th class="sort" wire:click="sortOrder('orderId')">Order Id {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('orderType')">Type {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('created_at')">Order Date {!! $sortLink !!}</th>
                                    <th class="sort" wire:click="sortOrder('deliveryStatus')">Delivery Status {!! $sortLink !!}</th>
                                    <th>Customer Name</th>
                                    <th>Insurance Id</th>
                                    <th>Insurance Name</th>
                                    <th class="d-none d-xl-table-cell">Action</th>
                                </tr>
                                </thead>
                                <tbody class="row_position1">
                                @isset($orders)
                                    @foreach($orders as $key=>$order)
                                        <tr id="{{$order[0]->id}}">
                                            <td>{{$order[0]->orderId}}</td>
                                            <td>
                                                @if($order[0]->orderType =='1')
                                                    <button class="btn btn-outline-warning">Package</button>
                                                @else
                                                    <button class="btn btn-outline-primary">Custom product</button>
                                                @endif
                                            </td>
                                            <td>{{$order[0]->created_at}}</td>
                                            <td>
                                                @if($order[0]->deliveryStatus =='0')
                                                    <button class="btn btn-outline-warning">Pending</button>
                                                @elseif($order[0]->deliveryStatus =='1')
                                                    <button class="btn btn-outline-primary">Accepted</button>
                                                @elseif($order[0]->deliveryStatus =='2')
                                                    <button class="btn btn-outline-warning">On Transit</button>
                                                @elseif($order[0]->deliveryStatus =='3')
                                                    <button class="btn btn-outline-success">Delivered</button>
                                                @else
                                                    <button class="btn btn-outline-danger">Rejected</button>
                                                @endif

                                            </td>
                                            <td>
                                                @if($order[0]->getCustomer)
                                                    {{ucfirst($order[0]->getCustomer->firstName)}} {{ucfirst($order[0]->getCustomer->lastName)}}
                                                @else
                                                    {{ucfirst(customerDetails($order[0]->customerId)->firstName)}} {{ucfirst(customerDetails($order[0]->customerId)->lastName)}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($order[0]->getCustomer)
                                                    {{$order[0]->getCustomer->insuranceNumber}}
                                                @else
                                                    {{customerDetails($order[0]->customerId)->insuranceNumber}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($order[0]->getCustomer)
                                                    {{$order[0]->getCustomer->insuranceName}}
                                                @else
                                                    {{customerDetails($order[0]->customerId)->insuranceName}}
                                                @endif
                                            </td>
                                            <td class="d-none d-xl-table-cell">
                                                <div class="btn-group btn-group-md">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" id="actionBtn{{$order[0]->orderId}}"> Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionBtn{{$order[0]->orderId}}" style="">
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#editCustomer"
                                                           wire:click="editCustomer({{$order[0]->orderId}},{{$order[0]->orderType}})">View Details</a>
                                                        <a class="dropdown-item" href="javascript:;"
                                                           data-bs-toggle="modal" data-bs-target="#changeDeliveryStatus"
                                                           wire:click="editCustomer({{$order[0]->orderId}},{{$order[0]->orderType}})">Change Delivery Status</a>

                                                           <a class="dropdown-item" href="{{url('update-order?orderId='.$order[0]->orderId)}}" target="_blank">Edit Order</a>
                                                           <a class="dropdown-item" href="javascript:;" onclick="downloadOrderPdfAdmin({{$order[0]->orderId}})">
                                                               <i class="fa fa-download"></i> PDF herunterladen
                                                           </a>

                                                        <div class="dropdown-divider"></div>
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
{{--                        {{ $customers->links() }}--}}
                    </div>
                </div>
            </div>
        </main>

        @livewire('admin.includes.footer')
        <!-- BEGIN Update new team -->
        <div class="modal fade" wire:ignore.self id="editCustomer" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Product Image</div>
                                    <div class="col-md-3">Name</div>
                                    <div class="col-md-3">Title</div>
                                    <div class="col-md-3">Quantity</div>
                                </div>
                                @if(count($orderss)>0)
                                    @foreach($orderss as $od)
                                    <div class="row">
                                    <div class="col-md-3"><img class="p-2"
                                                               src="{{asset('storage/'.$od['image'])}}"
                                                               width="70px" alt="{{$od['altTag']}}"
                                                               title="{{$od['titleTag']}}"></div>
                                    <div class="col-md-3">{{$od['name']}}</div>
                                    <div class="col-md-3">{{$od['title']}}</div>
                                    <div class="col-md-3">{{$od['qty']}}</div>
                                    </div>
                                    @endforeach
                                 @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                </div>
            </div>
        </div>
        <!-- END Update team -->

        <!-- BEGIN Update Delivery Status -->
        <div class="modal fade" wire:ignore.self id="changeDeliveryStatus" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Delivery Stats</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off" wire:submit.prevent="updateDelivery">
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label class="form-label">Select Delivery Status</label>
                                        <select name="status" class="form-control" wire:model="deliveryStatus">
                                            <option value="">Select Status</option>
                                            <option value="1">Accepted</option>
                                            <option value="0">Pending</option>
                                            <option value="2">On Transit</option>
                                            <option value="3">Delivered</option>
                                            <option value="4">Rejected</option>
                                        </select>
                                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
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
        <!-- END Update Delivery Status -->


    </div>
</div>

<!-- Template PDF caché (comme dans l'étape 4) - BACKUP -->
<div id="printableArea_backup" style="display: none; font-family: Arial, sans-serif;">
    <!-- BACKUP DU TEMPLATE ORIGINAL -->
                </div>

<!-- Template PDF mis à jour selon l'image -->
<div id="printableArea" style="display: none; font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: white;">
    <!-- En-tête -->
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
        <div>
            <h1 style="color: #009ee1; font-size: 24px; font-weight: bold; margin: 0 0 8px 0;">
                Antrag auf Kostenübernahme
            </h1>
            <p style="margin: 0; font-size: 12px; line-height: 1.2; color: #333;">
                zur Versorgung mit Pflegehilfsmitteln gemäß § 78 Abs. 1 i.V.m. § 40 Abs. 2 SGB XI
            </p>
                </div>
        <div style="text-align: right;">
            <img src="/frontend/assets/images/logo/belesch-logo-light.png" style="max-width: 80px; height: auto;">
        </div>
    </div>

    <!-- Section Versicherte/r -->
    <div style="margin-bottom: 8px;">
        <div style="margin: 0 0 4px 0; display: flex; align-items: center; gap: 10px;">
            <h3 style="margin: 0; font-size: 11px; font-weight: bold;">Versicherte / r:</h3>
            <p style="margin: 0; font-size: 8px; color: #666;">Felder, die mit * gekennzeichnet sind, sind Pflichtfelder</p>
        </div>
        
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #000; font-size: 10px; border-spacing: 0;">
            <!-- Ligne 1 - Genre -->
            <tr>
                <td style="width: 20%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: middle;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                        <div style="display: flex; align-items: center;">
                            <div id="title_name_fr_pd" style="width: 16px; height: 16px; border: 2px solid #000; margin-right: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px;"></div>
                            <span style="font-size: 12px;">Frau</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div id="title_name_her_pd" style="width: 16px; height: 16px; border: 2px solid #000; margin-right: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #000; font-weight: bold;">✓</div>
                            <span style="font-size: 12px;">Herr</span>
                        </div>
                    </div>
                </td>
                <td style="width: 40%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px;">
                        <span style="font-weight: bold; font-size: 12px;">Vorname*:</span>
                        <span id="first_name_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
                <td style="width: 40%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px; white-space: nowrap;">
                        <span style="font-weight: bold; font-size: 12px;">Nachname*:</span>
                        <span id="last_name_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
            </tr>
            
            <!-- Ligne 2 - Straße et Telefon -->
            <tr>
                <td style="width: 20%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px; white-space: nowrap;">
                        <span style="font-weight: bold; font-size: 12px;">Straße, Nr.*:</span>
                        <span id="street_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
                <td style="width: 40%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <!-- Cellule vide -->
                </td>
                <td style="width: 40%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px; white-space: nowrap;">
                        <span style="font-weight: bold; font-size: 12px;">Telefon*:</span>
                        <span id="mobile_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
            </tr>
            
            <!-- Ligne 3 - PLZ et Ort -->
            <tr>
                <td style="width: 30%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px;">
                        <span style="font-weight: bold; font-size: 12px;">PLZ*:</span>
                        <span id="zip_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
                <td style="width: 20%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px;">
                        <span style="font-weight: bold; font-size: 12px;">Ort*:</span>
                        <span id="city_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
                <td style="width: 50%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <!-- Cellule vide -->
                </td>
            </tr>
            
            <!-- Ligne 4 - E-Mail et Geburtsdatum -->
            <tr>
                <td style="width: 20%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px; white-space: nowrap;">
                        <span style="font-weight: bold; font-size: 12px;">E-Mail*:</span>
                        <span id="email_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
                <td style="width: 40%; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <!-- Cellule vide -->
                </td>
                <td style="width: 40%; border-bottom: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px;">
                        <span style="font-weight: bold; font-size: 12px;">Geburtsdatum*:</span>
                        <span id="dob_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
            </tr>
            
            <!-- Ligne 5 - Krankenkasse et Versichertennr -->
            <tr>
                <td style="width: 20%; border-right: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px;">
                        <span style="font-weight: bold; font-size: 12px;">Krankenkasse*:</span>
                        <span id="health-insurance_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
                <td style="width: 40%; border-right: 1px solid #000; padding: 2px 6px; vertical-align: top;">
                    <!-- Cellule vide -->
                </td>
                <td style="width: 40%; padding: 2px 6px; vertical-align: top;">
                    <div style="padding: 2px 0; min-height: 20px; white-space: nowrap;">
                        <span style="font-weight: bold; font-size: 12px;">Versichertennr.*:</span>
                        <span id="insurance_no_pd" style="font-size: 12px; margin-left: 10px;"></span>
                    </div>
                </td>
            </tr>
        </table>
        </div>

    <!-- Section Antrag auf Kostenübernahme - PG54 -->
    <div style="margin-bottom: 8px;">
        <h3 style="margin: 0 0 4px 0; font-size: 12px; font-weight: bold;">Antrag auf Kostenübernahme</h3>
        
        <div style="display: flex; align-items: flex-start; margin-bottom: 6px; padding: 2px; border: 1px solid #000;">
            <div style="width: 20px; height: 20px; border: 2px solid #009ee1; margin-right: 10px; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #009ee1; font-weight: bold;">X</div>
            <p style="margin: 0; font-size: 9px; line-height: 1.2;">
                Zum Verbrauch bestimmte Pflegehilfsmittel - Produktgruppe (PG 54) - bis maximal des monatlichen Höchstbetrages nach § 40 Abs. 2 SGB XI / bei Beihilfeberechtigung bis maximal der Hälfte des monatlichen Höchstbetrages nach § 40 Abs. 2 SGB XI
            </p>
        </div>

        <table style="width: 100%; border-collapse: collapse; font-size: 9px; margin-bottom: 6px;">
                <thead>
                <tr style="background-color: #f5f5f5;">
                    <th style="padding: 2px; text-align: center; font-weight: bold; width: 30%; white-space: nowrap; font-size: 9px; color: #000;">Wird grundsätzlich benötigt</th>
                    <th style="padding: 2px; text-align: left; font-weight: bold; width: 50%; font-size: 9px; color: #000;">Zum Verbrauch bestimmte Pflegehilfsmittel</th>
                    <th style="padding: 2px; text-align: center; font-weight: bold; width: 20%; font-size: 9px; color: #000;">Positionsnummer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; border-top: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_1" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                    </td>
                    <td style="border-right: 0.1px solid #000; border-top: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Saugende Bettschutzeinlagen (Einmalgebrauch)
                    </td>
                    <td style="border-right: 0.1px solid #000; border-top: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.45.01.0001
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_2" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;">X</div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Fingerlinge
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.01.0001
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_3" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Einmalhandschuhe
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.01.1001
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_4" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Partikelfiltrierende Halbmasken (FFP2 oder vergleichbare)
                        </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.01.5001
                        </td>
                    </tr>
                    <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_5" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Schutzschürzen (Einmalgebrauch)
                        </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.01.3001
                        </td>
                    </tr>
                    <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_6" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Händedesinfektionsmittel
                        </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.02.0001
                        </td>
                    </tr>
                    <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_7" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;">✓</div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Händedesinfektionstücher
                        </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.02.0014
                        </td>
                    </tr>
                    <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_8" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;">✓</div>
                    </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Flächendesinfektionsmittel
                        </td>
                    <td style="border-right: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.02.0002
                        </td>
                    </tr>
                    <tr>
                    <td style="border-left: 0.1px solid #000; border-right: 0.1px solid #000; border-bottom: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        <div id="pd_9" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin: 0 auto; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;">✓</div>
                    </td>
                    <td style="border-right: 0.1px solid #000; border-bottom: 0.1px solid #000; padding: 2px; vertical-align: top; width: 50%;">
                        Flächendesinfektionstücher
                        </td>
                    <td style="border-right: 0.1px solid #000; border-bottom: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        54.99.02.0015
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>

    <!-- Section PG51 - Wiederverwendbare Bettschutzeinlagen -->
    <div style="margin-bottom: 30px;">
        <h3 style="margin: 0 0 15px 0; font-size: 16px; font-weight: bold;">PG51 - Antrag für Wiederverwendbare Bettschutzeinlagen:</h3>
        
        <table style="width: 100%; border-collapse: collapse; font-size: 11px; margin-bottom: 20px; border: 0.1px solid #000;">
                <thead>
                <tr style="background-color: #f5f5f5;">
                    <th colspan="3" style="border: 0.1px solid #000; padding: 10px; text-align: left; font-weight: normal; color: #000;">
                        <div style="display: flex; align-items: flex-start;">
                            <div style="width: 20px; height: 20px; border: 2px solid #009ee1; margin-right: 10px; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #009ee1; font-weight: bold;">X</div>
                            <span style="font-size: 12px; line-height: 1.4;">
                                Pflegehilfsmittel zur Körperpflege/Körperhygiene (PG 51) im Wert von 26,16 € pro Stück unter Abzug eines Eigenanteils von 10 v. H. soweit keine Befreiung nach § 40 Abs. 3 Satz 5 SGB XI vorliegt.
                            </span>
                        </div>
                    </th>
                </tr>
                <tr style="background-color: #f5f5f5;">
                    <th style="border: 0.1px solid #000; padding: 2px; text-align: center; font-weight: bold; width: 20%; color: #000;">Stückzahl (nach Bedarf)</th>
                    <th style="border: 0.1px solid #000; padding: 2px; text-align: left; font-weight: bold; width: 50%; color: #000;">Pflegehilfsmittel zur Körperpflege/Körperhygiene</th>
                    <th style="border: 0.1px solid #000; padding: 2px; text-align: center; font-weight: bold; width: 30%; color: #000;">Positionsnummer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="border: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 20%;">
                        <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                            <div style="display: flex; align-items: center;">
                                <div id="bed1" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin-right: 5px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                                <span>1</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div id="bed2" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin-right: 5px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                                <span>2</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div id="bed3" style="width: 16px; height: 16px; border: 2px solid #009ee1; margin-right: 5px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #009ee1; font-weight: bold;"></div>
                                <span>3</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div id="bed4" style="width: 16px; height: 16px; background-color: #666666; border: 2px solid #666666; margin-right: 5px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #fff; font-weight: bold;">✓</div>
                                <span>4</span>
                            </div>
                        </div>
                    </td>
                    <td style="border: 0.1px solid #000; padding: 2px; text-align: left; vertical-align: top; width: 50%;">
                        Wiederverwendbare Bettschutzeinlagen
                    </td>
                    <td style="border: 0.1px solid #000; padding: 2px; text-align: center; vertical-align: top; width: 30%;">
                        51.40.01.4
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <!-- Texte d'autorisation -->
    <div style="margin-bottom: 8px; padding: 4px; background-color: #f9f9f9; border: 1px solid #ddd;">
        <p style="margin: 0; font-size: 8px; line-height: 1.2; text-align: justify;">
            Hiermit bevollmächtige ich MedicCos Inko&Care GmbH mit der Antragstellung, Belieferung und Abwicklung hinsichtlich der Gewährung von Leistungen für die Versorgung mit Pflegehilfsmitteln bei meiner zuständigen Pflegekasse in meinem Namen. Die erforderliche Kommunikation erfolgt ausschließlich durch MedicCos, welche meine Daten zum Zwecke der Leistungserbringung nutzen darf. Ich bin über mein Recht informiert worden, der Weitergabe meiner Daten an Dritte zu widerrufen. Ich befreie meine Pflegekasse von ihrer Geheimhaltungspflicht gegenüber MedicCos solange die Leistungspflicht besteht. Bitte verzeichnen Sie MedicCos als meinen Leistungserbringer für Pflegehilfsmittel und Empfänger der Kostenübernahmebestätigung der Pflegekasse und streichen Sie bereits vorhandene Leistungserbringer. Gewünschte Produkte werden von mir ausnahmslos für die ambulante private Pflege im angegebenen Umfang bezogen.
        </p>
        </div>
    <!-- Zones de signature -->
    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; padding: 0 20px;">
        <div style="text-align: center; min-width: 200px;">
            <div style="border-top: 1px solid #000; padding: 4px 0; margin-bottom: 4px; position: relative;">
                <div style="position: absolute; top: -6px; left: 50%; transform: translateX(-50%); background: white; padding: 0 4px; color: #009ee1; font-weight: bold; font-size: 12px;">X</div>
            </div>
            <div class="date" style="font-weight: 600; font-size: 10px;">Datum</div>
        </div>
        <div style="text-align: center; min-width: 200px;">
            <div style="border-top: 1px solid #000; padding: 4px 0; margin-bottom: 4px; position: relative;">
                <div style="position: absolute; top: -6px; left: 50%; transform: translateX(-50%); background: white; padding: 0 4px; color: #009ee1; font-weight: bold; font-size: 12px;">X</div>
            </div>
            <div class="signature" style="font-weight: 600; font-size: 10px;">Unterschrift Versicherte(r) oder Bevollmächtigte(r)</div>
        </div>
    </div>

    <!-- Section Genehmigung der Pflegekasse - Version compacte -->
    <div style="margin-top: 8px; border: 1px solid #ff0000; padding: 8px; position: relative;">
        <div style="position: absolute; top: -6px; left: 50%; transform: translateX(-50%); background: white; padding: 0 6px;">
            <h3 style="margin: 0; font-size: 9px; font-weight: bold; color: #333; white-space: nowrap;">
                Genehmigung der Pflegekasse
                <span style="color: #ff0000; font-size: 8px; font-weight: normal;">(wird von der Pflegekasse ausgefüllt)</span>
            </h3>
        </div>

        <!-- Options compactes -->
        <div style="display: flex; align-items: center; margin-bottom: 6px; margin-top: 12px; font-size: 8px;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <div style="width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px;"></div>
                <span>PG 54 bis 42,- €</span>
            </div>
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <div style="width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px;"></div>
                <span>PG 51 ohne Zzgl.</span>
            </div>
            <div style="display: flex; align-items: center;">
                <span style="font-weight: bold; margin-right: 6px;">IK 330303142</span>
                <div style="border-bottom: 1px solid #000; width: 80px; height: 15px;"></div>
            </div>
        </div>

        <div style="display: flex; align-items: center; margin-bottom: 6px; font-size: 8px;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <div style="width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px;"></div>
                <span>PG 54 bis 21,- €</span>
            </div>
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <div style="width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px;"></div>
                <span>PG 51 mit Zzgl.</span>
            </div>
            <div style="display: flex; align-items: center; margin-right: 15px;">
                <div style="width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px;"></div>
                <span>PG 51 Ohne Zzgl.</span>
            </div>
            <div style="display: flex; align-items: center;">
                <div style="width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px;"></div>
                <span>PG 51 mit Zzgl.</span>
            </div>
        </div>
        
        <!-- Champs de signature compacts -->
        <div style="display: flex; justify-content: space-between; margin-top: 6px; font-size: 8px;">
            <div style="display: flex; align-items: center;">
                <span style="font-weight: 600; margin-right: 6px;">Datum:</span>
                <div style="border-bottom: 1px solid #000; width: 100px; height: 15px;"></div>
            </div>
            <div style="display: flex; align-items: center;">
                <span style="font-weight: 600; margin-right: 6px;">IK/Stempel/Unterschrift:</span>
                <div style="border-bottom: 1px solid #000; width: 150px; height: 15px;"></div>
            </div>
        </div>
    </div>
        
    <!-- Pied de page -->
    <div style="margin-top: 8px; font-size: 7px; color: #333; border-top: 1px solid #ddd; padding-top: 4px; text-align: center; white-space: nowrap;">
        <strong>MedicCos Inko & Care GmbH</strong> - Lindenbergplatz 1 - 38126 Braunschweig | Tel: +49 (0) 531 51605712 | Fax: +49 (0) 531 51605713 | info@beleschbox.de | www.beleschbox.de
    </div>
</div>

<!-- Script immédiat pour s'assurer que la fonction est disponible -->
<script>
    console.log('=== IMMEDIATE SCRIPT EXECUTION ===');
    console.log('Page loaded, setting up PDF function...');
    
    // Définir la fonction exactement comme dans l'étape 4
    window.downloadOrderPdfAdmin = function(orderId) {
        console.log('downloadOrderPdfAdmin called with orderId:', orderId);
        
        // Récupérer les données de la commande
        fetch('/generate-order-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                orderId: orderId
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Order data received:', data);
            console.log('UserData:', data.orderData?.userData);
            console.log('CartData:', data.orderData?.cartData);
            console.log('SignatureData:', data.orderData?.signatureData);
            console.log('Signature image_path:', data.orderData?.signatureData?.image_path);
            console.log('Signature image_path length:', data.orderData?.signatureData?.image_path?.length);
            console.log('Signature image_path type:', typeof data.orderData?.signatureData?.image_path);
            console.log('Signature image_path starts with data:', data.orderData?.signatureData?.image_path?.startsWith('data:'));
            
            if (data && data.success && data.orderData) {
                console.log('Calling updatePDF1DataAdmin with orderData:', data.orderData);
                updatePDF1DataAdmin(data.orderData);
                
                // Utiliser exactement la même logique que printPageArea (le bon template)
                var printContents = document.getElementById('printableArea').innerHTML;
                console.log('Print contents length:', printContents.length);
                
                if (printContents.length === 0) {
                    alert('Template PDF1 vide! Vérifiez que printPageArea1 contient du contenu.');
                    return;
                }
                
                var originalContents = document.body.innerHTML;
                
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                
                console.log('PDF generation completed successfully!');
            } else {
                console.error('Data not successful:', data);
                alert('Daten konnten nicht abgerufen werden: ' + (data.error || 'Unbekannter Fehler'));
            }
        })
        .catch(error => {
            console.error('Error fetching order data:', error);
            alert('Fehler beim Abrufen der Bestelldaten');
        });
    };
    
    // Fonction pour remplir les données PDF (version corrigée)
    function updatePDF1DataAdmin(orderData) {
        console.log('=== updatePDF1DataAdmin called ===');
        console.log('Order data received:', orderData);
        
        const userData = orderData.userData || {};
        const cartData = orderData.cartData || {};
        const signatureData = orderData.signatureData || {};
        
        console.log('UserData:', userData);
        console.log('CartData:', cartData);
        console.log('SignatureData:', signatureData);
        console.log('SignatureData type:', typeof signatureData);
        console.log('SignatureData keys:', Object.keys(signatureData));
        console.log('SignatureData.image_path:', signatureData.image_path);
        console.log('SignatureData.image_path type:', typeof signatureData.image_path);
        console.log('SignatureData.image_path length:', signatureData.image_path ? signatureData.image_path.length : 'undefined');
        
        // Remplir les informations personnelles du formulaire "Antrag auf Kostenübernahme"
        console.log('Filling personal data:', userData);
        
        // Informations personnelles - avec vérification d'existence des éléments
        const fillElement = (id, value, fallback = '') => {
            const element = document.getElementById(id);
            if (element) {
                element.textContent = value || fallback;
                console.log(`Set ${id} to:`, value || fallback);
            } else {
                console.error(`Element ${id} not found!`);
            }
        };
        
        fillElement('first_name_pd', userData.first_name, 'N/A');
        fillElement('last_name_pd', userData.last_name, 'N/A');
        fillElement('street_pd', userData.street, 'N/A');
        fillElement('mobile_pd', userData.phone || userData.telephone, 'N/A');
        fillElement('zip_pd', userData.zip || userData.zipcode, 'N/A');
        fillElement('city_pd', userData.city, 'N/A');
        fillElement('email_pd', userData.email, 'N/A');
        fillElement('dob_pd', userData.dob || userData.date_of_birth, 'N/A');
        fillElement('health-insurance_pd', userData.insuranceName || userData.insurance_name, 'N/A');
        fillElement('insurance_no_pd', userData.insuranceNumber || userData.insurance_number, 'N/A');
        
        console.log('Personal data filled');
        
        // Genre - avec vérification
        const gender = userData.gender || userData.surname || '';
        if (gender.toLowerCase().includes('frau') || gender === 'Frau') {
            const frElement = document.getElementById('title_name_fr_pd');
            if (frElement) frElement.innerHTML = '✓';
        } else if (gender.toLowerCase().includes('herr') || gender === 'Herr') {
            const herElement = document.getElementById('title_name_her_pd');
            if (herElement) herElement.innerHTML = '✓';
        }
        
        // Mapping des produits prédéfinis du template PDF
        const productMapping = {
            // Mots-clés pour identifier les produits dans les noms
            'einmalhandschuhe': 1, 'gants': 1, 'handschuhe': 1, 'gloves': 1,
            'handdesinfektion': 2, 'desinfektion': 2, 'hand': 2, 'disinfectant': 2,
            'flächendesinfektion': 3, 'fläche': 3, 'surface': 3,
            'ffp2': 4, 'masken': 4, 'masks': 4, 'masque': 4,
            'bettschutzeinlagen': 5, 'bett': 5, 'bed': 5, 'protection': 5,
            'desinfektionstücher': 6, 'tücher': 6, 'wipes': 6, 'lingettes': 6
        };
        
        // Réinitialiser toutes les cases à cocher et quantités
        for (let i = 1; i <= 6; i++) {
            const checkboxElement = document.getElementById(`pd_${i}`);
            const quantityElement = document.getElementById(`qty_pd_${i}`);
            if (checkboxElement) checkboxElement.innerHTML = '';
            if (quantityElement) quantityElement.textContent = '';
        }
        
        // Remplir les produits sélectionnés dans le tableau
        if (cartData.products && Array.isArray(cartData.products)) {
            console.log('Processing products:', cartData.products);
            
            cartData.products.forEach(product => {
                const productName = (product.name || '').toLowerCase();
                const quantity = parseInt(product.quantity) || 0;
                
                console.log(`Processing product: ${productName}, quantity: ${quantity}`);
                
                // Trouver le mapping correspondant
                let mappedId = null;
                for (const [keyword, id] of Object.entries(productMapping)) {
                    if (productName.includes(keyword)) {
                        mappedId = id;
                        break;
                    }
                }
                
                if (mappedId && quantity > 0) {
                    console.log(`Mapping product ${productName} to template ID ${mappedId}`);
                    
                    // Cocher la case
                    const checkboxElement = document.getElementById(`pd_${mappedId}`);
                    if (checkboxElement) {
                        checkboxElement.innerHTML = 'X';
                    }
                    
                    // Remplir la quantité
                    const quantityElement = document.getElementById(`qty_pd_${mappedId}`);
                    if (quantityElement) {
                        // Adapter la quantité selon le type de produit
                        if (mappedId === 2 || mappedId === 3) { // Désinfectants
                            quantityElement.textContent = quantity + 'ml';
                        } else if (mappedId === 6) { // Lingettes
                            quantityElement.textContent = quantity + ' Pack';
                        } else { // Autres produits
                            quantityElement.textContent = quantity.toString();
                        }
                    }
                }
            });
        }
        
        // Remplir les Bettschutzeinlagen si sélectionnées
        const bettSchutz = userData.bett_schutz || cartData.bett_schutz || '';
        if (bettSchutz) {
            console.log('Processing Bettschutzeinlagen:', bettSchutz);
            for (let i = 1; i <= 4; i++) {
                const element = document.getElementById(`bed${i}`);
                if (element) {
                    element.innerHTML = (bettSchutz === i.toString()) ? 'X' : '';
                }
            }
        }
        
        // Remplir la signature si disponible (corrige les espaces/retours à la ligne dans le base64)
        const signatureElement = document.querySelector('.signature');
        if (signatureElement) {
            if (signatureData && signatureData.image_path) {
                let imgSrc = String(signatureData.image_path || '');
                // Certains stockages remplacent '+' par des espaces, et insèrent des retours à la ligne
                // Nettoyage: supprimer les retours et convertir les espaces en '+' dans la partie base64
                if (imgSrc.startsWith('data:')) {
                    const commaIndex = imgSrc.indexOf(',');
                    const header = imgSrc.slice(0, commaIndex + 1);
                    let b64 = imgSrc.slice(commaIndex + 1);
                    b64 = b64.replace(/\r?\n/g, '');
                    b64 = b64.replace(/\s/g, '+');
                    imgSrc = header + b64;
                }
                signatureElement.innerHTML = `
                    <div style="margin-top: 8px; width: 200px; height: 60px; border: 1px solid #ddd; padding: 4px; background: white; display: flex; align-items: center; justify-content: center;">
                        <img src="${imgSrc}" style="max-width: 100%; max-height: 100%; object-fit: contain; display: block;" alt="Signature" />
                    </div>
                    <div style="font-weight: 600; font-size: 10px; margin-top: 4px;">Unterschrift Versicherte(r) oder Bevollmächtigte(r)</div>
                `;
            } else {
                signatureElement.innerHTML = `
                    <div style="margin-top: 8px; width: 200px; height: 60px; border: 1px solid #ddd; padding: 4px; background: #f9f9f9; display: flex; align-items: center; justify-content: center;">
                        <div style="font-size: 12px; color: #999;">Keine Unterschrift vorhanden</div>
                    </div>
                    <div style="font-weight: 600; font-size: 10px; margin-top: 4px;">Unterschrift Versicherte(r) oder Bevollmächtigte(r)</div>
                `;
            }
        }
        
        // Remplir la date
        const dateElement = document.querySelector('.date');
        if (dateElement) {
            const today = new Date().toLocaleDateString('de-DE');
            dateElement.innerHTML = `
                <div style="margin-top: 8px; font-size: 10px; color: #333;">${today}</div>
                <div style="font-weight: 600; font-size: 10px;">Datum</div>
            `;
        }
        
        console.log('PDF data updated successfully with products and signature');
    }
    
    console.log('PDF function defined immediately:', typeof window.downloadOrderPdfAdmin);
</script>

    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteCustomer').modal('hide');
        })

    // Les fonctions PDF sont maintenant définies dans le script immédiat ci-dessus
</script>


@section('extraJs')
    <script>
        // Additional JavaScript if needed
    </script>
@endsection
