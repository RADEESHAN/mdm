# MDM System User Guide

This guide provides detailed instructions on how to use the Master Data Management (MDM) System.

## Table of Contents

1. [Getting Started](#getting-started)
2. [Authentication](#authentication)
3. [Dashboard](#dashboard)
4. [Brand Management](#brand-management)
5. [Category Management](#category-management)
6. [Item Management](#item-management)
7. [Search and Filtering](#search-and-filtering)
8. [Data Export](#data-export)
9. [Admin Features](#admin-features)
10. [Troubleshooting](#troubleshooting)

---

## Getting Started

The MDM System helps you manage master data for your organization, including brands, categories, and items. The system provides a user-friendly interface to create, view, update, and delete this information.

### System Requirements

To use the MDM System, you need:
- A modern web browser (Chrome, Firefox, Safari, or Edge)
- Internet connection
- User credentials (email and password)

---

## Authentication

### Registration

1. Navigate to the application's homepage.
2. Click on the "Register" button in the top-right corner.
3. Fill in the registration form with your name, email, and password.
4. Click "Register" to create your account.

### Login

1. Navigate to the application's homepage.
2. Click on the "Log in" button in the top-right corner.
3. Enter your email and password.
4. Click "Log in" to access your account.

### Password Recovery

1. Navigate to the login page.
2. Click on the "Forgot your password?" link.
3. Enter your email address and click "Email Password Reset Link".
4. Check your email for a password reset link.
5. Follow the link to create a new password.

### Profile Management

1. After logging in, click on your name in the top-right corner.
2. Select "Profile" from the dropdown menu.
3. Here you can:
   - Update your name and email
   - Change your password
   - Manage your profile settings

---

## Dashboard

The dashboard is the main screen you'll see after logging in. It provides an overview of your master data and quick access to all system features.

### Dashboard Components

1. **Summary Cards**: Display counts of total brands, categories, and items.
2. **Quick Access Cards**: Links to manage brands, categories, and items.
3. **Recent Items**: A table showing the most recent items added to the system.
4. **Search & Filter**: Tools to find specific items.
5. **Export Button**: Option to export item data to CSV format.

---

## Brand Management

### Viewing Brands

1. From the dashboard, click on "Manage Brands".
2. The brands index page displays all brands in a paginated table (5 brands per page).

### Creating a Brand

1. From the brands index page, click "Add Brand".
2. Fill in the brand details:
   - **Code**: A unique identifier for the brand
   - **Name**: The brand name
   - **Status**: Active (default) or Inactive
3. Click "Create Brand" to save.

### Editing a Brand

1. From the brands index page, find the brand you want to edit.
2. Click "Edit" in the Actions column.
3. Update the brand details.
4. Click "Update Brand" to save your changes.

### Deleting a Brand

1. From the brands index page, find the brand you want to delete.
2. Click "Delete" in the Actions column.
3. Confirm deletion in the modal dialog.

> **Note**: You cannot delete a brand that is associated with any items. You must first delete or reassign those items.

---

## Category Management

### Viewing Categories

1. From the dashboard, click on "Manage Categories".
2. The categories index page displays all categories in a paginated table (5 categories per page).

### Creating a Category

1. From the categories index page, click "Add Category".
2. Fill in the category details:
   - **Code**: A unique identifier for the category
   - **Name**: The category name
   - **Status**: Active (default) or Inactive
3. Click "Create Category" to save.

### Editing a Category

1. From the categories index page, find the category you want to edit.
2. Click "Edit" in the Actions column.
3. Update the category details.
4. Click "Update Category" to save your changes.

### Deleting a Category

1. From the categories index page, find the category you want to delete.
2. Click "Delete" in the Actions column.
3. Confirm deletion in the modal dialog.

> **Note**: You cannot delete a category that is associated with any items. You must first delete or reassign those items.

---

## Item Management

### Viewing Items

1. From the dashboard, click on "Manage Items".
2. The items index page displays all items in a paginated table (5 items per page).

### Creating an Item

1. From the items index page, click "Add Item".
2. Fill in the item details:
   - **Brand**: Select from the dropdown list
   - **Category**: Select from the dropdown list
   - **Code**: A unique identifier for the item
   - **Name**: The item name
   - **Attachment**: Optional file upload (PDF, DOC, DOCX, JPG, JPEG, PNG, max 2MB)
   - **Status**: Active (default) or Inactive
3. Click "Create Item" to save.

### Editing an Item

1. From the items index page, find the item you want to edit.
2. Click "Edit" in the Actions column.
3. Update the item details.
4. To update an attachment:
   - If there's an existing attachment, you'll see a "View File" link
   - Upload a new file to replace the existing one
5. Click "Update Item" to save your changes.

### Deleting an Item

1. From the items index page, find the item you want to delete.
2. Click "Delete" in the Actions column.
3. Confirm deletion in the modal dialog.

---

## Search and Filtering

### Searching for Items

1. On the dashboard or items page, locate the search field.
2. Enter your search term (matching code or name).
3. Click "Filter" or press Enter to search.
4. Results will update to show matching items.

### Filtering by Status

1. On the dashboard or items page, locate the status dropdown.
2. Select "Active" or "Inactive" to filter by status.
3. Click "Filter" to apply.
4. Results will update to show items with the selected status.

### Combined Search and Filter

You can combine search terms and status filters to narrow down results more precisely.

---

## Data Export

### Exporting Items to CSV

1. On the dashboard or items page, locate the "Export Items to CSV" button.
2. Click the button.
3. A CSV file containing all items will be downloaded to your computer.
4. The CSV includes columns for Code, Name, Brand, Category, Status, and Creation Date.

### Working with Exported Data

The exported CSV file can be opened with:
- Microsoft Excel
- Google Sheets
- LibreOffice Calc
- Any text editor

You can use this data for:
- Reporting
- Analysis
- Data backup
- Integration with other systems

---

## Admin Features

### Admin Access

Users with admin privileges (is_admin = 1) have additional capabilities.

### Managing All Users' Data

As an admin user, you can:
1. View all items, brands, and categories created by any user
2. Edit any items, brands, or categories in the system
3. Delete any items, brands, or categories (subject to relationship constraints)

### Admin Dashboard View

The admin dashboard includes summary statistics for all users' data, not just your own.

---

## Troubleshooting

### Common Issues and Solutions

#### Login Problems

- **Issue**: Cannot log in despite correct credentials
- **Solution**: Try password reset, check for caps lock, clear browser cache

#### Upload Issues

- **Issue**: File upload fails
- **Solution**: 
  - Check file size (must be under 2MB) 
  - Verify file format is supported (PDF, DOC, DOCX, JPG, JPEG, PNG)
  - Ensure you have a stable internet connection

#### Export Problems

- **Issue**: Export button doesn't download anything
- **Solution**: 
  - Check browser download settings
  - Try a different browser
  - Check if any browser extensions might be blocking downloads

### Getting Help

If you encounter persistent issues:
- Check this documentation for guidance
- Contact your system administrator
- Submit a support ticket through the organization's help desk

---

## Keyboard Shortcuts

For power users, the MDM System supports these keyboard shortcuts:

- `Alt + D`: Go to Dashboard
- `Alt + B`: Go to Brands
- `Alt + C`: Go to Categories
- `Alt + I`: Go to Items
- `Alt + S`: Focus on Search field
- `Esc`: Close modals

---

This concludes the MDM System user guide. For further assistance or to report issues, please contact your system administrator.