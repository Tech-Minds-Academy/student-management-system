document.addEventListener("DOMContentLoaded", () => {
    // Navigation functionality
    const sidebarItems = document.querySelectorAll(".sidebar-menu li")
    const pages = document.querySelectorAll(".page")
    const mobileToggle = document.getElementById("mobile-toggle")
    const sidebar = document.getElementById("sidebar")
  
    // Add mobile header dynamically
    const mobileHeader = document.createElement("div")
    mobileHeader.className = "mobile-header"
    mobileHeader.innerHTML = `
          <button id="show-sidebar" class="btn-icon">
              <i class="fas fa-bars"></i>
          </button>
          <h2>Admin Dashboard</h2>
          <div></div>
      `
    document.querySelector(".dashboard").prepend(mobileHeader)
  
    // Mobile sidebar toggle
    mobileToggle.addEventListener("click", () => {
      sidebar.classList.remove("active")
    })
  
    document.getElementById("show-sidebar").addEventListener("click", () => {
      sidebar.classList.add("active")
    })
  
    // Handle page navigation
    sidebarItems.forEach((item) => {
      item.addEventListener("click", function (e) {
        e.preventDefault()
  
        // Remove active class from all sidebar items
        sidebarItems.forEach((i) => i.classList.remove("active"))
  
        // Add active class to clicked item
        this.classList.add("active")
  
        // Hide all pages
        pages.forEach((page) => (page.style.display = "none"))
  
        // Show selected page
        const pageId = this.getAttribute("data-page")
        document.getElementById(pageId).style.display = "block"
  
        // Close mobile sidebar after selection
        sidebar.classList.remove("active")
      })
    })
  
    // Form submission handlers
    const studentForm = document.getElementById("student-form")
    if (studentForm) {
      studentForm.addEventListener("submit", function (e) {
        e.preventDefault()
        alert("Student added successfully!")
        this.reset()
      })
    }
  
    const courseForm = document.getElementById("course-form")
    if (courseForm) {
      courseForm.addEventListener("submit", function (e) {
        e.preventDefault()
        alert("Course added successfully!")
        this.reset()
      })
    }
  
    const accountSettingsForm = document.getElementById("account-settings-form")
    if (accountSettingsForm) {
      accountSettingsForm.addEventListener("submit", (e) => {
        e.preventDefault()
        alert("Account settings updated successfully!")
      })
    }
  
    const passwordForm = document.getElementById("password-form")
    if (passwordForm) {
      passwordForm.addEventListener("submit", function (e) {
        e.preventDefault()
  
        const newPassword = document.getElementById("new-password").value
        const confirmPassword = document.getElementById("confirm-password").value
  
        if (newPassword !== confirmPassword) {
          alert("Passwords do not match!")
          return
        }
  
        alert("Password updated successfully!")
        this.reset()
      })
    }
  
    // Add event listeners to action buttons
    const editButtons = document.querySelectorAll(".btn-icon.edit")
    editButtons.forEach((button) => {
      button.addEventListener("click", () => {
        // In a real application, this would open an edit form with the record data
        alert("Edit functionality would open here")
      })
    })
  
    const deleteButtons = document.querySelectorAll(".btn-icon.delete")
    deleteButtons.forEach((button) => {
      button.addEventListener("click", () => {
        if (confirm("Are you sure you want to delete this record?")) {
          // In a real application, this would delete the record
          alert("Record deleted successfully!")
        }
      })
    })
  
    // Initialize first page as active
    document.querySelector(".sidebar-menu li").click()
  })
  
  document.addEventListener("DOMContentLoaded", () => {
    // Toggle sidebar on mobile
    const sidebar = document.getElementById("sidebar")
    const toggleSidebar = document.getElementById("toggle-sidebar")
    const closeSidebar = document.getElementById("close-sidebar")
  
    if (toggleSidebar) {
      toggleSidebar.addEventListener("click", () => {
        sidebar.classList.add("active")
      })
    }
  
    if (closeSidebar) {
      closeSidebar.addEventListener("click", () => {
        sidebar.classList.remove("active")
      })
    }
  
    // Navigation functionality
    const navItems = document.querySelectorAll(".nav-item")
    const pages = document.querySelectorAll(".page-content")
  
    navItems.forEach((item) => {
      item.addEventListener("click", function (e) {
        e.preventDefault()
  
        // Remove active class from all nav items
        navItems.forEach((i) => i.classList.remove("active"))
  
        // Add active class to clicked item
        this.classList.add("active")
  
        // Hide all pages
        pages.forEach((page) => (page.style.display = "none"))
  
        // Show selected page
        const pageId = this.getAttribute("data-page")
        document.getElementById(pageId).style.display = "block"
  
        // Close sidebar on mobile after selection
        if (window.innerWidth < 768) {
          sidebar.classList.remove("active")
        }
      })
    })
  
    // Settings navigation
    const settingsNavItems = document.querySelectorAll(".settings-nav-item")
    const settingsPanels = document.querySelectorAll(".settings-panel")
  
    if (settingsNavItems.length > 0) {
      settingsNavItems.forEach((item) => {
        item.addEventListener("click", function () {
          // Remove active class from all nav items
          settingsNavItems.forEach((i) => i.classList.remove("active"))
  
          // Add active class to clicked item
          this.classList.add("active")
  
          // Hide all panels
          settingsPanels.forEach((panel) => (panel.style.display = "none"))
  
          // Show selected panel
          const panelId = this.getAttribute("data-settings") + "-settings"
          document.getElementById(panelId).style.display = "block"
        })
      })
    }
  
    // Message preview click handler
    const messagePreviewItems = document.querySelectorAll(".message-preview")
  
    if (messagePreviewItems.length > 0) {
      messagePreviewItems.forEach((item) => {
        item.addEventListener("click", function () {
          // Remove active class from all message previews
          messagePreviewItems.forEach((i) => i.classList.remove("active"))
  
          // Add active class to clicked item
          this.classList.add("active")
  
          // Mark as read
          this.classList.remove("unread")
        })
      })
    }
  
    // Form submission handlers
    const studentForm = document.getElementById("student-form")
    if (studentForm) {
      studentForm.addEventListener("submit", function (e) {
        e.preventDefault()
        alert("Student added successfully!")
        this.reset()
      })
    }
  
    const courseForm = document.getElementById("course-form")
    if (courseForm) {
      courseForm.addEventListener("submit", function (e) {
        e.preventDefault()
        alert("Course added successfully!")
        this.reset()
      })
    }
  
    const accountForm = document.getElementById("account-form")
    if (accountForm) {
      accountForm.addEventListener("submit", (e) => {
        e.preventDefault()
        alert("Account settings updated successfully!")
      })
    }
  
    const passwordForm = document.getElementById("password-form")
    if (passwordForm) {
      passwordForm.addEventListener("submit", function (e) {
        e.preventDefault()
  
        const newPassword = document.getElementById("new-password").value
        const confirmPassword = document.getElementById("confirm-password").value
  
        if (newPassword !== confirmPassword) {
          alert("Passwords do not match!")
          return
        }
  
        alert("Password updated successfully!")
        this.reset()
      })
    }
  
    const notificationsForm = document.getElementById("notifications-form")
    if (notificationsForm) {
      notificationsForm.addEventListener("submit", (e) => {
        e.preventDefault()
        alert("Notification preferences saved successfully!")
      })
    }
  
    const appearanceForm = document.getElementById("appearance-form")
    if (appearanceForm) {
      appearanceForm.addEventListener("submit", (e) => {
        e.preventDefault()
        alert("Appearance settings saved successfully!")
      })
    }
  
    // Theme options
    const themeOptions = document.querySelectorAll(".theme-option")
    if (themeOptions.length > 0) {
      themeOptions.forEach((option) => {
        option.addEventListener("click", function () {
          themeOptions.forEach((o) => o.classList.remove("active"))
          this.classList.add("active")
        })
      })
    }
  
    // Table select all functionality
    const selectAll = document.querySelector(".select-all")
    if (selectAll) {
      selectAll.addEventListener("change", function () {
        const selectItems = document.querySelectorAll(".select-item")
        selectItems.forEach((item) => {
          item.checked = this.checked
        })
      })
    }
  
    // Add event listeners to action buttons
    const editButtons = document.querySelectorAll(".action-btn.edit")
    editButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        e.stopPropagation()
        alert("Edit functionality would open here")
      })
    })
  
    const deleteButtons = document.querySelectorAll(".action-btn.delete")
    deleteButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        e.stopPropagation()
        if (confirm("Are you sure you want to delete this record?")) {
          alert("Record deleted successfully!")
        }
      })
    })
  
    // Initialize first page as active
    if (navItems.length > 0) {
      navItems[0].click()
    }
  
    // Initialize first settings panel as active
    if (settingsNavItems.length > 0) {
      settingsNavItems[0].click()
    }
  
    // Add event listeners for the editable stat cards and message navigation
  
    // Make stat cards editable
    const editStatBtns = document.querySelectorAll(".edit-stat-btn")
    const editStatModal = document.getElementById("edit-stat-modal")
    const closeModalBtn = document.querySelector(".close-modal")
    const cancelEditBtn = document.getElementById("cancel-edit")
    const saveStatBtn = document.getElementById("save-stat")
    const statValueInput = document.getElementById("stat-value")
    const statTrendSelect = document.getElementById("stat-trend")
    const statPercentageInput = document.getElementById("stat-percentage")
  
    let currentStatCard = null
  
    // Open modal when edit button is clicked
    editStatBtns.forEach((btn) => {
      btn.addEventListener("click", function (e) {
        e.stopPropagation()
        currentStatCard = this.closest(".stat-card")
        const statType = currentStatCard.getAttribute("data-stat")
        const statValue = document.getElementById(`${statType}-count`).textContent
        const statTrend = currentStatCard.querySelector(".stat-change").classList.contains("positive")
          ? "positive"
          : currentStatCard.querySelector(".stat-change").classList.contains("negative")
            ? "negative"
            : "neutral"
  
        // Extract percentage from text
        const percentageText = currentStatCard.querySelector(".stat-change").textContent
        const percentageMatch = percentageText.match(/(\d+)%/)
        const percentage = percentageMatch ? percentageMatch[1] : "0"
  
        // Set modal values
        statValueInput.value = statValue
        statTrendSelect.value = statTrend
        statPercentageInput.value = percentage
  
        // Show modal
        editStatModal.classList.add("active")
      })
    })
  
    // Close modal when close button is clicked
    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        editStatModal.classList.remove("active")
      })
    }
  
    // Close modal when cancel button is clicked
    if (cancelEditBtn) {
      cancelEditBtn.addEventListener("click", () => {
        editStatModal.classList.remove("active")
      })
    }
  
    // Save changes when save button is clicked
    if (saveStatBtn) {
      saveStatBtn.addEventListener("click", () => {
        if (currentStatCard) {
          const statType = currentStatCard.getAttribute("data-stat")
          const statCountElement = document.getElementById(`${statType}-count`)
          const statChangeElement = currentStatCard.querySelector(".stat-change")
          const statIconElement = statChangeElement.querySelector("i")
  
          // Update stat value
          statCountElement.textContent = statValueInput.value
  
          // Update trend class
          statChangeElement.classList.remove("positive", "negative", "neutral")
          statChangeElement.classList.add(statTrendSelect.value)
  
          // Update icon
          statIconElement.className =
            statTrendSelect.value === "positive"
              ? "fas fa-arrow-up"
              : statTrendSelect.value === "negative"
                ? "fas fa-arrow-down"
                : "fas fa-minus"
  
          // Update percentage text
          const trendText =
            statTrendSelect.value === "positive"
              ? `${statPercentageInput.value}% from last month`
              : statTrendSelect.value === "negative"
                ? `${statPercentageInput.value}% from last month`
                : "Same as last week"
  
          statChangeElement.innerHTML = `<i class="${statIconElement.className}"></i> ${trendText}`
  
          // Close modal
          editStatModal.classList.remove("active")
        }
      })
    }
  
    // Close modal when clicking outside
    window.addEventListener("click", (e) => {
      if (e.target === editStatModal) {
        editStatModal.classList.remove("active")
      }
    })
  
    // Make message card navigate to message center
    const messageStatCard = document.querySelector('.stat-card[data-stat="messages"]')
    if (messageStatCard) {
      messageStatCard.addEventListener("click", (e) => {
        // Don't navigate if clicking the edit button
        if (e.target.closest(".edit-stat-btn")) return
  
        // Find the messages nav item and click it
        const messagesNavItem = document.querySelector('.nav-item[data-page="messages"]')
        if (messagesNavItem) {
          messagesNavItem.click()
        }
      })
  
      // Add cursor pointer to indicate it's clickable
      messageStatCard.style.cursor = "pointer"
    }
  
    // Make notification icon navigate to message center
    const notificationBtn = document.getElementById("notification-btn")
    if (notificationBtn) {
      notificationBtn.addEventListener("click", () => {
        // Find the messages nav item and click it
        const messagesNavItem = document.querySelector('.nav-item[data-page="messages"]')
        if (messagesNavItem) {
          messagesNavItem.click()
        }
      })
    }
  
    // Add student search functionality
    const studentSearchInput = document.querySelector(".filter-bar .search-box input")
    if (studentSearchInput) {
      studentSearchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase().trim()
        const studentRows = document.querySelectorAll(".data-table tbody tr")
  
        studentRows.forEach((row) => {
          const studentName = row.querySelector(".table-user span").textContent.toLowerCase()
  
          if (studentName.includes(searchTerm)) {
            row.style.display = ""
          } else {
            row.style.display = "none"
          }
        })
  
        // Show a message if no results found
        const noResultsMessage = document.getElementById("no-results-message")
        const hasVisibleRows = Array.from(studentRows).some((row) => row.style.display !== "none")
  
        if (!hasVisibleRows && searchTerm !== "") {
          if (!noResultsMessage) {
            const message = document.createElement("div")
            message.id = "no-results-message"
            message.className = "no-results-message"
            message.textContent = "No students found matching your search."
            document.querySelector(".table-container").after(message)
          }
        } else if (noResultsMessage) {
          noResultsMessage.remove()
        }
      })
  
      // Clear search when the X icon is clicked
      const searchBox = studentSearchInput.closest(".search-box")
      const clearSearch = document.createElement("button")
      clearSearch.className = "clear-search"
      clearSearch.innerHTML = '<i class="fas fa-times"></i>'
      clearSearch.style.display = "none"
      searchBox.appendChild(clearSearch)
  
      studentSearchInput.addEventListener("input", function () {
        clearSearch.style.display = this.value ? "block" : "none"
      })
  
      clearSearch.addEventListener("click", function () {
        studentSearchInput.value = ""
        studentSearchInput.dispatchEvent(new Event("input"))
        this.style.display = "none"
      })
    }
  })
  
  