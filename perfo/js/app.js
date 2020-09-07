$(document).foundation({
  equalizer: {
    // Specify if Equalizer should make elements equal height once they become stacked.
    equalize_on_stack: true,
  },
});

$(window).load(function () {
  $("#home-slider").carouFredSel(
    {
      responsive: true,
      items: {
        height: "variable",
        visible: 1,
      },
      scroll: {
        items: 1,
        pauseOnHover: true,
        duration: 800,
        fx: "crossfade",
      },
      pagination: "#pager",
      prev: { button: ".prev-navigation" },
      next: { button: ".next-navigation" },
    },
    {
      wrapper: { classname: "home-slider-wrapper" },
    }
  );

  $("#partners-slider")
    .carouFredSel(
      {
        responsive: true,
        scroll: 1,
        width: "90%",
        height: "variable",
        items: {
          height: "variable",
          visible: { min: 1, max: 8 },
        },
        prev: {
          button: ".prev-navigation",
        },
        next: {
          button: ".next-navigation",
        },
      },
      {
        wrapper: { classname: "partners-slider-wrapper" },
      }
    )
    .parent()
    .css("margin", "auto");

  $("#testimony-slider")
    .carouFredSel(
      {
        responsive: true,
        scroll: 1,
        width: "90%",
        height: "variable",
        items: {
          visible: 1,
          height: "variable",
        },
        auto: {
          play: false,
        },
        prev: {
          button: ".prev-testimony",
        },
        next: {
          button: ".next-testimony",
        },
      },
      {
        wrapper: {
          classname: "testimonies-slider-wrapper",
        },
      }
    )
    .parent()
    .css("margin", "auto");
});

$("#other-formation select").each(function () {
  console.log($(this).children("option:selected").val());
  if ($(this).children("option:selected").val() != 0) {
    $(this).parents("#other-formation").show();
    $("#other-formation").find("select").attr("disabled", false);
  }
});

$("#phone_mobile").on("click", function () {
  var tel = $(this).data("url");
  window.location.href = tel;
});

$("#link-other-formation").on("click", function () {
  $("#other-formation").slideToggle("normal", function () {
    if ($("#other-formation").css("display") == "block") {
      $("#other-formation").find("select").attr("disabled", false);
    } else {
      $("#other-formation").find("select").attr("disabled", "disabled");
    }
  });
  return false;
});

if ($("#container-address").is(":checked")) {
  $("#container-address").show();
}

$("#mail-check").on("click", function () {
  if ($(this).is(":checked")) {
    $("#container-address").slideDown();
  } else {
    $("#container-address").slideUp();
  }
});

//NAVIGATION RESPONSIVE
$(".off-canvas-list label").on("click", function () {
  if ($(this).hasClass("open")) {
    $(this).removeClass("open");
    $(this).siblings(".container-link").stop().slideUp();
  } else {
    $(this).addClass("open");
    $(this).siblings(".container-link").stop().slideDown();
  }
});

// FAQ
$(".container-faq").on("click", ".plus", function () {
  if ($(this).hasClass("open")) {
    $(this).removeClass("open");
    $(this).parent(".question").siblings(".answer").stop().slideUp();
  } else {
    $(this).addClass("open");
    $(this).parent(".question").siblings(".answer").stop().slideDown();
  }
});

// NAVIGATION
$(".navigation-item").one("mouseenter", function () {
  // Calcul pour la longueur du sous-menu.
  var widthContainer = 0;
  $(this)
    .children(".container-sub-navigation")
    .each(function () {
      $(this)
        .children("ul")
        .each(function () {
          widthContainer += $(this).innerWidth();
        });
      // Pour les white spaces du display inline-block.
      var display = ($(this).children("ul").length - 1) * 8;
      widthContainer += display;
      $(this).css({ width: widthContainer });
    });
});

//Liste les formations suivant le domaine dans le formulaire de demande de doc
$('[data-categories="select-categories"]').on("change", function () {
  $("#echeances").html("");
  var url = "/Formations/listFormationsAjax/",
    categoryId = $(this).val();
  $.post(
    url + categoryId,
    function (response) {
      $('[data-formations="select-formations"]').empty().append(response);
    },
    "html"
  );
});
//Liste les formations suivant le domaine dans le formulaire de demande de doc si deuxième formation

$('[data-categories="select-categories2"]').on("change", function () {
  $("#echeances").html("");
  var url = "/Formations/listFormationsAjax/",
    categoryId = $(this).val();
  $.post(
    url + categoryId,
    function (response) {
      $('[data-formations="select-formations2"]').empty().append(response);
    },
    "html"
  );
});

//AJAX Docs express
$("#submit_express").on("click", function (e) {
  e.preventDefault();
  $(".error-message").fadeOut().remove();
  var form = $(this).parents("form"),
    action = "/DocumentationsExpress/doc_express_ajax";
  $("#submit_express").val("Vérification...").prop("disabled", true);
  $.post(
    action,
    form.serialize(),
    function (response) {
      if (response.status == 0) {
        $("#submit_express")
          .val("Envoyer votre demande")
          .prop("disabled", false);
        $(".field").each(function () {
          var elt = $(this);
          var champ = elt.attr("id");
          if (response.errors[champ]) {
            elt.next(".error-message").remove();
            $("#" + champ).after(
              '<div class="error-message">' + response.errors[champ] + "</div>"
            );
          }
        });
        return false;
      } else {
        form.submit();
      }
    },
    "json"
  );
});

// AJAX Docs express
$("#submit_express2").on("click", function (e) {
  e.preventDefault();
  $(".error-message").fadeOut().remove();
  var form = $(this).parents("form"),
    action = "/DocumentationsExpress/doc_express_ajax_bottom";
  $("#submit_express2").prop("disabled", true);
  $.post(
    action,
    form.serialize(),
    function (response) {
      if (response.status == 0) {
        $("#submit_express2").prop("disabled", false);
        $(".field2").each(function () {
          var elt = $(this);
          var champ = elt.attr("id");
          if (response.errors[champ]) {
            elt.next(".error-message").remove();
            $("#" + champ).after(
              '<div class="error-message">' + response.errors[champ] + "</div>"
            );
          }
        });
        return false;
      } else {
        form.submit();
      }
    },
    "json"
  );
});