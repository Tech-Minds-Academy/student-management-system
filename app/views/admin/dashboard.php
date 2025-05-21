<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin Dashboard</title>
    <style>
        /* Base Styles */
:root {
  --primary-color: #4361ee;
  --primary-light: #4895ef;
  --primary-dark: #3f37c9;
  --secondary-color: #4cc9f0;
  --success-color: #4caf50;
  --warning-color: #ff9800;
  --danger-color: #f44336;
  --info-color: #2196f3;
  --dark-color: #212529;
  --light-color: #f8f9fa;
  --gray-100: #f8f9fa;
  --gray-200: #e9ecef;
  --gray-300: #dee2e6;
  --gray-400: #ced4da;
  --gray-500: #adb5bd;
  --gray-600: #6c757d;
  --gray-700: #495057;
  --gray-800: #343a40;
  --gray-900: #212529;
  --sidebar-width: 260px;
  --sidebar-collapsed-width: 70px;
  --border-radius: 8px;
  --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  --transition-speed: 0.3s;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: #f5f7fb;
  color: var(--gray-800);
  line-height: 1.6;
}

a {
  text-decoration: none;
  color: inherit;
}

ul {
  list-style: none;
}

/* Container */
.container {
  display: flex;
  min-height: 100vh;
}

/* Sidebar */
.sidebar {
  width: var(--sidebar-width);
  background-color: white;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
  display: flex;
  flex-direction: column;
  transition: all var(--transition-speed) ease;
  z-index: 1000;
}

.sidebar-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  border-bottom: 1px solid var(--gray-200);
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 600;
  color: var(--primary-color);
}

.logo i {
  font-size: 1.5rem;
}

.close-btn {
  display: none;
  background: none;
  border: none;
  color: var(--gray-600);
  font-size: 1.2rem;
  cursor: pointer;
}

.user-info {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 20px;
  border-bottom: 1px solid var(--gray-200);
}

.user-avatar {
  width: 40px;
  height: 40px;
  background-color: var(--primary-light);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.user-avatar.small {
  width: 30px;
  height: 30px;
  font-size: 0.8rem;
}

.user-details h3 {
  font-size: 0.9rem;
  font-weight: 600;
}

.user-details p {
  font-size: 0.8rem;
  color: var(--gray-600);
}

.sidebar-content {
  flex: 1;
  overflow-y: auto;
}

.sidebar-nav {
  padding: 20px 0;
}

.nav-item {
  margin-bottom: 5px;
}

.nav-item a {
  display: flex;
  align-items: center;
  padding: 12px 20px;
  color: var(--gray-700);
  border-radius: 8px;
  margin: 0 10px;
  transition: all 0.2s ease;
  position: relative;
}

.nav-item a i {
  margin-right: 12px;
  font-size: 1.1rem;
  width: 20px;
  text-align: center;
}

.nav-item a:hover {
  background-color: var(--gray-100);
  color: var(--primary-color);
}

.nav-item.active a {
  background-color: var(--primary-color);
  color: white;
}

.badge {
  position: absolute;
  right: 15px;
  background-color: var(--danger-color);
  color: white;
  font-size: 0.7rem;
  padding: 2px 6px;
  border-radius: 10px;
}

.badge.green {
  background-color: var(--success-color);
}

.badge.blue {
  background-color: var(--info-color);
}

.badge.orange {
  background-color: var(--warning-color);
}

.sidebar-footer {
  padding: 20px;
  border-top: 1px solid var(--gray-200);
}

.logout-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  color: var(--gray-700);
  padding: 10px;
  border-radius: var(--border-radius);
  transition: all 0.2s ease;
}

.logout-btn:hover {
  background-color: var(--gray-100);
  color: var(--danger-color);
}

/* Main Content */
.main-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

/* Top Bar */
.top-bar {
  height: 70px;
  background-color: white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
}

.menu-btn {
  background: none;
  border: none;
  color: var(--gray-700);
  font-size: 1.2rem;
  cursor: pointer;
  display: none;
}

.search-box {
  display: flex;
  align-items: center;
  background-color: var(--gray-100);
  border-radius: 20px;
  padding: 8px 15px;
  width: 300px;
  position: relative;
}

.search-box i {
  color: var(--gray-600);
  margin-right: 10px;
}

.search-box input {
  border: none;
  background: none;
  outline: none;
  width: 100%;
  font-size: 0.9rem;
}

.top-bar-actions {
  display: flex;
  align-items: center;
  gap: 15px;
}

.notification-btn {
  background: none;
  border: none;
  color: var(--gray-700);
  font-size: 1.1rem;
  cursor: pointer;
  position: relative;
}

.notification-btn .badge {
  position: absolute;
  top: -5px;
  right: -5px;
}

.user-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 5px 10px;
  border-radius: var(--border-radius);
}

.user-btn:hover {
  background-color: var(--gray-100);
}

/* Page Content */
.page-content {
  flex: 1;
  padding: 20px;
  overflow-y: auto;
}

.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
}

.page-header h1 {
  font-size: 1.8rem;
  font-weight: 600;
  color: var(--gray-800);
}

.page-header p {
  color: var(--gray-600);
  margin-top: 5px;
}

/* Stats Grid */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 25px;
  margin-bottom: 25px;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
}

.stat-card {
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  padding: 25px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.stat-card-content h3 {
  font-size: 0.9rem;
  color: var(--gray-600);
  margin-bottom: 10px;
}

.stat-card-content h2 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 10px;
}

.stat-change {
  font-size: 0.8rem;
  display: flex;
  align-items: center;
  gap: 5px;
}

.stat-change.positive {
  color: var(--success-color);
}

.stat-change.negative {
  color: var(--danger-color);
}

.stat-change.neutral {
  color: var(--gray-600);
}

.stat-card-icon {
  width: 50px;
  height: 50px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 1.5rem;
}

.stat-card-icon.students {
  background-color: var(--primary-color);
}

.stat-card-icon.courses {
  background-color: var(--info-color);
}

.stat-card-icon.messages {
  background-color: var(--warning-color);
}

.stat-card-icon.enrollments {
  background-color: var(--success-color);
}

/* Add styles for editable stat cards */
.stat-card.editable {
  position: relative;
}

.edit-stat-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  color: var(--gray-400);
  font-size: 0.9rem;
  cursor: pointer;
  opacity: 0;
  transition: opacity 0.2s ease;
}

.stat-card.editable:hover .edit-stat-btn {
  opacity: 1;
}

.edit-stat-btn:hover {
  color: var(--primary-color);
}

/* Dashboard Grid */
.dashboard-grid {
  display: none; /* Hide the dashboard grid since it's now empty */
}

.dashboard-card {
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  overflow: hidden;
}

.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  border-bottom: 1px solid var(--gray-200);
}

.card-header h2 {
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--gray-800);
}

.view-all {
  font-size: 0.8rem;
  color: var(--primary-color);
}

.card-content {
  padding: 15px 20px;
}

/* Student List */
.student-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.student-item {
  display: flex;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid var(--gray-200);
}

.student-item:last-child {
  border-bottom: none;
}

.student-info {
  flex: 1;
  margin-left: 12px;
}

.student-info h4 {
  font-size: 0.9rem;
  margin-bottom: 3px;
}

.student-info p {
  font-size: 0.8rem;
  color: var(--gray-600);
}

.student-date {
  font-size: 0.8rem;
  color: var(--gray-500);
}

/* Activity List */
.activity-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.activity-item {
  display: flex;
  align-items: flex-start;
  padding: 10px 0;
  border-bottom: 1px solid var(--gray-200);
}

.activity-item:last-child {
  border-bottom: none;
}

.activity-icon {
  width: 35px;
  height: 35px;
  background-color: var(--gray-100);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--primary-color);
  margin-right: 12px;
}

.activity-details h4 {
  font-size: 0.9rem;
  margin-bottom: 3px;
}

.activity-details p {
  font-size: 0.8rem;
  color: var(--gray-600);
  margin-bottom: 5px;
}

.activity-time {
  font-size: 0.75rem;
  color: var(--gray-500);
}

/* Course List */
.course-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.course-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid var(--gray-200);
}

.course-item:last-child {
  border-bottom: none;
}

.course-info h4 {
  font-size: 0.9rem;
  margin-bottom: 3px;
}

.course-info p {
  font-size: 0.8rem;
  color: var(--gray-600);
}

/* Filter Bar */
.filter-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: white;
  border-radius: var(--border-radius);
  padding: 15px 20px;
  margin-bottom: 20px;
  box-shadow: var(--box-shadow);
}

.filter-actions {
  display: flex;
  gap: 10px;
}

.filter-select {
  padding: 8px 12px;
  border: 1px solid var(--gray-300);
  border-radius: var(--border-radius);
  font-size: 0.9rem;
  outline: none;
}

.filter-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 15px;
  background-color: var(--gray-100);
  border: 1px solid var(--gray-300);
  border-radius: var(--border-radius);
  font-size: 0.9rem;
  cursor: pointer;
}

.filter-btn:hover {
  background-color: var(--gray-200);
}

/* Table */
.table-container {
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  overflow: hidden;
  margin-bottom: 20px;
}

.data-table {
  width: 100%;
  border-collapse: collapse;
}

.data-table th {
  background-color: var(--gray-100);
  padding: 12px 15px;
  text-align: left;
  font-weight: 600;
  color: var(--gray-700);
  border-bottom: 1px solid var(--gray-300);
}

.data-table td {
  padding: 12px 15px;
  border-bottom: 1px solid var(--gray-200);
}

.data-table tbody tr:hover {
  background-color: var(--gray-50);
}

.table-user {
  display: flex;
  align-items: center;
  gap: 10px;
}

.status-badge {
  display: inline-block;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 0.75rem;
  font-weight: 500;
}

.status-badge.active {
  background-color: rgba(76, 175, 80, 0.1);
  color: var(--success-color);
}

.status-badge.inactive {
  background-color: rgba(244, 67, 54, 0.1);
  color: var(--danger-color);
}

.table-actions {
  display: flex;
  gap: 5px;
}

.action-btn {
  width: 30px;
  height: 30px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid var(--gray-300);
  background-color: white;
  color: var(--gray-600);
  cursor: pointer;
  transition: all 0.2s;
}

.action-btn:hover {
  background-color: var(--gray-100);
}

.action-btn.edit:hover {
  color: var(--info-color);
  border-color: var(--info-color);
}

.action-btn.delete:hover {
  color: var(--danger-color);
  border-color: var(--danger-color);
}

/* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
  margin-top: 20px;
}

.pagination-btn {
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid var(--gray-300);
  background-color: white;
  border-radius: 6px;
  font-size: 0.9rem;
  cursor: pointer;
}

.pagination-btn:hover:not(:disabled) {
  background-color: var(--gray-100);
}

.pagination-btn.active {
  background-color: var(--primary-color);
  color: white;
  border-color: var(--primary-color);
}

.pagination-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.pagination-ellipsis {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 35px;
  height: 35px;
  font-size: 0.9rem;
}

/* Courses Grid */
.courses-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
}

.course-card {
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  overflow: hidden;
}

.course-card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px;
  border-bottom: 1px solid var(--gray-200);
}

.course-icon {
  width: 40px;
  height: 40px;
  background-color: var(--primary-light);
  color: white;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
}

.course-card-content {
  padding: 15px;
}

.course-card-content h3 {
  font-size: 1rem;
  margin-bottom: 5px;
}

.course-instructor {
  font-size: 0.85rem;
  color: var(--gray-600);
  margin-bottom: 15px;
}

.course-details {
  display: flex;
  gap: 15px;
}

.course-detail {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 0.8rem;
  color: var(--gray-600);
}

.course-card-footer {
  display: flex;
  justify-content: space-between;
  padding: 15px;
  border-top: 1px solid var(--gray-200);
}

/* Messages */
.messages-container {
  display: flex;
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  overflow: hidden;
  height: calc(100vh - 180px);
}

.messages-sidebar {
  width: 300px;
  border-right: 1px solid var(--gray-200);
  display: flex;
  flex-direction: column;
}

.messages-filter {
  display: flex;
  border-bottom: 1px solid var(--gray-200);
}

.filter-tab {
  flex: 1;
  padding: 15px 0;
  text-align: center;
  background: none;
  border: none;
  font-size: 0.9rem;
  color: var(--gray-600);
  cursor: pointer;
  border-bottom: 2px solid transparent;
}

.filter-tab.active {
  color: var(--primary-color);
  border-bottom-color: var(--primary-color);
}

.messages-list {
  flex: 1;
  overflow-y: auto;
}

.message-preview {
  padding: 15px;
  border-bottom: 1px solid var(--gray-200);
  cursor: pointer;
  transition: background-color 0.2s;
}

.message-preview:hover {
  background-color: var(--gray-100);
}

.message-preview.unread {
  background-color: rgba(67, 97, 238, 0.05);
  border-left: 3px solid var(--primary-color);
}

.message-sender {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 8px;
}

.sender-info {
  flex: 1;
}

.sender-info h4 {
  font-size: 0.9rem;
  margin-bottom: 2px;
}

.message-time {
  font-size: 0.75rem;
  color: var(--gray-500);
}

.message-snippet h4 {
  font-size: 0.85rem;
  margin-bottom: 5px;
}

.message-snippet p {
  font-size: 0.8rem;
  color: var(--gray-600);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.message-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.message-header {
  padding: 20px;
  border-bottom: 1px solid var(--gray-200);
  display: flex;
  justify-content: space-between;
}

.message-subject h2 {
  font-size: 1.2rem;
  margin-bottom: 5px;
}

.message-meta {
  font-size: 0.8rem;
  color: var(--gray-600);
  display: flex;
  flex-direction: column;
  gap: 3px;
}

.message-body {
  flex: 1;
  padding: 20px;
  overflow-y: auto;
  line-height: 1.6;
}

.message-body p {
  margin-bottom: 15px;
}

.message-reply {
  padding: 20px;
  border-top: 1px solid var(--gray-200);
}

.message-reply h3 {
  font-size: 1rem;
  margin-bottom: 10px;
}

.message-reply textarea {
  width: 100%;
  height: 100px;
  padding: 10px;
  border: 1px solid var(--gray-300);
  border-radius: var(--border-radius);
  resize: none;
  margin-bottom: 15px;
}

.reply-actions {
  display: flex;
  gap: 10px;
}

/* Forms */
.form-container {
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  padding: 25px;
  max-width: 900px;
  margin: 0 auto;
}

.admin-form {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.form-section {
  border-bottom: 1px solid var(--gray-200);
  padding-bottom: 20px;
}

.form-section:last-child {
  border-bottom: none;
}

.form-section h2 {
  font-size: 1.1rem;
  margin-bottom: 20px;
  color: var(--gray-800);
}

.form-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--gray-700);
}

.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid var(--gray-300);
  border-radius: var(--border-radius);
  font-size: 0.9rem;
}

.form-group textarea {
  resize: vertical;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.1);
}

.form-group.checkbox {
  display: flex;
  align-items: center;
}

.form-group.checkbox input {
  width: auto;
  margin-right: 10px;
}

.form-group.checkbox label {
  margin-bottom: 0;
}

.form-actions {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}

/* Settings */
.settings-container {
  display: flex;
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  overflow: hidden;
}

.settings-sidebar {
  width: 250px;
  border-right: 1px solid var(--gray-200);
}

.settings-nav {
  padding: 20px 0;
}

.settings-nav-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px 20px;
  color: var(--gray-700);
  cursor: pointer;
  transition: all 0.2s;
}

.settings-nav-item:hover {
  background-color: var(--gray-100);
}

.settings-nav-item.active {
  background-color: var(--gray-100);
  color: var(--primary-color);
  border-left: 3px solid var(--primary-color);
}

.settings-content {
  flex: 1;
  padding: 25px;
}

.settings-panel h2 {
  font-size: 1.2rem;
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid var(--gray-200);
}

.theme-options {
  display: flex;
  gap: 15px;
  margin-top: 10px;
}

.theme-option {
  text-align: center;
  cursor: pointer;
}

.theme-preview {
  width: 80px;
  height: 50px;
  border-radius: 8px;
  margin-bottom: 8px;
  border: 2px solid transparent;
}

.theme-option.active .theme-preview {
  border-color: var(--primary-color);
}

.theme-preview.light {
  background-color: white;
  box-shadow: inset 0 0 0 1px var(--gray-300);
}

.theme-preview.dark {
  background-color: #1e1e2d;
}

.theme-preview.blue {
  background-color: #f0f7ff;
  box-shadow: inset 0 0 0 1px #d0e3ff;
}

/* Buttons */
.primary-btn {
  padding: 10px 20px;
  background-color: var(--primary-color);
  color: white;
  border: none;
  border-radius: var(--border-radius);
  font-size: 0.9rem;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: background-color 0.2s;
}

.primary-btn:hover {
  background-color: var(--primary-dark);
}

.secondary-btn {
  padding: 8px 15px;
  background-color: white;
  color: var(--gray-700);
  border: 1px solid var(--gray-300);
  border-radius: var(--border-radius);
  font-size: 0.9rem;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s;
}

.secondary-btn:hover {
  background-color: var(--gray-100);
  border-color: var(--gray-400);
}

/* Responsive Styles */
@media (max-width: 992px) {
  .search-box {
    width: 200px;
  }

  .messages-container {
    flex-direction: column;
    height: auto;
  }

  .messages-sidebar {
    width: 100%;
    border-right: none;
    border-bottom: 1px solid var(--gray-200);
  }

  .settings-container {
    flex-direction: column;
  }

  .settings-sidebar {
    width: 100%;
    border-right: none;
    border-bottom: 1px solid var(--gray-200);
  }

  .settings-nav {
    display: flex;
    overflow-x: auto;
    padding: 10px;
  }

  .settings-nav-item {
    white-space: nowrap;
  }
}

@media (max-width: 768px) {
  .sidebar {
    position: fixed;
    left: -100%;
    height: 100%;
  }

  .sidebar.active {
    left: 0;
  }

  .close-btn {
    display: block;
  }

  .menu-btn {
    display: block;
  }

  .search-box {
    display: none;
  }

  .filter-bar {
    flex-direction: column;
    gap: 15px;
  }

  .filter-bar .search-box {
    display: flex;
    width: 100%;
  }

  .filter-actions {
    width: 100%;
  }

  .filter-select {
    flex: 1;
  }

  .courses-grid {
    grid-template-columns: 1fr;
  }

  .form-row {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 576px) {
  .page-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }

  .stats-grid {
    grid-template-columns: 1fr;
  }

  .dashboard-grid {
    grid-template-columns: 1fr;
  }

  .table-container {
    overflow-x: auto;
  }

  .data-table {
    min-width: 650px;
  }
}

/* Add styles for the modal */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 2000;
  align-items: center;
  justify-content: center;
}

.modal.active {
  display: flex;
}

.modal-content {
  background-color: white;
  border-radius: var(--border-radius);
  width: 100%;
  max-width: 500px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  border-bottom: 1px solid var(--gray-200);
}

.modal-header h2 {
  font-size: 1.2rem;
  margin: 0;
}

.close-modal {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  color: var(--gray-600);
}

.modal-body {
  padding: 20px;
}

.modal-footer {
  padding: 15px 20px;
  border-top: 1px solid var(--gray-200);
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

/* Add styles for the top bar title */
.top-bar-title {
  display: flex;
  align-items: center;
}

.top-bar-title h2 {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--gray-800);
}

/* Add these styles for the search functionality */
.no-results-message {
  text-align: center;
  padding: 20px;
  background-color: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  margin-top: 15px;
  color: var(--gray-600);
}

.search-box {
  position: relative;
}

.clear-search {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: var(--gray-500);
  cursor: pointer;
  display: none;
}

.clear-search:hover {
  color: var(--gray-700);
}

/* Highlight search matches */
.highlight {
  background-color: rgba(67, 97, 238, 0.1);
  padding: 0 2px;
  border-radius: 2px;
}
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-top">
                <div class="logo">
                    <i class="fas fa-school"></i>
                    <h2>EduAdmin</h2>
                </div>
                <button id="close-sidebar" class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="sidebar-content">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h3>Admin User</h3>
                        <p>Administrator</p>
                    </div>
                </div>
                
                <nav class="sidebar-nav">
                    <ul>
                        <li class="nav-item active" data-page="dashboard">
                            <a href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="students">
                            <a href="#">
                                <i class="fas fa-user-graduate"></i>
                                <span>Students</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="courses">
                            <a href="#">
                                <i class="fas fa-book"></i>
                                <span>Courses</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="messages">
                            <a href="#">
                                <i class="fas fa-envelope"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="add-student">
                            <a href="#">
                                <i class="fas fa-user-plus"></i>
                                <span>Add Student</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="settings">
                            <a href="#">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="sidebar-footer">
                <a href="#" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <button id="toggle-sidebar" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="top-bar-title">
                    <h2>School Admin Dashboard</h2>
                </div>
                <div class="top-bar-actions">
                    <button class="notification-btn" id="notification-btn">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="user-dropdown">
                        <button class="user-btn">
                            <div class="user-avatar small">
                                <i class="fas fa-user"></i>
                            </div>
                            <span>Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Page -->
            <div class="page-content" id="dashboard">
                <div class="page-header">
                    <h1>Dashboard</h1>
                    <p>Welcome to your admin dashboard</p>
                </div>
                
                
    <div class="stat-card editable" data-stat="students">
        <div class="stat-card-content">
            <h3>Total Students</h3>
            <h2 id="student-count">256</h2>
            <p class="stat-change positive">
                <i class="fas fa-arrow-up"></i> 12% from last month
            </p>
            <button class="edit-stat-btn"><i class="fas fa-edit"></i></button>
        </div>
        <div class="stat-card-icon students">
            <i class="fas fa-user-graduate"></i>
        </div>
    </div>
    
    <div class="stat-card editable" data-stat="courses">
        <div class="stat-card-content">
            <h3>Active Courses</h3>
            <h2 id="course-count">24</h2>
            <p class="stat-change positive">
                <i class="fas fa-arrow-up"></i> 8% from last month
            </p>
            <button class="edit-stat-btn"><i class="fas fa-edit"></i></button>
        </div>
        <div class="stat-card-icon courses">
            <i class="fas fa-book"></i>
        </div>
    </div>
    
    <div class="stat-card editable" data-stat="messages">
        <div class="stat-card-content">
            <h3>New Messages</h3>
            <h2 id="message-count">18</h2>
            <p class="stat-change neutral">
                <i class="fas fa-minus"></i> Same as last week
            </p>
            <button class="edit-stat-btn"><i class="fas fa-edit"></i></button>
        </div>
        <div class="stat-card-icon messages">
            <i class="fas fa-envelope"></i>
        </div>
    </div>
                
                
    
    <!-- This section is now empty -->

            </div>

            <!-- Students Page -->
            <div class="page-content" id="students" style="display: none;">
                <div class="page-header">
                    <h1>Students</h1>
                    <button class="primary-btn">
                        <i class="fas fa-plus"></i> <a href="#add-student">Add Student</a>
                    </button>
                </div>
                
                <div class="filter-bar">
                    <!-- Update the search box in the students page to have a placeholder that indicates functionality -->
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search student names...">
</div>
                    <div class="filter-actions">
                        <select class="filter-select">
                            <option value="">All Courses</option>
                            <option value="cs">Computer Science</option>
                            <option value="ds">Data Science</option>
                            <option value="wd">Web Development</option>
                            <option value="gd">Graphic Design</option>
                        </select>
                        <button class="filter-btn">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
                
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="select-all">
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Enrollment Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>John Doe</span>
                                    </div>
                                </td>
                                <td>john.doe@example.com</td>
                                <td>Computer Science</td>
                                <td>2023-09-01</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Jane Smith</span>
                                    </div>
                                </td>
                                <td>jane.smith@example.com</td>
                                <td>Data Science</td>
                                <td>2023-08-15</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Robert Johnson</span>
                                    </div>
                                </td>
                                <td>robert.j@example.com</td>
                                <td>Web Development</td>
                                <td>2023-09-05</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Lisa Brown</span>
                                    </div>
                                </td>
                                <td>lisa.brown@example.com</td>
                                <td>Graphic Design</td>
                                <td>2023-08-20</td>
                                <td><span class="status-badge inactive">On Leave</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Michael Wilson</span>
                                    </div>
                                </td>
                                <td>michael.w@example.com</td>
                                <td>Business Administration</td>
                                <td>2023-09-10</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination">
                    <button class="pagination-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Courses Page -->
            <div class="page-content" id="courses" style="display: none;">
                <div class="page-header">
                    <h1>Courses</h1>
                    <button class="primary-btn">
                        <i class="fas fa-plus"></i> Add Course
                    </button>
                </div>
                
                <div class="courses-grid">
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Introduction to Computer Science</h3>
                            <p class="course-instructor">Dr. Alan Turing</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>12 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>45 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Web Development Bootcamp</h3>
                            <p class="course-instructor">Sarah Williams</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>8 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>32 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Data Science Fundamentals</h3>
                            <p class="course-instructor">Prof. David Clark</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>10 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>28 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>UI/UX Design Principles</h3>
                            <p class="course-instructor">Emma Johnson</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>6 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>24 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Mobile App Development</h3>
                            <p class="course-instructor">Michael Chen</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>9 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>30 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Business Administration</h3>
                            <p class="course-instructor">Jennifer Adams</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>12 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>38 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Page -->
            <div class="page-content" id="messages" style="display: none;">
                <div class="page-header">
                    <h1>Messages</h1>
                    <button class="primary-btn">
                        <i class="fas fa-plus"></i> Compose
                    </button>
                </div>
                
                <div class="messages-container">
                    <div class="messages-sidebar">
                        <div class="messages-filter">
                            <button class="filter-tab active">All</button>
                            <button class="filter-tab">Unread</button>
                            <button class="filter-tab">Sent</button>
                            <button class="filter-tab">Archived</button>
                        </div>
                        <div class="messages-list">
                            <div class="message-preview unread">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>John Doe</h4>
                                        <p class="message-time">Mar 26, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Question about course materials</h4>
                                    <p>I'm having trouble accessing the course materials...</p>
                                </div>
                            </div>
                            
                            <div class="message-preview unread">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>Jane Smith</h4>
                                        <p class="message-time">Mar 25, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Request for deadline extension</h4>
                                    <p>Due to personal circumstances, I'd like to request...</p>
                                </div>
                            </div>
                            
                            <div class="message-preview">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>Robert Johnson</h4>
                                        <p class="message-time">Mar 24, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Technical issue with assignment submission</h4>
                                    <p>I'm experiencing a technical issue when trying to...</p>
                                </div>
                            </div>
                            
                            <div class="message-preview">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>Lisa Brown</h4>
                                        <p class="message-time">Mar 23, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Feedback on course structure</h4>
                                    <p>I wanted to provide some feedback on the course...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="message-content">
                        <div class="message-header">
                            <div class="message-subject">
                                <h2>Question about course materials</h2>
                                <div class="message-meta">
                                    <span class="message-from">From: John Doe (john.doe@example.com)</span>
                                    <span class="message-date">Mar 26, 2025, 10:42 AM</span>
                                </div>
                            </div>
                            <div class="message-actions">
                                <button class="action-btn">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-archive"></i>
                                </button>
                            </div>
                        </div>
                        <div class="message-body">
                            <p>Dear Administrator,</p>
                            <p>I'm having trouble accessing the course materials for Web Development. When I try to download the PDF files, I get an error message saying "Access Denied".</p>
                            <p>Could you please check if there's an issue with my account permissions? I've been able to access other course materials without any problems.</p>
                            <p>Thank you for your help.</p>
                            <p>Best regards,<br>John Doe</p>
                        </div>
                        <div class="message-reply">
                            <h3>Reply</h3>
                            <textarea placeholder="Type your reply here..."></textarea>
                            <div class="reply-actions">
                                <button class="primary-btn">Send</button>
                                <button class="secondary-btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Student Page -->
            <div class="page-content" id="add-student" style="display: none;">
                <div class="page-header">
                    <h1>Add New Student</h1>
                </div>
                
                <div class="form-container">
                    <form id="student-form" class="admin-form">
                        <div class="form-section">
                            <h2>Personal Information</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" id="first-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" id="last-name" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                        <option value="prefer-not">Prefer not to say</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <h2>Course Information</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select id="course" required>
                                        <option value="">Select a course</option>
                                        <option value="cs">Computer Science</option>
                                        <option value="ds">Data Science</option>
                                        <option value="wd">Web Development</option>
                                        <option value="gd">Graphic Design</option>
                                        <option value="ba">Business Administration</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start-date">Start Date</label>
                                    <input type="date" id="start-date" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <h2>Address</h2>
                            <div class="form-group">
                                <label for="address">Street Address</label>
                                <input type="text" id="address">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city">
                                </div>
                                
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" id="country">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="primary-btn">Save Student</button>
                            <button type="button" class="secondary-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Settings Page -->
            <div class="page-content" id="settings" style="display: none;">
                <div class="page-header">
                    <h1>Settings</h1>
                </div>
                
                <div class="settings-container">
                    <div class="settings-sidebar">
                        <ul class="settings-nav">
                            <li class="settings-nav-item active" data-settings="account">
                                <i class="fas fa-user"></i> Account
                            </li>
                            <li class="settings-nav-item" data-settings="password">
                                <i class="fas fa-lock"></i> Password
                            </li>
                            <li class="settings-nav-item" data-settings="notifications">
                                <i class="fas fa-bell"></i> Notifications
                            </li>
                            <li class="settings-nav-item" data-settings="appearance">
                                <i class="fas fa-palette"></i> Appearance
                            </li>
                        </ul>
                    </div>
                    
                    <div class="settings-content">
                        <div class="settings-panel" id="account-settings">
                            <h2>Account Settings</h2>
                            <form id="account-form" class="admin-form">
                                <div class="form-group">
                                    <label for="admin-name">Name</label>
                                    <input type="text" id="admin-name" value="Admin User">
                                </div>
                                
                                <div class="form-group">
                                    <label for="admin-email">Email</label>
                                    <input type="email" id="admin-email" value="admin@example.com">
                                </div>
                                
                                <div class="form-group">
                                    <label for="admin-role">Role</label>
                                    <input type="text" id="admin-role" value="Administrator" disabled>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="settings-panel" id="password-settings" style="display: none;">
                            <h2>Change Password</h2>
                            <form id="password-form" class="admin-form">
                                <div class="form-group">
                                    <label for="current-password">Current Password</label>
                                    <input type="password" id="current-password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="new-password">New Password</label>
                                    <input type="password" id="new-password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="confirm-password">Confirm New Password</label>
                                    <input type="password" id="confirm-password" required>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Update Password</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="settings-panel" id="notifications-settings" style="display: none;">
                            <h2>Notification Preferences</h2>
                            <form id="notifications-form" class="admin-form">
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-new-student" checked>
                                    <label for="notify-new-student">New student registrations</label>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-new-message" checked>
                                    <label for="notify-new-message">New messages</label>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-course-update">
                                    <label for="notify-course-update">Course updates</label>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-system" checked>
                                    <label for="notify-system">System notifications</label>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Save Preferences</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="settings-panel" id="appearance-settings" style="display: none;">
                            <h2>Appearance Settings</h2>
                            <form id="appearance-form" class="admin-form">
                                <div class="form-group">
                                    <label>Theme</label>
                                    <div class="theme-options">
                                        <div class="theme-option active">
                                            <div class="theme-preview light"></div>
                                            <span>Light</span>
                                        </div>
                                        <div class="theme-option">
                                            <div class="theme-preview dark"></div>
                                            <span>Dark</span>
                                        </div>
                                        <div class="theme-option">
                                            <div class="theme-preview blue"></div>
                                            <span>Blue</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="font-size">Font Size</label>
                                    <select id="font-size">
                                        <option value="small">Small</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Save Preferences</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal" id="edit-stat-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Statistic</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="stat-value">Value</label>
                    <input type="number" id="stat-value" min="0">
                </div>
                <div class="form-group">
                    <label for="stat-trend">Trend</label>
                    <select id="stat-trend">
                        <option value="positive">Positive</option>
                        <option value="negative">Negative</option>
                        <option value="neutral">Neutral</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stat-percentage">Percentage Change</label>
                    <input type="number" id="stat-percentage" min="0" max="100">
                </div>
            </div>
            <div class="modal-footer">
                <button class="secondary-btn" id="cancel-edit">Cancel</button>
                <button class="primary-btn" id="save-stat">Save Changes</button>
            </div>
        </div>
    </div>

    <script src="../../assets/js/script.js"></script>
</body>9
</html>