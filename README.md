
# 📝 **Introduction**

This application follows **Domain-Driven Design (DDD)** principles to ensure that the codebase is organized around the business domain. By structuring the system into clear layers (Domain, Application, Infrastructure, Interfaces), each part of the application can focus on its core responsibility.

- **Entities** represent the core business objects.
- **Use Cases** define the business operations.
- **Repositories** handle data persistence.
- **DTOs** are used for communication between layers.

---

## ⚙️ **Dependencies**

- **Laravel Version**: 10.x
- **Packages**:  
  - `spatie/laravel-permission` for role-based access.
  - `laravel/sanctum` for API authentication.
- **Database**: MySQL 8.x _(or another DBMS)_.

---

# 🚀 **Data Flow When Submitting Form (Making a Request)**

🧾 **Form Input** _(HTML/Frontend)_  
⬇️  
📥 **HTTP Request** _(Laravel Request)_  
⬇️  
🎮 **Controller**  
⬇️  
📦 **UserDTO** _(Data Transfer Object)_  
⬇️  
🧠 **Use Case** _(e.g. `CreateUserUseCase`)_  
⬇️  
📂 **Repository** _(e.g. `EloquentUserRepository`)_  
⬇️  
💾 **Database** _(via Eloquent Model)_  

---

# ✅ **Data Flow When Retrieving a Response (Reading Data)**

💾 **Database** _(via Eloquent Model)_  
⬇️  
📂 **Repository** _(e.g. `EloquentUserRepository`)_  
⬇️  
🧠 **Use Case** _(e.g. `GetUserUseCase`)_  
⬇️  
🏗️ **Entity** _(e.g. `UserEntity`)_  
⬇️  
🎮 **Controller**  
⬇️  
📤 **HTTP Response** _(JSON or View)_  
⬇️  
🧾 **Frontend** _(Displays to user)_  

---

# 🔄 **Update Data Flow**

🧾 **Form Input** _(with updated values)_  
⬇️  
📥 **HTTP Request** _(PATCH/PUT)_  
⬇️  
🎮 **Controller**  
⬇️  
📦 **UserDTO** _(carries updated data)_  
⬇️  
🧠 **UpdateUserUseCase**  
⬇️  
📂 **UserRepository** _(finds and updates model)_  
⬇️  
💾 **Eloquent Model** _(saves to DB)_  
⬇️  
🏗️ **Creates UserEntity** _(for clean response)_  
⬇️  
🎮 **Controller returns Entity in JSON response**  
⬇️  
📤 **HTTP Response → Frontend UI updates**  

---

# 📁 **DDD Folder Structure**

This document provides an overview of the folder structure used in Domain-Driven Design (DDD) for a Laravel application. The structure is organized into layers: **Domain**, **Application**, **Infrastructure**, and **Interfaces**.

## 🌍 **Domain Layer**  
The **Domain Layer** contains the core business logic of the application. It consists of **Entities**, **ValueObjects**, and **Services** that define the rules of the system.

```text
app/
├── Domains/                              # Domain Layer: Core business logic
│   └── User/
│       ├── Entities/                    # User Entity
│       │   └── UserEntity.php
│       ├── ValueObjects/                # Optional, for handling value objects (e.g., Email, Address)
│       └── Services/                    # Business logic services, if needed
```
## 🛠️ **Application Layer**  
The **Application Layer** contains the **Use Cases** and **DTOs** that define the application's business operations and data transfers.

```text
app/
├── Application/                          # Application Layer: Use cases and DTOs
│   └── User/
│       ├── DTOs/                        # Data Transfer Objects
│       │   └── UserDTO.php
│       ├── UseCases/                    # Use Case logic, orchestrates operations
│       │   └── CreateUserUseCase.php
│       └── Services/                    # Application services, optional
```
## 🏗️ **Infrastructure Layer**  
The **Infrastructure Layer** handles data persistence and external services.

```text
app/
├── Infrastructure/                       # Infrastructure Layer: Persistence and external services
│   └── Persistence/
│       └── User/
│           ├── Repositories/            # Repositories handling the data storage
│           │   ├── UserRepositoryInterface.php   # Interface for repo
│           │   └── EloquentUserRepository.php    # Actual implementation of the repository
```
## 🌐 **Interfaces Layer**  
The **Interfaces Layer** includes the Controllers and Routes that manage communication between the application and the user.

```text
app/
├── Interfaces/                           # Interfaces Layer: Controllers and routes
│   └── Web/
│       └── Controllers/
│           └── User/
│               └── UserController.php  # UserController for handling requests
```

## 🔧 **Providers**  
Service Providers bind interfaces to implementations, ensuring proper dependency injection.

```text
app/
└── Providers/                            # Service providers for binding interfaces
    └── RepositoryServiceProvider.php    # Binding interfaces to EloquentUserRepository
```
