function cartItemBlur() {
    var e = $(".cartPriceValue").val(),
        r = parseFloat(40) - parseFloat(e);
    $(".uniqueClass").each(function (e) {
        var s = $(this).attr("data-id");
        parseFloat(s) > r ? $(this).addClass("productOpacity") : $(this).removeClass("productOpacity");
    });
}

function optperson() {
    if (($(".optional").removeClass("d-none"), $("input:radio[name='insured']").is(":checked"))) return "Versicherter" != $("input[name=insured]:checked").val() || ($(".optional").addClass("d-none"), !1);
}

function pflegegrad() {
    $('.pflegegr').empty();
    if ($('input[name="pflegegrad"]:checked').val() == 1) {
        $('#pflegegr1').html('&#10003;');
    } else if ($('input[name="pflegegrad"]:checked').val() == 2) {
        $('#pflegegr2').html('&#10003;');
    } else if ($('input[name="pflegegrad"]:checked').val() == 3) {
        $('#pflegegr3').html('&#10003;');
    } else if ($('input[name="pflegegrad"]:checked').val() == 4) {
        $('#pflegegr4').html('&#10003;');
    } else if ($('input[name="pflegegrad"]:checked').val() == 5) {
        $('#pflegegr5').html('&#10003;');
    } else {

    }
}

function customValidation() {
    console.log(optperson()),
        void 0 === $("input[name='insured']:checked").val()
            ? $('input[name="insured"]').each(function () {
                $(this).addClass("border-red"), $(this).focus();
            })
            : void 0 === $("input[name='title_name']:checked").val()
                ? ($('input[name="title_name"]').each(function () {
                    $(this).addClass("border-red"), $(this).focus();
                }),
                    $('input[name="insured"]').each(function () {
                        $(this).removeClass("border-red");
                    }))
                : "" == $("#first_name").val()
                    ? ($("#first_name").addClass("border-red"),
                        $("#first_name").focus(),
                        $('input[name="insured"]').each(function () {
                            $(this).removeClass("border-red");
                        }),
                        $('input[name="title_name"]').each(function () {
                            $(this).removeClass("border-red");
                        }))
                    : "" == $("#last_name").val()
                        ? ($("#last_name").addClass("border-red"),
                            $("#last_name").focus(),
                            $('input[name="insured"]').each(function () {
                                $(this).removeClass("border-red");
                            }),
                            $('input[name="title_name"]').each(function () {
                                $(this).removeClass("border-red");
                            }),
                            $("#first_name").removeClass("border-red"))
                        : "" == $("#streetno").val()
                            ? ($("#streetno").addClass("border-red"),
                                $("#streetno").focus(),
                                $('input[name="insured"]').each(function () {
                                    $(this).removeClass("border-red");
                                }),
                                $('input[name="title_name"]').each(function () {
                                    $(this).removeClass("border-red");
                                }),
                                $("#first_name").removeClass("border-red"),
                                $("#last_name").removeClass("border-red"))
                            : "" == $("#houseno").val()
                                ? ($("#houseno").addClass("border-red"),
                                    $("#houseno").focus(),
                                    $('input[name="insured"]').each(function () {
                                        $(this).removeClass("border-red");
                                    }),
                                    $('input[name="title_name"]').each(function () {
                                        $(this).removeClass("border-red");
                                    }),
                                    $("#first_name").removeClass("border-red"),
                                    $("#last_name").removeClass("border-red"),
                                    $("#streetno").removeClass("border-red"))
                                : "" == $("#zip").val()
                                    ? ($("#zip").addClass("border-red"),
                                        $("#zip").focus(),
                                        $('input[name="insured"]').each(function () {
                                            $(this).removeClass("border-red");
                                        }),
                                        $('input[name="title_name"]').each(function () {
                                            $(this).removeClass("border-red");
                                        }),
                                        $("#first_name").removeClass("border-red"),
                                        $("#last_name").removeClass("border-red"),
                                        $("#streetno").removeClass("border-red"),
                                        $("#houseno").removeClass("border-red"))
                                    : "" == $("#city").val()
                                        ? ($("#city").addClass("border-red"),
                                            $("#city").focus(),
                                            $('input[name="insured"]').each(function () {
                                                $(this).removeClass("border-red");
                                            }),
                                            $('input[name="title_name"]').each(function () {
                                                $(this).removeClass("border-red");
                                            }),
                                            $("#first_name").removeClass("border-red"),
                                            $("#last_name").removeClass("border-red"),
                                            $("#streetno").removeClass("border-red"),
                                            $("#houseno").removeClass("border-red"),
                                            $("#zip").removeClass("border-red"))
                                        : "" == $("#Gaburtadatum").val()
                                            ? ($("#Gaburtadatum").addClass("border-red"),
                                                $("#Gaburtadatum").focus(),
                                                $('input[name="insured"]').each(function () {
                                                    $(this).removeClass("border-red");
                                                }),
                                                $('input[name="title_name"]').each(function () {
                                                    $(this).removeClass("border-red");
                                                }),
                                                $("#first_name").removeClass("border-red"),
                                                $("#last_name").removeClass("border-red"),
                                                $("#streetno").removeClass("border-red"),
                                                $("#houseno").removeClass("border-red"),
                                                $("#zip").removeClass("border-red"),
                                                $("#city").removeClass("border-red"))
                                            : "" == $("#telno").val()
                                                ? ($("#telno").addClass("border-red"),
                                                    $("#telno").focus(),
                                                    $('input[name="insured"]').each(function () {
                                                        $(this).removeClass("border-red");
                                                    }),
                                                    $('input[name="title_name"]').each(function () {
                                                        $(this).removeClass("border-red");
                                                    }),
                                                    $("#first_name").removeClass("border-red"),
                                                    $("#last_name").removeClass("border-red"),
                                                    $("#streetno").removeClass("border-red"),
                                                    $("#houseno").removeClass("border-red"),
                                                    $("#zip").removeClass("border-red"),
                                                    $("#city").removeClass("border-red"),
                                                    $("#Gaburtadatum").removeClass("border-red"))
                                                : "" == $("#email2").val()
                                                    ? ($("#email2").addClass("border-red"),
                                                        $("#email2").focus(),
                                                        $('input[name="insured"]').each(function () {
                                                            $(this).removeClass("border-red");
                                                        }),
                                                        $('input[name="title_name"]').each(function () {
                                                            $(this).removeClass("border-red");
                                                        }),
                                                        $("#first_name").removeClass("border-red"),
                                                        $("#last_name").removeClass("border-red"),
                                                        $("#streetno").removeClass("border-red"),
                                                        $("#houseno").removeClass("border-red"),
                                                        $("#zip").removeClass("border-red"),
                                                        $("#city").removeClass("border-red"),
                                                        $("#Gaburtadatum").removeClass("border-red"),
                                                        $("#telno").removeClass("border-red"))
                                                    : "" == $("#health-insurance").val()
                                                        ? ($("#health-insurance").addClass("border-red"),
                                                            $("#health-insurance").focus(),
                                                            $('input[name="insured"]').each(function () {
                                                                $(this).removeClass("border-red");
                                                            }),
                                                            $('input[name="title_name"]').each(function () {
                                                                $(this).removeClass("border-red");
                                                            }),
                                                            $("#first_name").removeClass("border-red"),
                                                            $("#last_name").removeClass("border-red"),
                                                            $("#streetno").removeClass("border-red"),
                                                            $("#houseno").removeClass("border-red"),
                                                            $("#zip").removeClass("border-red"),
                                                            $("#city").removeClass("border-red"),
                                                            $("#Gaburtadatum").removeClass("border-red"),
                                                            $("#telno").removeClass("border-red"),
                                                            $("#email2").removeClass("border-red"))
                                                        : "" == $("#insurance-no").val()
                                                            ? ($("#insurance-no").addClass("border-red"),
                                                                $("#insurance-no").focus(),
                                                                $('input[name="insured"]').each(function () {
                                                                    $(this).removeClass("border-red");
                                                                }),
                                                                $('input[name="title_name"]').each(function () {
                                                                    $(this).removeClass("border-red");
                                                                }),
                                                                $("#first_name").removeClass("border-red"),
                                                                $("#last_name").removeClass("border-red"),
                                                                $("#streetno").removeClass("border-red"),
                                                                $("#houseno").removeClass("border-red"),
                                                                $("#zip").removeClass("border-red"),
                                                                $("#city").removeClass("border-red"),
                                                                $("#Gaburtadatum").removeClass("border-red"),
                                                                $("#telno").removeClass("border-red"),
                                                                $("#email2").removeClass("border-red"),
                                                                $("#health-insurance").removeClass("border-red"))
                                                            : "" == $("#KrankenkasseNummer").val()
                                                                ? ($("#KrankenkasseNummer").addClass("border-red"),
                                                                    $("#KrankenkasseNummer").focus(),
                                                                    $('input[name="insured"]').each(function () {
                                                                        $(this).removeClass("border-red");
                                                                    }),
                                                                    $('input[name="title_name"]').each(function () {
                                                                        $(this).removeClass("border-red");
                                                                    }),
                                                                    $("#first_name").removeClass("border-red"),
                                                                    $("#last_name").removeClass("border-red"),
                                                                    $("#streetno").removeClass("border-red"),
                                                                    $("#houseno").removeClass("border-red"),
                                                                    $("#zip").removeClass("border-red"),
                                                                    $("#city").removeClass("border-red"),
                                                                    $("#Gaburtadatum").removeClass("border-red"),
                                                                    $("#telno").removeClass("border-red"),
                                                                    $("#email2").removeClass("border-red"),
                                                                    $("#health-insurance").removeClass("border-red"),
                                                                    $("#insurance-no").removeClass("border-red"))
                                                                : ("" == $("#carer-name").val() || $("#carer-name").val().length < 2) && !0 == optperson()
                                                                    ? ($("#carer-name").addClass("border-red"),
                                                                        $("#carer-name").focus(),
                                                                        $('input[name="insured"]').each(function () {
                                                                            $(this).removeClass("border-red");
                                                                        }),
                                                                        $('input[name="title_name"]').each(function () {
                                                                            $(this).removeClass("border-red");
                                                                        }),
                                                                        $("#first_name").removeClass("border-red"),
                                                                        $("#last_name").removeClass("border-red"),
                                                                        $("#streetno").removeClass("border-red"),
                                                                        $("#houseno").removeClass("border-red"),
                                                                        $("#zip").removeClass("border-red"),
                                                                        $("#city").removeClass("border-red"),
                                                                        $("#Gaburtadatum").removeClass("border-red"),
                                                                        $("#telno").removeClass("border-red"),
                                                                        $("#email2").removeClass("border-red"),
                                                                        $("#health-insurance").removeClass("border-red"),
                                                                        $("#insurance-no").removeClass("border-red"),
                                                                        $("#KrankenkasseNummer").removeClass("border-red"))
                                                                    : ("" == $("#carer-no").val() || $("#carer-no").val().length < 2) && !0 == optperson()
                                                                        ? ($("#carer-no").addClass("border-red"),
                                                                            $("#carer-no").focus(),
                                                                            $('input[name="insured"]').each(function () {
                                                                                $(this).removeClass("border-red");
                                                                            }),
                                                                            $('input[name="title_name"]').each(function () {
                                                                                $(this).removeClass("border-red");
                                                                            }),
                                                                            $("#first_name").removeClass("border-red"),
                                                                            $("#last_name").removeClass("border-red"),
                                                                            $("#streetno").removeClass("border-red"),
                                                                            $("#houseno").removeClass("border-red"),
                                                                            $("#zip").removeClass("border-red"),
                                                                            $("#city").removeClass("border-red"),
                                                                            $("#Gaburtadatum").removeClass("border-red"),
                                                                            $("#telno").removeClass("border-red"),
                                                                            $("#email2").removeClass("border-red"),
                                                                            $("#health-insurance").removeClass("border-red"),
                                                                            $("#insurance-no").removeClass("border-red"),
                                                                            $("#KrankenkasseNummer").removeClass("border-red"),
                                                                            $("#carer-name").removeClass("border-red"))
                                                                        : ("" == $("#carer-mail").val() || $("#carer-mail").val().length < 2) && !0 == optperson()
                                                                            ? ($("#carer-mail").addClass("border-red"),
                                                                                $("#carer-mail").focus(),
                                                                                $('input[name="insured"]').each(function () {
                                                                                    $(this).removeClass("border-red");
                                                                                }),
                                                                                $('input[name="title_name"]').each(function () {
                                                                                    $(this).removeClass("border-red");
                                                                                }),
                                                                                $("#first_name").removeClass("border-red"),
                                                                                $("#last_name").removeClass("border-red"),
                                                                                $("#streetno").removeClass("border-red"),
                                                                                $("#houseno").removeClass("border-red"),
                                                                                $("#zip").removeClass("border-red"),
                                                                                $("#city").removeClass("border-red"),
                                                                                $("#Gaburtadatum").removeClass("border-red"),
                                                                                $("#telno").removeClass("border-red"),
                                                                                $("#email2").removeClass("border-red"),
                                                                                $("#health-insurance").removeClass("border-red"),
                                                                                $("#insurance-no").removeClass("border-red"),
                                                                                $("#KrankenkasseNummer").removeClass("border-red"),
                                                                                $("#carer-name").removeClass("border-red"),
                                                                                $("#carer-no").removeClass("border-red"))
                                                                            : void 0 === $("input[name='inlineRadioOptions5']:checked").val() && !0 == optperson()
                                                                                ? ($('input[name="inlineRadioOptions5"]').each(function () {
                                                                                    $(this).addClass("border-red"), $(this).focus();
                                                                                }),
                                                                                    $('input[name="insured"]').each(function () {
                                                                                        $(this).removeClass("border-red");
                                                                                    }),
                                                                                    $('input[name="title_name"]').each(function () {
                                                                                        $(this).removeClass("border-red");
                                                                                    }),
                                                                                    $("#first_name").removeClass("border-red"),
                                                                                    $("#last_name").removeClass("border-red"),
                                                                                    $("#streetno").removeClass("border-red"),
                                                                                    $("#houseno").removeClass("border-red"),
                                                                                    $("#zip").removeClass("border-red"),
                                                                                    $("#city").removeClass("border-red"),
                                                                                    $("#Gaburtadatum").removeClass("border-red"),
                                                                                    $("#telno").removeClass("border-red"),
                                                                                    $("#email2").removeClass("border-red"),
                                                                                    $("#health-insurance").removeClass("border-red"),
                                                                                    $("#insurance-no").removeClass("border-red"),
                                                                                    $("#KrankenkasseNummer").removeClass("border-red"),
                                                                                    $("#carer-name").removeClass("border-red"),
                                                                                    $("#carer-no").removeClass("border-red"),
                                                                                    $("#carer-mail").removeClass("border-red"))
                                                                                : !1 == $("#condition-chcek").prop("checked")
                                                                                    ? ($("#condition-chcek").addClass("border-red-checkbox"),
                                                                                        $('input[name="inlineRadioOptions5"]').each(function () {
                                                                                            $(this).removeClass("border-red");
                                                                                        }),
                                                                                        $('input[name="insured"]').each(function () {
                                                                                            $(this).removeClass("border-red");
                                                                                        }),
                                                                                        $('input[name="title_name"]').each(function () {
                                                                                            $(this).removeClass("border-red");
                                                                                        }),
                                                                                        $("#first_name").removeClass("border-red"),
                                                                                        $("#last_name").removeClass("border-red"),
                                                                                        $("#streetno").removeClass("border-red"),
                                                                                        $("#houseno").removeClass("border-red"),
                                                                                        $("#zip").removeClass("border-red"),
                                                                                        $("#city").removeClass("border-red"),
                                                                                        $("#Gaburtadatum").removeClass("border-red"),
                                                                                        $("#telno").removeClass("border-red"),
                                                                                        $("#email2").removeClass("border-red"),
                                                                                        $("#health-insurance").removeClass("border-red"),
                                                                                        $("#insurance-no").removeClass("border-red"),
                                                                                        $("#KrankenkasseNummer").removeClass("border-red"),
                                                                                        $("#carer-name").removeClass("border-red"),
                                                                                        $("#carer-no").removeClass("border-red"),
                                                                                        $("#carer-mail").removeClass("border-red"))
                                                                                    : ($("#step2").css("display", "none"), $("#step3").css("display", "block"), $(".step3").addClass("active"));
    $('#title_name_fr_pd').empty();
    $('#title_name_her_pd').empty();
    $('#title_name_fr_pk').empty();
    $('#title_name_her_pk').empty();

    if ($('input[name="title_name"]:checked').val() == 'Frau') {
        $('#title_name_fr_pd').html('&#10003;');
        $('#title_name_fr_pk').html('&#10003;');
    } else {
        $('#title_name_her_pd').html('&#10003;');
        $('#title_name_her_pk').html('&#10003;');
    }


    $('#first_name_pd').html($('#first_name').val());
    $('#last_name_pd').html($('#last_name').val());
    $('#first_name_pk').attr('value', $('#first_name').val());
    $('#last_name_pk').attr('value', $('#last_name').val());
    $('#street_pd').html($('#houseno').val() + ', ' + $('#streetno').val());
    $('#mobile_pd').html($('#telno').val());
    $('#zip_pd').html($('#zip').val());
    $('#city_pd').html($('#city').val());
    $('#email_pd').html($('#email2').val());
    $('#dob_pd').html($('#Gaburtadatum').val());
    $('#health-insurance_pd').html($('#health-insurance').val());
    $('#insurance_no_pd').html($('#insurance-no').val());
}

$(".bed_protector_modal").click(function () {
    if ($(".productss").length > 0) {
        var missingSizes = [];
        var hasUnselectedSizes = false;
        var seenProductIds = {};
        
        $(".productss").each(function () {
            var r = $(this).attr("id").split("-");
            var productId = r[1];
            
            // Éviter les doublons
            if (!seenProductIds[productId]) {
                seenProductIds[productId] = true;
                var productName = $(".recProduct" + productId + " .prod-name").text();
                
                if (!$("input:radio[name='size" + productId + "']").is(":checked")) {
                    hasUnselectedSizes = true;
                    missingSizes.push({
                        id: productId,
                        name: productName
                    });
                }
            }
        });
        
        if (hasUnselectedSizes) {
            // Afficher le modal avec les produits manquants
            showSizeSelectionModal(missingSizes);
        } else {
            // Toutes les tailles sont sélectionnées, afficher le modal de protection de lit
            $("#bed_protector_modal").css("display", "block");
        }
    } else if ($(".cartItem").length > 0) {
        $("#bed_protector_modal").css("display", "block");
    } else {
        toastMessage("Sorry! Your cart is empty.");
    }
}),
    $(".with-bed-protection").click(function () {
        if ($("input:radio[name='number_of_bed']").is(":checked")) {
            // Choix fait - continuer normalement
            $("#bed_protector_modal").css("display", "none");
            $("#step1").css("display", "none");
            $("#step2").css("display", "block");
            $(".step2").addClass("active");
            
            // Supprimer l'effet d'erreur si présent
            $(".prod-count").removeClass("error-highlight");
        } else {
            // Aucun choix fait - afficher le modal d'erreur et l'effet visuel
            if (typeof showBedProtectionErrorModal === 'function') {
                showBedProtectionErrorModal();
            } else {
                // Fallback vers toast si la fonction n'est pas disponible
                toastMessage("Bitte wählen Sie die Anzahl der Bettschutzeinlagen aus.");
            }
            
            // Ajouter l'effet visuel sur les boutons
            $(".prod-count").addClass("error-highlight");
            
            // Supprimer l'effet après 3 secondes
            setTimeout(function() {
                $(".prod-count").removeClass("error-highlight");
            }, 3000);
        }
    }),
    
    // Supprimer l'effet d'erreur quand l'utilisateur fait un choix
    $("input:radio[name='number_of_bed']").change(function() {
        $(".prod-count").removeClass("error-highlight");
    }),
    
    $(".iAm-question").hover(
        function () {
            $(".iAm-question-ans").css({ top: "50px", display: "block" });
        },
        function () {
            $(".iAm-question-ans").css({ top: "-50px", display: "none" });
        }
    ),
    $(document).ready(function () {
        optperson(),
            $(".insured-question").hover(
                function () {
                    $(".insured-question-ans").css({ top: "50px", display: "block" });
                },
                function () {
                    $(".insured-question-ans").css({ top: "-50px", display: "none" });
                }
            ),
            $(".second-button").click(function () {
                customValidation();
            });
    }),
    $(function () {
        $("#dob").datepicker({ format: "dd/mm/yyyy" });
    });
var sketchpad = new Sketchpad({
    element: "#sketchpad",
    width: $("#signPad").outerWidth(),
    height: $("#signPad").outerHeight()
});

function pdBedProtection() {
    $('.bed_pd').empty();
    if ($('input[name="number_of_bed"]:checked').val() == 1) {
        $('#bed1').html('&#10003;');
    }
    else if ($('input[name="number_of_bed"]:checked').val() == 2) {
        $('#bed2').html('&#10003;');
    }
    else if ($('input[name="number_of_bed"]:checked').val() == 3) {
        $('#bed3').html('&#10003;');
    }
    else if ($('input[name="number_of_bed"]:checked').val() == 4) {
        $('#bed4').html('&#10003;');
    } else {
        $('.bed_pd').empty();
    }
}



function DownloadCanvasAsImage() {
    document.createElement("a").setAttribute("download", "CanvasAsImage.jpg");
    let e = document
        .getElementById("sketchpad")
        .toDataURL("image/jpg")
        .replace(/^data:image\/jpg/, "data:application/octet-stream");
    $("#signatureImg").attr("src", e);
}

function deletesign() {
    $("#signatureImg").attr("src", ""), sketchpad.clear();
}

$(".saveAddress").click(function () {
    $("#step3").css("display", "none"), $("#step4").css("display", "block"), $(".step4").addClass("active"), new Sketchpad({
        element: "#sketchpad", width: $("#signPad").outerWidth(), height: $("#signPad").outerHeight()
    });
}),
    $(".deliveryAddress").click(function () {
        $("#Drecipient_name").val().length < 1
            ? ($("#Drecipient_name").addClass("border-red"), $("#Drecipient_name").focus())
            : $("#Dstreetno").val().length < 1
                ? ($("#Dstreetno").addClass("border-red"), $("#Dstreetno").focus(), $("#Drecipient_name").removeClass("border-red"))
                : $("#Dhouseno").val().length < 1
                    ? ($("#Dhouseno").addClass("border-red"), $("#Dhouseno").focus(), $("#Drecipient_name").removeClass("border-red"), $("#Dstreetno").removeClass("border-red"))
                    : $("#Dzip").val().length < 1
                        ? ($("#Dzip").addClass("border-red"), $("#Dzip").focus(), $("#Drecipient_name").removeClass("border-red"), $("#Dstreetno").removeClass("border-red"), $("#Dhouseno").removeClass("border-red"))
                        : $("#Dcity").val().length < 1
                            ? ($("#Dcity").addClass("border-red"),
                                $("#Dcity").focus(),
                                $("#Drecipient_name").removeClass("border-red"),
                                $("#Dstreetno").removeClass("border-red"),
                                $("#Dhouseno").removeClass("border-red"),
                                $("#Dzip").removeClass("border-red"))
                            : ($("#step3").css("display", "none"),
                                $("#step4").css("display", "block"),
                                $(".step1").removeClass("active"),
                                $(".step2").removeClass("active"),
                                $(".step3").removeClass("active"),
                                $(".step4").addClass("active"),
                                new Sketchpad({
                                    element: "#sketchpad",
                                    width: $("#signPad").outerWidth(),
                                    height: $("#signPad").outerHeight()
                                }));
    }),
    $(".without-bed-protection").click(function () {
        $("#step1").css("display", "none"), $("#step2").css("display", "block"), $(".step2").addClass("active");
    });

function successtoastMessage(message) {
    $.toast({
        heading: 'Alert Message',
        text: message,
        icon: 'success',
        loader: true,        // Change it to false to disable loader
        loaderBg: '#de1414',  // To change the background
        showHideTransition: 'slide',
        hideAfter: 5000,
        allowToastClose: true,
        stack: 4,
        position: 'top-right',
    });
}
function errortoastMessage(message) {
    $.toast({
        heading: 'Alert Message',
        text: message,
        icon: 'error',
        loader: true,        // Change it to false to disable loader
        loaderBg: '#de1414',  // To change the background
        showHideTransition: 'slide',
        hideAfter: 5000,
        allowToastClose: true,
        stack: 4,
        position: 'top-right',
    });
}

// Fonction pour afficher le modal de sélection de taille
function showSizeSelectionModal(missingSizes) {
    var modalContent = '';
    
    // Supprimer les doublons basés sur l'ID du produit
    var uniqueProducts = [];
    var seenIds = {};
    
    missingSizes.forEach(function(product) {
        if (!seenIds[product.id]) {
            seenIds[product.id] = true;
            uniqueProducts.push(product);
        }
    });
    
    uniqueProducts.forEach(function(product) {
        modalContent += '<div class="mb-3 p-3 border rounded">';
        modalContent += '<h6 class="text-primary">' + product.name + '</h6>';
        modalContent += '<p class="text-muted mb-2">Bitte wählen Sie eine Größe aus:</p>';
        
        // Récupérer les tailles disponibles pour ce produit
        var sizeInputs = $('input[name="size' + product.id + '"]');
        if (sizeInputs.length > 0) {
            sizeInputs.each(function() {
                var sizeValue = $(this).val();
                var sizeId = $(this).attr('id');
                modalContent += '<div class="form-check form-check-inline">';
                modalContent += '<input class="form-check-input" type="radio" name="modal_size_' + product.id + '" id="modal_' + sizeId + '" value="' + sizeValue + '">';
                modalContent += '<label class="form-check-label" for="modal_' + sizeId + '">' + sizeValue + '</label>';
                modalContent += '</div>';
            });
        }
        modalContent += '</div>';
    });
    
    $('#sizeSelectionContent').html(modalContent);
    
    // Afficher le modal avec Bootstrap 5
    var modalElement = document.getElementById('sizeSelectionModal');
    var modal = new bootstrap.Modal(modalElement);
    modal.show();
}

// Gestionnaire pour le bouton "Weiter zu Bettschutz"
$(document).on('click', '#continueToBedProtection', function() {
    var allSizesSelected = true;
    var missingProducts = [];
    var seenProductIds = {};
    
    // Vérifier si toutes les tailles sont sélectionnées
    $('.productss').each(function() {
        var r = $(this).attr("id").split("-");
        var productId = r[1];
        
        // Éviter les doublons
        if (!seenProductIds[productId]) {
            seenProductIds[productId] = true;
            var productName = $(".recProduct" + productId + " .prod-name").text();
            
            if (!$("input:radio[name='size" + productId + "']").is(":checked")) {
                allSizesSelected = false;
                missingProducts.push(productName);
            }
        }
    });
    
    if (allSizesSelected) {
        // Fermer le modal et afficher le modal de protection de lit
        var modalElement = document.getElementById('sizeSelectionModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
            modal.hide();
        }
        $("#bed_protector_modal").css("display", "block");
    } else {
        // Afficher un message d'erreur dans le modal au lieu d'un alert
        var errorMessage = 'Bitte wählen Sie für alle Produkte eine Größe aus:\n' + missingProducts.join('\n');
        
        // Mettre à jour le contenu du modal avec le message d'erreur
        $('#sizeSelectionContent').html('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle me-2"></i>' + errorMessage.replace(/\n/g, '<br>') + '</div>');
        
        // Le modal reste ouvert pour que l'utilisateur puisse corriger
    }
});

// Synchroniser les sélections du modal avec les sélections principales
$(document).on('change', 'input[name^="modal_size_"]', function() {
    var productId = $(this).attr('name').replace('modal_size_', '');
    var sizeValue = $(this).val();
    
    // Mettre à jour la sélection principale
    $('input[name="size' + productId + '"][value="' + sizeValue + '"]').prop('checked', true);
    
    // Mettre à jour l'affichage
    fetchSize(productId);
});

// Nettoyer le modal quand il est fermé
$(document).on('hidden.bs.modal', '#sizeSelectionModal', function() {
    // Réinitialiser le contenu du modal
    $('#sizeSelectionContent').empty();
});

// Empêcher la fermeture du modal si des tailles sont manquantes
$(document).on('hide.bs.modal', '#sizeSelectionModal', function(e) {
    var hasUnselectedSizes = false;
    var seenProductIds = {};
    
    $('.productss').each(function() {
        var r = $(this).attr("id").split("-");
        var productId = r[1];
        
        if (!seenProductIds[productId]) {
            seenProductIds[productId] = true;
            if (!$("input:radio[name='size" + productId + "']").is(":checked")) {
                hasUnselectedSizes = true;
            }
        }
    });
    
    // Si des tailles sont manquantes, empêcher la fermeture
    if (hasUnselectedSizes) {
        e.preventDefault();
        return false;
    }
});

// ===== FONCTIONS DE RECHERCHE D'EMAIL (même principe que test-modal-final) =====

// Encapsulation pour éviter les conflits avec le code existant
(function() {
    'use strict';
    
    // Base de données simulée avec plusieurs clients
    const emailSearchCustomers = [
        {
            email: 'karim.hasni@medic-cos.de',
            firstName: 'Karim',
            lastName: 'Hasni',
            street: 'Musterstraße',
            houseNo: '123',
            zip: '12345',
            city: 'Berlin',
            dob: '1990-01-15',
            telephone: '+49 30 12345678',
            insuranceName: 'AOK',
            insuranceNumber: '1234567890',
            healthInsuranceNo: '0987654321'
        },
        {
            email: 'test@example.com',
            firstName: 'Test',
            lastName: 'User',
            street: 'Teststraße',
            houseNo: '456',
            zip: '54321',
            city: 'München',
            dob: '1985-06-20',
            telephone: '+49 89 87654321',
            insuranceName: 'Barmer',
            insuranceNumber: '9876543210',
            healthInsuranceNo: '1234567890'
        },
        {
            email: 'maria.mueller@example.com',
            firstName: 'Maria',
            lastName: 'Müller',
            street: 'Hauptstraße',
            houseNo: '789',
            zip: '10115',
            city: 'Berlin',
            dob: '1975-03-10',
            telephone: '+49 30 98765432',
            insuranceName: 'TK',
            insuranceNumber: '1122334455',
            healthInsuranceNo: '5566778899'
        }
    ];

    let currentEmailCustomer = null;

// Fonction principale de recherche d'email
function searchCustomerByEmail() {
    const email = document.getElementById('search_email').value;
    const alertMessage = document.getElementById('alertMessage');
    const clearBtn = document.getElementById('clearBtn');
    const debugInfo = document.getElementById('debugInfo');
    
    // Mettre à jour les informations de debug
    debugInfo.textContent = 'Recherche en cours...';
    debugInfo.style.color = '#ffc107';
    
    setTimeout(() => {
        if (!email) {
            showAlertMessage('Bitte geben Sie eine Email-Adresse ein.', 'warning');
            debugInfo.textContent = 'Erreur - Email manquant';
            debugInfo.style.color = '#dc3545';
            return;
        }
        
        const customer = emailSearchCustomers.find(c => c.email === email);
        
        if (customer) {
            currentEmailCustomer = customer;
            
            // Remplir les champs avec animation
            fillFieldWithAnimation('first_name', customer.firstName);
            fillFieldWithAnimation('last_name', customer.lastName);
            fillFieldWithAnimation('streetno', customer.street);
            fillFieldWithAnimation('houseno', customer.houseNo);
            fillFieldWithAnimation('zip', customer.zip);
            fillFieldWithAnimation('city', customer.city);
            fillFieldWithAnimation('Gaburtadatum', customer.dob);
            fillFieldWithAnimation('telno', customer.telephone);
            fillFieldWithAnimation('email2', customer.email);
            fillFieldWithAnimation('health-insurance', customer.insuranceName);
            fillFieldWithAnimation('insurance-no', customer.insuranceNumber);
            fillFieldWithAnimation('KrankenkasseNummer', customer.healthInsuranceNo);
            
            // Masquer les champs de mot de passe
            $('.password-fields').hide();
            
            // Afficher le message de succès
            showAlertMessage('✅ Kunde gefunden! Die Formularfelder werden automatisch ausgefüllt.', 'success');
            
            // Afficher le bouton de suppression
            clearBtn.style.display = 'inline-block';
            
            // Mettre à jour les informations de debug
            debugInfo.textContent = `✅ Client trouvé: ${customer.firstName} ${customer.lastName}`;
            debugInfo.style.color = '#28a745';
            
        } else {
            currentEmailCustomer = null;
            
            // Vider le formulaire
            clearFormFields();
            
            // Afficher les champs de mot de passe
            $('.password-fields').show();
            
            // Afficher le message d'avertissement
            showAlertMessage('⚠️ Kein Kunde gefunden! Bitte überprüfen Sie die Email-Adresse oder füllen Sie das Formular manuell aus.', 'warning');
            
            // Masquer le bouton de suppression
            clearBtn.style.display = 'none';
            
            // Mettre à jour les informations de debug
            debugInfo.textContent = '❌ Client non trouvé - Veuillez remplir tous les champs';
            debugInfo.style.color = '#dc3545';
        }
    }, 1000); // Simuler un délai réseau
}

// Fonction pour remplir un champ avec animation
function fillFieldWithAnimation(fieldId, value) {
    const field = document.getElementById(fieldId);
    if (field) {
        field.style.transition = 'all 0.3s ease';
        field.style.transform = 'scale(1.05)';
        field.style.borderColor = '#28a745';
        
        setTimeout(() => {
            field.value = value;
            field.style.transform = 'scale(1)';
            field.style.borderColor = '';
        }, 200);
    }
}

// Fonction pour effacer les données du client
function clearCustomerData() {
    currentEmailCustomer = null;
    clearFormFields();
    document.getElementById('search_email').value = '';
    $('.password-fields').show();
    document.getElementById('clearBtn').style.display = 'none';
    document.getElementById('alertMessage').innerHTML = '';
    document.getElementById('debugInfo').textContent = 'Données effacées';
    document.getElementById('debugInfo').style.color = '#6c757d';
}

// Fonction pour vider tous les champs du formulaire
function clearFormFields() {
    const fields = [
        'first_name', 'last_name', 'streetno', 'houseno', 'zip', 'city', 
        'Gaburtadatum', 'telno', 'email2', 'health-insurance', 'insurance-no', 'KrankenkasseNummer'
    ];
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.value = '';
        }
    });
}

    // Fonction pour afficher les messages d'alerte
    function showAlertMessage(message, type) {
        const alertMessage = document.getElementById('alertMessage');
        const iconClass = type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'times-circle';
        const title = type === 'success' ? 'Erfolg!' : type === 'warning' ? 'Warnung!' : 'Fehler!';
        
        alertMessage.innerHTML = `
            <div class="alert alert-${type} mt-3 fade-in">
                <i class="fas fa-${iconClass}"></i> 
                <strong>${title}</strong> ${message}
            </div>
        `;
    }

    // Exposer les fonctions globalement
    window.searchCustomerByEmail = searchCustomerByEmail;
    window.clearCustomerData = clearCustomerData;
    
    // Recherche automatique au chargement de la page si un email est pré-rempli
    $(document).ready(function() {
        const emailField = document.getElementById('search_email');
        if (emailField && emailField.value) {
            // Délai pour s'assurer que la page est complètement chargée
            setTimeout(() => {
                searchCustomerByEmail();
            }, 500);
        }
    });
    
})();
