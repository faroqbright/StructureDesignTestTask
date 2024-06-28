**1: Planning a Multi-Tenant Application**
**Data isolation**
act of segregating tenant data so that one tenant’s data cannot be accessed|modified by another tenant

steps:
middleware:
get auth user tenant id
store in [request attribute,app instance]

modals:
define global scopes for data segregating
