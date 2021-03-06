##CS outreach site
	Authors:  Ethan Fetsko, Jason Nelson, Bin Peng	

- First Iteration submitted: December 16th, 2015
- Last Iteration submitted: April 23, 2016

####Description:
- The K12 Outreach website goal is to provide a platform for teachers who are interested in expanding computer science and technical related curriculum at their schools.

####Update
- **Add request to attend event function and click on a date on the calendar will redirect to a new page that have to form to request to attend event**
- **Add a segment of php code to get the news from hackernews(a famous programmer news website)**

####Software Requirements:
- All plugin packages are included in the source code directory for this project.

- Apache 2.2.15 A single shared set of binaries with each user running their own instance, using their own configuration. User's also have access to their own log files and debuging information. Users may stop, start, and query their server instance using Apache's standard control script: apacectl

- PHP 5.3.3: PHP enabled for FTP, IMAP, MySQL, gettext, and gd. PHP 5.3.3 is in testing with a goal of allowing each user to utilize modules of their choice through PHP's pear component framework and distribution system.

- MySQL: MySQL version 5.0.45 configured to allow each user with their own database. This installation is limited primarily in that access is only allowed from the local host.

- SSH: Secure Shell access is provided using OpenSSH's 4.3 release, allowing only ssh V2 protocol.

####Login Instructions:
- If you already have an account, simply click the "Log In" link on the navigation bar and login using your email and password.  If you do not have an account, 
navigate to the sign up page via the link at the top of the page and create a new account. The new account will require you to verify your email in order to
complete your registration.  After verifying your email, your account is ready to use (keep in mind, newly created accounts are teacher accounts and of access level 3).


- Testing Accounts:
	- Admin Level 1 (SuperAdmin):
		- username: superAdmin@admin.com
		- pw:  superadmin1
		- Access Description: super admins can access the admin page; unlike regular admins, they can promote and demote users to/from admin level2 -- also has access to all features of lower access level accounts


	- Admin Level 2 (regular admin):
		- username: admin@admin.com
		- pw: regularadmin1
		- Access Description: regular admins cannot promote/demote admin users, but they can also view the admin page and the reporting that is available there  -- also has access to all features of lower access level accounts

 

	- Regular User (Teacher) account:
		- username: teacher@teacher.com
		- pw: regularteacher1
		- Access Description:  standard users (teachers) cannot view the admin page; even if the user manual directs to the admin pages -- they will be redirected; teachers can add events and take surveys --- whereas users not logged cannot.

 

	- Non Logged-In Visitor:
		- Access Description: can view home page, event calendar, login/signup 


####Installation Instructions:
- Website directory:
	- The source code is self-contained. Use your preferred FTP program to transfer the entire source code directory to your server.

- Database:
	- The database is formatted in a myPhpAdmin database. The database creation script is included in the source code package and can be imported into myPhpAdmin. The file is called: "nelson8_db.sql".

	- **a new file called nelson8_db_2.sql is added for an additional database that store the request of the event and the store procedure that insert the record**
