# Sam Morrison - Developer Task 

## General

### Seeding
 I've created an artisan command which will seed the dB from csv files. 
 Although the task only required the seeding of property details, in order to facilitate testing of
 the 'Top Agents' endpoint, I've also added seeders for the agents and agent_property tables which will seed the dB with the properties, agents and links from the task description. 
 
 The command `php artisan snappy:seed` takes four options, 'all', 'properties', 'agents' and 'links' to allow complete
 flexibility in what tables you seed.
 
 The seeders assume that the data will be in csv files in the `storage/seeds` directory and there are examples included
 . In order to change the seed data, 
 please just add/change the contents of these files
 
 ### Pagination
 The api call to retrieve the list of properties accepts two parameters for pagination :- `pageNo` and `perPage` - if either
 parameter is omitted, its default value will be used - 1 for pageNo and 100 for perPage.
 
 ### Agents Links
 
 The form to link an agent to a property has a dropdown which is populated with only those agents who are not
 already linked to that property
 
## Installation

1. Clone the repository from Github
2. Run `composer install` to install the project's dependencies
3. Run `php artisan key:generate` to generate a new application key
4. Run `php artisan migrate:fresh` to create dB tables
5. Run `php artisan snappy:seed all` to seed the dB with the test data

## Improvements

There are a number of improvements which time limitations precluded in the praparation of this project.

Most notably, I'd decouple the front-end and create a Vue-based SPA and leave the back-end as an api 
from which the data can be retrieved and updated. Also, the front-end I've supplied is curory and is focused
on the functionality of the two forms as the role has been described as back-end only and I didn't consider
time spent prettifying the front-end and considering UX was appropriate. 

I'd also have liked to make the location and naming of the seeding csv files configurable and would have
made the Csv helper class a base-class which the seeders could extend to save having to instantiate
the helper in each seeder.

While I've endeavoured to leave the controllers as skinny as possible, there is always room for further refactoring - especially
in the case of the helper method to return 'Top' agents which is longer than I'd like it to be

## ----------
Many thanks for taking the time to look over this code and I look forward to your comments and feedback
