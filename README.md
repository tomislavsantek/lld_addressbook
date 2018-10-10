Addressbook
===========

A simple Addressbook with Web CRUD operations.

## Installation instructions
### First time installation

You can install Addressbook by following these steps:

#### 0. Install dependencies

**PHP (>=5.4)** 

**MySQL (5.x)**

**Apache (2.2)**

**Composer** - https://getcomposer.org/

**Git**


#### 1. Clone the source code repository

```
git clone git@YOUR_GIT_USERNAMEhttps://github.com/tomislavsantek/lld_addressbook.git DESTINATION_FOLDER
```
After successful repository download, enter the destination folder and checkout to the master branch

```
git checkout master
```

#### 2. Composer install

```
composer install
```
After successfull dependency installation, you will be prompted by Symfony to fill out database connection credentials

#### 3. Database initialization

In order to use Addressbook, create the database and schema by using commands:
```
bin/console doctrine:database:create
bin/console doctrine:schema:create
```


### Running in DEV environment

To run the application in development environment, start the server:
```
bin/console server:start
```
The application will be available on http://localhost:8000

## Final thoughts and TODOs

Application currently supports simple CRUD operations, but that's about it.
What should be done to make the app better:
** Implement proper styling
** Implement search and pagination
** Implement mass actions (mass update, delete, etc)
** Implement security
