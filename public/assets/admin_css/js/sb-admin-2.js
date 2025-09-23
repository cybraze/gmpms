(function($) {
  "use strict"; 

  // Show sidebar (set display to block)
  function showSidebar() {
    document.getElementById("accordionSidebar").style.display = "block";
  }

  // Hide sidebar (set display to none)
  function hideSidebar() {
    document.getElementById("accordionSidebar").style.display = "none";
  }

  // Toggle sidebar on button click
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    e.preventDefault();
    var sidebar = document.getElementById("accordionSidebar");
    
    if (sidebar.style.display === "block") {
      hideSidebar();
      localStorage.setItem('sidebarClosed', 'true');
    } else {
      showSidebar();
      localStorage.removeItem('sidebarClosed');
    }
  });

  // Handle sidebar display on page load
  $(document).ready(function() {
    var sidebar = document.getElementById("accordionSidebar");
    
    if ($(window).width() < 768) {
      if (localStorage.getItem('sidebarClosed')) {
        hideSidebar();
      } else {
        hideSidebar();  // Start hidden on mobile
      }
    } else {
      sidebar.style.display = "block";  // Always show on larger screens
    }
  });

  // Handle sidebar display on window resize
  $(window).resize(function() {
    var sidebar = document.getElementById("accordionSidebar");
    
    if ($(window).width() < 768) {
      if (localStorage.getItem('sidebarClosed')) {
        hideSidebar();
      } else {
        hideSidebar();  // Keep it hidden on mobile until toggled
      }
    } else {
      sidebar.style.display = "block";  // Always show on larger screens
    }
  });

})(jQuery);
