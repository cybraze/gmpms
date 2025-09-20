<footer class="py-4 mt-auto" style="background: linear-gradient(115deg, #5780bf, #5780bf);border-top: 1px solid #ffffff;">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-center small">
      <div class="text-light" style="
        color: #ffffff;
        font-weight: 500;
        font-size: 14px;
        text-shadow: 1px 1px 0 #000000, 2px 2px 5px rgba(0, 0, 0, 0.5);
      ">
        © 2025 GM - PMS - Headquarter (S.E.C.R.). 
      <a href="https://cybrazetech.com" target="_blank" style="text-decoration: none;">
  <!-- <strong style="
    color: #ffe97f;
    text-shadow: 1px 1px 0 #000000, 2px 2px 5px rgba(0, 0, 0, 0.5);
    display: inline-flex;
    align-items: center;
    gap: 6px;
  ">
    Designed and Developed by CybrazeTech.
    <img src="https://cybrazetech.com/assets/cb_new/img/logos.jpg" alt="CybrazeTech Logo" style="
      height: 22px;
      border-radius: 2px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
      transition: transform 0.2s ease;
    ">
  </strong> -->
</a>


      </div>
    </div>
  </div>
</footer>

            </div>
        </div>




</div>



<script>
      // GK variables (already present)
      var gk_isXlsx = false;
      var gk_xlsxFileLookup = {};
      var gk_fileData = {};
      function filledCell(cell) {
        return cell !== '' && cell != null;
      }
      function loadFileData(filename) {
      if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
          try {
              var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
              var firstSheetName = workbook.SheetNames[0];
              var worksheet = workbook.Sheets[firstSheetName];
              var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
              var filteredData = jsonData.filter(row => row.some(filledCell));
              var headerRowIndex = filteredData.findIndex((row, index) =>
                row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
              );
              if (headerRowIndex === -1 || headerRowIndex > 25) {
                headerRowIndex = 0;
              }
              var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex));
              csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
              return csv;
          } catch (e) {
              console.error(e);
              return "";
          }
      }
      return gk_fileData[filename] || "";
      }
      
      document.addEventListener('DOMContentLoaded', function() {
          const navLinkItems = document.querySelectorAll('nav a.nav-item, nav div.nav-item'); 
          const homeLink = document.getElementById('nav-home');
          const chatbotLink = document.getElementById('nav-chatbot');
          const aiSearchLink = document.getElementById('nav-ai-search');
          
          const homeContent = document.getElementById('home-content');
          const iframeContainer = document.getElementById('iframe-container');
          const mainAppHeader = document.getElementById('main-app-header');

          const loadingPlaceholderModules = document.getElementById('loading-placeholder-modules');
          const moduleCardsContainer = document.getElementById('module-cards-container');
          
          const loadingPlaceholderMap = document.getElementById('loading-placeholder-map');
          const kavachStatusContainer = document.getElementById('kavach-status-container');

          const loadingPlaceholderActivities = document.getElementById('loading-placeholder-activities');
          const recentActivitiesContainer = document.getElementById('recent-activities-container');


          navLinkItems.forEach(link => {
              if (link.hasAttribute('onclick') && link.getAttribute('onclick').includes('toggleSubmenu')) {
                  return;
              }

              link.addEventListener('click', function(e) {
                  if (!(this.hasAttribute('onclick') && this.getAttribute('onclick').includes('toggleSubmenu'))) {
                      e.preventDefault(); 
                  }
                  
                  navLinkItems.forEach(navLink => {
                      navLink.classList.remove('active', 'bg-gray-800', 'text-white');
                      const icon = navLink.querySelector('i:first-child');
                      if (icon) {
                          icon.classList.remove('text-blue-400');
                      }
                      const chevron = navLink.querySelector('.fa-chevron-down, .fa-chevron-up');
                      if (chevron && !navLink.nextElementSibling?.classList.contains('active')) { 
                      }
                  });
                  
                  this.classList.add('active', 'bg-gray-800', 'text-white');
                  const icon = this.querySelector('i:first-child');
                  if (icon) {
                      icon.classList.add('text-blue-400');
                  }

                  if (this.closest('.submenu')) {
                      const parentNavItem = this.closest('.submenu').previousElementSibling;
                      if (parentNavItem && parentNavItem.classList.contains('nav-item')) {
                           parentNavItem.classList.add('active', 'bg-gray-800', 'text-white');
                           const parentIcon = parentNavItem.querySelector('i:first-child');
                           if (parentIcon) {
                              parentIcon.classList.add('text-blue-400');
                           }
                      }
                  }
              });
          });

          if (homeLink) {
              homeLink.addEventListener('click', () => {
                  if (mainAppHeader) mainAppHeader.classList.remove('hidden');
                  homeContent.classList.remove('hidden');
                  iframeContainer.classList.add('hidden');
                  iframeContainer.innerHTML = ''; 
              });
          }

          if (chatbotLink) {
              chatbotLink.addEventListener('click', () => {
                  if (mainAppHeader) mainAppHeader.classList.add('hidden');
                  homeContent.classList.add('hidden');
                  iframeContainer.innerHTML = `<iframe src="https://iriset.railnet.gov.in/content/CoE/kavachchatbot.html" style="width:100%; height:100%; border:none;" title="Kavach Chatbot"></iframe>`;
                  iframeContainer.classList.remove('hidden');
              });
          }

          if (aiSearchLink) {
              aiSearchLink.addEventListener('click', () => {
                  if (mainAppHeader) mainAppHeader.classList.add('hidden');
                  homeContent.classList.add('hidden');
                  iframeContainer.innerHTML = `<iframe src="https://coekav-signallingsearch.hf.space/" style="width:100%; height:100%; border:none;" title="AI Search"></iframe>`;
                  iframeContainer.classList.remove('hidden');
              });
          }
          
          // Content loading simulation
          // Order: Modules (1), Kavach Map (2), Activities (3)
          const baseDelay = 500; // Initial delay before anything starts showing

          setTimeout(() => {
              if (loadingPlaceholderModules) loadingPlaceholderModules.style.display = 'none';
              if (moduleCardsContainer) {
                  moduleCardsContainer.classList.remove('hidden');
                  // Trigger animation for the card itself
                  moduleCardsContainer.style.opacity = '1';
                  moduleCardsContainer.style.transform = 'translateY(0)';
              }
          }, baseDelay + (1 * 100)); // order 1

          setTimeout(() => {
              if (loadingPlaceholderMap) loadingPlaceholderMap.style.display = 'none';
              if (kavachStatusContainer) {
                  kavachStatusContainer.classList.remove('hidden');
                  kavachStatusContainer.style.opacity = '1';
                  kavachStatusContainer.style.transform = 'translateY(0)';
              }
          }, baseDelay + (2 * 100)); // order 2
          
          setTimeout(() => {
              if (loadingPlaceholderActivities) loadingPlaceholderActivities.style.display = 'none';
              if (recentActivitiesContainer) {
                  recentActivitiesContainer.classList.remove('hidden');
                  recentActivitiesContainer.style.opacity = '1';
                  recentActivitiesContainer.style.transform = 'translateY(0)';
              }
          }, baseDelay + (3 * 100)); // order 3

      });
      
      function toggleSubmenu(element) {
          const submenu = element.nextElementSibling;
          const icon = element.querySelector('.fa-chevron-down, .fa-chevron-up');
          
          submenu.classList.toggle('active');
          icon.classList.toggle('rotate-180');
      }
      
      function openModule(moduleName) {
          alert(`Opening ${moduleName} module...`);
      }
      
  </script>


<!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/admin_css/vendor/jquery/jquery.min.js')}}"></script>
    
     <script src="{{asset('assets/admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/admin_css/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/new_shoy/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/new_shoy/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/new_shoy/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('assets/new_shoy/js/datatables-simple-demo.js')}}"></script>


        
    </body>
</html>
