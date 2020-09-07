(function ($) {
  $("#alertSuccess").hide();
  $("#meal_preference")
    .parent()
    .append(
      '<ul class="list-item" id="newmeal_preference" name="meal_preference"></ul>'
    );
  $("#meal_preference option").each(function () {
    $("#newmeal_preference").append(
      '<li value="' + $(this).val() + '">' + $(this).text() + "</li>"
    );
  });
  $("#meal_preference").remove();
  $("#newmeal_preference").attr("id", "meal_preference");
  $("#meal_preference li").first().addClass("init");
  $("#meal_preference").on("click", ".init", function () {
    $(this).closest("#meal_preference").children("li:not(.init)").toggle();
  });

  var allOptions = $("#meal_preference").children("li:not(.init)");
  $("#meal_preference").on("click", "li:not(.init)", function () {
    allOptions.removeClass("selected");
    $(this).addClass("selected");
    $("#meal_preference").children(".init").html($(this).html());
    allOptions.toggle();
  });

  var marginSlider = document.getElementById("slider-margin");
  if (marginSlider != undefined) {
    noUiSlider.create(marginSlider, {
      start: [500],
      step: 10,
      connect: [true, false],
      tooltips: [true],
      range: {
        min: 0,
        max: 1000,
      },
      format: wNumb({
        decimals: 0,
        thousand: ",",
        prefix: "$ ",
      }),
    });
  }
  $("#reset").on("click", function () {
    $("#register-form").reset();
  });

  $("#submitBtn").on("click", function (e) {
    e.preventDefault();
    $("#register-form").validate({
      rules: {
        nom: {
          required: true,
        },
        prenom: {
          required: true,
        },
        datenaissance: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        phone: {
          required: true,
        },
        commune: {
          required: true,
        },
        form_survey: {
          required: true,
        },
        genre: {
          required: true,
        },
        projet_survey: {
          required: false,
        },
        nomprojet: {
          required: false,
        },
        tic_survey: {
          required: true,
        },
        lien: {
          required: false,
        },
        info_survey: {
          required: true,
        },
        activity: {
          required: false,
        },
      },
      onfocusout: function (element) {
        $(element).valid();
      },
    });

    // var dt = {
    //   nom: $("#nom").val(),
    //   prenom: $("#prenom").val(),
    //   datenaissance: $("#datenaissance").val(),
    //   email: $("#email").val(),
    //   phone: $("#phone").val(),
    //   commune: $("#commune").val(),
    //   form_survey: $(".form_survey:checked").val(),
    //   genre: $(".genre").val(),
    //   projet_survey: $(".projet_survey:checked").val(),
    //   nomprojet: $("#nomprojet").val(),
    //   tic_survey: $(".tic_survey:checked").val(),
    //   lien: $("#lien").val(),
    //   info_survey: $(".info_survey:checked").val(),
    //   activity: $("#activity").val(),
    // };

    $.ajax({
      type: "POST",
      url: "http://localhost:3000/traitement.php",
      data: {
        save: 1,
        nom: $("#nom").val(),
        prenom: $("#prenom").val(),
        datenaissance: $("#datenaissance").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        commune: $("#commune").val(),
        form_survey: $(".form_survey:checked").val(),
        genre: $(".genre").val(),
        projet_survey: $(".projet_survey:checked").val(),
        nomprojet: $("#nomprojet").val(),
        tic_survey: $(".tic_survey:checked").val(),
        lien: $("#lien").val(),
        info_survey: $(".info_survey:checked").val(),
        activity: $("#activity").val(),
      },
      success: function (data) {
        $("#alertSuccess").hide();
        $("#register-form")[0].reset();
      },
    });
  });

  jQuery.extend(jQuery.validator.messages, {
    required: "",
    remote: "",
    email: "",
    url: "",
    date: "",
    dateISO: "",
    number: "",
    digits: "8",
    creditcard: "",
    equalTo: "",
  });
})(jQuery);
