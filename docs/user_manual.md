# User Manual for Student Management System

## Table of Contents
1. [Introduction](#introduction)
2. [Getting Started](#getting-started)
   - [System Requirements](#system-requirements)
   - [Installation](#installation)
3. [User Roles](#user-roles)
4. [Features](#features)
   - [Student Management](#student-management)
   - [Course Management](#course-management)
   - [Grade Management](#grade-management)
5. [Using the Application](#using-the-application)
   - [Adding Students](#adding-students)
   - [Editing Students](#editing-students)
   - [Viewing Student Details](#viewing-student-details)
   - [Managing Courses](#managing-courses)
   - [Editing Courses](#editing-courses)
   - [Adding Grades](#adding-grades)
   - [Editing Grades](#editing-grades)
6. [Troubleshooting](#troubleshooting)
7. [Contact Information](#contact-information)

---

## Introduction
The Student Management System is designed to manage student data, courses, and grades efficiently. This application allows users to add, edit, and view student information, manage courses, and track student grades.

## Getting Started

### System Requirements
- PHP version 8.0 or higher
- Laravel framework
- MySQL database
- Web server

### Installation
1. Clone the repository:
   ```bash
   git clone <repository-url>

2. cd student-management-system

3. composer install

4. Create a .env file and configure your database settings.

5. php artisan migrate

6. php artisan serve

### User Roles
- Admin: Can manage students, courses, and grades.
- Instructor: Can manage grades for their courses.
- Student: Can view their details and grades.

## Features

The Student Management System offers the following key features:

### 1. Student Management
- **Add Student:** Administrators can add new students to the system by entering their name, email, and date of birth.
- **Edit Student:** Administrators can update existing student information.
- **View Students:** Administrators and instructors can view a list of all students and their details.

### 2. Course Management
- **Add Course:** Administrators can create new courses and assign them to students.
- **Edit Course:** Administrators can update course information, including the instructor and student assignments.
- **View Courses:** Administrators and instructors can view all courses and their details, including enrolled students.

### 3. Grade Management
- **Add Grade:** Instructors can enter partial and final grades for students enrolled in their courses.
- **Edit Grade:** Instructors can update existing grades.
- **View Grades:** Instructors and students can view grades associated with specific courses.

## Using the Application

This section provides a step-by-step guide on how to use the Student Management System effectively.

#### 1. Adding a New Student
- Navigate to the **Students** section from the dashboard.
- Click on the **Add New Student** button.
- Fill in the required fields: Name, Email, and Date of Birth.
- Click on the **Add Student** button to save the new student.

#### 2. Editing a Student
- Go to the **Students List** page.
- Click on the **Edit** link next to the student you wish to modify.
- Update the necessary information and click **Update Student** to save changes.

#### 3. Viewing Student Details
- Click on the name of the student from the **Students List** to view their detailed information and grades.

### 4. Managing Courses
- Navigate to the **Courses** section from the dashboard.
- Click on the **Add New Course** button.
- Fill in the course details, including the student and instructor assignments.
- Click on the **Add Course** button to save.

#### 5.Editing a Course
- Go to the **Courses List** page.
- Click on the **Edit** link next to the course you wish to modify.
- Update the course information and click **Update Course** to save changes.


#### 6.Adding a Grade
- Navigate to the **Grades** section.
- Click on the **Add Grade** button.
- Select the course and student, and enter the partial and final grades.
- Click on the **Add Grade** button to save the grade.

#### 7.Editing a Grade
- Go to the **Grades List** page.
- Click on the **Edit** link next to the grade you want to modify.
- Update the grade information and click **Update Grade** to save changes.

## Troubleshooting

This section provides solutions to common issues users may encounter while using the Student Management System.

### 1. Page Not Found (404 Error)
- **Problem:** Users may encounter a "404 Page Not Found" error when trying to access a specific page.
  - **Solution:** Check the URL for typos or incorrect formatting. If the issue persists, try refreshing the page or navigating back to the dashboard.

### 2. Unable to Add or Update Students/Courses/Grades
- **Problem:** Users may be unable to save new entries or updates.
  - **Solution:** Ensure all required fields are filled out correctly. Fields may not accept invalid input (e.g., letters in a numerical field). Review any error messages displayed on the form.

### 3. Data Not Displaying Correctly
- **Problem:** Some student or course data may not display as expected.
  - **Solution:** Check if the data is correctly entered in the database. If data appears missing, ensure the associated student or course exists in the system.

### 4. Application Crashes or Freezes
- **Problem:** Users may experience the application crashing or becoming unresponsive.
  - **Solution:** Try refreshing the browser page. If the problem continues, clear your browser cache and cookies. If issues persist, consider restarting your browser or checking for updates.

### 5. Contact Support
- If you encounter issues not covered in this manual, please reach out to the system administrator or technical support team for further assistance. Provide detailed information about the problem, including steps to reproduce the issue and any error messages received.

## Contact Information

For further assistance, feedback, or inquiries regarding the Student Management System, please reach out using the following contact information:

- **System Administrator:**  
  Name: [Ahmad Ramadan]  
  Email: [Ahmad_Ramadan2020@hotmail.com]  
  Phone: [+961 71533628]  
 

Feel free to contact us for any questions, suggestions, or issues you may encounter while using the application. We are here to help!

