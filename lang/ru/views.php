<?php

return [
    'title' => 'Каталог книг',
    'book' => [
        'fields' => [
            'id' => 'ID',
            'name' => 'Название книги',
            'yearOfPublication' => 'Год издания',
            'description' => 'Описание',
            'cover' => 'Обложка',
            'author_id' => 'ФИО автора',
            'chapter_id' => 'Раздел',
            'created_at' => 'Дата создания',
            'filter[name]' => 'Название книги',
            'filter[author_id]' => 'Автор',
        ],
        'pages' => [
            'create' => [
                'submit' => 'Создать',
                'title' => 'Добавить книгу',
            ],
            'edit' => [
                'submit' => 'Обновить',
                'title' => 'Изменить книгу',
            ],
            'index' => [
                'title' => 'Каталог книг',
                'new' => 'Добавить книгу',
            ],
            'show' => [
                'title' => 'Книга: ',
            ],
            'filter' => [
                'submit' => 'Найти'
            ]
        ],
        'flash' => [
            'store' => 'Книга успешно добавлена',
            'update' => 'Книга успешно изменена',
            'destroy' => [
                'success' => 'Книга успешно удалена',
                'fail' => [
                    'no-rigths' => 'Нет прав на удаление',
                ],
            ],
        ],
    ],
    'chapter' => [
        'fields' => [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание раздела',
            'created_at' => 'Дата создания',
        ],
        'pages' => [
            'create' => [
                'submit' => 'Создать',
                'title' => 'Создать раздел',
            ],
            'edit' => [
                'submit' => 'Обновить',
                'title' => 'Изменить раздел',
            ],
            'index' => [
                'title' => 'Разделы',
                'new' => 'Создать раздел',
            ],
        ],
        'flash' => [
            'store' => 'Раздел успешно создан',
            'update' => 'Раздел успешно изменён',
            'destroy' => [
                'success' => 'Раздел успешно удалён',
                'fail' => [
                    'no-rigths' => 'Нет прав на удаление',
                    'constraint' => 'Не удалось удалить раздел',
                ],
            ],
        ],
    ],
    'author' => [
        'fields' => [
            'id' => 'ID',
            'fullName' => 'ФИО',
            'comment' => 'Комментарий',
            'countryOfBirth' => 'Страна рождения',
            'created_at' => 'Дата создания',
        ],
        'pages' => [
            'create' => [
                'submit' => 'Создать',
                'title' => 'Добавить автора',
            ],
            'edit' => [
                'submit' => 'Обновить',
                'title' => 'Отредактировать автора',
            ],
            'index' => [
                'title' => 'Авторы',
                'new' => 'Добавить автора',
            ],
        ],
        'flash' => [
            'store' => 'Автор успешно добавлен',
            'update' => 'Автор успешно отредактирован',
        ],
    ],

    'delete' => 'Удалить',
    'actions' => [
        'column_name' => 'Действия',
        'edit' => 'Изменить',
        'delete' => 'Удалить',
        'confirmation' => 'Вы уверены?',
    ],
    'Push me' => 'Нажми меня'

];
