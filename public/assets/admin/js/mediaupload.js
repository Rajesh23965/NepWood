$(document).ready(function () {
  $(document).on("click", ".media-list", function (event) {
    // Toggle the aria-checked attribute and visibility of the span
    var $element = $(this);
    var isChecked = $element.attr("aria-checked") === "true";

    if (isChecked) {
      $element.attr("aria-checked", "false");
      $element.find("span").hide();
    } else {
      $element.attr("aria-checked", "true");
      $element.find("span").show();
    }
  });

  $(document).on("click", ".dlt_media", function () {
    var userConfirmation = confirm("Do you want to delete this file ?");

    if (userConfirmation) {
      var id = $(this).parent().attr("data");
      $(this).parent().remove();
      $.ajax({
        method: "POST",
        url: baseURL + "remove-media-from-library",
        data: { id: id },
        success: function (response) {
          // alert(response);
        },
      });
    }
  });

  $("#upload_file_btn").change(async function () {
    var fileInput = $("#upload_file_btn")[0];
    var files = fileInput.files;

    if (files.length > 0) {
      var formData = new FormData();

      for (var i = 0; i < files.length; i++) {
        formData.append("files[]", files[i]);
      }

      try {
        const response = await $.ajax({
          url: baseURL + "add-media",
          type: "post",
          data: formData,
          dataType: "json",
          processData: false,
          contentType: false,
        });

        $.each(response, function (index, array) {
          var docTempName = array[0].doc_temp_name;
          var docName = array[0].doc_name;
          var media_id = array[0].media_id;
          var extension = docName.substring(docName.lastIndexOf(".") + 1);

          if (
            extension == "jpg" ||
            extension == "jpeg" ||
            extension == "png" ||
            extension == "gif"
          ) {
            var listItem =
              '<div class="col" data="' +
              media_id +
              '"><li class="media-list" tabindex="0" role="checkbox" aria-checked="true">' +
              '<span><i class="fa fa-check"></i></span>' +
              '<div class="attached_file">' +
              '<div class="thumbnail">' +
              "<img class='w-100 object-fit-cover' src=" +
              baseURL +
              "assets/uploads/" +
              docTempName +
              ' alt="" width="auto" height="auto">' +
              "</div>" +
              '<div class="file-name">' +
              "<p>" +
              '<a class="doc" href=' +
              baseURL +
              "assets/uploads/" +
              docTempName +
              " hidden>" +
              docTempName +
              "</a>" +
              "</p>" +
              "</div>" +
              "</div>" +
              "</li>" +
              "<div class='dlt_media'>delete <small><i class='fa fa-trash'></i></small></div></div>";
          } else {
            var listItem =
              '<div class="col" data="' +
              media_id +
              '"><li class="media-list" tabindex="0" role="checkbox" aria-checked="true">' +
              '<span><i class="fa fa-check"></i></span>' +
              '<div class="attached_file">' +
              '<div class="thumbnail">' +
              "</div>" +
              '<div class="file-name">' +
              "<p>" +
              '<a class="doc" href=' +
              baseURL +
              "assets/uploads/" +
              docTempName +
              ">" +
              docName +
              "</a>" +
              "</p>" +
              "</div>" +
              "</div>" +
              "</li>" +
              "<div class='dlt_media'>delete <small><i class='fa fa-trash'></i></small></div></div>";
          }

          $(".list-unstyled").prepend(listItem);
        });
      } catch (error) {
        console.error("File upload failed:", error);
        // Handle the error
      }
    }

    $("#home-tab").removeClass("active");
    $("#media-library-tab").addClass("active");
    $("#home").removeClass("active show");
    $("#media-library").addClass("active show");
  });

  // Click event for '#save_media_file'
  $("#save_media_file").on("click", function () {
    var editor = tinymce.activeEditor;
    var $checkedLi = $('li[aria-checked="true"]');
    
    // Array of valid image extensions
    var validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  
    $checkedLi.each(function () {
      var file = $(this).find("a");
      var url = file.attr("href");
      var fileName = url.substring(url.lastIndexOf("/") + 1);
      var extension = fileName.substring(fileName.lastIndexOf(".") + 1).toLowerCase(); // Ensure extension comparison is case insensitive
  
      if (validExtensions.includes(extension)) {
        
        editor.selection.setContent(
          '<img src="' + '/assets/uploads/' + fileName + '" width="300px" height="200px">'
        );
      } else {
        var nameOfFile = file.text();
        
        
        if ($('#togetDownloadIcon').prop("checked")) {
          editor.selection.setContent(
            '<a href="' + '/assets/uploads/' + fileName + '"><img src="'+baseURL+'assets/uploads/download.png" width="30px" height="30px"></a><br>'
          );
        } else {
          editor.selection.setContent(
            '<a href="' + '/assets/uploads/' + fileName + '">' + nameOfFile + "</a><br>"
          );
        }
      }
  
      $(this).attr("aria-checked", false);
      $(this).find("span").hide();
    });
  });
  

  $(".paginationBtn").on("click", function () {
    var page = $(this).data("page");
    var $btn = $(this); // Store a reference to $(this)

    $.ajax({
        type: "GET",
        url: baseURL + "getImageGallery?page=" + page,
        dataType: "json",
        success: function (response) {
            if (response.uploaded_file && response.uploaded_file.length > 0) {
                var html = "";
                $.each(response.uploaded_file, function (index, item) {
                    var extension = item.doc_temp_name.split(".").pop().toLowerCase();

                    html += '<div class="col" data="' + item.doc_id + '">';
                    html += '<li class="media-list appen" tabindex="0" role="checkbox" aria-checked="false">';
                    html += '<span class="check"><i class="fa fa-check"></i></span>';
                    html += '<div class="attached_file">';

                    if (
                        extension === "jpg" ||
                        extension === "jpeg" ||
                        extension === "png" ||
                        extension === "gif"
                    ) {
                        html += '<div class="thumbnail">';
                        html += '<img class="w-100 object-fit-cover" src="' +
                            baseURL + "assets/uploads/" + item.doc_temp_name +
                            '" alt="" width="auto" height="auto" />';
                        html += '</div>';
                    } else {
                        html += '<div class="file-name">';
                        html += '<div class="position-relative d-flex flex-column"><img class="w-100 h-100" src="'+baseURL+'assets/uploads/pdf.png" alt=""><a class="doc position-absolute bottom-0 bg-light m-lib-a" href="' +
                            baseURL + "assets/uploads/" + item.doc_temp_name +
                            '">' + item.doc_name + "</a></p>";
                        html += '</div>';
                    }

                    html += '</div>';
                    html += '<div class="file-name">';
                    html += '<p><a class="doc" href="' +
                        baseURL + "assets/uploads/" + item.doc_temp_name +
                        '" hidden>' + item.doc_name + "</a></p>";
                    html += '</div>';
                    html += '</li>';
                    html += '<div class="dlt_media">delete <small><i class="fa fa-trash"></i></small></div>';
                    html += '</div>';
                });

                $(".paginationBtn").removeClass("active bg-danger"); // Remove classes from all pagination buttons

                $btn.addClass("active bg-danger"); // Add classes to the clicked pagination button

                $("#lists_box").empty().html(html); // Update the content in #lists_box
            } else {
                $("#lists_box").html("No Data Found");
            }
        },
        error: function (xhr, status, error) {
            alert("Error fetching data: " + error);
        },
    });
});

});
