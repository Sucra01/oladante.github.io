# Access Hospital – Hospital Management System

PHP 8+ / MySQL-MariaDB / XAMPP. No framework required.

## Fast XAMPP installation
1. Copy the `access-hospital` folder to `C:\xampp\htdocs\`.
2. Start Apache and MySQL in XAMPP.
3. Open `http://localhost/access-hospital/setup.php`.
4. Click **Install / Reinstall Database**.
5. Open `http://localhost/access-hospital/` for the public website.
6. Open `http://localhost/access-hospital/admin/login.php` for the hospital administration portal.
7. First login: `admin@accesshospital.com` / `ChangeMe!2026`.
8. Immediately change the password under **Settings**.

You can also import `database.sql` manually through phpMyAdmin.

## Management modules
- Patient registration and patient master index
- OPD, emergency and follow-up visits
- Appointment requests and status management
- Inpatient admissions, wards and beds
- Doctors, nurses, midwives and support staff directory
- Laboratory requests and result entry
- Pharmacy medicine catalogue and stock levels
- Prescriptions and dispensing with stock deduction
- Invoices, payments and outstanding balances
- Hospital operational reports
- Website contact messages
- Services and departments management
- Admin security settings and audit log table

## Important production requirements
Before using real patient information, configure a proper database account, HTTPS, backups, server access controls, least-privilege staff roles, secure session settings, logging/monitoring, and your hospital's privacy, records-retention and clinical-governance policies. The current package is a functional foundation, not a certified clinical information system.
