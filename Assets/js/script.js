$(document).ready(function () {
  // forgit password page jquery start
  $(".emailSub").click(function (e) {
    e.preventDefault();
    $("#forgitPass").addClass("d-none");
    $("#newPass").addClass("d-none");
    $("#OTP").removeClass("d-none");
  });
  $("#otpSub").click(function (e) {
    e.preventDefault();
    $("#OTP").addClass("d-none");
    $("#newPass").removeClass("d-none");
  });
  // forgit password page jquery end
  window.setTimeout(function () {
    $(".alert").slideUp(500);
  }, 5000);
  $("a.delete").click(function () {
    var sure = window.confirm("Are you sure want to delete?");
    if (!sure) {
      event.preventDefault();
    }
  });
});
window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    if (localStorage.getItem("sb|sidebar-toggle") === "true") {
      document.body.classList.toggle("sb-sidenav-toggled");
    }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

$("select#chooseCatagory").on("focus", function () {
  $(this).find("option:first").hide();
});

$("#chooseCatagoryLable").click(function () {
  const text = $(this).text();
  if (text == "True / False") {
    $(this).text("Multichoose");
    $(this).addClass("btn-danger");
    $(this).removeClass("btn-secondary");
  } else {
    $(this).text("True / False");
    $(this).addClass("btn-secondary");
    $(this).removeClass("btn-danger");
  }
});
$(document).ready(function () {
  $(".toggle").click(function () {
    const password = $("#password");
    if (password.attr("type") === "password") {
      password.attr("type", "text");
      $(".toggle").removeClass("fa-eye");
      $(".toggle").addClass("fa-eye-slash");
    } else {
      password.attr("type", "password");
      $(".toggle").removeClass("fa-eye-slash");
      $(".toggle").addClass("fa-eye");
    }
  });

  $(".confirm").click(function () {
    const confirm = $("#confirm");
    if (confirm.attr("type") === "password") {
      confirm.attr("type", "text");
      $(".confirm").removeClass("fa-eye");
      $(".confirm").addClass("fa-eye-slash");
    } else {
      confirm.attr("type", "password");
      $(".confirm").removeClass("fa-eye-slash");
      $(".confirm").addClass("fa-eye");
    }
  });

  // pop delete button controller
  $("*#closeBtn").click(function () {
    $("#my").hide();
  });

  $("*#showBtn").click(function () {
    $("#my").show();
  });
  // pop inpup controller
  $("*#closeBtnInput").click(function () {
    $("#inputPop").hide();
  });

  $("*#showBtnInput").click(function () {
    $("#inputPop").show();
  });
  $("*#closeCatagoryUp").click(function () {
    $("#catagoryUp").hide();
  });

  $("*#showCatagoryUp").click(function () {
    $("#catagoryUp").show();
  });
  $("*#closeTypeUp").click(function () {
    $("#typeUp").hide();
  });

  $("*#showTypeUp").click(function () {
    $("#typeUp").show();
  });

  // $(".img-pop").magnificPopup({
  //   type: "image",
  //   gallery: {
  //     enabled: true,
  //   },
  // });
});
function pop(url, costom = "") {
  $("*#durl").attr("href", url);
  $("*#costom").html("Are you sure delete this " + costom + " ?");
}
