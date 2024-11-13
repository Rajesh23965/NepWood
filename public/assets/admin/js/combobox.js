$(document).ready(function () {
  const categorySearchInput = $("#categorySearch");
  const carret = $("#carret");
  const categoryList = $("#categoryList");
  const categoryToggle = $("#categoryToggle");
  const allCategoriesCheckbox = $("#allCategories");
  const categoryCheckboxes = $('input[name="cat_id[]"]');

  categoryToggle.on("click", function () {
    if (
      categoryList.css("display") === "none" ||
      categoryList.css("display") === ""
    ) {
      categoryList.css("display", "block");
      carret.html("&#9650;");
    } else {
      categoryList.css("display", "none");
      carret.html("&#9660;");
    }
  });

  allCategoriesCheckbox.on("change", function () {
    const isChecked = allCategoriesCheckbox.prop("checked");
    categoryCheckboxes.prop("checked", isChecked);
  });

  categorySearchInput.on("input", function () {
    const searchValue = categorySearchInput.val().toLowerCase();

    categoryList.find("li").each(function () {
      const labelText = $(this).find("label").text().toLowerCase();

      if (labelText.includes(searchValue)) {
        $(this).css("display", "block");
      } else {
        $(this).css("display", "none");
      }
    });
  });

  $("#changePassword").submit(function (event) {
    event.preventDefault();

    var oldPassword = $("#oldpassword").val();
    var newpassword = $("#password").val();
    var confirmpassword = $("#confirm_password").val();

    // console.log(formData);
    $.ajax({
      type: "POST",
      url: baseURL + "changepassword",
      data: {
        oldPass: oldPassword,
        newpass: newpassword,
        cnfrmpass: confirmpassword,
      },
      success: function (response) {
        if (response) {
          alert(response);
          $("#oldpassword").val("");
          $("#password").val("");
          $("#confirm_password").val("");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  const searchBox = document.getElementById("searchBox");
  const dropdown = document.getElementById("dropdown");
  const dropdownItems = dropdown.getElementsByClassName("dropdown-item");

  searchBox.addEventListener("input", function () {
    const searchTerm = searchBox.value.toLowerCase();

    for (const item of dropdownItems) {
      const itemName = item.textContent.toLowerCase();
      if (itemName.includes(searchTerm)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    }

    dropdown.style.display = "block";
  });

  // Handle item selection
  for (const item of dropdownItems) {
    item.addEventListener("click", function () {
      const staffId = item.getAttribute("data-staff-id");
      searchBox.value = item.textContent.trim() + "," + staffId;
      dropdown.style.display = "none";
    });
  }

  // Close the dropdown when clicking outside of it
  document.addEventListener("click", function (e) {
    if (!searchBox.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.style.display = "none";
    }
  });
});
