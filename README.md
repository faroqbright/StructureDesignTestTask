**Changes made to old structure:**

1- migrations
created new tables [companyies,roles,tenants]
added foreign keys of [companyies,roles,tenants] tables in users table, and added a new field [other_attributes]
added user_id foreign key in [chapters,productions,learning_path_modals,async_sessions] tables

2- model relationships

User Model
**Added new relationships**
learningPathModals //
productions
chapters
company
role
tenant

**Added scopes to filter user by company and tenant**
scopeByCompany
scopeByTenant

LearningPathModal
**Added new relationships**
tenantUsers

Production
**Added new relationships**
user

Chapter
**Added new relationships**
user

New Models [Tenant,Role,Company]
**Added relationship**
users

**Instructions for running and testing the application with the new architecture.**
configure database credentials in .env
git checkout new_structure
php artisan migrate --seed
