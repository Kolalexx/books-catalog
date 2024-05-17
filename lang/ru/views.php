<?php

return [
    'title' => 'Каталог книг',
    'book' => [
        'fields' => [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'status_id' => 'Статус',
            'created_by_id' => 'Автор',
            'assigned_to_id' => 'Исполнитель',
            'created_at' => 'Дата создания',
            'labels' => 'Метки',
            'filter[status_id]' => 'Статус',
            'filter[created_by_id]' => 'Автор',
            'filter[assigned_to_id]' => 'Исполнитель',
        ],
        'pages' => [
            'create' => [
                'submit' => 'Создать',
                'title' => 'Создать задачу',
            ],
            'edit' => [
                'submit' => 'Обновить',
                'title' => 'Изменить задачу',
            ],
            'index' => [
                'title' => 'Задачи',
                'new' => 'Создать задачу',
            ],
            'show' => [
                'title' => 'Задача: ',
            ],
            'filter' => [
                'submit' => 'Применить'
            ]
        ],
        'flash' => [
            'store' => 'Задача успешно создана',
            'update' => 'Задача успешно изменена',
            'destroy' => [
                'success' => 'Задача успешно удалена',
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
    'greeting' => 'Привет от Хекслета!',
    'actions' => [
        'column_name' => 'Действия',
        'edit' => 'Изменить',
        'delete' => 'Удалить',
        'confirmation' => 'Вы уверены?',
    ],
    'This is a simple task manager on Laravel' => 'Это простой менеджер задач на Laravel',
    'Push me' => 'Нажми меня'

];
