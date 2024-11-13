// document.getElementById("defaultOpen").click();


function openTab(evt, tabName) {
  // Hide all tab contents
  var tabContents = document.getElementsByClassName("tab-content");
  for (var i = 0; i < tabContents.length; i++) {
    tabContents[i].style.display = "none";
  }

  // Remove "active" class from all tab buttons
  var tabs = document.getElementsByClassName("tab");
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].className = tabs[i].className.replace(" active", "");
  }

  // Show the selected tab content and mark the button as active
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openNoticeTab(evt, tabName) {
  // Hide all tab contents
  var tabContents = document.getElementsByClassName("notice-tab-content");
  for (var i = 0; i < tabContents.length; i++) {
    tabContents[i].style.display = "none";
  }

  // Remove "active" class from all tab buttons
  var tabs = document.getElementsByClassName("notice-tab");
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].className = tabs[i].className.replace(" active", "");
  }

  // Show the selected tab content and mark the button as active
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}













