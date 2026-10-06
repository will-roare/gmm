# Green Money Matters

A podcast website for Green Money Matters, a real podcast about sustainable
investing, hosted by Christopher Everitt.

**Author:** Christopher Everitt, CODE University, Software Engineering, autumn 2026

## What it does

Lists the podcast's episodes, shows a single episode with its host and category,
and lets a logged in user add, edit and delete episodes.

## Data model

- A **User** has many Episodes.
- An **Episode** belongs to one User (the host) and to one Category.
- A **Category** has many Episodes.

Both relationships are one-to-many.

## Routes

| Method | URL                 | Controller method | Name             |
|--------|---------------------|-------------------|------------------|
| GET    | /episodes           | index             | episodes.index   |
| GET    | /episodes/create    | create            | episodes.create  |
| POST   | /episodes           | store             | episodes.store   |
| GET    | /episodes/{id}      | show              | episodes.show    |
| GET    | /episodes/{id}/edit | edit              | episodes.edit    |
| PUT    | /episodes/{id}      | update            | episodes.update  |
| DELETE | /episodes/{id}      | destroy           | episodes.destroy |

## Running it locally

Standard Laravel setup, then:

    php artisan migrate:fresh --seed

## Admin login

Email: admin@gmm.test
Password: password