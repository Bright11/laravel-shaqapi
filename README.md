## Api using laravel
- To use this API, you must have postman or use it on your browser
- we have registration and login.
- Start the project by using php artisan serve
- to add a product or item, you must be authenticated, after authentication,
- you need to create or add item into database,
- you can also edit or delete an item,
- remember, you can only do it if you are authenticated
## How to buy
- To create an invoice, you need to click on the item you wants to buy,
- each item is have issued or expiring date
- links structured
- Register link post request http://127.0.0.1:8000/api/register
- Login post request http://127.0.0.1:8000/api/login
- Add item into database post request http://127.0.0.1:8000/api/item
- View details item get request http://127.0.0.1:8000/api/item/add item number
- update item post request http://127.0.0.1:8000/api/update/7
- delete item delete request http://127.0.0.1:8000/api/destroy/51
- buy or add to cart get request http://127.0.0.1:8000/api/customeritem/7
- The links above makes it easey to understand 
- you can also make use of laravel seeder or factory to add data into database

## Frontend
- You can also login in the frontend, when you login, the items that is yours will be viewed on the invoice page
- Understand that the UI is not well design.
- Thank you.
