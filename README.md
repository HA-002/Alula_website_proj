# Discover AlUla

A tourism directory website for AlUla, Saudi Arabia. Visitors can browse events and activities, read details and reviews, and leave their own review. An administrator can log in to add, edit and delete content.

> Group course project for IT 390 (Web Systems), Imam Mohammad Ibn Saud Islamic University.

## Features
- Browse events and activities without logging in
- Detail page for each event or activity with its reviews
- Review form: name, rating (1–5) and comment, no registration needed
- Admin login and dashboard to add, edit and delete events and activities
- Contact, About and booking pages
- Responsive layout

## Tech Stack
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP (mysqli, sessions)
- **Database:** MySQL, with tables `activities`, `events`, `category`, `reviews`, `admin`

## Project Structure
```
index.php, About.php, events.php, Activities.php, item.php, contact.php, book.php   public pages
login.php, ad_login.php, admin.php, add_item.php, edit.php, delete.php, logout.php   admin side
submitR.php                                                                          saves a review
styles.css, script.js                                                                styling and tabs
uploads/                                                                             item images
database/alula.sql                                                                   schema and sample data
html/                                                                                static design drafts
```

## Run Locally
1. Install XAMPP and start **Apache** and **MySQL**.
2. Copy this folder into `htdocs`.
3. In phpMyAdmin, create a database named `alula` and import `database/alula.sql`.
4. Open `http://localhost/<folder-name>/index.php`.

The code connects with the default XAMPP account (`root`, empty password). Change it in each PHP file if your setup differs.

## Demo Admin Account
The sample database contains a demo admin (`admin` / `12345`) for local testing only. Change it before using this anywhere real.

## Known Limitations
This is a learning project, not production software.
- Admin passwords are stored and compared as plain text; they should be hashed (`password_hash`).
- The admin pages (`admin.php`, `add_item.php`, `edit.php`, `delete.php`) do not check the login session, so they should be protected.
- Photos in `uploads/` come from public AlUla tourism material and belong to their owners; they are here for demonstration only.

## Next Steps
- Hash passwords and protect every admin page with a session check
- Add a search bar and rating averages on the list pages

## Screenshots
![Home](screenshots/home.png)
![Events](screenshots/events.png)
![Admin dashboard](screenshots/admin.png)
