# OJO Portfolio Website

A dynamic personal portfolio website built with PHP and MySQL to showcase my projects, technical skills, education, and contact information. It includes an administrative dashboard for managing portfolio projects and contact messages.

🌐 **Live Website:** https://ojoportfolio.infinityfreeapp.com/

## Features

- Responsive portfolio homepage
- About and Projects pages
- Individual project details
- Dynamic project listings retrieved from MySQL
- Admin authentication and dashboard
- Create, edit, and delete portfolio projects
- Project image uploads
- Contact form and message management
- GitHub and live demo links for projects

## Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Local Development:** XAMPP
- **Version Control:** Git and GitHub
- **Hosting:** InfinityFree

## Project Structure

```text
Portfolio-Website/
├── admin/
├── assets/
│   ├── css/
│   └── ...
├── includes/
├── pages/
├── sql/
├── uploads/
├── index.php
└── README.md
```

## What I Learned

- Connecting PHP applications to MySQL
- Building CRUD functionality for portfolio projects
- Processing contact form submissions
- Handling project image uploads
- Implementing administrator authentication
- Organizing reusable PHP includes and page files
- Deploying a PHP/MySQL application to web hosting
- Managing code with Git and GitHub

## Getting Started

### Requirements

- PHP
- MySQL or MariaDB
- Apache web server (XAMPP can be used locally)

### Local Setup

1. Clone the repository into your XAMPP `htdocs` directory:

   ```bash
   git clone https://github.com/Monta1378/Portfolio-Website.git
   ```

2. Start Apache and MySQL in XAMPP.
3. Create the portfolio database and import the appropriate SQL file from the `sql/` directory.
4. Configure the database connection in the project's database configuration file.
5. Open the project in your browser at:

   `http://localhost/Portfolio-Website/`

**Note:** Use your own local database credentials. Do not commit production database passwords or other secrets to GitHub.

## Author

Jesse Ochoi

Mathematics & Computer Science student at Kenyatta University, building practical web applications while developing my full-stack software engineering skills.

## License

See the `LICENSE` file for licensing information.
