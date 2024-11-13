$(document).ready(function () {
  $("#table_id").DataTable();

  $("#add-post").on("click", function () {
    var post = [];
    var content_type = "2"; // i.e to diffrentiate b/w page =1 , post=2 & category=3
    if ($("[name='post[]']:checked").length > 0) {
      $(".post:checked").each(function (i) {
        post[i] = $(this).val();
        title = $(this).next("label").text();
        $(this).prop("disabled", true);
        $(".page_tit").append(
          '<p class="w-50 mb-0 mt-1" data-toggle="collapse" href="#postlist' +
            post[i] +
            '" role="button" aria-expanded="false" aria-controls="collapseExample"><b>' +
            title +
            '</b><i class="fa fa-caret-down float-right"></i><span class="float-right mn-ic px-1"><small>Post</small></p><div class="collapse w-50 border-radius-0" id="postlist' +
            post[i] +
            '"><div class="border p-2 mt-0"><small><label for="">Navigation label</label></small><small><input class="form-control" type="text" placeholder="Custom label" name="cus_post_title"><input type="hidden" name="post[]" value="' +
            post[i] +
            '"><input type="hidden" name="content_typ" value="' +
            content_type +
            '"></small><small><a href="" id="rmv_menu_item" class="text-danger p-2">Remove </a></small><small><a href="#" class="text-blue p-1"> Cancel </a></small></div> </div>'
        );
      });

      $(".post").prop("checked", false);
    }
  });

  $("#add-category").on("click", function () {
    var category = [];
    var content_type = "3"; // Differentiating between page=1, post=2, and category=3
    if ($("[name='category[]']:checked").length > 0) {
      $(".category:checked").each(function (i) {
        category[i] = $(this).val();
        var title = $(this).next("label").text();
        $(this).prop("disabled", true);
        $(".page_tit").append(
          `<p class="w-50 mb-0 mt-1" data-toggle="collapse" href="#catylist${category[i]}" role="button" aria-expanded="false" aria-controls="collapseExample"><b>${title}</b><i class="fa fa-caret-down float-right"></i><span class="float-right mn-ic px-1"><small>Category</small></p>
          <div class="collapse w-50 border-radius-0" id="catylist${category[i]}">
            <div class="border p-2 mt-0">
              <small><label for="">Navigation label</label></small>
              <small>
                <input class="form-control" type="text" placeholder="Custom label" name="cus_post_title">
                <input type="hidden" name="category[]" value="${category[i]}">
                <input type="hidden" name="content_typ" value="${content_type}">
              </small>
              <small><a href="" id="rmv_menu_item" class="text-danger p-2">Remove</a></small>
              <small><a href="#" class="text-blue p-1">Cancel</a></small>
            </div>
          </div>`
        );
      });

      $(".category").prop("checked", false);
    }
  });

  $("#add-custom-link").on("click", function () {
    var content_type = "4"; // i.e to diffrentiate b/w page =1 , post=2 & category=3 ,custom links =4
    var title = $("#cs_link").val();
    var url = $("#cs_url").val();

    $(".page_tit").append(
      '<p class="w-50 mb-0 mt-1" data-toggle="collapse" href="#cus_link" role="button" aria-expanded="false" aria-controls="collapseExample"><b>' +
        title +
        '</b><i class="fa fa-caret-down float-right"></i></p><div class="collapse w-50 border-radius-0" id="cus_link"><div class="border p-2 mt-0"><small><label for="">Navigation label</label></small><small><input class="form-control" type="text" placeholder="Custom label" name="cus_post_title"><input type="hidden" name="content_typ" value="' +
        content_type +
        '"></small><small><a href="" id="rmv_menu_item" class="text-danger p-2">Remove </a></small><small><a href="#" class="text-blue p-1"> Cancel </a></small></div> </div>'
    );
  });

  $(document).on("click", "#save_category", function (event) {
    event.preventDefault(event);
    var caty_title = $("#caty_title").val();
    var caty_slug = $("#caty_slug").val();
    var cat_id = $("#cat_id").val();

    $.ajax({
      type: "POST",
      url: baseURL + "add-category",
      data: { caty_title: caty_title, caty_slug: caty_slug, cat_id: cat_id },
      dataType: "json",
      success: function (data) {
        if (cat_id !== "") {
          var catIdToUpdate = data.cat_id;
          var $existingRow = $(".category_list_items").find(
            "tr[data-cat-id='" + catIdToUpdate + "']"
          );
          console.log($existingRow.length);
          if ($existingRow.length > 0) {
            $existingRow.find(".cat_title").text(data.cat_name);
            $existingRow.find(".cat_id").text(data.cat_id);
            $existingRow.find(".cat_slug").text(data.cat_slug);
          }
        } else {
          $(".category_list_items").prepend(
            "<tr data-cat-id='" +
              data.cat_id +
              "'><td>" +
              data.cat_name +
              "</td><td>" +
              data.cat_id +
              "</td><td>" +
              data.cat_slug +
              "</td><td>" +
              '<a id="edit_cat" href=""><i class="fa fa-edit text-success px-1"></i></a><a href=""><i class="fa fa-trash txt-red px-1"></i></a></td></tr>'
          );
        }

        // Clear input fields
        $("#caty_title").val("");
        $("#caty_slug").val("");
        $("#cat_id").val(""); // Clear the cat_id field
      },

      error: function (xhr, status, error) {
        alert("Response Error !!");
      },
    });
  });

  $(document).on("click", ".delete_cat", function (event) {
    // event.preventDefault(event);
    var cat_id = $(this).closest(".data-row").find(".cat_id").text();
    var id = cat_id.trim();
    var $row = $(this).closest(".data-row"); // Store a reference to the row

    $.ajax({
      type: "post",
      url: baseURL + "delete-category-by-id",
      data: { id: id },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $row.hide();
          alert(response);
        }
      },
    });
  });

  $(".edit_cat").on("click", function (event) {
    event.preventDefault(event);
    var cat_id = $(this).closest(".data-row").find(".cat_id").text();
    var cat_title = $(this).closest(".data-row").find(".cat_title").text();
    var cat_slug = $(this).closest(".data-row").find(".cat_slug").text();
    $("#cat_id").val($.trim(cat_id));
    $("#caty_title").val($.trim(cat_title));
    $("#caty_slug").val($.trim(cat_slug));
  });

  $("#myTable").dataTable();

  $(".add_category").on("click", function (event) {
    event.preventDefault(event);

    var caty_title = $(".cat_box").val();
    $.ajax({
      type: "post",
      url: baseURL + "add-categoy-to-post",
      data: { caty_title: caty_title },
      dataType: "json", // ** ensure you add this line **
      success: function (data) {
        catlist =
          ' <div class="pl-1 border mt-0"><input class="mr-1" type="checkbox" value="' +
          data.cat_id +
          '" id="flexCheckDefault" name="post_caty_id[]"><label class="form-check-label mt-0 pt-0" for="flexCheckDefault">' +
          caty_title +
          "</label></div>";
        $(".caty_list").append(catlist);
        $(".cat_box").val("");

        // alert(data)
      },
    });
  });

  // Validate password on keyup event
  $("#password, #confirm_password").keyup(function () {
    validatePassword();
  });

  function validatePassword() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();

    if (password == confirmPassword) {
      $("#confirm_password").removeClass("not-match");
      $("#confirm_password").addClass("match");
      $("#password").removeClass("not-match");
      $("#password").addClass("match");

      return true;
    } else {
      $("#confirm_password").removeClass("match");
      $("#confirm_password").addClass("not-match");
      $("#password").removeClass("match");
      $("#password").addClass("not-match");

      return false;
    }
  }

  $("#myForm").submit(function () {
    if (!validatePassword()) {
      // Prevent form submission if passwords don't match
      return false;
    }
  });

  $(".profile-dropdown").click(function () {
    $(".dropdown-menu").toggle();
  });

  var expanded = false;

  $("#showCheckboxes").on("click", function () {
    var checkboxes = $("#checkboxes");
    if (!expanded) {
      checkboxes.show();
      expanded = true;
    } else {
      checkboxes.hide();
      expanded = false;
    }
  });

  $(document).on("click", function () {
    $("#demo").removeClass("show");
  });

  $(".iconBox").on("click", function () {
    $("#demo").removeClass("show");
    // $(document).on("click", function () {
    // 	$("#demo").removeClass("show");
    // });

    var ischecked = $(this).find("input").prop("checked", true);
    var iconName = $(this).find("input").val();
    var html =
      "<label><i class='fas " +
      iconName +
      "'></i>" +
      " " +
      iconName +
      "</label>";

    $(".i-box").html("");
    $(".i-box").html(html);
  });

  $(".navBtn").on("click", function () {
    $btnId = $(this).val();
    if ($btnId == "1" && $(this).prop("checked")) {
      $(".pageColumn").removeClass("dd-none").addClass("d-block");
      $(".customColumn").removeClass("d-block");
      $("#custom_field").val("");
      $("#custom_url").val("");
    } else {
      $(".customColumn").addClass("d-block");
      $(".pageColumn").removeClass("d-block").addClass("dd-none");
      $(".pageOption").html("Select an Option");
      $("#checkboxes .pageTitle input").prop("checked", false);
    }
  });

  $(".pageTitle").on("click", function () {
    var checkbox = $(this).find("input");
    checkbox.prop("checked", true);
    $("#checkboxes").hide();

    var pageTitle = $(this).html();
    var cusHtml = pageTitle;

    $(".pageOption").html("");
    $(".pageOption").html(cusHtml);
  });

  // till here are navigation code

  /**Below code is for header upload image */

  $(document).on("change", "#imgInp, #imgInpp, #feature_mage", function (e) {
    var id = $(this).attr("id");

    if (id === "imgInp") {
      uploadImage(e, id, "#llogo");
    } else if (id === "imgInpp") {
      uploadImage(e, id, "#rlogo");
    } else if (id === "feature_mage") {
      uploadImage(e, id, "#featureImage");
    }
  });

  function uploadImage(e, id, imgTag) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $(imgTag).attr("src", e.target.result);
      };
      reader.readAsDataURL(file);
    }
  }

  $("input[name='btnactive_status']").on("change", function () {
    var popupstatus = $(this).is(":checked") ? 0 : 1;
    var popupId = $(this).val();

    $.ajax({
      type: "get",
      data: { popupId: popupId, popupstatus: popupstatus },
      url: baseURL + "update-popup-status",
      success: function (response) {
        console.log(response);
      },
      error: function () {},
    });
  });

  function updateSelectedFiles() {
    var selectedFiles = [];
    $(".checkBoxClass:checked").each(function () {
      selectedFiles.push($(this).val());
    });
    $("#itemID").val(selectedFiles.join(","));
  }

  $(document).on("click", ".selectAll", function () {
    var isChecked = $(this).is(":checked");
    $(".checkBoxClass").prop("checked", isChecked);
    updateSelectedFiles();
  });

  $(document).on("click", ".checkBoxClass", function () {
    updateSelectedFiles();

    if (!$(this).is(":checked")) {
      $(".selectAll").prop("checked", false);
    } else {
      if ($(".checkBoxClass:checked").length === $(".checkBoxClass").length) {
        $(".selectAll").prop("checked", true);
      }
    }
  });

  $("#videoFileInput").on("change", function (event) {
    var file = event.target.files[0];
    if (file) {
      var videoURL = URL.createObjectURL(file);
      $("#videoPreview").attr("src", videoURL).show();
      $("#youtubePreview").hide().attr("src", "");
      $("#videoUrlInput").val("").prop("disabled", true); // Disable URL input
    } else {
      $("#videoUrlInput").prop("disabled", false); // Enable URL input if no file is selected
    }
  });

  $("#videoUrlInput").on("input", function () {
    var url = $(this).val();
    var youtubeRegex = /^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/;
    if (youtubeRegex.test(url)) {
      var videoID = getYoutubeVideoID(url);
      if (videoID) {
        var embedURL = "https://www.youtube.com/embed/" + videoID;
        $("#youtubePreview").attr("src", embedURL).show();
        $("#videoPreview").hide().attr("src", "");
        $("#videoFileInput").val("").prop("disabled", true); // Disable file input
      }
    } else {
      $("#youtubePreview").hide().attr("src", "");
      $("#videoPreview").attr("src", url).show();
      $("#videoFileInput").val("").prop("disabled", true); // Disable file input
    }

    if (url === "") {
      $("#videoFileInput").prop("disabled", false); // Enable file input if URL input is empty
    }
  });

  function getYoutubeVideoID(url) {
    var videoID = null;
    var urlParts = url.split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
    if (urlParts[2] !== undefined) {
      videoID = urlParts[2].split(/[^0-9a-z_\-]/i)[0];
    } else {
      videoID = urlParts[0];
    }
    return videoID;
  }
});

setTimeout(function () {
  var successMessages = document.getElementsByClassName("successMessage");
  for (var i = 0; i < successMessages.length; i++) {
    successMessages[i].classList.add("hidden");
  }
}, 2000);
