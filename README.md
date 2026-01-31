## Description:
I have created a CRM for companies, whose main function is to store information about the company's clients, as well as the activities they have scheduled with each of them, 
and that allows user login so that each employee can have control of their work information

## Proyect:
A Laravel project that represents a simple CRM for companies using the Model-View-Controller architectural pattern. 
Following the structure set by the pattern, we have on one hand the Model:
- Manage application data (structure, storage, and access).
- Implement business logic: rules, validations, and processes.
- Interact with the database (queries, inserts, updates, and deletes).
- Maintain data state.
- Notify the View of changes (in implementations that use observers).

On the other hand, the Views:
- Display information to the user (data from the Model).
- Present the graphical or visual interface (screens, pages, forms).
- Update what is displayed when the Model changes.
- Send user actions (clicks, form submissions) to the Controller.
  
And finally the Controller:
- Receive user actions (clicks, form submissions, paths, events).
- Interpret these actions and decide what to do.
- Coordinate the logic between the View and the Model.
- Invoke Model methods to query or modify data.
- Select the appropriate View and pass it the necessary data.

## Views:
In the case of the views, I've basically created one for each CRUD function: index, create, edit, and show. For users, I've created a profile and a dashboard, both of which are included within the session, and welcome, login, and register views, which are outside the auth routes.

## DB(Workbench):
The database only includes three tables: Users, Clients, and Activities, each with its respective foreign keys. Clients has a foreign key from Users, and Activities has one foreign key from Clients and another from Users.

## Authentication:
To discuss authentication, I will divide the text into 2 parts.

For the first version of the project, I used manual authentication, creating a UserController that managed the entire authentication process through various functions. This allowed users to register and log in without issue. This can be seen in the feature/auth branch, where the project still used this methodology.

Later, I decided to migrate the authentication system to an "improved" model using the Breeze starter kit. This allowed me to give it a new approach, with new features such as remembering user credentials upon login, and separating the routes into two different files: one for routes outside the authentication process and another for those inside. I should point out that I was interested in the Breeze model because of its logic, but I wanted to keep the views I had created, so I only used Breeze's authentication logic.

## Mailing:
To add messaging, I used the mailtrip.io platform to generate emails that arrive in a sandbox, and I applied a new view to generate posts once the user is logged in.

## Post view:
This section is the result of adding email marketing to the CRM. The idea was to allow users to send emails directly from the website without having to use Gmail or similar services. The user simply defines the post title and generates the content, then clicks send, and the email is sent to the selected recipient.
The customer selector ensures domain and UX consistency.
The email is currently being sent to Mailtrap, as it's a development environment,
but the system is ready for live, production sending.

## Technologies and Gadgets:
MVC architectural pattern | Tailwind | Laravel | PHP | Composer | Node.Js | Workbench | Visual Studio Code | GitHub| Git | Xampp | Breeze | Mailtrap.io

## Facility (How to install):
Download PHP, composer and Node.js Once you've got everything you'll be able to download Laravel: composer global require laravel/installer Create a new proyect with Laravel, on the terminal: laravel new example-app Create the repository and initilize it: git init

Create a develop branch and define it as default from the main branch: git checkout -b develop main Generate branches for each module starting from the develop branch: - git checkout -b feature/setup_generals develop (that one isn't necesary, but as we did i highlight it) - git checkout -b feature/users develop - git checkout -b feature/tasks develop - git checkout -b feature/categories develop Once every branch was finished switch the branch to the develop and: - git merge feature/setup_generals (that one isn't necesary, but as we did i highlight it) - git merge feature/users - git merge feature/tasks - git merge feature/categories When every thing is done just make a pull request from develop branch to main branch from GitHub.

## Proyect structure:
app/
  app/Http/Controllers/
  - ActivityController.php
  - ClientController.php
  app/Http/Requests/
  - StoreUpdateActivityRequest.php
  - StoreUpdateClientRequest.php
  app/Services/
  - ActivityService.php
  - ClientService.php
  app/Models/
  - User.php
  - Client.php
  - Activity.php
database/
  database/migrations/
  - create_users_table.php
  - create_clients_table.php
  - create_activities_table.php
  database/seeders/
  - DatabaseSeeder.php
  - UserSeeder.php
  - ClientSeeder.php
  - ActivitySeeder.php
resources/
  resources/views/
  resources/views/layouts/
  - app.blade.php
  resources/views/clients/
  - index.blade.php
  - create.blade.php
  - edit.blade.php
  - show.blade.php
  resources/views/activities/
  - index.blade.php
  - create.blade.php
  - edit.blade.php
  - show.blade.php
  resources/views/errors/
  - 404.blade.php
routes/
  - web.php
  - auth.php
config/
  - app.php
  - auth.php
  - database.php
  - filesystems.php
public/
  - index.php
  - css/
  - js/
storage/
  - app/
  - framework/
  - logs/
/
  - artisan
  - composer.json
  - composer.lock
  - package.json
  - phpunit.xml
  - README.md
  - .env
  - .env.example

- Controllers are kept thin and only handle HTTP flow.
- Business logic is encapsulated in the Services layer.
- Validation is handled via FormRequest classes.
- Error handling uses Laravel’s native mechanisms.
- Seeders provide realistic demo data for development.
- The structure follows Laravel best practices and is easy to maintain.

## Final comments:
I decided to leave the field open for activities and status because, although it's a very good idea, I considered the possibility of making it a comment and allowing users to specify details in both cases. This way, the range of possibilities for activities increases, and each user can write what they need. Example: Meal with... at the restaurant... Example 2, status: postponed due to customer need...

