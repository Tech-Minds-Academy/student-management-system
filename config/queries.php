<?php
// SQL queries for user authentication
define('CHECK_USER_EXISTS', "SELECT * FROM users WHERE email = ? OR phone = ?");
define('INSERT_USER', "INSERT INTO users (first_name, last_name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
define('FETCH_USER_BY_EMAIL', "SELECT * FROM users WHERE email = ?");
define('SEARCH_USERS', "SELECT * FROM users WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ? OR phone LIKE ?");
define('UPDATE_USER', "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?");
define('DELETE_USER', "DELETE FROM users WHERE id = ?");
?>