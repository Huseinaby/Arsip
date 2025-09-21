#  DISPERSIP - IMB Digital Archive System

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


##  Key Features

-    **Secure Authentication:** A dedicated login system to ensure data security and integrity.
-    **Interactive Dashboard:** A visual dashboard presenting key statistics, including a chart summarizing archives by year.
-    **Comprehensive IMB Data Management:** Full CRUD (Create, Read, Update, Delete) functionality for IMB archives with detailed fields such as `Nomor DP`, `Nama`, `Alamat`, `Lokasi`, and `Box`.
-    **PDF Manipulation Tools:**
    -   **File Uploads:** Easily upload and attach original IMB documents in PDF format to each record.
    -   **PDF Merging:** A unique feature to combine multiple PDF files directly within the application.
    -   **PDF Generation & Printing:** Ability to print individual records or all data from the management table.
-    **Advanced Search & Filtering:** A powerful and intuitive search bar and filtering system to quickly locate specific archives.

##  Tech Stack

-   **Backend**: Laravel 11, PHP 8.2+
-   **Frontend**: Tailwind CSS, Flowbite, Blade
-   **Database**: MySQL 
-   **Key Libraries**:
    -   `webklex/laravel-pdfmerger`: For merging PDF documents.
-   **Asset Bundling**: Vite
-   **Development Tools**: Composer, NPM