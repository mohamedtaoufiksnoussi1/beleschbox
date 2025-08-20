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
    // Éviter les clics multiples
    if ($(this).data('clicked')) {
        return;
    }
    $(this).data('clicked', true);
    
    // Réinitialiser après un délai
    setTimeout(function() {
        $(".bed_protector_modal").data('clicked', false);
    }, 1000);
    
    if ($(".productss").length > 0) {
        var e = 0;
        var alertShown = false; // Variable pour éviter les alertes multiples
        
        $(".productss").each(function () {
            var r = $(this).attr("id").split("-");
            var productId = r[1];
            
            // Vérifier si le produit est un gant en regardant le nom du produit
            var productName = "";
            var cartItem = $(this).closest('.cartItem');
            if (cartItem.length > 0) {
                var productNameElement = cartItem.find('.prod-name');
                if (productNameElement.length > 0) {
                    productName = productNameElement.text().toLowerCase();
                }
            }
            
            // Vérifier si c'est un gant (handschuh, glove, gant)
            var isGlove = productName.includes('handschuh') || productName.includes('glove') || productName.includes('gant');
            
            // Afficher l'alerte seulement si c'est un gant, qu'aucune taille n'est sélectionnée, et qu'aucune alerte n'a encore été affichée
            if (isGlove && !$("input:radio[name='size" + productId + "']").is(":checked") && !alertShown) {
                toastMessage("Please select product size!");
                alertShown = true; // Marquer qu'une alerte a été affichée
                e++;
            }
        }),
            0 == e && $("#bed_protector_modal").css("display", "block");
    } else $(".cartItem").length > 0 ? $("#bed_protector_modal").css("display", "block") : toastMessage("Sorry! Your cart is empty.");
}),
    $(".with-bed-protection").click(function () {
        $("input:radio[name='number_of_bed']").is(":checked")
            ? ($("#bed_protector_modal").css("display", "none"), $("#step1").css("display", "none"), $("#step2").css("display", "block"), $(".step2").addClass("active"))
            : toastMessage("Please select number of bed protection.");

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
