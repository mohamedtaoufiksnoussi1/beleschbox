<div>
    @livewire('frontend.includes.header')
    <style>
        .productOpacity {
            opacity: 0.5;
            background-color: #FFF !important;
            border-radius: 6px;
        }
    </style>
    <style>
        :root {
            --sky-blu: #009ee1;
            --red: #d95053;
        }

        body {
            padding: 15px;
            font-family: sans-serif;
            font-size: 15px;
            line-height: 25px;
        }

        .container-fluid {
            width: 100% !important;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .d-flex {
            display: flex;
        }

        .j-s-between {
            justify-content: space-between;
        }

        .heading-1 {
            color: var(--sky-blu);
            font-family: sans-serif;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .sub-heading {
            margin: 0;
            font-family: sans-serif;
        }


        .top-header {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: start;
        }

        .top-logo-sec {
            display: flex;
        }

        .logo-img {
            max-width: 200px;
            width: 100%;
            min-width: 50px;
        }


        .table-form table {
            width: 100%;
            border: 1px solid #000;
            /*		    padding: 10px;*/
        }

        .table-form table td {
            height: 50px;
            border: 1px solid #222;
            padding: 0px 10px;
        }

        .checkbox-wrap {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .checkbox {
            border: 2px solid var(--sky-blu);
            text-align: center;
            color: var(--sky-blu);
            height: 25px;
            width: 25px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-form label {
            font-weight: 600;
            margin-right: 5px;
        }

        .multiple-checkboxes {
            display: flex;
            /*		justify-content: space-evenly;*/
            max-width: 100%;
        }

        .application-div {
            display: flex;
            align-items: flex-start;
            height: 100%;
            border: 1px solid;
            padding: 10px;
        }

        .application-div p {
            margin: 0;
        }

        .table-list-form table,
        .reuseable-table table {
            width: 100%;
            margin-top: 30px;
            text-align: center;
            border: 1px solid #000;
        }

        .table-list-form th,
        .reuseable-table th {
            height: 40px;
            border-bottom: 1px solid #000;
            padding: 5px;
        }

        .table-list-form td,
        .reuseable-table td {
            height: 40px;
            padding: 5px;
        }

        .checkbox-td {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table-below-content {
            padding: 10px;
        }

        .table-below-content p {
            line-height: 28px;
        }

        .date_sign_wrap {
            display: flex;
            width: 100%;
            justify-content: space-between;
            padding: 0 10px;
        }

        .date,
        .sign {
            text-align: center;
            min-width: 200px;
            border-top: 2px solid;
            padding: 10px;
            margin-top: 50px;
        }

        .date label,
        .sign label {
            padding: 9px 0px;
        }


        .bottom-table {
            margin-top: 50px;
            border: 2px solid var(--red);
            padding: 0px 15px 15px 15px;
        }

        .bottom-table small {
            color: var(--red);
        }


        .overlap-heading {
            text-align: center;
            margin-top: -10px;
        }

        .bottom-table h3 {
            max-width: 570px;
            background: #fff;
            margin: auto;
        }

        .bottom-table table {
            width: 100%;
        }

        .attached-date-sign-wrap {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            font-size: 14px;
        }

        span.text-field {
            min-width: 200px;
            border-bottom: 2px solid #000;
            display: inline-block;
            margin-left: 20px;
        }

        .bottom-contact-list {
            list-style-type: none;
            display: flex;
            justify-content: space-between;
            padding: 0;
        }

        .bottom-contact-list li {
            font-size: 12px;
        }

        .progressbar-steps {
            margin-bottom: 1rem;
        }

        /* Style pour forcer la couleur des étapes actives */
        .progressbar-steps .step.active .step-number,
        .progressbar-steps .step.active span.step-text {
            color: #2ccdc0 !important;
        }
        
        /* Style spécifique pour s'assurer que les étapes actives sont bien colorées */
        .progressbar-steps .step.active .step-number {
            color: #2ccdc0 !important;
        }
        
        .progressbar-steps .step.active span.step-text {
            color: #2ccdc0 !important;
        }

        /* Style encore plus spécifique pour forcer la couleur */
        .progressbar-steps .step.active .step-text {
            color: #2ccdc0 !important;
        }

        /* Style pour cibler directement le span avec la classe step-text */
        .progressbar-steps .step.active span.step-text {
            color: #2ccdc0 !important;
            font-weight: bold !important;
        }

        /* Style avec une spécificité maximale pour forcer la couleur */
        div.progressbar-steps div.step.active span.step-text {
            color: #2ccdc0 !important;
        }

        /* Style inline pour forcer la couleur */
        .progressbar-steps .step.active .step-text {
            color: #2ccdc0 !important;
        }



        /* Style pour s'assurer que les étapes non-actives restent en noir */
        .progressbar-steps .step:not(.active) .step-number,
        .progressbar-steps .step:not(.active) span.step-text {
            color: #343434 !important;
        }
        


        /* Style pour forcer la couleur des étapes actives avec une spécificité très élevée */
        .progressbar-steps .step.active .step-number,
        .progressbar-steps .step.active .step-text,
        .progressbar-steps .step.active span.step-text {
            color: #2ccdc0 !important;
        }

        /* Masquer les boutons einreichen dupliqués dans les mauvaises étapes */
        #step2 .deliveryAddress,
        #step2 .signature_btn,
        #step2 .checkout_btn,
        #step2 .checkout_btn_pkg {
            display: none !important;
        }

        /* Masquer complètement la section step1 dupliquée */
        #step1:nth-of-type(2) {
            display: none !important;
        }






        .btn-back {
            border-radius: 100%;
            width: 60px;
            height: 60px;
            min-width: 60px;
        }

        .product-overview .content .product {
            justify-content: flex-start;
            padding-right: 60px;
            border-radius: 5px;
        }

        .product-overview .content .product img {
            margin-right: 2rem;
        }

        .product-overview .content .product .prod-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }


        .product-overview .content .product .prod-info .prod-name {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
        }

        .product-overview .content .product .prod-info .prod-size {
            color: #39cdc1;
        }

        .box__sixe {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 16px;
    flex-wrap: wrap;
}

        .btn__primary {
            white-space: nowrap !important;
            word-wrap: normal !important;
            overflow: visible !important;
            min-width: 280px !important;
            padding: 12px 20px !important;
            font-size: 16px !important;
        }

        /* CSS SIMPLE ET EFFICACE */
        .cure-box-modal-content .prod-count span {
            width: 50px !important;
            height: 50px !important;
            border: 2px solid #39cdc1 !important;
            border-radius: 8px !important;
            background: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .cure-box-modal-content .prod-count span p {
            color: transparent !important;
            font-size: 18px !important;
            font-weight: bold !important;
            margin: 0 !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }

        .cure-box-modal-content .prod-count input[type="radio"]:checked + span {
            background: #39cdc1 !important;
        }

        .cure-box-modal-content .prod-count input[type="radio"]:checked + span p {
            color: #ffffff !important;
        }

        /* FORCER L'AFFICHAGE DES NUMÉROS AVEC PSEUDO-ÉLÉMENTS */
        .cure-box-modal-content .product-count-list .lengend-action-buttons:nth-child(1) .prod-count span::after {
            content: "1";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #333;
            font-size: 18px;
            font-weight: bold;
            z-index: 1000;
            text-align: center;
            line-height: 1;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cure-box-modal-content .product-count-list .lengend-action-buttons:nth-child(2) .prod-count span::after {
            content: "2";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #333;
            font-size: 18px;
            font-weight: bold;
            z-index: 1000;
            text-align: center;
            line-height: 1;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cure-box-modal-content .product-count-list .lengend-action-buttons:nth-child(3) .prod-count span::after {
            content: "3";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #333;
            font-size: 18px;
            font-weight: bold;
            z-index: 1000;
            text-align: center;
            line-height: 1;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cure-box-modal-content .product-count-list .lengend-action-buttons:nth-child(4) .prod-count span::after {
            content: "4";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #333;
            font-size: 18px;
            font-weight: bold;
            z-index: 1000;
            text-align: center;
            line-height: 1;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* CHANGEMENT DE COULEUR POUR LES CASES SÉLECTIONNÉES */
        .cure-box-modal-content .prod-count input[type="radio"]:checked + span::after {
            color: #ffffff !important;
        }

        /*@media only screen and (min-width:768px){
            .multiple-checkboxes{
                max-width: 33%;
            }
        }*/

        /* MODERNISATION DE LA PAGE PERSONAL DATA */
        #step2 {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px;
            padding: 40px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        #step2 h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        #step2 p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #495057;
            margin-bottom: 30px;
        }

        .why-asking {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 15px;
            padding: 20px;
            margin: 25px 0;
            border-left: 5px solid #009ee1;
            box-shadow: 0 5px 15px rgba(0, 158, 225, 0.1);
        }

        .why-asking span {
            font-weight: 600;
            color: #009ee1;
            font-size: 1.1rem;
        }

        .iAm-question {
            color: #009ee1;
            font-size: 1.2rem;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .iAm-question:hover {
            transform: scale(1.2);
            color: #0077b3;
        }

        .iAm-question-ans {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
        }

        .iAm-question-ans h5 {
            color: #009ee1;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .iAm-question-ans p {
            color: #495057;
            line-height: 1.6;
            margin: 0;
        }

        #iAm h5 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            position: relative;
        }

        #iAm h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-check-inline {
            margin-right: 20px;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #009ee1;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #009ee1;
            border-color: #009ee1;
            box-shadow: 0 0 0 3px rgba(0, 158, 225, 0.2);
        }

        .form-check-label {
            font-weight: 500;
            color: #333;
            margin-left: 8px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .form-check-label:hover {
            color: #009ee1;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .form-control:focus {
            border-color: #009ee1;
            box-shadow: 0 0 0 3px rgba(0, 158, 225, 0.1);
            outline: none;
        }

        .form-control:hover {
            border-color: #009ee1;
        }

        .insured_error_msg,
        .title_name_error_msg,
        .first_name_error_msg,
        .last_name_error_msg,
        .streetno_error_msg,
        .houseno_error_msg {
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 5px;
            display: block;
        }
    </style>

    <!-- ========================
       page title
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/page-titles/1.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading"></h1>
                    <p class="pagetitle__desc"></p>
                </div>
            </div>
        </div>
    </section>


    @php
    $carts = [];
    $carts = Session::get('cart');
    @endphp

    <div class="section-padding">
        <div class="container progressbar">
		
			<div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="pagetitle__heading" id="current-step-title">{{ $steps[0]['title'] }}</h1>
                        <p class="pagetitle__desc" id="current-step-description">{{ $steps[0]['description'] }}</p>
                    </div>
                </div>
            </div>
			
            <div class="progressbar-steps">

                <button onclick="getSetpData()" class="btn btn-info btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

                <div class="step step1">
                    <span class="step-text">Box wählen</span>
                    <div class="step-number"><span>1</span></div>
                    <div class="step-divider"></div>
                </div>
                @if(Route::currentRouteName() != 'assemble')
                <div class="step step2 active">
                    <span class="step-text">Personal Data</span>
                    <div class="step-number"><span>2</span></div>
                    <div class="step-divider"></div>
                </div>

                @else
                <div class="step step2">
                    <span class="step-text">Personal Data</span>
                    <div class="step-number"><span>2</span></div>
                    <div class="step-divider"></div>
                </div>
                @endif
                <div class="step step3">
                    <span class="step-text">Delivery Adress</span>
                    <div class="step-number"><span>3</span></div>
                    <div class="step-divider"></div>
                </div>
                <div class="step step4">
                    <span class="step-text">summary + signature</span>
                    <div class="step-number"><span>4</span></div>
                    <div class="step-divider"></div>
                </div>
                <div class="step step5">
                    <span class="step-text">Confirmation</span>
                    <div class="step-number"><span>5</span></div>
                </div>
            </div>



            @if(Route::currentRouteName() != 'assemble')
            <div id="step1" style="display: none" data-step1="0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-wrapper">
                            <div class="product-overview mt-2">
                                <div class="header">
                                    <i class="fas fa-box"></i>
                                    <h5>Unsere Produkte</h5>
                                </div>
                                <div class="content">
                                    @foreach(getAllProducts() as $product)
                                    <div class="product mb-3 uniqueClass" id="productId{{$product->id}}" data-id="{{$product->price}}" onClick="getProduct('{{$product->id}}')">
                                        <img src="{{asset('storage/'.$product->image)}}">
                                        <div class="prod-info">
                                            <div class="prod-name">{{$product->name}}</div>
                                            <div class="prod-size">{{$product->product_title}}</div>
                                        </div>
                                        <div class="prod-btn">
                                            <i class="fas fa-plus-circle"></i>
                                        </div>
                                        {{--$product->price--}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-overview mt-2">
                                <div class="header">
                                    <i class="fas fa-box"></i>
                                    <h5>Ihre BeleschBox</h5>
                                    <input type="hidden" class="cartPriceValue" value="0">
                                    <div class="hint">
                                        <span>42 &euro;</span>
                                    </div>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="receiver"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center mt-3">

                        @if(isset($_GET['updt']))
                        <a href="{{url('update-cart-order')}}" class="btn btn__primary btn__rounded">Weiter zu Ihren Kontaktdaten</a>
                        @else
                        <button type="button" class="btn btn__primary btn__rounded bed_protector_modal">Weiter zu Ihren Kontaktdaten</button>
                        @endif
                       

                        <!-- Modal -->
                        <div class="modal " style="display: none" id="bed_protector_modal" tabindex="-1" aria-labelledby="add_bed_protector" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header d-block text-center position-relative">
                                        <button type="button" class="btn-close position-absolute" style="top: 10px; right: 15px; z-index: 1050;" onclick="closeBedProtectorModal()" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="add_bed_protector">Wiederverwendbare
                                            Bettschutzeinlagen</h4>
                                        <p>Bis zu 250 Mal waschbar.</p>

                                    </div>
                                    <div class="modal-body">
                                        <div class="cure-box-modal-content">
                                            <img src="{{asset('frontend/assets/images/backgrounds/produkt-wiederverwbettschutzeinl.png')}}" class="img-fluid">
                                            <div class="image-content">
                                                <h6>Zusätzlich zu Ihren 42€</h6>
                                                <h4>Extra Schutz für 0,00€</h4>
                                                <p>statt 26,16€ pro Stück</p>
                                            </div>
                                            <h6>Wie viele Bettschutzeinlagen möchten Sie kostenfrei erhalten?</h6>
                                            <div class="product-count-list">
                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart0011day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" onchange="pdBedProtection()" id="d3_graph_chart0011day" value="1">
                                                        <span>
                                                            <p>1</p>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart0017day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" onchange="pdBedProtection()" id="d3_graph_chart0017day" value="2">
                                                        <span>
                                                            <p>2</p>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart00130day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" onchange="pdBedProtection()" id="d3_graph_chart00130day" value="3">
                                                        <span>
                                                            <p>3</p>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart00190day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" id="d3_graph_chart00190day" onchange="pdBedProtection()" value="4">
                                                        <span>
                                                            <p>4</p>
                                                        </span>
                                                    </label>
                                                </div>

                                            </div>
                                            <p><i class="fa fa-exclamation-circle"> </i> You can apply for up to 4
                                                bed
                                                protectors once a year.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn_secondary btn__rounded without-bed-protection">Weiter
                                            ohne
                                            Bettschutzeinlagen
                                        </button>
                                        <button type="button" class="btn btn__primary btn__rounded with-bed-protection">
                                            Weiter mit
                                            Bettschutzeinlagen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal ends-->
                    </div>
                </div>
            </div>
            <div id="step2" style="display: block" data-step2="0">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h2>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Personal
                                    Data</font>
                            </font>
                        </h2>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Your box is
                                    created. </font>
                                <font style="vertical-align: inherit;">Now submit your personal
                                    data
                                    so that we can contact you for further application and processing of the
                                    curabox. </font>
                                <font style="vertical-align: inherit;">After saving your contact
                                    details, you can enter all other data at your leisure. </font>
                                <font style="vertical-align: inherit;">You have not yet submitted an
                                    order.</font>
                            </font>
                        </p>
                    </div>


                    <div id="basket-form">
                        <div class="col-md-12 why-asking">
                            <span>Warum fragen wir das? </span><a class="fa fa-question iAm-question"></a>
                            <div class="iAm-question-ans" style="top: -50px; display: none;">
                                <h5>Beantragung der curabox</h5>
                                <p>Ihre Kontaktdaten benötigen wir zur weiteren Beantragung und für Rückfragen im
                                    Rahmen
                                    Ihrer kostenlosen Versorgung mit Pflegehilfsmitteln. Sie senden mit der Angabe
                                    Ihrer
                                    Daten in diesem Schritt noch keine Bestellung ab.</p>
                            </div>
                        </div>
                        <div class="col-md-12 " id="iAm">
                            <h5 class="mb-50 ">Ich bin*</h5>
                            @if(\Session::get('Customer'))
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="optperson()" name="insured" id="inlineRadio1" value="Versicherter" @if(\Session::get('Customer')->surname =="Versicherter") checked @endif
                                    <label class="form-check-label" for="inlineRadio1">Versicherter</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insured" onclick="optperson()" id="inlineRadio2" value="Pflegeperson" @if(\Session::get('Customer')->surname =="Pflegeperson") checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Angehöriger /
                                        Pflegeperson</label>
                                </div>
                                <span class="insured_error_msg" style="color: red;"></span>
                            </div>
                            @else
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="optperson()" name="insured" id="inlineRadio1" value="Versicherter" checked>
                                    <label class="form-check-label" for="inlineRadio1">Versicherter</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insured" onclick="optperson()" id="inlineRadio2" value="Pflegeperson">
                                    <label class="form-check-label" for="inlineRadio2">Angehöriger /
                                        Pflegeperson</label>
                                </div>
                                <span class="insured_error_msg" style="color: red;"></span>
                            </div>
                            @endif

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title_name" id="inlineRadio3" value="Herr" @if(\Session::get('Customer')->surname =="Pflegeperson") checked @endif>
                                    <label class="form-check-label" for="inlineRadio3">Herr</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title_name" id="inlineRadio4" value="Frau">
                                    <label class="form-check-label" for="inlineRadio4">Frau</label>
                                </div>
                                <span class="title_name_error_msg" style="color: red;"></span>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">Vorname Der Versicherte</label>
                                    <input type="text" class="form-control" id="first_name" @if(isset($customer_sess['firstName'])) value="{{$customer_sess['firstName']}}" @endif>
                                    <span class="first_name_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Nachname Der Versicherte</label>
                                    <input type="text" class="form-control" id="last_name" @if(isset($customer_sess['lastName'])) value="{{$customer_sess['lastName']}}" @endif>
                                    <span class="last_name_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="email2" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email2" @if(isset($customer_sess['email'])) value="{{$customer_sess['email']}}" @endif>
                                    <span class="email2_error_msg" style="color: red;"></span>
                                </div>
                                @if(Session::get('Customer'))
                                <input type="hidden" name="password" id="password" @if(isset($customer_sess['view_password'])) value="{{$customer_sess['view_password']}}" @endif>
                                @else
                                <div class="col-md-6 mt-2">
                                    <label for="password2" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" @if(isset($customer_sess['view_password'])) value="{{$customer_sess['view_password']}}" @endif>
                                    <span class="password_error_msg" style="color: red;"></span>
                                </div>
                                @endif
                                <div class="col-md-8 mt-2">
                                    <label for="streetno" class="form-label">Strasse</label>
                                    <input type="text" class="form-control" id="streetno" @if(isset($customer_sess['street'])) value="{{$customer_sess['street']}}" @endif>
                                    <span class="streetno_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="houseno" class="form-label">Hausnummer</label>
                                    <input type="text" class="form-control" id="houseno" @if(isset($customer_sess['houseNo'])) value="{{$customer_sess['houseNo']}}" @endif>
                                    <span class="houseno_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="zip" class="form-label">PLZ</label>
                                    <input type="text" class="form-control" id="zip" @if(isset($customer_sess['zipcode'])) value="{{$customer_sess['zipcode']}}" @endif>
                                    <span class="zip_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-8 mt-2">
                                    <label for="city" class="form-label">Ort</label>
                                    <input type="text" class="form-control" id="city" @if(isset($customer_sess['city'])) value="{{$customer_sess['city']}}" @endif>
                                    <span class="city_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="Gaburtadatum" class="form-label">Gaburtadatum</label>
                                    <input type="date" class="form-control" id="Gaburtadatum" @if(isset($customer_sess['dob'])) value="{{$customer_sess['dob']}}" @endif>
                                    <span class="gaburtadatum_error_msg" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="mt-50 ">Kontakt Daten</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="telno" class="form-label">telefunnummer</label>
                                    <input type="text" class="form-control" id="telno" @if(isset($customer_sess['telephone'])) value="{{$customer_sess['telephone']}}" @endif>
                                    <span class="telno_error_msg" style="color: red;"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" @if(isset($customer_sess['view_password'])) value="{{$customer_sess['view_password']}}" @endif>
                                    <span class="password2_error_msg" style="color: red;"></span>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="mt-50 ">Angaben Zur Krankenkasse</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-tooltip">
                                        <label for="health-insurance" class="form-label ">Krankenkasse</label>
                                        <div class="tooltip-img-wrap">
                                            <img src="{{asset('frontend/assets/images/banners/Krankenkasse_Nummer.png')}}" class="tooltip-img">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="health-insurance" @if(isset($customer_sess['insuranceName'])) value="{{$customer_sess['insuranceName']}}" @endif>
                                    <span class="hinsurance_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-tooltip">
                                        <label for="insurance-no" class="form-label form-label-tooltip">Versichertennummer </label>
                                        <div class="tooltip-img-wrap">
                                            <img src="{{asset('frontend/assets/images/banners/versicherungsnummer.png')}}" class="tooltip-img">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="insurance-no" placeholder="This number is always 10 digits" @if(isset($customer_sess['insuranceNumber'])) value="{{$customer_sess['insuranceNumber']}}" @endif>
                                    <span class="insuranceno_error_msg" style="color: red;"></span>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="insurance-no" class="form-label">Krankenkasse Nummer </label>
                                    <input type="text" class="form-control" id="KrankenkasseNummer" placeholder="This number is always 10 digits" @if(isset($customer_sess['healthInsuranceNo'])) value="{{$customer_sess['healthInsuranceNo']}}" @endif>
                                    <span class="krankenkasse_error_msg" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="row optional d-none">
                                <div class="col-md-12">
                                    <h5 class="mt-50 ">Kontaktdaten Angehöriger/Pflegeperson</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="carer-name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="carer-name">
                                </div>
                                <div class="col-md-6">
                                    <label for="carer-no" class="form-label">Telefonnummer</label>
                                    <input type="text" class="form-control" id="carer-no" @if(isset($customer_sess['telephone'])) value="{{$customer_sess['telephone']}}" @endif>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="carer-mail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="carer-mail" @if(isset($customer_sess['email'])) value="{{$customer_sess['email']}}" @endif>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 why-asking">
                            <span>Warum fragen wir das? </span><a class="fa fa-question insured-question"></a>
                            <div class="insured-question-ans">
                                <h5>Kostenübernahme mit Ihrer Pflegekasse</h5>
                                <p>Die Beantragung und Abwicklung der Kostenübernahme mit Ihrer Pflegekasse
                                    übernimmt
                                    das Team der curabox für Sie. Für gesetzliche Versicherte entstehen keinerlei
                                    Kosten. Privatpatienten gehen in Vorleistung und beantragen die Erstattung der
                                    Kosten der curabox bei Ihrer Pflegekasse selbst. Sie haben nach § 40 Abs. 3 Satz
                                    5
                                    SGB XI einen Anspruch auf volle Rückerstattung.</p>
                            </div>
                        </div>
                        <div class="col-md-12 " id="insured">
                            <h5 class="mb-50 ">Der Versicherte ist</h5>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio1" value="option5">
                                    <label class="form-check-label" for="inlineRadio5">Gesetzlich versichert
                                        (Kostenübernahme durch die Pflegekasse)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio2" value="option6">
                                    <label class="form-check-label" for="inlineRadio6">Privat versichert</label>
                                </div>

                                <span class="inlineRadioOptions5_error_msg" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3" id="pflegegrad">
                            <h5 class="mb-50 ">Pflegegrad</h5>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="pflegegrad" id="pflegegrad1" value="1" checked>
                                    <label class="form-check-label" for="pflegegrad1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pflegegrad" id="pflegegrad2" value="2">
                                    <label class="form-check-label" for="pflegegrad2">2</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pflegegrad" id="pflegegrad3" value="3">
                                    <label class="form-check-label" for="pflegegrad3">3</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pflegegrad" id="pflegegrad4" value="4">
                                    <label class="form-check-label" for="pflegegrad4">4</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pflegegrad" id="pflegegrad5" value="5">
                                    <label class="form-check-label" for="pflegegrad5">5</label>
                                </div>
                                
                                <!-- Champ caché pour stocker le Pflegegrad -->
                                <input type="hidden" id="selected_pflegegrad" name="selected_pflegegrad" value="1">
                                
                                <!-- Bouton de test pour initialiser les Pflegegrad -->
                

                            </div>
                        </div>

                        <!-- CHECKBOX WITH CONDITION -->

                        <div class="col-md-12">
                            <div class="condition-check-wrap">
                                <input type="checkbox" id="condition-chcek" name="condition_chcek"><label for="condition-chcek">
                                    <span class="condition_chcek_error_msg" style="color: red;"></span>
                                    Hiermit
                                    stimme ich zu, dass pflege.de (web care LBJ GmbH) meine personenbezogenen (ggf.
                                    auch
                                    gesundheitsbezogenen) Informationen, v.a. Kontaktinfos/Versichertenstatus, für
                                    die
                                    Bearbeitung des Antrages (zum Erhalt der Pflegehilfsmittel) sowie für eine
                                    Kontaktaufnahme in diesem Zusammenhang via E-Mail speichert und verarbeitet.<br>

                                    Hinweis: Die Zustimmung ist freiwillig und kann jederzeit mit Wirkung für die
                                    Zukunft per E-Mail an <a href="#">betroffenenrechte@pflege.de</a> widerrufen
                                    werden.
                                    Im Falle eines Widerrufs können wir Ihnen gegenüber die entsprechenden
                                    Serviceleistungen nicht mehr erbringen. Weitere Informationen zum Datenschutz
                                    finden
                                    Sie <a href="#">hier.</a></label>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <p class="mt-30 mb-5">Sie senden noch keine Bestellung ab</p>
                            <button class="btn btn__primary btn__rounded second-button">Weiter im Antrag</button>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div id="step1" style="display: block">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-wrapper">
                            <div class="product-overview mt-2">
                                <div class="header">
                                    <i class="fas fa-box"></i>
                                    <h5>Unsere Produkte</h5>
                                </div>
                                <div class="content">
                                    @foreach(getAllProducts() as $product)
                                    <div class="product mb-3 uniqueClass" id="productId{{$product->id}}" data-id="{{$product->price}}" onclick="getProduct('{{$product->id}}')">
                                        <img src="{{asset('storage/'.$product->image)}}">
                                        <div class="prod-info">
                                            <div class="prod-name">{{$product->name}}</div>
                                            <div class="prod-size">{{$product->product_title}}</div>
                                        </div>
                                        <div class="prod-btn">
                                            <i class="fas fa-plus-circle"></i>
                                        </div>
                                        {{--$product->price--}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @php
                            $total_amount = getCartPrice($carts);
                            $get_perctage = 100 * $total_amount / 42;
                            @endphp
                            <div class="product-overview mt-2">
                                <div class="header">
                                    <i class="fas fa-box"></i>
                                    <h5>Ihre curabox</h5>
                                    <input type="hidden" class="cartPriceValue" value="{{$total_amount}}">
                                    <div class="hint">
                                        <span>42 &euro;</span>
                                    </div>

                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 20px high" style="width: {{$get_perctage}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="receiver">
                                    @if(Session::has('cart'))
                                    @php
                                    $carts = Session::get('cart');
                                    @endphp
                                    @foreach($carts as $cart)
                                    <?php //print_r($cart)
                                    ?>
                                    <div data-id="1" class="content border-1 cartItem recProduct{{$cart['product']['id']}}">
                                        <div class="product mb-3">
                                            <img src="{{URL::asset('storage/'.$cart['product']['image'])}}">
                                            <div class="prod-info">
                                                <div class="prod-name">{{$cart['product']['name']}}</div>
                                                <div class="prod-size">{{$cart['product']['product_title']}}</div>
                                            </div>
                                            <div class="prod-btn" onclick="less({{$cart['product']['id']}})"><span class="qty quantity{{$cart['product']['id']}}">{{$cart['quantity']}}</span>
                                                <input type="hidden" id="qty_p_{{$cart['product']['id']}}" value="1"><input type="hidden" class="cartPrice" id="price_p_{{$cart['product']['id']}}" value="{{$cart['product']['price']}}"><i class="fas fa-minus-circle"></i>
                                            </div>
                                        </div>
                                        @if(stripos($cart['product']['name'], 'handschuh') !== false || stripos($cart['product']['name'], 'glove') !== false || stripos($cart['product']['name'], 'gant') !== false)
                                        <div class="glove-options">
                                            <div class="d-flex"><img src="{{URL::asset('frontend/assets/images/icon-handschuh.svg')}}"><label>Welche Handschuhgröße haben Sie?</label></div>
                                        </div>
                                        @endif

                                        @if(stripos($cart['product']['name'], 'handschuh') !== false || stripos($cart['product']['name'], 'glove') !== false || stripos($cart['product']['id'], 'gant') !== false)
                                        @if($cart['product']['size_availability'] != '')
                                        @php
                                        $size_arr = explode (",", $cart['product']['size_availability']);
                                        @endphp
                                    <div class="box__sixe">
                                        @foreach($size_arr as $key=>$size)
                                        <div class="base-click-box size1" id="bx-1">
                                            <div class="productss" id="checkData-{{$cart['product']['id']}}">

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label class="prod-count" style="display: inline-block; margin: 0 8px; cursor: pointer;" for="d3_graph_chart{{$cart['product']['id']}}{{$size}}">
                                                        <input onclick="fetchSize({{$cart['product']['id']}})" class="SIZE{{$key}}" id="d3_graph_chart{{$cart['product']['id']}}{{$size}}" name="size{{$cart['product']['id']}}" type="radio" value="{{$size}}" style="display: none;">
                                                        <div style="width: 64px; height: 64px; background: #ffffff; border: 2px solid #39cdc1; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 700; color: #111111; transition: all 0.3s ease; cursor: pointer;" class="size-box" onclick="changeSize(this)">
                                                            {{$size}}
                                                        </div>
                                                    </label>
                                                </div>


                                            </div>
                                        </div>
                                        @endforeach
                                        </div>
                                        @endif
                                        @endif


                                    </div>
                                    @endforeach
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center mt-3">

                    @if(isset($_GET['updt']))
                        <a href="{{url('update-cart-order')}}" class="btn btn__primary btn__rounded">Weiter zu Ihren Kontaktdaten</a>
                        @else
                        <button type="button" class="btn btn__primary btn__rounded bed_protector_modal">Weiter zu Ihren Kontaktdaten</button>
                        @endif
                       

                        <!-- Modal -->
                        <div class="modal " style="display: none" id="bed_protector_modal" tabindex="-1" aria-labelledby="add_bed_protector" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header d-block text-center position-relative">
                                        <button type="button" class="btn-close position-absolute" style="top: 10px; right: 15px; z-index: 1050;" onclick="closeBedProtectorModal()" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="add_bed_protector">Wiederverwendbare
                                            Bettschutzeinlagen</h4>
                                        <p>Bis zu 250 Mal waschbar.</p>

                                    </div>
                                    <div class="modal-body">
                                        <div class="cure-box-modal-content">
                                            <img src="{{asset('frontend/assets/images/backgrounds/produkt-wiederverwbettschutzeinl.png')}}" class="img-fluid">
                                            <div class="image-content">
                                                <h6>Zusätzlich zu Ihren 42€</h6>
                                                <h4>Extra Schutz für 0,00€</h4>
                                                <p>statt 26,16€ pro Stück</p>
                                            </div>
                                            <h6>Wie viele Bettschutzeinlagen möchten Sie kostenfrei erhalten?</h6>
                                            <div class="product-count-list">
                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart0011day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" onchange="pdBedProtection()" id="d3_graph_chart0011day" value="1">
                                                        <span>
                                                            <p>1</p>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart0017day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" onchange="pdBedProtection()" id="d3_graph_chart0017day" value="2">
                                                        <span>
                                                            <p>2</p>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart00130day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" onchange="pdBedProtection()" id="d3_graph_chart00130day" value="3">
                                                        <span>
                                                            <p>3</p>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="lengend-action-buttons lengend-action-buttons-first">
                                                    <label for="d3_graph_chart00190day" class="prod-count">
                                                        <input type="radio" name="number_of_bed" id="d3_graph_chart00190day" onchange="pdBedProtection()" value="4">
                                                        <span>
                                                            <p>4</p>
                                                        </span>
                                                    </label>
                                                </div>

                                            </div>
                                            <p><i class="fa fa-exclamation-circle"> </i> You can apply for up to 4
                                                bed
                                                protectors once a year.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn_secondary btn__rounded without-bed-protection">Weiter
                                            ohne
                                            Bettschutzeinlagen
                                        </button>
                                        <button type="button" class="btn btn__primary btn__rounded with-bed-protection">
                                            Weiter mit
                                            Bettschutzeinlagen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal ends-->
                    </div>
                </div>
            </div>
            <div id="step2" style="display: none" data-step21="0">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h2>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Personal
                                    Data</font>
                            </font>
                        </h2>
                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Your box is
                                    created. </font>
                                <font style="vertical-align: inherit;">Now submit your personal
                                    data
                                    so that we can contact you for further application and processing of the
                                    curabox. </font>
                                <font style="vertical-align: inherit;">After saving your contact
                                    details, you can enter all other data at your leisure. </font>
                                <font style="vertical-align: inherit;">You have not yet submitted an
                                    order.</font>
                            </font>
                        </p>
                    </div>


                    <div id="basket-form">
                        <div class="col-md-12 why-asking">
                            <span>Warum fragen wir das? </span><a class="fa fa-question iAm-question"></a>
                            <div class="iAm-question-ans" style="top: -50px; display: none;">
                                <h5>Beantragung der curabox</h5>
                                <p>Ihre Kontaktdaten benötigen wir zur weiteren Beantragung und für Rückfragen im
                                    Rahmen
                                    Ihrer kostenlosen Versorgung mit Pflegehilfsmitteln. Sie senden mit der Angabe
                                    Ihrer
                                    Daten in diesem Schritt noch keine Bestellung ab.</p>
                            </div>
                        </div>
                        <div class="col-md-12 " id="iAm">
                            <h5 class="mb-50 ">Ich bin*</h5>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="optperson()" name="insured" id="inlineRadio1" value="Versicherter" checked>
                                    <label class="form-check-label" for="inlineRadio1">Versicherter</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insured" onclick="optperson()" id="inlineRadio2" value="Pflegeperson">
                                    <label class="form-check-label" for="inlineRadio2">Angehöriger /
                                        Pflegeperson</label>
                                </div>
                                <span class="insured_error_msg" style="color: red;"></span>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title_name" id="inlineRadio3" value="Herr" checked>
                                    <label class="form-check-label" for="inlineRadio3">Herr</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title_name" id="inlineRadio4" value="Frau">
                                    <label class="form-check-label" for="inlineRadio4">Frau</label>
                                </div>
                                <span class="title_name_error_msg" style="color: red;"></span>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">Vorname Der Versicherte</label>
                                    <input type="text" class="form-control" id="first_name" @if(isset($customer_sess['firstName'])) value="{{$customer_sess['firstName']}}" @endif>
                                    <span class="first_name_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Nachname Der Versicherte</label>
                                    <input type="text" class="form-control" id="last_name" @if(isset($customer_sess['lastName'])) value="{{$customer_sess['lastName']}}" @endif>
                                    <span class="last_name_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="Geburtsdatum" class="form-label">Geburtsdatum</label>
                                    <input type="date" class="form-control" id="Geburtsdatum" @if(isset($customer_sess['dob'])) value="{{$customer_sess['dob']}}" @endif>
                                    <span class="geburtsdatum_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-8 mt-2">
                                    <label for="city" class="form-label">Ort</label>
                                    <input type="text" class="form-control" id="city" @if(isset($customer_sess['city'])) value="{{$customer_sess['city']}}" @endif>
                                    <span class="city_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="email2" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email2" @if(isset($customer_sess['email'])) value="{{$customer_sess['email']}}" @endif>
                                    <span class="email2_error_msg" style="color: red;"></span>
                                </div>
                                @if(\Session::get('Customer'))
                                <input type="hidden" name="password" id="password" @if(isset($customer_sess['view_password'])) value="{{$customer_sess['view_password']}}" @endif>
                                @else
                                <div class="col-md-6 mt-2">
                                    <label for="password2" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" @if(isset($customer_sess['view_password'])) value="{{$customer_sess['view_password']}}" @endif>
                                    <span class="password_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" @if(isset($customer_sess['view_password'])) value="{{$customer_sess['view_password']}}" @endif>
                                    <span class="password2_error_msg" style="color: red;"></span>
                                </div>
                                @endif

                                <div class="col-md-4 mt-2">
                                    <label for="Pflegegrad" class="form-label">Pflegegrad</label>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Pflegegrad" id="inlineRadio1" value="Pflegegrad1" checked>
                                            <label class="form-check-label" for="inlineRadio5">Pflegegrad 1</label>
                                        </div>
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="Pflegegrad" id="Pflegegrad" value="Pflegegrad2">
                                            <label class="form-check-label" for="inlineRadio6">Pflegegrad 2</label>
                                        </div>
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="Pflegegrad" id="Pflegegrad" value="Pflegegrad3">
                                            <label class="form-check-label" for="inlineRadio6">Pflegegrad 3</label>
                                        </div>
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="Pflegegrad" id="Pflegegrad" value="Pflegegrad4">
                                            <label class="form-check-label" for="inlineRadio6">Pflegegrad 4</label>
                                        </div>
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="Pflegegrad" id="Pflegegrad" value="Pflegegrad5">
                                            <label class="form-check-label" for="inlineRadio6">Pflegegrad 5</label>
                                        </div>
                                        <span class="pflegegrad_error_msg" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="mt-50 ">Kontakt Daten</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="telno" class="form-label">telefunnummer</label>
                                    <input type="text" class="form-control" id="telno" @if(isset($customer_sess['telephone'])) value="{{$customer_sess['telephone']}}" @endif>
                                    <span class="telno_error_msg" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <label for="streetno" class="form-label">Strasse</label>
                                    <input type="text" class="form-control" id="streetno" @if(isset($customer_sess['street'])) value="{{$customer_sess['street']}}" @endif>
                                    <span class="streetno_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="houseno" class="form-label">Hausnummer</label>
                                    <input type="text" class="form-control" id="houseno" @if(isset($customer_sess['houseNo'])) value="{{$customer_sess['houseNo']}}" @endif>
                                    <span class="houseno_error_msg" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="zip" class="form-label">PLZ</label>
                                    <input type="text" class="form-control" id="zip" @if(isset($customer_sess['zipcode'])) value="{{$customer_sess['zipcode']}}" @endif>
                                    <span class="zip_error_msg" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="mt-50 ">Angaben Zur Krankenkasse</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-tooltip">
                                        <label for="health-insurance" class="form-label ">Krankenkasse</label>

                                    </div>
                                    <input type="text" class="form-control" id="health-insurance" @if(isset($customer_sess['insuranceName'])) value="{{$customer_sess['insuranceName']}}" @endif>
                                    <span class="hinsurance_error_msg" style="color: red;"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-tooltip">
                                        <label for="insurance-no" class="form-label form-label-tooltip">Versichertennummer </label>
                                        <div class="tooltip-img-wrap">
                                            <img src="{{asset('frontend/assets/images/banners/versicherungsnummer.png')}}" class="tooltip-img">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="insurance-no" placeholder="This number is always 10 digits" @if(isset($customer_sess['insuranceNumber'])) value="{{$customer_sess['insuranceNumber']}}" @endif>
                                    <span class="insuranceno_error_msg" style="color: red;"></span>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="form-label-tooltip">
                                        <label for="insurance-no" class="form-label ">Krankenkasse Nummer</label>
                                        <div class="tooltip-img-wrap">
                                            <img src="{{asset('frontend/assets/images/banners/Krankenkasse_Nummer.png')}}" class="tooltip-img">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="KrankenkasseNummer" placeholder="This number is always 10 digits" @if(isset($customer_sess['healthInsuranceNo'])) value="{{$customer_sess['healthInsuranceNo']}}" @endif>
                                    <span class="krankenkasse_error_msg" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="row optional d-none">
                                <div class="col-md-12">
                                    <h5 class="mt-50 ">Kontaktdaten Angehöriger/Pflegeperson</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="carer-name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="carer-name">
                                </div>
                                <div class="col-md-6">
                                    <label for="carer-no" class="form-label">Telefonnummer</label>
                                    <input type="text" class="form-control" id="carer-no">
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="carer-mail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="carer-mail">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 why-asking">
                            <span>Warum fragen wir das? </span><a class="fa fa-question insured-question"></a>
                            <div class="insured-question-ans">
                                <h5>Kostenübernahme mit Ihrer Pflegekasse</h5>
                                <p>Die Beantragung und Abwicklung der Kostenübernahme mit Ihrer Pflegekasse
                                    übernimmt
                                    das Team der curabox für Sie. Für gesetzliche Versicherte entstehen keinerlei
                                    Kosten. Privatpatienten gehen in Vorleistung und beantragen die Erstattung der
                                    Kosten der curabox bei Ihrer Pflegekasse selbst. Sie haben nach § 40 Abs. 3 Satz
                                    5
                                    SGB XI einen Anspruch auf volle Rückerstattung.</p>
                            </div>
                        </div>
                        <div class="col-md-12 " id="insured">
                            <h5 class="mb-50 ">Der Versicherte ist</h5>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio1" value="option5">
                                    <label class="form-check-label" for="inlineRadio5">Gesetzlich versichert
                                        (Kostenübernahme durch die Pflegekasse)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio2" value="option6">
                                    <label class="form-check-label" for="inlineRadio6">Privat versichert</label>
                                </div>
                            </div>
                            <span class="inlineRadioOptions5_error_msg" style="color: red;"></span>
                        </div>

                        <!-- CHECKBOX WITH CONDITION -->

                        <div class="col-md-12">
                            <div class="condition-check-wrap">
                                <input type="checkbox" id="condition-chcek" name="condition_chcek"><label for="condition-chcek">
                                    <span class="condition_chcek_error_msg" style="color: red;"></span>
                                    Hiermit
                                    stimme ich zu, dass pflege.de (web care LBJ GmbH) meine personenbezogenen (ggf.
                                    auch
                                    gesundheitsbezogenen) Informationen, v.a. Kontaktinfos/Versichertenstatus, für
                                    die
                                    Bearbeitung des Antrages (zum Erhalt der Pflegehilfsmittel) sowie für eine
                                    Kontaktaufnahme in diesem Zusammenhang via E-Mail speichert und verarbeitet.<br>

                                    Hinweis: Die Zustimmung ist freiwillig und kann jederzeit mit Wirkung für die
                                    Zukunft per E-Mail an <a href="#">betroffenenrechte@pflege.de</a> widerrufen
                                    werden.
                                    Im Falle eines Widerrufs können wir Ihnen gegenüber die entsprechenden
                                    Serviceleistungen nicht mehr erbringen. Weitere Informationen zum Datenschutz
                                    finden
                                    Sie <a href="#">hier.</a></label>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <p class="mt-30 mb-5">Sie senden noch keine Bestellung ab</p>
                            <button class="btn btn__primary btn__rounded second-button">Weiter im Antrag</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div id="step3" style="display: none" data-step3="0">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <h2>Lieferadresse</h2>
                        <p>Geben Sie die Details der Lieferadresse ein</p>
                    </div>
                    <div id="delivery-form">
                        <div class="col-md-12">
                            <h5>Adressen Details</h5>
                        </div>

                        {{---
                        <div class="col-md-12">

                        <div class="row">
                                <div class="col-md-12">
                                    <label for="recipient-name" class="form-label">Empfängername</label>
                                    <input type="text" class="form-control" id="bill_Drecipient_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="streetno" class="form-label">Strasse</label>
                                    <input type="text" class="form-control" id="bill_Dstreetno">
                                </div>
                                <div class="col-md-6">
                                    <label for="houseno" class="form-label">Hausnummer</label>
                                    <input type="text" class="form-control" id="bill_Dhouseno">
                                </div>
                                <div class="col-md-6">
                                    <label for="zip" class="form-label">PLZ</label>
                                    <input type="text" class="form-control" id="bill_Dzip">
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">Ort</label>
                                    <input type="text" class="form-control" id="bill_Dcity">
                                </div>
                            </div>

                            
                        </div>
                        --}}



                        <div class="col-md-12" id="getDiffAddr">


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="recipient-name" class="form-label">Empfängername</label>
                                    <input type="text" class="form-control" id="Drecipient_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="streetno" class="form-label">Strasse</label>
                                    <input type="text" class="form-control" id="Dstreetno">
                                </div>
                                <div class="col-md-6">
                                    <label for="houseno" class="form-label">Hausnummer</label>
                                    <input type="text" class="form-control" id="Dhouseno">
                                </div>
                                <div class="col-md-6">
                                    <label for="zip" class="form-label">PLZ</label>
                                    <input type="text" class="form-control" id="Dzip">
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">Ort</label>
                                    <input type="text" class="form-control" id="Dcity">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-right mt-50">
                            <button class="btn btn__primary btn__rounded deliveryAddress">einreichen</button>
                        </div>

                    </div>
                </div>
            </div>

            <div id="step4" style="display: none" data-step4="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="signatureImg" id="signPad">
                            <canvas id="sketchpad"></canvas>
                        </div>
                        <p class="text-center">
                            <button onclick="sketchpad.undo();" class="btn btn-primary">Undo</button>
                            <button onclick="sketchpad.redo();" class="btn btn-primary">Redo</button>
                            <button onclick="DownloadCanvasAsImage()" class="btn btn-primary">Save</button>
                            <button onclick="deletesign()" class="btn btn-primary">Remove</button>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="signatureImg">
                            <img src="" id="signatureImg">
                        </div>
                        <div class="text-right mt10">
                            <a href="{{ route('generate-pdf') }}" class="btn btn__secondary btn__rounded mr-2">
                                <i class="fa fa-download"></i> PDF herunterladen
                            </a>
                            <button class="btn btn__primary btn__rounded signature_btn" onclick="signature()">einreichen</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-none">
                        <div id="printableArea">
                            @if(Route::currentRouteName() == 'assemble')
                            <div class="container-fluid" style="width: 100%!important;">
                                <div class="row" style="display: flex; flex-wrap: wrap;">
                                    <div class="top-header" style="display: flex;width: 100%;justify-content: space-between;align-items: start;">
                                        <div class="top-heading-sec">
                                            <h1 class="heading-1" style="color:#009ee1;font-family: sans-serif;margin-bottom:10px;font-weight: 500;">
                                                Antrag auf Kostenübernahme</h1>
                                            <p class="sub-heading" style="margin: 0;font-family: sans-serif;">zur
                                                Versorgung mit Pflegehilfsmitteln gemäß § 78 Absatz 1 in Verbindung
                                                mit § 40 Absatz 2 SGB XI</p>
                                        </div>

                                        <div class="top-logo-sec" style="display: flex;">
                                            <img src="{{asset('frontend/assets/images/logo/belesch-logo-dark.png')}}" class="logo-img" style="max-width: 250px; width: 100%; min-width: 100px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid" style="width: 100%!important;">
                                <div class="table-form">
                                    <h3>Versicherte / r:</h3>
                                    <table style="width: 100%;border: 1px solid #000;">
                                        <tbody>
                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; display: flex; max-width: 100%;" class="multiple-checkboxes">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox title_name_pd" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;
									height: 25px; width: 25px;margin-right: 10px; display: flex;align-items: center; justify-content: center;" id="title_name_fr_pd">
                                                        </div>
                                                        Frau
                                                    </div>

                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox title_name_pd" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;
									height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;" id="title_name_her_pd">
                                                        </div>
                                                        Herr
                                                    </div>

                                                </td>

                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <label style="font-weight: 600;margin-right: 5px;">Vorname:</label>
                                                    <span id="first_name_pd">Jhon</span>
                                                </td>

                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Nachname:</label>
                                                    <span id="last_name_pd">Doe</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; " colspan="2">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Straße,
                                                        Nr.:</label>
                                                    <span id="street_pd">Main street, street no-13B</span>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Telefon /
                                                        Mobil:</label>
                                                    <span id="mobile_pd">+97-9854632185</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <label style="font-weight: 600;margin-right: 5px; ">PLZ:</label>
                                                    <span id="zip_pd">1100251</span>
                                                </td>

                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; " colspan="2">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Ort:</label>
                                                    <span id="city_pd">Boston</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; " colspan="2">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Email:</label>
                                                    <span id="email_pd">info@bleschbox.com</span>
                                                </td>

                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Geburtsdatum:</label>
                                                    <span id="dob_pd">30-01-1993</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; " colspan="2">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Krankenkasse:</label>
                                                    <span id="health-insurance_pd">Assurance name</span>
                                                </td>

                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <label style="font-weight: 600;margin-right: 5px; ">Versichertennr.:</label>
                                                    <span id="insurance_no_pd">Assurance number</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <h3>Antrag auf Kostenübernahme:</h3>
                                <div class="application-div" style="display: flex;align-items: flex-start;height: 100%;border: 1px solid; padding: 10px;">
                                    <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1; height: 25px; width: 25px;margin-right: 10px;
                                    display: flex;align-items: center; justify-content: center; ">X
                                    </div>
                                    <p style="margin: 0;">Zum Verbrauch bestimmte Pflegehilfsmittel - Produktgruppe
                                        (PG 54) - bis maximal des monatlichen Höchstbetrages nach § 40
                                        Abs. 2 SGB XI / bei Beihilfeberechtigung bis maximal der Hälfte des
                                        monatlichen Höchstbetrages nach § 40 Abs. 2 SGB XI</p>
                                </div>

                                <div class="table-list-form">
                                    <table style="width: 100%;margin-top: 30px;text-align: center;border: 1px solid #000;">
                                        <thead>
                                            <tr>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">
                                                    Wird grundsätzlich benötigt
                                                </th>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">Zum
                                                    Verbrauch bestimmte Pflegehilfsmittel
                                                </th>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">
                                                    Quantity
                                                </th>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">
                                                    Positionsnummer
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(getAllProducts() as $qualityPtoduct)
                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px;display: flex;justify-content: center;align-items: center; " class="checkbox-td">
                                                    <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;">
                                                        <span id="pd_{{$qualityPtoduct->id}}"></span>
                                                    </div>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">{{$qualityPtoduct->name}}
                                                    <span id="pd_size_{{$qualityPtoduct->id}}"></span>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; " id="qty_pd_{{$qualityPtoduct->id}}"></td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">{{$qualityPtoduct->positionNumber}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <h3>Wiederverwendbare Bettschutzeinlagen</h3>
                                <div class="application-div" style="display: flex;align-items: flex-start;height: 100%;border: 1px solid; padding: 10px;">
                                    <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1; height: 25px; width: 25px;margin-right: 10px;
display: flex;align-items: center; justify-content: center; "></div>
                                    <p style="margin: 0;">Pflegehilfsmittel zur Körperpflege / Körperhygiene (PG 51)
                                        unter Abzug eines Eigenanteils von 10 v.H. soweit keine
                                        Befreiung von Zuzahlungen nach § 40 Abs. 3 Satz 5 SGB XI vorliegt.</p>
                                </div>

                                <div class="reuseable-table">
                                    <table style="width: 100%;margin-top: 30px;text-align: center;border: 1px solid #000;">
                                        <thead>
                                            <tr>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">
                                                    Benötigte Stückzahl (Max. 4 Stück/Jahr)
                                                </th>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">
                                                    Pflegehilfsmittel zur Körperpflege / Körperhygiene
                                                </th>
                                                <th style="height: 40px;border-bottom: 1px solid #000;padding: 5px;">
                                                    Positionsnummer
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px;display: flex;justify-content: center;align-items: center; " class=" checkbox-td">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1; height: 25px; width: 25px;margin-right: 10px; display: flex;align-items: center; justify-content: center; ">
                                                            <span id="bed1" class="bed_pd"></span>
                                                        </div>
                                                        1
                                                    </div>

                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1; height: 25px; width: 25px;margin-right: 10px; display: flex;align-items: center; justify-content: center; ">
                                                            <span id="bed2" class="bed_pd"></span>
                                                        </div>
                                                        2
                                                    </div>
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1; height: 25px; width: 25px;margin-right: 10px; display: flex;align-items: center; justify-content: center;">
                                                            <span id="bed3" class="bed_pd"></span>
                                                        </div>
                                                        3
                                                    </div>
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1; height: 25px; width: 25px;margin-right: 10px; display: flex;align-items: center; justify-content: center;">
                                                            <span id="bed4" class="bed_pd"></span>
                                                        </div>
                                                        4
                                                    </div>

                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    Wiederverwendbare Bettschutzeinlagen
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    51.40.01.4
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-below-content" style="padding: 10px;">
                                    <p style="line-height: 28px;">Hiermit bevollmächtige ich MedicCos mit der
                                        Antragstellung, Belieferung und Abwicklung hinsichtlich der Gewährung von
                                        Leistungen für
                                        die Versorgung mit Pflegehilfsmitteln bei meiner zuständigen Pflegekasse in
                                        meinem Namen. Die erforderliche Kommunikation erfolgt
                                        ausschließlich durch MedicCos, welche meine Daten zum Zwecke der
                                        Leistungserbringung nutzen darf. Ich bin über mein Recht informiert
                                        worden, der Weitergabe meiner Daten an Dritte zu widerrufen. Ich befreie
                                        meine Pflegekasse von ihrer Geheimhaltungspflicht gegenüber
                                        MedicCos solange die Leistungspflicht besteht. Bitte verzeichnen Sie
                                        MedicCos als meinen Leistungserbinger für Pflegehilfsmittel und
                                        Empfänger der Kostenübernahmebestätigung der Pflegekasse und streichen Sie
                                        bereits vorhandene Leistungserbringer. Gewünschte
                                        Produkte werden von mir ausnahmslos für die ambulante private Pflege im
                                        angegebenen Umfang bezogen.</p>
                                </div>
                                <div class="date_sign_wrap" style="display: flex;width: 100%;justify-content: space-between;padding: 0 10px;">
                                    <div class="date" style="text-align: center;min-width: 200px;border-top: 2px solid;padding: 10px;margin-top: 50px;">
                                        <label style="font-weight: 600;margin-right: 5px;padding: 9px 0px;">Datum</label>
                                    </div>
                                    <div class="sign" style="text-align: center;min-width: 200px;border-top: 2px solid;padding: 10px;margin-top: 50px;">
                                        <label style="font-weight: 600;margin-right: 5px;padding: 9px 0px;">Unterschrift
                                            Versicherte(r) oder Bevollmächtigte(r)</label>
                                    </div>
                                </div>

                                <div class="bottom-table" style="margin-top: 50px;border: 2px solid #d95053;padding: 0px 15px 15px 15px;">
                                    <div class="overlap-heading" style="text-align: center;margin-top: -10px;">
                                        <h3 style="max-width: 570px;background: #fff;margin: auto;">Genehmigung der
                                            Pflegekasse<small style="color: #d95053;">(wird von der Pflegekasse
                                                ausgefüllt)</small></h3>
                                    </div>
                                    <p>Bitte zurück an die Mailadresse: kasse@medic-cos.de oder per Fax: 0531 516
                                        057 13 </p>
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;"></div>
                                                        PG 54 bis 42,- € monatlich
                                                    </div>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;"></div>
                                                        PG 51 ohne Zzgl./Beihilfeberechtigter
                                                    </div>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; " colspan="2">
                                                    IK 330302697
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;"></div>
                                                        PG 54 bis 20,- € monatlich
                                                    </div>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;"></div>
                                                        PG 51 mit Zzgl./Beihilfeberechtigter
                                                    </div>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;"></div>
                                                        PG 51 Ohne Zzgl.
                                                    </div>
                                                </td>
                                                <td style="height: 50px;border: 1px solid #222;padding: 0px 10px; ">
                                                    <div class="checkbox-wrap" style="display: flex;align-items: center;margin-right: 10px;">
                                                        <div class="checkbox" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px; width: 25px;margin-right: 10px;display: flex;align-items: center; justify-content: center;"></div>
                                                        PG 51 mit Zzgl.
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="attached-date-sign-wrap" style="display: flex;justify-content: space-between;margin-top: 30px;font-size: 14px;">
                                        <div><label style="font-weight: 600;margin-right: 5px; ">Datum</label><span class="text-field" style="min-width: 200px;border-bottom: 2px solid #000;display: inline-block;margin-left: 20px;"></span>
                                        </div>
                                        <div><label style="font-weight: 600;margin-right: 5px; ">IK der Pegekasse /
                                                Stempel / Unterschrift</label><span class="text-field" style="min-width: 200px;border-bottom: 2px solid #000;display: inline-block;margin-left: 20px;"></span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="bottom-contact-list" style="list-style-type: none;display: flex;justify-content: space-between;padding: 0;">
                                    <li style="font-size: 12px;">MedicCos Vertriebs UG (haftungbeschränkt)</li>
                                    <li style="font-size: 12px;">Lindenbergplatz 16 - 38126 Braunschweig | +49 (0)
                                        531 51605712 | info@belesch-box.de
                                    </li>
                                </ul>
                            </div>
                            @else
                            <table class="table" cellspacing="10" style="width: 100%;margin: 0 auto;padding: 10px;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 style="font-size:24px;color:#000000;font-weight:100;margin:0;font-family: Georgia, 'Times New Roman', Times, serif;">
                                                Auswahl der gewünschten</h5>
                                            <h3 style="font-size:30px;color: #000000;font-weight:400;margin:0;font-family: Georgia, 'Times New Roman', Times, serif;">
                                                BeleschBox</h3>
                                            <h6 style="font-size:24px;color: #0d9bda;margin-bottom:0;font-weight:200;margin-top:10px;font-family: Georgia, 'Times New Roman', Times, serif;">
                                                Lieferinformationen angeben</h6>
                                            <p style="font-family: Arial, Helvetica, sans-serif;font-size:18px;color:#000000;margin-top:0px;">
                                                Versicherte/r (gemäß Antrag auf Kostenübernahme):</p>
                                        </td>
                                        <td style="text-align: right;">
                                            <img src="{{asset('frontend/assets/images/logo/belesch-logo-dark.png')}}" class="logo-img" style="max-width: 250px; width: 100%; min-width: 100px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="display: flex;max-width: 100%;padding-top:10px;">
                                            <div style="display: flex;align-items: center;margin-right: 10px;font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">
                                                <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;" id="title_name_fr_pk"></div>
                                                Frau
                                            </div>

                                            <div style="display: flex;align-items: center;margin-right: 10px;font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">
                                                <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;" id="title_name_her_pk"></div>
                                                Herr
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding:20px 0;">
                                            <label style="font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">Vorname:</label>
                                            <input type="text" style="border-bottom:2px solid #6a6a6a;border-left:none;border-right:none;border-top:none" id="first_name_pk">
                                            <label style="font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">Nachname:</label>
                                            <input type="text" style="border-bottom:2px solid #6a6a6a;border-left:none;border-right:none;border-top:none" id="last_name_pk">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="display: flex;max-width: 100%;">
                                            <label style="font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">Pflegegrad:</label>
                                            <div style="display: flex;align-items: center;margin-right: 10px;">
                                                <div id="pflegegr1" class="pflegegr" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                1
                                            </div>
                                            <div style="display: flex;align-items: center;margin-right: 10px;">
                                                <div id="pflegegr2" class="pflegegr" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                2
                                            </div>
                                            <div style="display: flex;align-items: center;margin-right: 10px;">
                                                <div id="pflegegr3" class="pflegegr" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                3
                                            </div>
                                            <div style="display: flex;align-items: center;margin-right: 10px;">
                                                <div id="pflegegr4" class="pflegegr" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                4
                                            </div>
                                            <div style="display: flex;align-items: center;margin-right: 10px;">
                                                <div id="pflegegr5" class="pflegegr" style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                5
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            @foreach(getAllPackages() as $package)
                                            <div style="display: flex;width:50%;float: left;margin:30px 0 20px 0;">
                                                <div>
                                                    <img src="{{asset('frontend/assets/images/icons/box.png')}}" style="width:80px;border-right:2px solid #0d9bda;padding-right:10px;">
                                                    {{--<img src="{{asset('storage/'.$package->image)}}" style="width:80px;border-right:2px solid #0d9bda;padding-right:10px;">--}}
                                                </div>
                                                <div style="flex-grow: 1;padding:0 5px;">
                                                    <div>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;">@if(request()->id == $package->id)
                                                                ✓ @endif</div>
                                                            <span>{{$package->name}}</span>
                                                        </div>
                                                    </div>

                                                    <article style="width:30%;float:left;padding-left: 30px;">
                                                        @foreach($package->get_packageDetails as $packageProduct)
                                                        <span style="font-family: Arial, Helvetica, sans-serif;font-size: 14px;display: block;padding:2px 2px 0 0">{{$packageProduct->getProductDetails->product_title}}</span>
                                                        @endforeach
                                                    </article>
                                                    <article style="width:60%;float:left;">
                                                        @foreach($package->get_packageDetails as $packageProducts)
                                                        <span style="font-family: Arial, Helvetica, sans-serif;font-size: 14px;display: block;padding:2px 2px 0 0">{{$packageProducts->getProductDetails->name}}</span>
                                                        @endforeach
                                                    </article>

                                                </div>
                                            </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding:20px 0;">
                                            <table class="inner-tabel">
                                                <tr>
                                                    <td style="display: flex;max-width: 100%;">
                                                        <label style="font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">Handschuhgröße:</label>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;color:#6a6a6a;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                            S
                                                        </div>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;color:#6a6a6a;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                            M
                                                        </div>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;color:#6a6a6a;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                            L
                                                        </div>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;color:#6a6a6a;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                            XL
                                                        </div>
                                                        <label style="font-family: Arial, Helvetica, sans-serif;color:#6a6a6a;">(Bei
                                                            fehlende Angabe wird Größe M geliefert)</label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="inner-tabel" style="width:100%;">
                                                <tr>
                                                    <td style="display: flex;max-width: 100%;">
                                                        <label style="font-family: Arial, Helvetica, sans-serif;font-size:16px;color:#6a6a6a;">Wunschliefertermin:</label>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;color:#6a6a6a;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;">
                                                                ✓
                                                            </div>
                                                            1. bis 15. des Monats
                                                        </div>
                                                        <div style="display: flex;align-items: center;margin-right: 10px;color:#6a6a6a;">
                                                            <div style="border: 2px solid #009ee1;text-align: center;color: #009ee1;height: 25px;width: 25px;margin-right: 10px;display: flex;align-items: center;justify-content: center;"></div>
                                                            16. bis Ende des Monats
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding:20px 0 10em 0;">
                                            <p style="font-size: 14px;margin-bottom: 5px;font-family: Arial, Helvetica, sans-serif;color:#6a6a6a;">
                                                Die von mir getroffene Auswahl der BeleschBox kann ich jeden Monat neu
                                                festlegen</p>
                                            <p style="font-size: 14px;margin-bottom: 5px;font-family: Arial, Helvetica, sans-serif;color:#6a6a6a;">
                                                Änderungen werde ich der MedicCos Vertriebs UG rechtzeitig
                                                mitteilen.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p style="font-size: 12px;text-align:center;font-family: Arial, Helvetica, sans-serif;color:#6a6a6a;">
                                                MedicCos Vertriebs UG (haftungbeschränkt) Lindenbergplatz 16 - 38126
                                                Braunschweig | +49
                                                (0) 531 51605712 | info@belesch-box.de</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div id="step5" style="display: none" data-step5="0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="condition-check-wrap mt-20"><input type="checkbox" id="agreement" name="agreement">
                            <label for="condition-chcek">Hiermit stimme ich zu, dass pflege.de (web care LBJ GmbH) meine
                                personenbezogenen (ggf. auch gesundheitsbezogenen) Informationen, v.a.
                                Kontaktinfos/Versichertenstatus, für die Bearbeitung des Antrages (zum Erhalt der
                                Pflegehilfsmittel) sowie für eine Kontaktaufnahme in diesem Zusammenhang via E-Mail
                                speichert und verarbeitet.
                            </label>
                        </div>
                    </div>
                    
                    <!-- Section PDF avec iframe -->
                    <div class="col-md-12 mt-30">
                        <div class="pdf-preview-section" style="border: 1px solid #ccc; padding: 20px; background: white;">
                            <h4 style="color: #009ee1; margin-bottom: 20px; text-align: center;">Vorschau Ihres Bestellformulars</h4>
                            <div id="pdf-container" style="width: 100%; height: 600px; border: 1px solid #ddd;">
                                <iframe id="pdf-iframe" src="" style="width: 100%; height: 100%; border: none;"></iframe>
                            </div>
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn__secondary btn__rounded" onclick="downloadPdf()">
                                    <i class="fas fa-download"></i> PDF herunterladen
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-right mt-30">
                        @if(Route::currentRouteName() == 'assemble')
                        <button class="btn btn__primary btn__rounded checkout_btn" onclick="checkout_btn()">einreichen</button>
                        @else
                        <button class="btn btn__primary btn__rounded checkout_btn_pkg" onclick="checkout_btn_pkg()">einreichen</button>
                        @endif
                    </div>
                </div>
            </div>
            <div id="printPageArea1">
            </div>
        </div>
    </div>
    @livewire('frontend.includes.footer')

    <script src="{{asset('/frontend/assets/js/jquery-3.5.1.min.js')}}"></script>

    <script>
		// Display Title and descruption for the current Step (data is in steps.json file)
		document.addEventListener('DOMContentLoaded', function() {
			const infos = @json($steps);
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                        const target = mutation.target;
                        if (target.style.display === 'block') {
                            currentStep = parseInt(target.id.replace('step', ''));
				            document.getElementById('current-step-title').innerText = infos[currentStep-1]['title'];
				            document.getElementById('current-step-description').innerText = infos[currentStep-1]['description'];
                            
                            // Mettre à jour le PDF quand on arrive à l'étape 5
                            if (currentStep === 5) {
                                setTimeout(function() {
                                    updatePDFWithUserData();
                                }, 500);
                            }
                        }
                    }
                });
            });
            document.querySelectorAll('[id^="step"]').forEach(function(stepDiv) {
                if (/^step\d+$/.test(stepDiv.id)) {
                    observer.observe(stepDiv, { attributes: true });
                }
            });
        });
	
        $("#same_address").change(function() {
            if (this.checked) {
                $("#getDiffAddr").css("display", "none");
            } else {
                $("#getDiffAddr").css("display", "block");
            }
        });

        function getSetpData() {

            if ($(".step5").hasClass("active") == true) {
                $("#step4").css("display", "block");
                $(".step5").removeClass("active");
                $("#step5").css("display", "none");
            } else if ($(".step4").hasClass("active") == true) {
                $("#step3").css("display", "block");
                $(".step4").removeClass("active");
                $("#step4").css("display", "none");
            } else if ($(".step3").hasClass("active") == true) {
                $("#step2").css("display", "block");
                $(".step3").removeClass("active");
                $("#step3").css("display", "none");
                

            } else if ($(".step2").hasClass("active") == true) {
                $("#step1").css("display", "block");
                $(".step2").removeClass("active");
                $("#step2").css("display", "none");

            }

            //  if($(".step1").hasClass("active") == true)
            //  {
            //   alert('this page 1');
            //  } 
        }
    </script>

    <script>
        $(".second-button").click(function() {

            if ($('input[type=radio][name=insured]:checked').length == 0) {
                $('.insured_error_msg').text("Please select Insured");
            } else {
                $('.insured_error_msg').text("");
            }

            if ($('input[type=radio][name=title_name]:checked').length == 0) {
                $('.title_name_error_msg').text("Please select Insured");
            } else {
                $('.title_name_error_msg').text("");
            }

            var fname = $("#first_name").val();
            //alert(fname);
            if ($("#first_name").val() == '') {
                $('.first_name_error_msg').text("Please enter First Name");
            } else {
                $('.first_name_error_msg').text("");
            }


            if ($("#last_name").val() == '') {
                $('.last_name_error_msg').text("Please enter Last Name");
            } else {
                $('.last_name_error_msg').text("");
            }


            if ($("#streetno").val() == '') {
                $('.streetno_error_msg').text("Please enter Street Number");
            } else {
                $('.streetno_error_msg').text("");
            }

            if ($("#houseno").val() == '') {
                $('.houseno_error_msg').text("Please enter House Number");
            } else {
                $('.houseno_error_msg').text("");
            }

            if ($("#zip").val() == '') {
                $('.zip_error_msg').text("Please enter Zip Code");
            } else {
                $('.zip_error_msg').text("");
            }

            if ($("#city").val() == '') {
                $('.city_error_msg').text("Please enter City Name");
            } else {
                $('.city_error_msg').text("");
            }

            if ($("#Gaburtadatum").val() == '') {
                $('.gaburtadatum_error_msg').text("Please enter Gaburtadatum");
            } else {
                $('.gaburtadatum_error_msg').text("");
            }

            if ($("#telno").val() == '') {
                $('.telno_error_msg').text("Please enter Phone Number");
            } else {
                $('.telno_error_msg').text("");
            }

            if ($("#email2").val() == '') {
                $('.email2_error_msg').text("Please enter Email Id");
            } else {
                $('.email2_error_msg').text("");
            }

            if ($("#password").val() == '') {
                $('.password_error_msg').text("Please enter Password");
            } 
             else {
                $('.password_error_msg').text("");
            }

            if ($("#confirm_password").val() == '') {
                $('.password2_error_msg').text("Please enter Confirm Password");
            } else if ($("#password").val() != $("#confirm_password").val()) {
                $('.password2_error_msg').text("Confirm Password does not matched.");
            }
             else {
                $('.password2_error_msg').text("");
            }



            if ($("#health-insurance").val() == '') {
                $('.hinsurance_error_msg').text("Please enter Health Insurance Number");
            } else {
                $('.hinsurance_error_msg').text("");
            }

            if ($("#insurance-no").val() == '') {
                $('.insuranceno_error_msg').text("Please enter Health Insurance Number");
            } else {
                $('.insuranceno_error_msg').text("");
            }

            if ($("#KrankenkasseNummer").val() == '') {
                $('.krankenkasse_error_msg').text("Please enter Krankenkasse Number");
            } else {
                $('.krankenkasse_error_msg').text("");
            }
            ///alert($('input[type=radio][name=inlineRadioOptions5]:checked').length);
            if ($('input[type=radio][name=inlineRadioOptions5]:checked').length == 0) {
                $('.inlineRadioOptions5_error_msg').text("Please select Insured");
            } else {
                $('.inlineRadioOptions5_error_msg').text("");
            }

            if ($('input[type=checkbox][name=condition_chcek]:checked').length == 0) {
                $('.condition_chcek_error_msg').text("Please select Terms & Condition");
            } else {
                $('.condition_chcek_error_msg').text("");
            }

            // var test_h = $("#houseno").val();
            // alert(test_h);

            var u_name = $("#first_name").val() + ' ' + $("#last_name").val();
            $('#Drecipient_name').val(u_name);

            var u_streetno = $("#streetno").val();
            $('#Dstreetno').val(u_streetno);

            var u_houseno = $("#houseno").val();
            $('#Dhouseno').val(u_houseno);

            var u_zip = $("#zip").val();
            $('#Dzip').val(u_zip);

            var u_city = $("#city").val();
            $('#Dcity').val(u_city);

            // Passer à l'étape 3 (Delivery Address)
            $("#step2").css("display", "none");
            $("#step3").css("display", "block");
            $(".step2").removeClass("active");
            $(".step3").addClass("active");
            
            // Forcer la couleur du texte de l'étape active
            $(".step3.active .step-text").css("color", "#2ccdc0");

        });
    </script>

    <script>
        function printPageArea(areaID) {
            var personalInformation = [];
            var userDetails = {};
            userDetails['surname'] = $('input[name="title_name"]:checked').val();
            userDetails['first_name'] = $('#first_name').val();
            userDetails['last_name'] = $('#last_name').val();
            userDetails['streetno'] = $('#streetno').val();
            userDetails['houseno'] = $('#houseno').val();
            userDetails['zip'] = $('#zip').val();
            userDetails['city'] = $('#city').val();
            userDetails['dob'] = $('#Gaburtadatum').val();
            userDetails['telno'] = $('#telno').val();
            userDetails['email'] = $('#email2').val();
            userDetails['password'] = $('#password').val();
            userDetails['health_insurance'] = $('#health-insurance').val();
            userDetails['insurance_no'] = $('#insurance-no').val();
            userDetails['KrankenkasseNummer'] = $('#KrankenkasseNummer').val();
            personalInformation.push(userDetails);

            ///$('$Dhouseno').val(userDetails['houseno']);




            var customerDeliveryAddress = [];
            var deliveryAddress = {};
            deliveryAddress['recipient_name'] = $('#Drecipient_name').val();
            deliveryAddress['street'] = $('#Dstreetno').val();
            deliveryAddress['houseno'] = $('#Dhouseno').val();
            deliveryAddress['zip'] = $('#Dzip').val();
            deliveryAddress['city'] = $('#Dcity').val();
            customerDeliveryAddress.push(deliveryAddress);
            $.ajax({
                type: "GET",
                url: "{{route('customer.customerInfo')}}",
                data: "userDetails=" + JSON.stringify(personalInformation) + '&_token={{ csrf_token() }}' + '&deliveryAddress=' + JSON.stringify(customerDeliveryAddress),
                success: function(data) {
                    successtoastMessage('Your details has been successfully saved.');
                }
            });

            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            new Sketchpad({
                element: "#sketchpad",
                width: $("#signPad").outerWidth(),
                height: $("#signPad").outerHeight()
            });
        }

        // Fonction pour mettre à jour le PDF avec les données utilisateur
        function updatePDFWithUserData() {
            // Stocker les données utilisateur pour le PDF
            storeUserDataForPdf();
            
            // Générer le PDF et l'afficher dans l'iframe
            generateAndDisplayPdf();
        }

        // Fonction pour générer et afficher le PDF
        function generateAndDisplayPdf() {
            $.ajax({
                url: '{{ route("generate-pdf-base64") }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success && response.pdf_base64) {
                        // Créer l'URL data pour le PDF
                        var pdfUrl = 'data:application/pdf;base64,' + response.pdf_base64;
                        
                        // Afficher le PDF dans l'iframe
                        $('#pdf-iframe').attr('src', pdfUrl);
                    } else {
                        console.error('Erreur lors de la génération du PDF:', response.error);
                        $('#pdf-iframe').attr('src', 'about:blank');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                    $('#pdf-iframe').attr('src', 'about:blank');
                }
            });
        }

        // Fonction pour télécharger le PDF
        function downloadPdf() {
            window.open('{{ route("generate-pdf") }}', '_blank');
        }

        // Fonction pour déterminer le numéro de BeleschBox
        function determineBeleschBoxNumber() {
            // Vérifier s'il y a un paramètre package dans l'URL
            var urlParams = new URLSearchParams(window.location.search);
            var package = urlParams.get('package');
            
            // Vérifier aussi l'ID du package dans l'URL (request()->id)
            var packageId = '{{request()->id ?? ""}}';
            
            // Vérifier l'ID du package dans la session
            var sessionPackageId = '{{Session::get("selected_package_id") ?? ""}}';
            

            
            console.log('=== DÉTECTION PACKAGE ===');
            console.log('Paramètre package dans URL:', package);
            console.log('ID du package (request()->id):', packageId);
            console.log('ID du package dans session:', sessionPackageId);

            
            if (package) {
                console.log('→ Package détecté via paramètre URL:', package);
                return 'BeleschBox ' + package;
            }
            
            if (packageId && packageId !== '') {
                console.log('→ Package détecté via request()->id:', packageId);
                return 'BeleschBox ' + packageId;
            }
            
            if (sessionPackageId && sessionPackageId !== '') {
                console.log('→ Package détecté via session (ID):', sessionPackageId);
                
                // Correspondance entre l'ID du package et le numéro de BeleschBox
                // Correction du décalage : BeleschBox 2 → ID 3, BeleschBox 5 → ID 6
                var beleschBoxMapping = {
                    '1': 'BeleschBox 1',
                    '3': 'BeleschBox 2',  // ID 3 correspond à BeleschBox 2
                    '4': 'BeleschBox 3',  // ID 4 correspond à BeleschBox 3
                    '5': 'BeleschBox 4',  // ID 5 correspond à BeleschBox 4
                    '6': 'BeleschBox 5',  // ID 6 correspond à BeleschBox 5
                    '7': 'BeleschBox 6'   // ID 7 correspond à BeleschBox 6
                };
                
                var mappedName = beleschBoxMapping[sessionPackageId];
                if (mappedName) {
                    console.log('→ BeleschBox mappée:', mappedName);
                    return mappedName;
                } else {
                    return 'BeleschBox ' + sessionPackageId;
                }
            }
            
            // Analyser les produits dans le panier
            var productNames = [];
            $('.cartItem').each(function() {
                var productName = $(this).find('.prod-name').text().trim();
                productNames.push(productName);
            });
            
            console.log('=== ANALYSE BELESCHBOX ===');
            console.log('Produits dans le panier:', productNames);
            
            // Fonction pour vérifier si un produit contient certains mots-clés
            function hasProduct(keywords) {
                return productNames.some(function(name) {
                    var nameLower = name.toLowerCase();
                    return keywords.some(function(keyword) {
                        return nameLower.includes(keyword.toLowerCase());
                    });
                });
            }
            
            // Détecter chaque type de produit
            var hasHandDesinfektion = hasProduct(['händedesinfektion', 'handdesinfektion']);
            var hasFFP2 = hasProduct(['ffp 2', 'ffp2', 'mundschutz']);
            var hasHandschuhe = hasProduct(['einmalhandschuhe', 'handschuhe']);
            var hasBettschutz = hasProduct(['bettschutzeinlagen', 'bettschutz']);
            var hasFlaechendesinfektion = hasProduct(['flächendesinfektion', 'flaechendesinfektion']);
            
            console.log('Détection des produits:');
            console.log('- Händedesinfektion:', hasHandDesinfektion);
            console.log('- FFP2 Mundschutz:', hasFFP2);
            console.log('- Einmalhandschuhe:', hasHandschuhe);
            console.log('- Bettschutzeinlagen:', hasBettschutz);
            console.log('- Flächendesinfektion:', hasFlaechendesinfektion);
            
            // Logique de détermination de la BeleschBox
            var beleschBoxNumber = 'Individuell';
            
            // Si aucun package n'est détecté, afficher "Individuell"
            if (!package && !packageId && !sessionPackageId) {
                console.log('→ Aucun package détecté → Individuell forcé');
                beleschBoxNumber = 'Individuell';
            } else {
                console.log('→ Package détecté, pas de détection automatique nécessaire');
            }
            
            /*
            // BeleschBox 1: Tous les produits (5 produits)
            if (hasHandDesinfektion && hasFFP2 && hasHandschuhe && hasBettschutz && hasFlaechendesinfektion) {
                beleschBoxNumber = 'BeleschBox 1';
                console.log('→ BeleschBox 1 détectée (tous les produits)');
            }
            // BeleschBox 2: Händedesinfektion + FFP2 + Handschuhe (3 produits)
            else if (hasHandDesinfektion && hasFFP2 && hasHandschuhe) {
                beleschBoxNumber = 'BeleschBox 2';
                console.log('→ BeleschBox 2 détectée (Händedesinfektion + FFP2 + Handschuhe)');
            }
            // BeleschBox 3: Händedesinfektion + Handschuhe (2 produits)
            else if (hasHandDesinfektion && hasHandschuhe) {
                beleschBoxNumber = 'BeleschBox 3';
                console.log('→ BeleschBox 3 détectée (Händedesinfektion + Handschuhe)');
            }
            // BeleschBox 4: FFP2 + Handschuhe (2 produits)
            else if (hasFFP2 && hasHandschuhe) {
                beleschBoxNumber = 'BeleschBox 4';
                console.log('→ BeleschBox 4 détectée (FFP2 + Handschuhe)');
            }
            // BeleschBox 5: Seulement Händedesinfektion (1 produit)
            else if (hasHandDesinfektion) {
                beleschBoxNumber = 'BeleschBox 5';
                console.log('→ BeleschBox 5 détectée (Händedesinfektion seulement)');
            }
            // BeleschBox 6: Seulement Handschuhe (1 produit)
            else if (hasHandschuhe) {
                beleschBoxNumber = 'BeleschBox 6';
                console.log('→ BeleschBox 6 détectée (Handschuhe seulement)');
            }
            else {
                console.log('→ Aucune combinaison standard détectée → Individuell');
            }
            */
            
            console.log('=== RÉSULTAT FINAL ===');
            console.log('BeleschBox déterminée:', beleschBoxNumber);
            console.log('========================');
            
            return beleschBoxNumber;
        }

        // Fonction pour stocker les données utilisateur pour le PDF
        function storeUserDataForPdf() {
            var userData = {
                gender: $('input[name="title_name"]:checked').val(),
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                pflegegrad: $('input[name="pflegegrad"]:checked').val() || $('input[name="Pflegegrad"]:checked').val(),
                street: $('#streetno').val(),
                zip: $('#zip').val(),
                city: $('#city').val(),
                phone: $('#telno').val(),
                glove_size: $('input[name^="size"]:checked').val() || 'M (Standard)',
                signature: $('#signatureImg').attr('src')
            };
            
            // Envoyer les données au serveur via AJAX
            $.ajax({
                url: '{{ route("store-user-data") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_data: userData
                },
                success: function(response) {
                    console.log('Données utilisateur stockées pour le PDF');
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors du stockage des données:', error);
                }
            });
        }

        $(document).ready(function() {
            
            $(".deliveryAddress").click(function() {
                $("#step3").css("display", "none");
                $("#step4").css("display", "block");
                $(".step3").removeClass("active");
                $(".step4").addClass("active");
                
                // Forcer la couleur du texte de l'étape active
                $(".step4.active .step-text").css("color", "#2ccdc0");
                
                // Initialiser le sketchpad quand l'étape 4 devient visible
                setTimeout(function() {
                    initializeSignaturePad();
                }, 100);
            });

            // Fonction pour corriger les couleurs des étapes au chargement
            function updateStepColors() {
                // Mettre toutes les étapes non-actives en noir
                $(".progressbar-steps .step:not(.active) .step-number").css("color", "#343434");
                $(".progressbar-steps .step:not(.active) .step-text").css("color", "#343434");
                $(".progressbar-steps .step:not(.active) span.step-text").css("color", "#343434");
                
                // Mettre toutes les étapes actives en bleu-vert
                $(".progressbar-steps .step.active .step-number").css("color", "#2ccdc0");
                $(".progressbar-steps .step.active .step-text").css("color", "#2ccdc0");
                $(".progressbar-steps .step.active span.step-text").css("color", "#2ccdc0");
            }

            // Fonction pour déterminer quelle étape devrait être active selon la page
            function setActiveStep() {
                // Retirer la classe active de toutes les étapes
                $(".progressbar-steps .step").removeClass("active");
                
                // Déterminer quelle étape devrait être active selon le contenu affiché
                if ($("#step1").is(":visible")) {
                    $(".step1").addClass("active");
                } else if ($("#step2").is(":visible")) {
                    $(".step2").addClass("active");
                } else if ($("#step3").is(":visible")) {
                    $(".step3").addClass("active");
                } else if ($("#step4").is(":visible")) {
                    $(".step4").addClass("active");
                } else if ($("#step5").is(":visible")) {
                    $(".step5").addClass("active");
                }
            }

            // Appliquer les couleurs au chargement
            setActiveStep();
            updateStepColors();

            // Appliquer les couleurs toutes les 100ms pour s'assurer qu'elles restent correctes
            setInterval(function() {
                setActiveStep();
                updateStepColors();
            }, 100);
        });
    </script>
    @if(Route::currentRouteName() == 'assemble')
    <script>
        function checkout_btn() {

            //console.log('test demo2');
            if ($("#agreement").prop('checked') != true) {
                $("#agreement").addClass('border-red-checkbox');
                alert('Veuillez accepter les conditions avant de continuer.');
                return;
            } else {
                $("#agreement").removeClass('border-red-checkbox');
                
                var o = {};
                o.product = [];
                $(".cartItem").each(function() {
                    var productID = $(this).attr('data-id');
                    var productQty = $('#qty_p_' + productID).val();
                    var productPrice = $('#price_p_' + productID).val();
                    o.product.push({
                        productID: productID,
                        productQty: productQty,
                        productPrice: productPrice
                    });
                });

                var personalInformation = [];
                var userDetails = {};
                userDetails['surname'] = $('input[name="title_name"]:checked').val();
                userDetails['first_name'] = $('#first_name').val();
                userDetails['last_name'] = $('#last_name').val();
                userDetails['streetno'] = $('#streetno').val();
                userDetails['houseno'] = $('#houseno').val();
                userDetails['zip'] = $('#zip').val();
                userDetails['city'] = $('#city').val();
                userDetails['dob'] = $('#Gaburtadatum').val();
                userDetails['telno'] = $('#telno').val();
                userDetails['email'] = $('#email2').val();
                userDetails['password'] = $('#password').val();
                userDetails['health_insurance'] = $('#health-insurance').val();
                userDetails['insurance_no'] = $('#insurance-no').val();
                userDetails['KrankenkasseNummer'] = $('#KrankenkasseNummer').val();
                personalInformation.push(userDetails);


                var customerDeliveryAddress = [];
                var deliveryAddress = {};
                deliveryAddress['recipient_name'] = $('#Drecipient_name').val();
                deliveryAddress['street'] = $('#Dstreetno').val();
                deliveryAddress['houseno'] = $('#Dhouseno').val();
                deliveryAddress['zip'] = $('#Dzip').val();
                deliveryAddress['city'] = $('#Dcity').val();
                customerDeliveryAddress.push(deliveryAddress);

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    type: "POST",
                    url: "{{route('product.checkout')}}",
                    data: "productDetails=" + JSON.stringify(o) + '&userDetails=' + JSON.stringify(personalInformation) + '&deliveryAddress=' + JSON.stringify(customerDeliveryAddress) + '&signature=' + $('#signatureImg').attr('src'),
                    success: function(a) {
                        if (a.status == '1') {
                            successtoastMessage(a.message)
                            ///alert('success1');
                           
                        } else {
                            errortoastMessage(a.message)
                            ///alert('failled1');
                        }
                        setTimeout(function() {

                            if (a.status == '1') {
                                window.location.href = 'https://www.belesch-box.de/order-success';
                            }
                            else
                            {
                                location.reload();
                            }
                           
                        }, 5000);
                    }
                });
            }
        };
    </script>
    @else
    <script>
        function checkout_btn_pkg() {
            if ($("#agreement").prop('checked') != true) {
                $("#agreement").addClass('border-red-checkbox');
                alert('Veuillez accepter les conditions avant de continuer.');
                return;
            } else {
                $("#agreement").removeClass('border-red-checkbox');
                
                ///alert(userDetails['houseno']);

                var personalInformation = [];
                var userDetails = {};
                userDetails['surname'] = $('input[name="title_name"]:checked').val();
                userDetails['first_name'] = $('#first_name').val();
                userDetails['last_name'] = $('#last_name').val();
                userDetails['streetno'] = $('#streetno').val();
                userDetails['houseno'] = $('#houseno').val();
                userDetails['zip'] = $('#zip').val();
                userDetails['city'] = $('#city').val();
                userDetails['dob'] = $('#Gaburtadatum').val();
                userDetails['telno'] = $('#telno').val();
                userDetails['email'] = $('#email2').val();
                userDetails['health_insurance'] = $('#health-insurance').val();
                userDetails['insurance_no'] = $('#insurance-no').val();
                userDetails['KrankenkasseNummer'] = $('#KrankenkasseNummer').val();
                personalInformation.push(userDetails);


                var customerDeliveryAddress = [];
                var deliveryAddress = {};
                deliveryAddress['recipient_name'] = $('#Drecipient_name').val();
                deliveryAddress['street'] = $('#Dstreetno').val();
                deliveryAddress['houseno'] = $('#Dhouseno').val();
                deliveryAddress['zip'] = $('#Dzip').val();
                deliveryAddress['city'] = $('#Dcity').val();
                customerDeliveryAddress.push(deliveryAddress);

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    type: "POST",
                    url: "{{route('product.checkout')}}",
                    data: 'packageDetails={{request()->id}}&userDetails=' + JSON.stringify(personalInformation) + '&deliveryAddress=' + JSON.stringify(customerDeliveryAddress) + '&signature=' + $('#signatureImg').attr('src'),
                    success: function(a) {
                        if (a.status == '1') {
                            //alert('success');
                            successtoastMessage(a.message)
                            ///alert('success2');
                        } else {
                            errortoastMessage(a.message)
                            ///alert('failed2');
                        }
                        setTimeout(function() {
                            if (a.status == '1') {
                                window.location.href = 'https://www.belesch-box.de/order-success';
                            }
                            else
                            {
                                location.reload();
                            }
                        }, 5000);
                    }
                });
            }
        };
    </script>
    @endif

    <style>
        /* Modal amélioré et modernisé */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        
        .modal-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 1px solid #dee2e6;
            padding: 25px 30px 20px;
            position: relative;
        }
        
        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        
        .modal-header p {
            color: #6c757d;
            font-size: 0.95rem;
            margin: 0;
            font-weight: 500;
        }
        
        .modal-body {
            padding: 30px;
        }
        
        .cure-box-modal-content {
            text-align: center;
        }
        
        .cure-box-modal-content img {
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            max-width: 100%;
            height: auto;
        }
        
        .image-content {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 6px 20px rgba(0, 142, 225, 0.3);
        }
        
        .image-content h6 {
            font-size: 0.9rem;
            margin-bottom: 8px;
            opacity: 0.9;
        }
        
        .image-content h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .image-content p {
            font-size: 0.85rem;
            margin: 0;
            opacity: 0.8;
        }
        
        .cure-box-modal-content h6 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin: 25px 0 20px;
        }
        
        .product-count-list {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
            flex-wrap: wrap;
        }
        
        .lengend-action-buttons {
            margin: 0;
        }
        
        .prod-count {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .prod-count input[type="radio"] {
            /* masquer visuellement mais conserver l'espace pour éviter le décalage du texte */
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }
        
        .prod-count span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 65px;
            height: 65px;
            border: 2px solid #009ee1;
            border-radius: 16px;
            background: white;
            transition: all 0.3s ease;
            font-weight: 700;
            font-size: 1.4rem;
            color: #009ee1;
            position: relative;
            overflow: hidden;
        }
        
        .prod-count span::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .prod-count:hover span {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 142, 225, 0.25);
            border-color: #0077b3;
        }
        
        .prod-count input[type="radio"]:checked + span {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            color: white;
            transform: scale(1.08);
            box-shadow: 0 12px 30px rgba(0, 142, 225, 0.4);
            border-color: #0077b3;
        }
        
        .prod-count input[type="radio"]:checked + span::before {
            opacity: 1;
        }

        /* Fix affichage des tailles gants: rétablir le texte et adapter la taille des puces */
        .box__sixe .prod-count span,
        .box__sixe .size-box {
            width: 64px;
            height: 64px;
            padding: 0;
            border-radius: 6px;
            border: 2px solid #39cdc1 !important;
            background: #ffffff !important;
            color: #111111 !important;
            font-size: 22px;
            font-weight: 700;
            line-height: 1;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
            overflow: visible !important;
            position: relative !important;
            z-index: 10 !important;
        }
        /* Désactiver l'overlay décoratif sur ces carrés pour éviter tout recouvrement du texte */
        .box__sixe .prod-count span::before {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }
        .box__sixe .prod-count span p {
            margin: 0;
            line-height: 1;
            display: block !important;
            font-size: 22px !important;
            font-weight: 700 !important;
            color: #111111 !important;
            z-index: 20 !important;
            position: relative !important;
            text-align: center !important;
        }
        .box__sixe .prod-count input[type="radio"]:checked + span {
            background: #39cdc1 !important;
            border-color: #39cdc1 !important;
            color: #ffffff !important;
            box-shadow: 0 8px 20px rgba(57, 205, 193, 0.25);
        }
        .box__sixe .prod-count:hover span {
            transform: none !important;
            border-color: #39cdc1 !important;
            box-shadow: 0 6px 16px rgba(57, 205, 193, 0.2);
        }
        .box__sixe .prod-count span *,
        .box__sixe .prod-count span font {
            color: inherit !important;
        }
        
        /* Style pour les nouvelles cases de taille */
        .size-box {
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }
        
        .size-box:hover {
            transform: scale(1.05) !important;
            box-shadow: 0 4px 15px rgba(57, 205, 193, 0.3) !important;
        }
        
        .size-box.selected {
            background: #39cdc1 !important;
            color: #ffffff !important;
        }
        
        .cure-box-modal-content p {
            color: #495057;
            font-size: 0.9rem;
            margin: 25px 0;
            padding: 18px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            /* Suppression de l'accent bleu à gauche dans le modal */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            font-weight: 500;
            line-height: 1.5;
        }
        
        .cure-box-modal-content p i {
            color: #009ee1;
            margin-right: 10px;
            font-size: 1rem;
            vertical-align: middle;
        }
        
        .cure-box-modal-content p::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 142, 225, 0.05) 0%, rgba(0, 119, 179, 0.05) 100%);
            border-radius: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .cure-box-modal-content p:hover::before {
            opacity: 1;
        }
        
        .modal-footer {
            background: #f8f9fa !important;
            border-top: 1px solid #dee2e6 !important;
            padding: 25px 30px !important;
            display: flex !important;
            gap: 15px !important;
            justify-content: center !important;
            align-items: center !important;
            flex-wrap: wrap !important;
        }
        
        .btn {
            padding: 14px 35px;
            border-radius: 36px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            min-width: 180px;
            max-width: 200px;
            position: relative;
            overflow: hidden;
            text-transform: none;
            letter-spacing: 0.5px;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }
        
        .btn__primary {
            background: linear-gradient(135deg, #00d4aa 0%, #00b894 100%);
            color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 212, 170, 0.35);
            font-weight: 700;
        }
        
        .btn__primary:hover {
            background: linear-gradient(135deg, #00c4a0 0%, #00a085 100%);
            box-shadow: 0 14px 36px rgba(0, 212, 170, 0.45);
        }
        
        .btn_secondary {
            background: #ffffff;
            color: #2c3e50;
            border: 2px solid #2c3e50;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            font-weight: 700;
        }
        
        .btn_secondary:hover {
            background: #ffffff;
            color: #2c3e50;
            border-color: #2c3e50;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
            transform: translateY(-3px);
        }
        
        /* Bouton de fermeture modernisé */
        .btn-close {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            font-size: 20px;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-close:hover {
            background: white;
            color: #dc3545;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-close:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.25);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .modal-body {
                padding: 20px;
            }
            
            .modal-header {
                padding: 20px 20px 15px;
            }
            
            .modal-footer {
                padding: 20px;
                flex-direction: column;
            }
            
            .btn {
                min-width: 100%;
            }
            
            .product-count-list {
                gap: 10px;
            }
            
            .prod-count span {
                width: 50px;
                height: 50px;
                font-size: 1rem;
            }
        }
        
        /* Améliorations supplémentaires */
        .modal-dialog {
            max-width: 600px;
        }
        
        .header-content {
            padding-right: 50px;
        }
        
        .modal-title {
            line-height: 1.3;
        }
        
        .cure-box-modal-content img {
            transition: transform 0.3s ease;
        }
        
        .cure-box-modal-content img:hover {
            transform: scale(1.02);
        }
        
        .product-count-list {
            animation: fadeInUp 0.6s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modal-content {
            animation: modalSlideIn 0.4s ease-out;
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Styles pour le formulaire BeleschBox dans l'étape 5 */
        .beleschbox-form-section {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid #009ee1 !important;
            border-radius: 10px !important;
            background: #ffffff !important;
            padding: 30px !important;
            margin: 20px 0 !important;
        }

        .beleschbox-form-section:hover {
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .beleschbox-option {
            transition: all 0.3s ease;
        }

        .beleschbox-option:hover {
            border-color: #009ee1 !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 142, 225, 0.15);
        }

        .beleschbox-option input[type="radio"]:checked + span {
            background: #009ee1 !important;
            color: white !important;
        }

        .beleschbox-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gender-selection label,
        .care-level-options label,
        .glove-size-options label {
            transition: all 0.3s ease;
        }

        .gender-selection label:hover,
        .care-level-options label:hover,
        .glove-size-options label:hover {
            color: #009ee1;
        }

        .info-text-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #009ee1;
        }

        .signature-section {
            border-top: 1px solid #e0e0e0;
            padding-top: 20px;
        }

        .footer-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }

        /* Styles pour la section signature */
        .signature-section {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .signature-section:hover {
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .signature-pad-container {
            background: white;
            border-radius: 8px;
            padding: 15px;
        }

        .signature-controls .btn {
            margin: 0 5px;
            font-size: 12px;
            padding: 5px 10px;
        }

        .signature-preview {
            background: white;
            border-radius: 8px;
            padding: 15px;
        }

        .date-section input {
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .date-section input:focus {
            border-color: #009ee1;
            box-shadow: 0 0 0 3px rgba(0, 142, 225, 0.1);
        }

        .signature-confirmation {
            border-left: 4px solid #009ee1;
        }

        .form-check-input:checked {
            background-color: #009ee1;
            border-color: #009ee1;
        }

        /* Styles pour le canvas de signature */
        #sketchpad {
            border: 2px solid #ccc;
            border-radius: 8px;
            cursor: crosshair;
            background: white;
        }

        .signatureImg {
            text-align: center;
            margin-bottom: 20px;
        }


    </style>

    <script>
        // Fonction pour ouvrir la modal bed_protector
        $(document).ready(function() {
            $('.bed_protector_modal').click(function() {
                $('#bed_protector_modal').show();
            });

            // Fonction pour le bouton "Weiter ohne Bettschutzeinlagen"
            $('.without-bed-protection').click(function() {
                $('#bed_protector_modal').hide();
                // Passer à l'étape suivante sans ajouter de protection de lit
                $("#step1").css("display", "none");
                $("#step2").css("display", "block");
                $(".step1").removeClass("active");
                $(".step2").addClass("active");
            });

            // Fonction pour le bouton "Weiter mit Bettschutzeinlagen"
            $('.with-bed-protection').click(function() {
                $('#bed_protector_modal').hide();
                // Ajouter la protection de lit sélectionnée au panier
                var selectedQuantity = $('input[name="number_of_bed"]:checked').val();
                if (selectedQuantity) {
                    // Logique pour ajouter au panier
                    console.log('Ajout de', selectedQuantity, 'protection(s) de lit au panier');
                }
                // Passer à l'étape suivante
                $("#step1").css("display", "none");
                $("#step2").css("display", "block");
                $(".step1").removeClass("active");
                $(".step2").addClass("active");
            });
        });

        function closeBedProtectorModal() {
            document.getElementById('bed_protector_modal').style.display = 'none';
        }


        
        // Gestion simple des tailles de gants
        function changeSize(element) {
            // Réinitialiser toutes les cases
            document.querySelectorAll('.size-box').forEach(box => {
                box.classList.remove('selected');
            });
            
            // Activer la case cliquée
            element.classList.add('selected');
            
            // Cocher le radio correspondant
            const radio = element.parentElement.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }
        }

        // Gestion de la sélection des quantités de protections de lit
        function pdBedProtection() {
            // Réinitialiser toutes les cases
            document.querySelectorAll('.cure-box-modal-content .prod-count span').forEach(function(span) {
                span.style.background = '#ffffff';
                span.style.color = '#333';
            });
            
            // Mettre à jour la case sélectionnée
            const checkedRadio = document.querySelector('input[name="number_of_bed"]:checked');
            if (checkedRadio) {
                const selectedSpan = checkedRadio.nextElementSibling;
                selectedSpan.style.background = '#39cdc1';
                selectedSpan.style.color = '#ffffff';
            }
        }

        // Implémentation basique du Sketchpad
        function Sketchpad(options) {
            this.element = document.querySelector(options.element);
            this.width = options.width || 400;
            this.height = options.height || 200;
            this.isDrawing = false;
            this.context = null;
            
            this.init();
        }
        
        Sketchpad.prototype.init = function() {
            this.element.width = this.width;
            this.element.height = this.height;
            this.context = this.element.getContext('2d');
            this.context.strokeStyle = '#000';
            this.context.lineWidth = 2;
            this.context.lineCap = 'round';
            
            this.element.addEventListener('mousedown', this.startDrawing.bind(this));
            this.element.addEventListener('mousemove', this.draw.bind(this));
            this.element.addEventListener('mouseup', this.stopDrawing.bind(this));
            this.element.addEventListener('mouseout', this.stopDrawing.bind(this));
        };
        
        Sketchpad.prototype.startDrawing = function(e) {
            this.isDrawing = true;
            this.context.beginPath();
            this.context.moveTo(e.offsetX, e.offsetY);
        };
        
        Sketchpad.prototype.draw = function(e) {
            if (!this.isDrawing) return;
            this.context.lineTo(e.offsetX, e.offsetY);
            this.context.stroke();
        };
        
        Sketchpad.prototype.stopDrawing = function() {
            this.isDrawing = false;
        };
        
        Sketchpad.prototype.clear = function() {
            this.context.clearRect(0, 0, this.width, this.height);
        };
        
        Sketchpad.prototype.undo = function() {
            // Implémentation simple - efface tout
            this.clear();
        };
        
        Sketchpad.prototype.redo = function() {
            // Implémentation simple - ne fait rien
        };
        
        Sketchpad.prototype.destroy = function() {
            // Nettoyer les événements si nécessaire
        };

        // Variable globale pour le sketchpad
        var sketchpad;

        // Fonction pour initialiser le sketchpad
        function initializeSignaturePad() {
            if (sketchpad) {
                sketchpad.destroy();
            }
            sketchpad = new Sketchpad({
                element: "#sketchpad",
                width: $("#signPad").outerWidth(),
                height: $("#signPad").outerHeight()
            });
        }

        // Fonction pour la signature
        function signature() {
            // Sauvegarder la signature d'abord
            DownloadCanvasAsImage();
            
            // Passer à l'étape suivante
            $("#step4").css("display", "none");
            $("#step5").css("display", "block");
            $(".step4").removeClass("active");
            $(".step5").addClass("active");
            
            // Mettre à jour le PDF avec les données
            updatePDFWithUserData();
            
            console.log('Signature submitted and moving to step 5');
        }

        // Fonction pour télécharger le canvas comme image
        function DownloadCanvasAsImage() {
            if (sketchpad) {
                var canvas = document.getElementById('sketchpad');
                var image = canvas.toDataURL('image/png');
                $('#signatureImg').attr('src', image);
                console.log('Signature saved');
            }
        }

        // Fonction pour supprimer la signature
        function deletesign() {
            if (sketchpad) {
                sketchpad.clear();
                $('#signatureImg').attr('src', '');
                console.log('Signature cleared');
            }
        }

        // Fonction pour diminuer la quantité
        function less(productId) {
            // Logique pour diminuer la quantité
            console.log('Less function called for product:', productId);
        }

        // Fonction pour augmenter la quantité
        function more(productId) {
            // Logique pour augmenter la quantité
            console.log('More function called for product:', productId);
        }

        // Fonction pour ajouter un produit au panier
        function getProduct(productId) {
            // Logique pour ajouter un produit au panier
            console.log('Adding product to cart:', productId);
            // Ici vous pouvez ajouter la logique AJAX pour ajouter au panier
        }

        // Fonction pour récupérer la taille sélectionnée
        function fetchSize(productId) {
            // Logique pour récupérer la taille sélectionnée
            console.log('Fetching size for product:', productId);
        }

        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser l'état visuel
            pdBedProtection();
            
            // Initialiser le sketchpad si l'étape 4 est déjà visible
            if ($("#step4").is(":visible")) {
                setTimeout(function() {
                    initializeSignaturePad();
                }, 100);
            }
            
            // Ajouter des événements pour mettre à jour l'aperçu PDF automatiquement
            $('input[name="title_name"], input[name="pflegegrad"], input[name="Pflegegrad"]').on('change', function() {
                if ($("#step5").is(":visible")) {
                    updatePDFWithUserData();
                }
            });
            
            // Mettre à jour l'aperçu quand on arrive à l'étape 5
            if ($("#step5").is(":visible")) {
                updatePDFWithUserData();
            }
        });
    </script>

</div>