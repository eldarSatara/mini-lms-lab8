# mini-lms-lab8
This repository will be used to make a mini version of a course management system for the purpose and duration of Lab 8 on International Burch University

# Mini LMS - Course Platform (Lab 8)

## 📌 Project Description
This project is a Mini Learning Management System (LMS) built as part of Lab 8. It simulates a simplified course platform where users can browse courses, view course structure, and enroll in courses.

The project was designed as a continuation of the analysis performed in Labs 5–7, where a real-world LMS system (such as Moodle/Canvas) was analyzed for architectural and design pattern weaknesses.

---

## 🎯 Origin Context
I analyzed an LMS system (Moodle/Canvas category) in Labs 5–7.  
This project is a simplified Course Catalogue and Enrollment system inspired by that domain.

---

## 🛠 Tech Stack
- PHP (backend)
- Vanilla JavaScript (frontend)
- HTML + Bootstrap 5
- JSON file storage (persistence layer)
- No frameworks or build tools

---

## 📚 Features
- View available courses
- View hierarchical structure (Course → Modules → Lessons)
- Enroll in courses
- View enrolled courses
- Backend API using PHP
- Simple persistence via JSON

---

## 🧠 Design Patterns Applied

### 1. Composite Pattern (Structural)
**Files:**
- backend/models/Course.php
- backend/models/Module.php
- backend/models/Lesson.php

**Description:**
Represents the hierarchical structure of the LMS (Course → Module → Lesson). This solves the flattening problem found in real LMS systems where hierarchy is not consistently modeled.

---

### 2. Factory Method (Creational)
**Files:**
- backend/factory/CourseFactory.php

**Description:**
Centralizes creation of Course objects from JSON data. This removes scattered object creation logic and improves maintainability.

---

### 3. Observer Pattern (Behavioral)
**Files:**
- backend/observer/EventManager.php
- backend/observer/EnrollmentLogger.php
- backend/observer/ProgressTracker.php

**Description:**
Handles enrollment events by notifying multiple independent systems (logging, progress tracking) without coupling them to business logic.

---

### 4. Facade Pattern (Structural/Behavioral)
**Files:**
- backend/facade/EnrollmentFacade.php

**Description:**
Simplifies the enrollment process by hiding internal complexity (event system, observers, state updates) behind a single interface.

---

## 🔄 Version Control
- Multiple feature branches used:
  - feature/composite
  - feature/factory
  - feature/observer-facade
- More than 5 commits total
- At least one merge into main branch
- Pull Request used for feature integration

---

## 🚀 How to Run
1. Start PHP server:
php -S localhost:8000

2. Open:
http://localhost:8000/frontend/index.html


---

## 📌 Key Learning Outcome
This project demonstrates how real LMS systems can be improved using design patterns to avoid:
- Flat hierarchical structures
- Hardcoded business logic
- Tight coupling between components

Instead, the system uses:
- Composable architecture
- Encapsulated object creation
- Decoupled event handling
- Clean service abstraction