document.addEventListener("DOMContentLoaded", function () {
  const modals = document.querySelectorAll(".newPopup");

  modals.forEach((modal) => {
    const closeButton = modal.querySelector(".btn-close");
    const backdrop = document.createElement("div");

    function showModal() {
      modal.classList.add("show");
      modal.style.display = "block";
      backdrop.classList.add("modal-backdrop", "fade", "show");
      document.body.appendChild(backdrop);
    }

    function hideModal() {
      modal.classList.remove("show");
      modal.style.display = "none";
      document.body.removeChild(backdrop);
    }

    // Check if closeButton exists before trying to add an event listener
    if (closeButton) {
      closeButton.addEventListener("click", hideModal);
    }

    showModal();

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && modal.classList.contains("show")) {
        hideModal();
      }
    });

    // Hide the modal when clicking outside of it
    backdrop.addEventListener("click", hideModal);
  });

  $(".dropdown > .nav-link").on("click", function (e) {
    if ($(e.target).hasClass("caret") || $(e.target).closest(".caret").length) {
      e.preventDefault();
      $(this).parent().toggleClass("open");
    }
  });

  $(document).on("click", function (e) {
    if (!$(e.target).closest(".dropdown").length) {
      $(".dropdown").removeClass("open");
    }
  });

  if (window.innerWidth > 768) {
    $(".dropdown").hover(
      function () {
        $(this).addClass("open");
      },
      function () {
        $(this).removeClass("open");
      }
    );
  }
});

$(document).ready(function () {
  $(".onSelectDepartment").on("change", function () {
    var testDepartmentId = $(this).val();
    fetchTestData(testDepartmentId);
  });

  function fetchTestData(testDepartmentId) {
    $.ajax({
      url: "get-Teset-From-Department",
      method: "get",
      data: {
        testDepartmentId: testDepartmentId,
      },
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          var testData = response.data;
          var output = [];

          // Clear the table before populating
          $("#customtestTable").empty();

          // Iterate over the test data and construct the table rows
          $.each(testData, function (index, test) {
            var specimen = test.specimen ? test.specimen : "-";
            var reporting = test.reporting ? test.reporting : "-";
            var testPrice = test.testPrice ? test.testPrice : "-";
            var collection = test.collection ? test.collection : "-";

            output.push(
              "<tr><td>" +
                (index + 1) +
                "</td><td>" +
                test.testName +
                "</td><td>" +
                specimen +
                "</td><td>" +
                collection +
                "</td><td>" +
                reporting +
                "</td><td>" +
                testPrice +
                "</td></tr>"
            );
          });

          // Append the rows to the table
          $("#customtestTable").append(output.join(""));
        } else {
          $("#customtestTable").empty();
          $("#customtestTable").append(
            "<tr><td colspan='6' class='text-center'>No data found</td></tr>"
          );
        }
      },
      error: function (xhr, status, error) {
        alert("An error occurred: " + xhr.responseText);
      },
    });
  }

  $("#typedText").on("keyup", function () {
    var searchLetter = $(this).val().trim();

    filterTableRows(searchLetter);
  });

  function filterTableRows(searchLetter) {
    var rows = $("#customtestTable").find("tr");

    rows.each(function () {
      var text = $(this).text().toLowerCase();
      if (text.indexOf(searchLetter.toLowerCase()) !== -1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});
