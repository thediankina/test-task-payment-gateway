## Тестовое задание Laravel

Задача: подключить 2 платёжных шлюза (приём платежей).

Требования:
- В базе присутствуют таблицы пользователей и платежей.
- Оба шлюза присылают данные на `callback_url` при изменении состояния платежа.
- Оба шлюза работают только с одной валютой и передают суммы в центах.
- Оба шлюза выполняют только обработку изменения состояний.
- Оба шлюза имеют возможность установки лимита на количество проведенных платежей за день.
