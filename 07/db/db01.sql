/* ------------------------------------------------ */

/* SQL - Structured Query Language */

/* ------------------------------------------------ */

/*
Виды операций:

DDL - (Data Definition Language – язык описания данных) - операции со структурой таблиц
DML - (Data Modification Language – язык модификации данных) - операции с табличными строками
*/

/* ------------------------------------------------ */

/* DDL - примеры операций */

/* ------------------------------------------------ */

/* создаем таблицу департаментов (depts) */
CREATE TABLE depts (
  id_dept INT NOT NULL,
  name VARCHAR(32) NOT NULL,
  PRIMARY KEY (id_dept)
);

/* создаем таблицу наемных рабочих (emps) */
CREATE TABLE emps (
  id_emp INT NOT NULL,
  id_dept INT NOT NULL,
  first_name VARCHAR(32) NOT NULL,
  middle_name VARCHAR(32),
  last_name VARCHAR(32) NOT NULL,
  PRIMARY KEY (id_emp),
  FOREIGN KEY (id_dept) REFERENCES depts (id_dept)
);

/* ------------------------------------------------ */

/* DML - примеры CRUD-операций */

/* ------------------------------------------------ */

/* Вставка строк - Операция CREATE - Команда INSERT INTO */

INSERT INTO depts (id_dept, name) VALUES ('1', 'Бухгалтерия');
INSERT INTO depts (id_dept, name) VALUES ('2', 'Маркетинг');

INSERT INTO emps (id_emp, id_dept, last_name, first_name, middle_name)
  VALUES ('1', '1', 'Иванов', 'Иван', 'Иванович');

INSERT INTO emps (id_emp, id_dept, last_name, first_name, middle_name)
  VALUES ('2', '1', 'Петров', 'Петр', 'Петрович');

INSERT INTO emps (id_emp, id_dept, last_name, first_name, middle_name)
  VALUES ('3', '2', 'Ушаков', 'Павел', 'Павлович');

INSERT INTO emps (id_emp, id_dept, last_name, first_name, middle_name)
  VALUES ('4', '2', 'Ефремов', 'Илья', 'Викторович');

INSERT INTO emps (id_emp, id_dept, last_name, first_name, middle_name)
  VALUES ('5', '1', 'Сидорова', 'Елена', 'Николаевна');

/* ------------------------------------------------ */

/* Выборка строк - Операция READ - Команда SELECT */

/*
Звездочка (*) - это вернуть все поля.
Будут возвращены строки, которые подпадают под выборку (на основе фильтра) со всеми имеющимися в них полями.
*/

/* Все сотрудники */
SELECT * FROM emps;

/* Все cотрудники отдела бухгалтерии */
SELECT *
  FROM emps
  WHERE id_dept = '1';

/* Все cотрудники отдела бухгалтерии, отсортированные по фамилии, имени, отчеству */
SELECT *
  FROM emps
  WHERE id_dept = '1'
  ORDER BY last_name, first_name, middle_name;

/*
Сортировка обеспечивается командой ORDER BY (по умолчанию всегда сортируется по возрастанию)

В данном случае, применяется сортировка по алфавиту,
если last_name совпадут - дополнительно сортируется по first_name,
если и first_name совпадут - дополнительно сортируется еще и по middle_name.
*/

/* Как зовут сотрудника №1? - возвращаем лишь некоторые из полей */
SELECT last_name, first_name, middle_name
  FROM emps
  WHERE id_emp = '1';

/* Сколько всего в фирме работает человек? - использование встроенных SQL-функций */
SELECT count(*) FROM emps;

/* ------------------------------------------------ */

/* Изменение строк - Операция UPDADE - Команда UPDATE */

UPDATE emps
  SET last_name = 'Иванова'
  WHERE id_emp = '5';

/* ------------------------------------------------ */

/* Удаление строк - Операция DELETE - Команда DELETE FROM */

DELETE FROM emps
  WHERE id_dept = '2';
