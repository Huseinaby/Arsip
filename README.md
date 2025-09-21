#  ARSIP - IMB Digital Archive System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Flowbite-1C64F2?style=for-the-badge&logo=flowbite&logoColor=white" alt="Flowbite">
</p>

A web-based application designed for the digital archiving and management of IMB (Izin Mendirikan Bangunan - Building Permit) documents. Developed for government agencies or departments, this system aims to modernize record-keeping by centralizing archives, enabling quick and powerful searches, and providing integrated tools for PDF document management.

##  Screenshots

| Login Page | Dashboard |
| :---: | :---: |
| Secure access for authorized personnel. | At-a-glance view of archive statistics. |
| **![Login](./docs/images/Screenshot_1.png)** | **![Dashboard](./docs/images/Screenshot_2.png)** |

| Data Input & PDF Tools | Data Management |
| :---: | :---: |
| Form for inputting new archive data with PDF upload and merge capabilities. | Searchable and filterable data table with CRUD and print actions. |
| **![Form](./docs/images/Screenshot_3.png)** | **![Management](./docs/images/Screenshot_4.png)** |


## ✨ Key Features

-    **Secure Authentication,** A dedicated login system to ensure data security and integrity.
-    **Interactive Dashboard,** A visual dashboard presenting key statistics, including a chart summarizing archives by year.
-    **Comprehensive Archive Management:**
     -   Full CRUD (Create, Read, Update, Delete) functionality for IMB records.
     -   Attach original scanned documents in PDF format to each record.
     -   **Directly view or download the original uploaded PDF file** for easy access and verification.
-    **Powerful Search & Reporting:**
     -   An intuitive search bar and filtering system to quickly locate specific archives.
     -   **Generate and export the filtered data list as a new PDF document.**
     -   **Print the filtered report list** directly from the browser.
-    **Advanced PDF Tools:**
     -   A unique feature to **merge multiple individual PDF files** into a single

##  Tech Stack

-   **Backend**: Laravel 11, PHP 8.2+
-   **Frontend**: Tailwind CSS, Flowbite, Blade
-   **Database**: MySQL 
-   **Key Libraries**:
    -   `webklex/laravel-pdfmerger`: For merging PDF documents.
-   **Asset Bundling**: Vite
-   **Development Tools**: Composer, NPM