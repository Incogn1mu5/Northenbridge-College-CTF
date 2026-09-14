# Northenbridge College CTF Lab

A fictional college web portal built as a beginner-friendly Capture The Flag (CTF) lab.

The project combines a simple student portal with an intentionally vulnerable administrative portal. Players are expected to explore the application, follow clues, discover hidden functionality, and eventually modify their own academic record to complete the challenge.

> [!CAUTION]
> **Educational use only:** This application intentionally contains vulnerabilities and fictional data. Do not deploy it on an untrusted or public network.

---

## Features

### Student Portal

* College homepage
* Student registration
* Automatic student credential generation
* Credential download
* Student login/logout
* Profile viewing and editing
* Personal marks and result status
* Reassessment functionality containing a CTF clue

### Admin Portal

* Separate administrator login
* Student record dashboard
* Student marks management
* Limited student-record visibility
* Intentionally vulnerable search functionality
* Hidden CTF flags throughout the challenge

---

## CTF Challenge

The challenge is designed around a simple progression:

```text
Student Portal
      │
      ▼
Registration & Login
      │
      ▼
Failed Result
      │
      ▼
Reassessment Clue
      │
      ▼
Hidden Admin Portal
      │
      ▼
Credential Discovery
      │
      ▼
Admin Dashboard
      │
      ▼
Limited Student Records
      │
      ▼
SQL Injection
      │
      ▼
Discover Player Record
      │
      ▼
Modify Marks
      │
      ▼
PASS + Final Flag
```

The challenge contains **four flags**, with each stage leading toward the next part of the application.

For the detailed challenge flow, see [CTF-Flow.md](https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Docs/CTF-Flow.md).

---

## Technology Stack

* **Vagrant** — VM provisioning
* **VirtualBox** — virtualization
* **Ubuntu 24.04** — guest operating system
* **Apache2** — web server
* **PHP** — application
* **SQLite** — database
* **Bash** — provisioning

The project uses shared folders so that the web application can be edited directly from the host machine.

---

## Project Structure

```text
northenbridge-ctf/
├── README.md
├── Vagrantfile
├── provision.sh
├── seed.sql
├── www/
│   ├── index.php
│   ├── login.php
│   ├── register.php
│   ├── profile.php
│   ├── marks.php
│   ├── logout.php
│   ├── db.php
│   └── admin/
│       ├── index.php
│       ├── dashboard.php
│       ├── edit-marks.php
│       ├── logout.php
│       └── robots.txt
├── docs/
│   ├── Architecture.md
│   ├── CTF-Flow.md
│   ├── Deployment.md
│   └── Vulnerabilities_&_Testing.md
└── Screenshots/
    ├── homepage.png
    ├── student-portal.png
    ├── marks-page.png
    └── admin-dashboard.png
```

---

## Screenshots

### College Homepage
<img width="2235" height="865" alt="PwnAD_Banner" src="https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Screenshots/Northenbridge-Home_page.png" />  

### Student Portal
<img width="2235" height="865" alt="PwnAD_Banner" src="https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Screenshots/Northenvridge-Student-Login_page.png" />  

### Student Marks
<img width="2235" height="865" alt="PwnAD_Banner" src="https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Screenshots/Northenvridge-Student-Exam-Result_page.png" />

### Admin Dashboard
<img width="2235" height="865" alt="PwnAD_Banner" src="https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Screenshots/Northenvridge-Admin-Dashborad_page.png" />


---

## Deployment

The lab runs inside a Vagrant-managed Ubuntu VM.

### Requirements

Install the following on the host machine:

* VirtualBox
* Vagrant
* Git

### Start the Lab

Clone the repository and start the VM:

```bash
git clone <repository-url>
cd northenbridge-ctf
vagrant up
```

The provisioning script installs Apache, PHP, SQLite and the required PHP SQLite extension, configures the virtual host, and initializes the database from `seed.sql`.

### Find the VM IP

The VM uses **bridged networking**, allowing other devices on the same local network to access the CTF.

Run:

```bash
vagrant ssh
hostname -I
```

Use the VM's LAN address from another device:

```text
http://<VM-IP>/
```

For example:

```text
http://192.168.1.50/
```

The exact IP will depend on the local network.

### Multi-Player Access

The intended setup is:

```text
                 Local Network
                       │
        ┌──────────────┼──────────────┐
        │              │              │
     Player 1       Player 2       Player 3
        │              │              │
        └──────────────┼──────────────┘
                       │
                Host Computer
                       │
                VirtualBox VM
                       │
                Apache + PHP
                       │
                  SQLite DB
```

Only the host computer needs to run the VM. Players connect to the VM's bridged IP from devices connected to the same network.
More deployment details are available in [Deployment.md](https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Docs/Deployment.md).

---

## Resetting the Lab

To completely recreate the VM:

```bash
vagrant destroy -f
vagrant up
```

The provisioning process recreates the application environment and seeds the SQLite database.

**Do not reprovision or reset the VM while a CTF session is in progress**, because this can reset challenge data.

---

## Intentional Vulnerabilities

The vulnerabilities are deliberately included as part of the CTF and are restricted to the fictional application.

The main challenge elements include:

* Hidden administrative route
* Information disclosure through `robots.txt`
* Limited student-record visibility
* SQL injection in the administrative search
* Marks manipulation through the admin interface

The marks update itself uses a prepared SQL statement; the intentional SQL injection is in the student-record search functionality.

Detailed testing information is available in [Vulnerabilities_&_Testing.md](https://github.com/Incogn1mu5/Northenbridge-College-CTF/blob/9ce116be7239ff602a58199404a981ab9af41beb/Docs/Vulnerabilities_%26_Testing.md).

---

## License

See [`LICENSE`](LICENSE).
