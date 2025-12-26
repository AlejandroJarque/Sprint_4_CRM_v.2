## Description:
I have created a CRM for companies, whose main function is to store information about the company's clients, as well as the activities they have scheduled with each of them, 
and that allows user login so that each employee can have control of their work information

## Proyect:
A Laravel project that represents a simple CRM for companies using the Model-View-Controller architectural pattern. 
Following the structure set by the pattern, we have on one hand the Model:

On the other hand, the Views:

And finally the Controller:

## Views:
## DB(Workbench):
## Technologies and Gadgets:
MVC architectural pattern Tailwind Laravel PHP Composer Node.Js Workbench Visual Studio Code GitHub Xampp

## Facility:
Download PHP, composer and Node.js Once you've got everything you'll be able to download Laravel: composer global require laravel/installer Create a new proyect with Laravel, on the terminal: laravel new example-app Create the repository and initilize it: git init

Create a develop branch and define it as default from the main branch: git checkout -b develop main Generate branches for each module starting from the develop branch: - git checkout -b feature/setup_generals develop (that one isn't necesary, but as we did i highlight it) - git checkout -b feature/users develop - git checkout -b feature/tasks develop - git checkout -b feature/categories develop Once every branch was finished switch the branch to the develop and: - git merge feature/setup_generals (that one isn't necesary, but as we did i highlight it) - git merge feature/users - git merge feature/tasks - git merge feature/categories When every thing is done just make a pull request from develop branch to main branch from GitHub.

## Proyect structure:
